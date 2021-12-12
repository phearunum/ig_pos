<?php

class report_sale_show_invoice extends CI_Controller {

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
        $data['page']   = "report/report_sale/report_sale_show_invoice";
        //START => load data to table when page load 
        
        $data['date'] = date("d-m-Y");
        
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
        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary where status_invoice='SHOWN' ORDER BY invoice_no DESC LIMIT 25");
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
            
        $query_str = "SELECT * FROM v_sale_summary where status_invoice='SHOWN' ".$q_name.$date_se.$q_inv;
        $data['records'] = $this->Base_model->loadToListJoin($query_str);
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response", $data);
    }
}
