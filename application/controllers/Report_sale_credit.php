<?php

class Report_sale_credit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }

    public function index() {
        
        $data['title']  = "Report Purchase Detail ";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "report/report_sale/report_sale_credit";

        $data['date'] = date("d-m-Y");
        
         $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        
        // load view when action above finish
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('sale',$lang=='' ? 'en':$lang);
        
        $data['lbl_title']      = $this->lang->line('report_sale_summary_list_name');
        $data['lbl_invoice_no'] = $this->lang->line('invoice_no');
        $data['lbl_customer']   = $this->lang->line('customer');
        
        $data['lbl_date']       = $this->lang->line('dates');
        $data['lbl_total']      = $this->lang->line('lb_total');
        $data['lbl_discount']   = $this->lang->line('discount');
        $data['lbl_tax']        = $this->lang->line('vat');
        $data['lbl_from']       = $this->lang->line('lb_from');
        $data['lbl_to']         = $this->lang->line('lb_to');
        $data['lbl_service']    = $this->lang->line('service_charge');
        $data['branch_label']    = $this->lang->line('branch');
        $data['lbl_grand_total']= $this->lang->line('lb_grand_total');
        $data['lbl_seller']     = $this->lang->line('seller');   
        $data['lbl_cashier']     = $this->lang->line('cashier');   
        $data['lbl_time_in']     = $this->lang->line('checkin_date');
        $data['lbl_time_out']     = $this->lang->line('checkout_date');      
        $data['lbl_member']     = $this->lang->line('member'); 
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_no']     = $this->lang->line('lb_no');
        $data['lbl_account']     = $this->lang->line('account'); 
        $data['lbl_account_type']     = $this->lang->line('account_type'); 
        $data['lbl_action']     = $this->lang->line('action'); 
        //END TRAN SLATE
        $data['records_agency'] = $this->Base_model->loadToListJoin("SELECT fl.layout_id,fl.layout_name
            FROM floor_table_layout fl
            JOIN floor f ON f.floor_id = fl.floor_id
            WHERE f.is_delivery = 1 AND fl.status=1");

        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
        
        $this->load->view("welcome/view", $data);
    }
    public function test(){
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_credit`(" and 1=1")');
        $this->load->view("report/report_stock/response_server", $data);
    }

    public function response(){
        $query ="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between CURDATE() and CURDATE() ";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        //
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_credit`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
    public function responses(){
        $date_from = $this->input->get("datefrom");
        $date_to = $this->input->get("dateto");
        $paidfrom = $this->input->get("paidfrom");
        $paidto = $this->input->get("paidto");
        
        $branch = $this->input->get("branch");
        $agency = $this->input->get("agency");
        $txt_invoice_no = $this->input->get("txt_invoice_no");
        $pay_type = $this->input->get("pay_type");
        ///
        $query ="";
        if($date_from!="" && $date_to!=""){
            $query .="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$date_from' and '$date_to'";
        }
        if($paidfrom!="" && $paidto!=""){
            $query .="and date_format(`sm`.sale_master_modified,'%Y-%m-%d') between '$paidfrom' and '$paidto'";
        }
        // if($txt_customer_id != "")
        //     $query .= " and `sm`.`sale_master_customer_id`=$txt_customer_id";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        else{
            if($branch!=0)
                $query .=" and `sm`.`sale_master_branch_id`=".$branch;
        }
        if($agency!=0)
            $query .=" and sale_master_layout_id=".$agency;
        if($txt_invoice_no!="")
            $query .=" and LPAD(`sm`.`sale_master_invoice_no`,6,0)='$txt_invoice_no'";

        if ($pay_type==3) {
            $query .=" and sale_master_status=".$pay_type;
        }
        if ($pay_type==4) {
            $query .=" and sale_master_status=".$pay_type;
        }
        ///
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_credit`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
    public function update(){
        
        $ids =$this->input->post('master_ids');
        $master_ids = "";      
        foreach ($ids as $key => $value) {
            if($key==0){
                $master_ids .= $value;
            }else{
                $master_ids .= ",".$value;
            }
        }

        if($master_ids!=""){
            $this->Base_model->run_query("UPDATE sale_master SET sale_master_modified_by=".$this->Base_model->user_id().",sale_master_modified = now(), sale_master_status =4 WHERE sale_master_status=3 AND sale_master_id in($master_ids)");
        }
        echo "done";
    }

	public function order_list_cash_out(){

        //$cash_id=$this->input->post('cash_id');
        
		$datefrom = $this->input->post("#datefrom");
		$dateto = $this->input->post("#dateto");
		$date ='';
		$date = "and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$datefrom' and '$dateto'";

        $branch_id = $this->Base_model->branch_id();
        $stock_location_id=$this->Base_model->stock_location_id();

      
        //Item_Detail
        //$Item = $this->Base_model->loadStoreProcedure("call p_cash_out(".$cash_id.")");
        //Invoice
        //$Item = $this->Base_model->loadStoreProcedure("call p_sale_detail('and sm.sale_master_cash_id=".$cash_id."')");
        //$Item_void = $this->Base_model->loadStoreProcedure('call p_sale_detail_void("'.$date.'")');
       // $Cashier = $this->Base_model->loadStoreProcedure('call p_cash_register("'.$date.'")');
       // $Stock = $this->Base_model->loadStoreProcedure("call p_sale_cut_stock(".$cash_id.",".$branch_id.",".$stock_location_id.")");
       //$Summary = $this->Base_model->loadStoreProcedure('call p_sale_summary("'.$date.'")');
       //$Summary_Void = $this->Base_model->loadStoreProcedure('call p_sale_summary_void("'.$date.'")');
       //$topup=$this->Base_model->loadToListJoin("select c.customer_name,c.customer_card_number,t.transaction_date,t.transaction_amount from transaction t inner join customer c on t.transaction_customer_id=c.customer_id  where transaction_action=1 and cash_id=".$cash_id);
       //$acctype=$this->Base_model->loadToListJoin("select acc_type,0.00 as total from account_type");
       //$pax = $this->Base_model->loadToListJoin("SELECT Sum(sale_master_pax) as pax
              //   from sale_master sm
              //   inner join cash_register cr on sm.sale_master_cash_id=cr.cash_id
              //   where cr.cash_id='".$cash_id."'");

       $final = $this->Base_model->loadToListJoin("SELECT
            sm.sale_master_cash_id AS cash_id,
            em.employee_name AS cashier,
                
            cr.cash_startdate AS start_date,
            cr.cash_enddate AS end_date,
            cr.cash_amount as cash_amount_us,
            cr.cash_amount_kh as cash_amount_kh,
            cr.cash_real_us,
            cr.cash_real_kh,
            FORMAT( cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate), 2 ) AS start_amount,
            FORMAT(cr.cash_real_us + cr.cash_real_kh/(select rate_amount from rate),2) AS receive_amount,
            
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ),2) AS sale_amount,
            
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2) AS total_amount,

            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2)*(select rate_amount from rate) AS total_amount_kh,
    (SELECT count(0) 
        FROM sale_master sm
        WHERE ((sm.sale_master_status IN (2, -1))AND (sm.sale_master_cash_id = cr.cash_id))) AS total_invoice,
    (SELECT count(0)
        FROM sale_master sm
        WHERE ((sm.sale_master_status = 2)AND (sm.sale_master_cash_id = cr.cash_id))) AS paid_invoice,
    (SELECT count(0)
        FROM sale_master sm
        WHERE((sm.sale_master_status = -1)AND (sm.sale_master_cash_id = cr.cash_id))) AS void_invoice,
    (SELECT sum(sm.sale_master_pax)
      from sale_master sm
      where sm.sale_master_pax AND sm.sale_master_cash_id=cr.cash_id )  AS pax


            FROM sale_master sm
            JOIN cash_register cr ON sm.sale_master_cash_id =cr.cash_id
            JOIN sale_detail sd ON sm.sale_master_id = sd.sale_master_id
            LEFT JOIN employee em ON em.employee_id = sm.sale_master_cashier_id
            LEFT JOIN item_detail idt ON idt.item_detail_id = sd.sale_detail_item_id
            LEFT JOIN floor_table_layout ftl ON sm.sale_master_layout_id=ftl.layout_id
            LEFT JOIN floor fl ON ftl.floor_id=fl.floor_id
            LEFT JOIN account_type ac ON sm.sale_master_account_type=ac.acc_type_id
            INNER JOIN branch br ON sm.sale_master_branch_id=br.branch_id
            WHERE  1=1 and sm.sale_master_status in (2) AND sd.sale_detail_status in (1) AND cr.cash_status LIKE 'FINISH' AND date_format(cr.cash_enddate,'%Y-%m-%d') =  date_format(now(),'%Y-%m-%d')
            GROUP BY sm.sale_master_cash_id");
        $array1 = array(
           // 'Item'=>$Item,
           // 'Cashier'=>$Cashier,
            //'Stock'=>$Stock,
           // 'Item_void'=>$Item_void,
           // 'Summary'=>$Summary,
          //  'Summary_Void'=>$Summary_Void,
            //'Topup'=>$topup,
           // 'Account_type'=>$acctype,
            //'pax'=>$pax,
            'final'=>$final
        );
        echo json_encode($array1);

    }
	
}
