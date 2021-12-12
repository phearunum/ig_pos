<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report_sale_hide_invoice
 *
 * @author Limeng
 */
class report_sale_hide_invoice extends CI_Controller {
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
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
                
             $data['lbl_title']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_title");
             $data['lbl_invoice_no']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_invoice_no");
             $data['lbl_customer']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_customer");
             $data['lbl_note']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_note");
             $data['lbl_designer']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_designer");
             $data['lbl_printer']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_printer");
             $data['lbl_item_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_item_name");
             $data['lbl_qty']               =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_qty");
             $data['lbl_recorder']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_recorder");
             $data['lbl_unit_price']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_unit_price");
             $data['lbl_seller']            =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_seller");
             $data['lbl_date']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_date");
             $data['lbl_total']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_total");
             $data['lbl_discount']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_discount");
             $data['lbl_tax']               =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_tax");
             $data['lbl_from']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_from");
             $data['lbl_to']                =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_to");
             $data['lbl_service']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_service");
             $data['lbl_card_no']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_card_no");
             $data['lbl_grand_total']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_grand_total");
             $data['lbl_paid']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_paid");
             $data['lbl_sub_total']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_sub_total");
             
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             $data['lbl_no']          =$this->lang->line('lbl_no');
            //END TRAN SLATE

        $this->load->view("welcome/view", $data);
    }

    public function search_detail() {
        $from = $this->input->post("datefrom");
        $to = $this->input->post("dateto");
        $data['show_date']='';
        $con_date = '';
        if ($from != '' && $to != '') {
            $con_date = " and cast(end_date as date) between '$from' and '$to' ";
            $data['show_date'] = "Date: " . $from . " To " . $to;
        }

        $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_card
        FROM invoice_finished vf left JOIN customer as c ON vf.customer_id = c.customer_id WHERE vf.master_status ='HIDDEN' and vf.detail_status = 'HIDDEN'
          $con_date Group by master_id  order by master_id";
        $query_page = "select sum(grand_total) as grand_total, sum(sub_total) as sub_total FROM invoice_finished vf  "
                . " left JOIN customer as c ON vf.customer_id = c.customer_id WHERE vf.master_status = 'HIDDEN' and vf.detail_status = 'HIDDEN' " 
                        . $con_date . "  Group by master_id";
        if ($con_date == '' ) {
            $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_card
        FROM invoice_finished vf left JOIN customer as c ON vf.customer_id = c.customer_id WHERE vf.master_status = 'HIDDEN'  and vf.detail_status = 'HIDDEN' Group by master_id order by master_id desc ";
        $query_page = "SELECT sum(vf.sub_total) as sub_total, sum(vf.grand_total) as grand_total FROM invoice_finished vf WHERE vf.master_status = 'HIDDEN'  and vf.detail_status = 'HIDDEN'
        Group by master_id order by master_id desc";
        }

        $data['sale_summary'] = $this->db->query($query)->result_array();

        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
                
             $data['lbl_title']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_title");
             $data['lbl_invoice_no']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_invoice_no");
             $data['lbl_customer']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_customer");
             $data['lbl_note']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_note");
             $data['lbl_designer']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_designer");
             $data['lbl_printer']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_printer");
             $data['lbl_item_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_item_name");
             $data['lbl_qty']               =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_qty");
             $data['lbl_recorder']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_recorder");
             $data['lbl_unit_price']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_unit_price");
             $data['lbl_seller']            =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_seller");
             $data['lbl_date']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_date");
             $data['lbl_total']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_total");
             $data['lbl_discount']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_discount");
             $data['lbl_tax']               =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_tax");
             $data['lbl_from']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_from");
             $data['lbl_to']                =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_to");
             $data['lbl_service']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_service");
             $data['lbl_card_no']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_card_no");
             $data['lbl_grand_total']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_grand_total");
             $data['lbl_paid']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_paid");
             $data['lbl_sub_total']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_sale_detail","form_translate_label_name","lbl_sub_total");
         
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             $data['lbl_no']          =$this->lang->line('lbl_no');
            //END TRAN SLATE

        echo $this->load->view("report/report_sale/response/response_sale_hide_invoice", $data, TRUE);
    }

}
