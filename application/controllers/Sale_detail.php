<?php
class Sale_detail extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        //load Model Name
        $user_id = $this->session->userdata("user_id");
        if (empty($user_id))
            redirect(site_url(), 'logout');
        $this->load->model('Base_model');
        $this->load->library("pagination");
        $this->load->helper("url");
        $this->Base_model->check_loged_in();
    }
    public function index() {
        $data['title'] = "Report Sale Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_hide_invoice_by_sale_detail";


        $data['invoice_no'] = "";
        $data['from'] = date("Y-m-d");
        $data['to'] = date("Y-m-d");
        
        
        $name=$this->uri->segment(1);
        $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
        $id=0;

        foreach($getid as $g){
            $id=$g->permission_id;
        }
        $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('sale',$lang=='' ? 'en':$lang);
        $data['lbl_title']                  =$this->lang->line('sale_detail_list_name');
        $data['lbl_from']                   =$this->lang->line('lb_from');
        $data['lbl_to']                     =$this->lang->line('lb_to');
        $data['lbl_customer']               =$this->lang->line('customer');
        $data['btn_search']                 =$this->lang->line('btn_search');
        $data['btn_export']                 =$this->lang->line('btn_export');
        $data['lbl_no']                     =$this->lang->line('lb_no');
        $data['lbl_invoice_no']             =$this->lang->line('invoice_no');
        $data['lbl_customer_card']          =$this->lang->line('customer_card');
        $data['lbl_item_name']              =$this->lang->line('item_name');
        $data['lbl_qty']                    =$this->lang->line('qty');
        $data['lbl_price']                  =$this->lang->line('price');
        $data['lbl_current_cost']           =$this->lang->line('current_cost');
        $data['lbl_total']                  =$this->lang->line('lb_total');
        $data['lbl_discount']               =$this->lang->line('discount');
        $data['lbl_vat']                    =$this->lang->line('vat');
        $data['lbl_service_charge']         =$this->lang->line('service_charge');
        $data['lbl_grand_total']            =$this->lang->line('lb_grand_total');
        $data['lbl_sub_total']              =$this->lang->line('lb_sub_total');
        $data['lbl_card']                   =$this->lang->line('card');
        $data['lbl_create_date']            =$this->lang->line('lb_create_date');
        //END TRAN SLATE
        $this->load->view("welcome/view", $data);
    }
    public function response() {
        $df =date("Y-m");
        $dt =date("Y-m"); 
        $data['records'] = $this->Base_model->loadToListJoin("select 
    `sh`.sale_master_id as master_id,
    lpad(`sh`.hide_invoice_no,6,0) as invoice_no,
    `cust`.customer_name as `customer`,
    `sh`.customer_id,
    date_format(`sh`.end_date,'%Y-%m-%d') as end_date,
    `inf`.item_name,
    `inf`.qty,
    `inf`.unit_price,
    format(`inf`.unit_cost,2) as unit_cost,
    format(`inf`.sub_total,2) as sub_total,
    format(`inf`.total_discount_dollar,2) as total_discount_dollar,
    format(`inf`.tax_amount,2) as tax_amount,
    format(`inf`.service_charge_amount,2) as service_charge_amount,
    format(`inf`.grand_total,2) as grand_total,
    `inf`.branch_id,
    `cua`.customer_chip as customer_card,
    `inf`.master_status
from `sale_hide_invoice` `sh`
join `invoice_finished` `inf` on `sh`.sale_master_id=`inf`.master_id 
left join `customer_account` `cua` on `inf`.customer_acc_id=`cua`.customer_acc_id
left join `customer` `cust` on `sh`.customer_id=`cust`.customer_id
where date_format(`sh`.end_date,'%Y-%m') between '$df' and '$dt'
order by `sh`.hide_invoice_no  desc");

        $this->load->view("report/report_stock/response", $data);
    }
    public function responses() {
        $df = $this->input->get("datefrom");
        $dt = $this->input->get("dateto");
        $customer_id   = $this->input->get("txtcustomer_id");
        $invoice_no    = $this->input->get("txt_invoice_no");
        //
        $q_condition='';
        if($df != "" && $dt != ""){
            $q_condition .= " and date_format(`sh`.end_date,'%Y-%m') between '$df' and '$dt'";
        }
        if ($customer_id != ''){
            $q_condition .= " AND `sh`.customer_id =".$customer_id;
        }
        if($invoice_no!=''){
            $q_condition .= " AND `sh`.hide_invoice_no =".$invoice_no;
        }
        //
        $data['records'] = $this->Base_model->loadToListJoin("select 
    `sh`.sale_master_id as master_id,
    lpad(`sh`.hide_invoice_no,6,0) as invoice_no,
    `cust`.customer_name as `customer`,
    `sh`.customer_id,
    date_format(`sh`.end_date,'%Y-%m-%d') as end_date,
    `inf`.item_name,
    `inf`.qty,
    `inf`.unit_price,
    format(`inf`.unit_cost,2) as unit_cost,
    format(`inf`.sub_total,2) as sub_total,
    format(`inf`.total_discount_dollar,2) as total_discount_dollar,
    format(`inf`.tax_amount,2) as tax_amount,
    format(`inf`.service_charge_amount,2) as service_charge_amount,
    format(`inf`.grand_total,2) as grand_total,
    `inf`.branch_id,
    `cua`.customer_chip as customer_card,
    `inf`.master_status
from `sale_hide_invoice` `sh`
join `invoice_finished` `inf` on `sh`.sale_master_id=`inf`.master_id 
left join `customer_account` `cua` on `inf`.customer_acc_id=`cua`.customer_acc_id
left join `customer` `cust` on `sh`.customer_id=`cust`.customer_id where 1=1 $q_condition
order by `sh`.hide_invoice_no  desc");

        $this->load->view("report/report_stock/response", $data);
    }
    // public function load_invoice(){
        
    //     $from = $this->input->post("from");
    //     $to = $this->input->post("to");
    //     $customer = $this->input->post("customer");
    //     $invoice = $this->input->post("invoice");
        
    //     $q_date= '';
    //     $q_customer ='';
    //     $q_invoice = '';
    //     $q_str ='';
        
    //     if($from !='' && $to != ''){
    //         $q_date = " and date_format(end_date,'%Y-%m-%d') between '".$from."' and '".$to."'";   
    //     }
    //     if($customer != ''){
    //         $q_customer = " and customer_id = $customer ";
    //     }
    //     if($invoice != ''){
    //         $q_invoice = " and invoice_no = '".$invoice."' ";
    //     } 
    //     if($from =='' && $to == '' && $customer == '' && $invoice == ''){
    //         $q_str = " and date_format(end_date,'%Y-%m') = '".date("Y-m")."'";
    //     }
        
    //     $master_id = $this->Base_model->loadToListJoin("select * from v_sale_hide_invoice where 1=1 ".$q_date.$q_customer.$q_invoice.$q_str."");
    //     echo '{"Master":[{';
    //     foreach($master_id as $m){
    //         echo '"sale_master_id"' . ':"' . $m->master_id . '",' . '"hide_invoice_no"' . ':"' . $m->invoice_no . '",' . '"customer_name"' . ':"' . $m->customer_name . '",' . '"customer_card"' . ':"' . $m->customer_card . '",' . '"date"' . ':"' . $m->end_date . '",' . '"sub_total"' . ':"' . $m->sub_total . '",' . '"grand_total"' . ':"' . $m->grand_total . '"';   
    //         echo "},{";
    //     }
    //     echo "}]}";
        
    // }
    // public function load_item(){
    //     $id = $this->input->post("id");
    //     $from = $this->input->post("from");
    //     $to = $this->input->post("to");
    //     $customer = $this->input->post("customer");
    //     $invoice = $this->input->post("invoice");
        
    //     $q_date= '';
    //     $q_customer ='';
    //     $q_invoice = '';
    //     $q_str ='';
    //     $q_master='';
        
    //     if($from !='' && $to != ''){
    //         $q_date = " and master_id = ".$id." and date_format(end_date,'%Y-%m-%d') between '".$from."' and '".$to."'";   
    //     }
    //     if($customer != ''){
    //         $q_customer = " and master_id = ".$id." and customer_id = $customer ";
    //     }
    //     if($invoice != ''){
    //         $q_master = $this->Base_model->get_value("sale_hide_invoice","sale_master_id","hide_invoice_no",$invoice);
    //         $q_invoice = ' and master_id = '.$q_master.'';
    //     } 
    //     if($from =='' && $to == '' && $customer == '' && $invoice == ''){
    //         $q_str = " and master_id = $id and date_format(end_date,'%Y-%m') = '".date("Y-m")."'";
    //     }
    //     $data = $this->Base_model->loadToListJoin("select format(qty,0)as qty,format(unit_price,2)as unit_price,format(cost_price,2)as cost_price,format(sub_total,2)as sub_total"
    //             . ",format(discount_dollar,2)as discount_dollar,format(tax_amount,2)as tax_amount,format(service_charge_amount,2)as service_charge_amount"
    //             . ",format(grand_total,2)as grand_total,get_item_detail_name(item_id)as item_name from invoice_finished where 1=1 ".$q_date.$q_customer.$q_invoice.$q_str." ");
    //     echo json_encode($data);
    // }
}
