<?php
class Report_check_stock_price extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $user_id = $this->session->userdata("user_id");
        if(empty($user_id))
         redirect(site_url(),'logout');
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
        $data['title'] = "Report Stock Price Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_stock_detail/report_check_stock_price";                
        $data['date_from']='';
        $data['date_until']='';
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * FROM stock_location");
        // load view when action above finish
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        if($lang==''){
            $lang='en';
        }
        $data['lbl_title'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_title");
        $data['lbl_type'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_item_type");
        $data['lbl_name'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_item_name");
        $data['lbl_part'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_part_number");
        $data['lbl_cost'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_current_cost");
        $data['lbl_total_cost'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_total_cost");
        $data['lbl_recorder'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_recorder");
        $data['lbl_stock'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_stock_location");
        $data['lbl_total'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_total");
        $data['lbl_qty'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "stock_check_list", "form_translate_label_name", "lbl_qty");

        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['btn_export'] =$this->lang->line('btn_export');
        $data['btn_search'] =$this->lang->line('btn_search');
        
        $this->load->view("welcome/view",$data);        
    }
     public function response(){
         
         //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str='';//$view_all==1?'':' and employee_brand_id='.$this->session->userdata('branch_id');
        
        //end permission data
                
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_price where 1=1 ".$str);
        $this->load->view("report/report_stock/response",$data);
    } 
    public function responses(){
        
        $df= $this->input->get("df");
        $dt= $this->input->get("dt");        
        $customer_name= $this->input->get("customer_name");  
        $seller= $this->input->get("seller"); 
        $invoice= $this->input->get("invoice"); 
        $partnumber = $this->input->get("partnumber"); 
        
        $q_name='';
        $q_seller='';
        $q_invoice='';        
        $q_date = '';
        $q_part = '';
        if($customer_name != ""){
            $q_name = " and item_detail_name = '".$customer_name."' ";          
        }
        if($seller !=null){
            $q_seller = " and item_type_name like '%$seller%' ";
        }
        if($df != '' && $dt!= ''){
           $q_date=  "purchase_detail_date between '".$df."' and '".$dt."'";           
        }
        if($partnumber != ''){
            $q_part = ' and item_detail_part_number = "'.$partnumber.'"';
        }
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str='';//$view_all==1?'':' and employee_brand_id='.$this->session->userdata('branch_id');
        
        
        $query_str = "SELECT * FROM v_stock_price where 1=1 ".$q_name.$q_seller.$q_invoice.$q_part.$str;
        $data['records']=$this->Base_model->loadToListJoin($query_str);
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response",$data);
    }
}
