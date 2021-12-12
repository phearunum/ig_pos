<?php

class Report_sale_detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load Model Name
        $user_id = $this->session->userdata("user_id");
//        if (empty($user_id))
//            redirect(site_url(), 'logout');
        $this->load->model('Base_model');
        $this->load->library("pagination");
        $this->load->helper("url");
        $this->Base_model->check_loged_in();
    }
    
    public function index() {
        $data['title'] = "Report Sale Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_sale/report_sale_detail_new";

        $data['paginglinks'] = "";
        $data['sale_summary'] = "";
        $data['text_display'] = 'Today Report Sale Detail';

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
        $per_page = 50;
        $from = $this->input->post("datefrom");
        $to = $this->input->post("dateto");
        $invoice_no = $this->input->post("txt_invoice_no");
        $customer = $this->input->post("txt_customer_name");
        $customer_id = $this->input->post("txtcustomer_id");
        $seller = $this->input->post("txt_seller_name");
        $page_no = $this->input->post('page_no');
//        $load_page = $this->input->post('load_page');
        if ($page_no == '') {
            $page_no = 1;
        }
        $data['record_no'] = 0;
        if($page_no>1){
            $data['record_no'] = $per_page * ($page_no-1);
        }
        $data['page_no'] = $page_no;
        $concate = '';
        if ($invoice_no != null && $invoice_no != "") {
            $concate = ' and vf.master_id ='.$invoice_no;
        }
        $customer_con = '';
        if ($customer != '') {
            $customer_con = " and c.customer_id = '$customer_id'";
        }
        $con_date = '';
        if ($from != '' && $to != '') {
            $con_date = " and cast(end_date as date) between '$from' and '$to' ";
        }

        $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN')
         $concate $con_date $customer_con  Group by master_id  order by master_id desc ";
        $query_page = "select sum(grand_total) as grand_total, sum(sub_total) as sub_total FROM invoice_finished vf  "
                . " left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN') " 
                       . $concate . $con_date . " $customer_con  Group by master_id";
        if ($con_date == '' && $invoice_no == "" && $seller == "" && $customer == "" ) {
            $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN') Group by master_id order by master_id desc ";
        $query_page = "SELECT sum(vf.sub_total) as sub_total, sum(vf.grand_total) as grand_total FROM invoice_finished vf WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN')
        Group by master_id order by master_id desc";
        }
        $this->session->set_userdata('page_count', ($this->db->query($query)->num_rows() / $per_page)<1 ? 1 :$this->db->query($query)->num_rows() / $per_page);
        //$query_page = $query_page . " limit $per_page offset " . ($page_no - 1) * $per_page;
        $total_page = $this->Base_model->loadToListJoin($query_page);
	$data['total_page'] = $total_page;
        $total_record = $this->db->query($query)->num_rows() / $per_page;
        if($total_record<1)
            $total_record=1;
        $data['total_record'] = $total_record;

        $query = $query . " limit $per_page offset " . ($page_no - 1) * $per_page;
        
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

        echo $this->load->view("report/report_sale/list_sale_detail", $data, TRUE);
    }

    public function report_info() {
        $per_page = 50;
        $from = $this->input->post("datefrom");
        $to = $this->input->post("dateto");
        $invoice_no = $this->input->post("txt_invoice_no");
        $customer = $this->input->post("txt_customer_name");
        $customer_id = $this->input->post("txtcustomer_id");
        $seller = $this->input->post("txt_seller_name");
        
        $concate = '';
        if ($invoice_no != null && $invoice_no != "") {
            $concate = ' and vf.master_id ='.$invoice_no;
        }
        $customer_con = '';
        if ($customer != '') {
            $customer_con = " and c.customer_id = '$customer_id'";
        }
        $con_date = '';
        if ($from != '' && $to != '') {
            $con_date = " and cast(end_date as date) between '$from' and '$to' ";
        }

        $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN')
         $concate $con_date $customer_con  Group by master_id  order by master_id desc ";
       
        if ($con_date == '' && $invoice_no == "" && $seller == "" && $customer == "" ) {
            $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN') Group by master_id order by master_id desc ";
        }
        echo ($this->db->query($query)->num_rows() / $per_page)<1 ? 1 : $this->db->query($query)->num_rows() / $per_page;
    }

}
