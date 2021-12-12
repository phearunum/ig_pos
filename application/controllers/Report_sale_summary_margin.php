<?php

class Report_sale_summary_margin extends CI_Controller {

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
        $data['page']   = "report/report_sale/report_sale_summary_margin";

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
        $data['account_type']=$this->Base_model->loadToListJoin("select acc_type_id,acc_type from account_type where acc_status=1");
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
        
        $this->load->view("welcome/view", $data);
    }


    
    public function response(){
        $query ="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between CURDATE() and CURDATE() ";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        //
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }



    public function responses(){
        $date_from = $this->input->get("datefrom");
        $date_to = $this->input->get("dateto");
        $txt_customer_id = $this->input->get("txtcustomer_id");
        $branch = $this->input->get("branch");
        $cbo_acc_type = $this->input->get("cbo_acc_type");
        $txt_invoice_no = $this->input->get("txt_invoice_no");
        ///
        $query ="";
        if($date_from!="" && $date_to!=""){
            $query .="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$date_from' and '$date_to'";
        }
        if($txt_customer_id != "")
            $query .= " and `sm`.`sale_master_customer_id`=$txt_customer_id";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        else{
            if($branch!=0)
                $query .=" and `sm`.`sale_master_branch_id`=".$branch;
        }
        if($cbo_acc_type!=0)
            $query .=" and sm.sale_master_account_type=".$cbo_acc_type;
        if($txt_invoice_no!="")
            $query .=" and LPAD(`sm`.`sale_master_invoice_no`,6,0)='$txt_invoice_no'";
        ///
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }    
}
