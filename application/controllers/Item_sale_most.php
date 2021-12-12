<?php

class Item_sale_most extends CI_Controller {

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
        $data['page']   = "report/report_sale/report_item_sale_most";
        //START => load data to table when page load 

        $data['sale_summary'] = $this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary ORDER BY invoice_no DESC LIMIT 25");
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
        $data['records'] = $this->Base_model->loadToListJoin("SELECT item_type_id,item_type_name,item_id,item_name,sum(total_item_qty) AS qty,end_date,item_detail_part_number,unit_price,format(sub_total,2) as sub_total,format(grand_total,2) as grand_total FROM v_sale_item_qty_analysis  GROUP BY item_id ORDER BY sum(total_item_qty) DESC LIMIT 50");
        $this->load->view("report/report_stock/response", $data);
    }

    public function responses(){

        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $customer_name = $this->input->get("customer_name");
        
        $q_name = '';
        $q_date = '';
        $group_by='';
        if($df != "" && $dt !=""){
            $q_date = " and end_date between '".$df."' and '".$dt."'";
            $group_by ='GROUP BY item_id';
        }else{
             $group_by ='GROUP BY item_id';
        }
        if ($customer_name != "") {
            $q_name = " and item_id ='" .$customer_name . "'";
            $group_by ='GROUP BY item_id';
        }else{
             $group_by ='GROUP BY item_id';
        }

        $query_str = "SELECT item_type_id,item_type_name,item_id,item_name,sum(total_item_qty) AS qty,end_date,item_detail_part_number,unit_price,format(sub_total,2) as sub_total,format(grand_total,2) as grand_total FROM v_sale_item_qty_analysis where 1=1 $q_date  $q_name $group_by ORDER BY sum(total_item_qty) DESC";
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

}
