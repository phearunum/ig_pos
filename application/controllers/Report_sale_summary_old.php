<?php

class Report_sale_summary extends CI_Controller {

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
        $data['page']   = "report/report_sale/report_sale_summary";
        //START => load data to table when page load 
        
//        $data['sale_summary'] = $this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary ORDER BY invoice_no DESC LIMIT 25");
        $data['date'] = date("d-m-Y");
        
         $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        
        // load view when action above finish
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        
        $data['lbl_title']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_title");
        $data['lbl_invoice_no'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_invoice_no");
        $data['lbl_customer']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_customer");
        $data['lbl_designer']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_designer");
        $data['lbl_printer']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_printer");
        $data['lbl_recorder']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_recorder");
        $data['lbl_seller']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_seller");
        $data['lbl_date']       = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_date");
        $data['lbl_total']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_total");
        $data['lbl_discount']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_discount");
        $data['lbl_tax']        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_tax");
        $data['lbl_from']       = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_from");
        $data['lbl_to']         = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_to");
        $data['lbl_service']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_service");
        $data['lbl_card_no']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_card_no");
        $data['lbl_grand']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_grand");

        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_no']     = $this->lang->line('lbl_no');
        //END TRAN SLATE

        $this->load->view("welcome/view", $data);
    }

    public function response() {
        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary ORDER BY invoice_no DESC LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }

    public function responses(){

        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $customer_name = $this->input->get("customer_name");
        $inv           = $this->input->get("inv");
        
        $q_name = '';
        $date_se = '';
        $q_inv = '';
        if ($customer_name != "") {
            $q_name = " and customer_id='" . $customer_name . "'";
        } 
        if($df != "" && $dt != ""){
            $date_se = " and STR_TO_DATE(end_date,'%d-%m-%Y') BETWEEN '".$df."' and '".$dt."'" ;
        } 
        if($inv!=""){
            $q_inv=" and master_id=".$inv;
        }
//        else{
//            $q_name=" and 1=1";
//        }
            
        $query_str = "SELECT * FROM v_sale_summary where 1=1 ".$q_name.$date_se.$q_inv;
        $data['records'] = $this->Base_model->loadToListJoin($query_str);
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response", $data);
    }
    public function search() {
        $date_from = $this->uri->segment(3);
        $date_to   = $this->uri->segment(4);
        $customer  = $this->uri->segment(5);

        $q_customer = ' ';

        if ($date_from != "" && $date_to != "" && $customer != "") {
            $q_customer = ' and customer_id = "' . $customer . '"';
            $data['date'] = $date_from . '<span style="font-size:16px;"> ⇒ </span>' . $date_to;
        } else {
            $q_customer = '';
            $data['date'] = $date_from . '<span style="font-size:16px;"> - </span>' . $date_to;
        }

        $query = "SELECT * FROM v_sale_summary where STR_TO_DATE(end_date,'%d-%m-%Y')  BETWEEN STR_TO_DATE('" . $date_from . "','%d-%m-%Y')  and STR_TO_DATE('" . $date_to . "','%d-%m-%Y')" . $q_customer . ' ORDER BY invoice_no';
        $data['sale_summary'] = $this->Base_model->loadToListJoin($query);
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');

        $data['lbl_title']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_title");
        $data['lbl_invoice_no'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_invoice_no");
        $data['lbl_customer']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_customer");
        $data['lbl_designer']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_designer");
        $data['lbl_printer']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_printer");
        $data['lbl_recorder']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_recorder");
        $data['lbl_seller']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_seller");
        $data['lbl_date']       = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_date");
        $data['lbl_total']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_total");
        $data['lbl_discount']   = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_discount");
        $data['lbl_tax']        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_tax");
        $data['lbl_from']       = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_from");
        $data['lbl_to']         = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_to");
        $data['lbl_service']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_service");
        $data['lbl_card_no']    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_card_no");
        $data['lbl_grand']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_sale_sale_summary", "form_translate_label_name", "lbl_grand");

        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_no'] = $this->lang->line('lbl_no');
        //END TRAN SLATE
        
        $this->load->view("report/report_sale/response/response_sale_summary", $data);
    }
    function export() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        
        $filename = "Sale_Summary_".date('dMy').'.csv';
        
        
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $customer_name = $this->input->get("customer_name");
        //$btn=$this->input->post("btn_submit");
        $q_name = '';

        if ($customer_name != "" && $df != "" && $dt != "") {
            $q_name = " and customer='" . $customer_name . "'";
        }

        $query_str = "SELECT invoice_no as `Invoice No`,customer as `Customer Name`,customer_plate_no as `Card`,report_date as `Date`,sub_total as `Sub Total`,total_discount as `Discount`,invoice_charge as `Service Charge`,member_pay as `Member Pay` ,grand_total_with_member_pay as `Grand Total` FROM v_sale_summary where STR_TO_DATE(end_date,'%d-%m-%Y') BETWEEN '".$df."' and '".$dt."'".$q_name;
        
        $query = "select * from customer";
        $result = $this->db->query($query_str);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, "\xEF\xBB\xBF" . $data);
    }
    public function hide(){
        $id=$this->uri->segment(3);     
        $data=array(
                    'master_status'          =>"HIDDEN",
                    'detail_status'            =>"HIDDEN"
                );    
        $this->Base_model->update('invoice_finished','master_id',$id,$data);
        redirect('report_sale_summary');
    }
    public function show(){
        $id=$this->uri->segment(3);     
        $data=array(
                    'master_status'          =>"PAID",
                    'detail_status'            =>"PAID"
                );    
        $this->Base_model->update('invoice_finished','master_id',$id,$data);
        redirect('report_sale_summary');
    }
}
