<?php
class Sale_summary extends CI_Controller {
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

//    public $row_count = 0;
//    public $row_per_page = 5;
    
    public function index() {
        $data['title'] = "Report Sale Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_hide_invoice";


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
                
             $data['lbl_title']             =$this->lang->line('sale_summary_special_list_name');
             $data['lbl_invoice_no']        =$this->lang->line('invoice_no');
             $data['lbl_customer']          =$this->lang->line('customer');
             $data['lbl_card']              =$this->lang->line('card');
          
             $data['lbl_cashier']           =$this->lang->line('cashier');
             $data['lbl_total']             =$this->lang->line('lb_total');
             $data['lbl_discount']          =$this->lang->line('discount');
             $data['lbl_tax']               =$this->lang->line('vat');

             $data['lbl_service_charge']    =$this->lang->line('service_charge');
             $data['lbl_member']            =$this->lang->line('member_card');
             $data['lbl_grand_total']       =$this->lang->line('lb_grand_total');
             $data['lbl_account_type']      =$this->lang->line('account_type');
             $data['lbl_date']              =$this->lang->line('lb_create_date');
           
            
           
             $data['lbl_from']              =$this->lang->line('lb_from');
             $data['lbl_to']                =$this->lang->line('lb_to');
             $data['btn_search']            =$this->lang->line('btn_search');
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['lbl_no']                =$this->lang->line('lb_no');
            //END TRAN SLATE

        $this->load->view("welcome/view", $data);
    }

    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_sale_hide_invoice where 1=1 and DATE_FORMAT(end_date,'%m-%Y') = '".date('m-Y')."' order by invoice_no limit 25");
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses(){
       // sleep(500);
        $df = $this->input->get("datefrom");
        $dt = $this->input->get("dateto");
        $customer = $this->input->get("txtcustomer_id");
        $inv = $this->input->get("txt_invoice_no");
        
        $query ='';
        if($dt != '' && $df != ''){
            $query .= " and end_date between '$df' and '$dt' ";
        }
        if($customer != ''){
            $query .= " and customer_id=".$customer;
        }
        if($inv != ''){
            $query .= " and invoice_no='".$inv."'";
        }
       
        $query = "select *,DATE_FORMAT(end_date,'%M') as month,DATE_FORMAT(end_date,'%Y') as year from v_sale_hide_invoice where 1=1 $query";
        $data['records'] = $this->Base_model->loadToListJoin($query);
        
        $this->load->view("report/report_stock/response", $data);
    }
}
