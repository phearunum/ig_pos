<?php

class Report_sale_detail extends CI_Controller {

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

    public $row_count = 0;
    public $row_per_page = 5;
    
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

        $data['paginglinks']  = "";
        $data['sale_summary'] = "";
        $data['text_display'] = 'Today Report Sale Detail';
        
        $data['invoice_no'] = "";
        $data['from']       = date("Y-m-d");
        $data['to']         = date("Y-m-d");
        
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
		$status = $this->input->post("status");
        if ($page_no == '') {
            $page_no = 1;
        }
        $data['show_invoice']='';
        $concate = '';
        if ($invoice_no != null && $invoice_no != "") {
            $concate = ' and vf.master_id ='.$invoice_no;
            $data['show_invoice'] = "Invoice# " . $invoice_no;
        }
        $data['show_customer']='';
        $customer_con = '';
        if ($customer != '') {
            $customer_con = " and c.customer_id = '$customer_id'";
            $data['show_customer'] = "Customer: " . $customer;
        }
        $data['show_date']='';
        $con_date = '';
        if ($from != '' && $to != '') {
            $con_date = " and cast(end_date as date) between '$from' and '$to' ";
            $data['show_date'] = "Date: " . $from . " To " . $to;
        }
		$q_status ='';
		if($status != '0'){
			$q_status = ' and vf.master_status = "'.$status.'"';
		}
		
        $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card,master_status
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN')
         $concate $con_date $customer_con $q_status Group by master_id  order by master_id ";
        $query_page = "select sum(grand_total) as grand_total, sum(sub_total) as sub_total FROM invoice_finished vf  "
                . " left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN') " 
                       . $concate . $con_date . " $customer_con  Group by master_id";
        if ($con_date == '' && $invoice_no == "" && $seller == "" && $customer == "" && $status == "0") {
            $query = "SELECT vf.master_id, vf.invoice_no, vf.customer, vf.customer_id, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total, vf.branch_id, c.customer_chip as customer_card,master_status
        FROM invoice_finished vf left JOIN customer_account as c ON vf.customer_acc_id = c.customer_acc_id WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN') and date_format(vf.end_date,'%Y-%m') = '".date("Y-m")."' Group by master_id order by master_id ";
        $query_page = "SELECT sum(vf.sub_total) as sub_total, sum(vf.grand_total) as grand_total FROM invoice_finished vf WHERE vf.master_status IN ('PAID', 'CREDIT', 'HIDDEN')  and vf.detail_status IN ('PAID', 'CREDIT', 'HIDDEN')
        Group by master_id order by master_id desc";
        }
        $this->session->set_userdata('page_count', $this->db->query($query)->num_rows() / $per_page);
        $query_page = $query_page . " limit $per_page offset " . ($page_no - 1) * $per_page;
        $total_page = $this->Base_model->loadToListJoin($query_page);
        $data['total_page'] = $total_page;

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
        $page_number = $this->session->userdata('page_count');
        echo $page_number;
    }

    public function search_detail_() {
        $data['title'] = "Report Sale Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_detail";

        $per_page = 5;
        $from = $this->input->post("datefrom");
        $to = $this->input->post("dateto");
        $customer = $this->input->post("txtcustomer_ids");

        $invoice_no = $this->input->post("txt_invoice_no");

        $data['invoice_no'] = $invoice_no;
        $data['from'] = $from;
        $data['to'] = $to;

        $from_uri = $this->uri->segment(4);
        $to_uri = $this->uri->segment(5);
        $customer_uri = $this->uri->segment(6);

        //echo urldecode($customer_uri);
        //exit();
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->session->userdata('group_id'));
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }

        $view_all = $this->Base_model->get_value("permission", "permission_viewall", "permission_id", $id);
        $str = $view_all == 1 ? '' : ' sale_detail_created_by=' . $this->session->userdata('user_id') . " AND ";

        //end permission data

        $query = "";
        if ($invoice_no != "") {
            $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " sale_detail_invoice_no='" . $invoice_no . "' AND branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
        } else if ($from != "" && $to != "") {

            if ($customer != "") {
                $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " sale_date>='" . $from . "' AND sale_date<='" . $to . "' AND customer_name LIKE '" . "%" . $customer . "%" . "' AND branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
                $config['base_url'] = site_url() . '/report_sale_detail/search_detail/' . $per_page . "/" . $from . "/" . $to . "/" . $customer;
            } else {
                $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " sale_date>='" . $from . "' AND sale_date<='" . $to . "' AND  branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
                $config['base_url'] = site_url() . '/report_sale_detail/search_detail/' . $per_page . "/" . $from . "/" . $to . "/0";
            }
            $config['suffix'] = '' . http_build_query($_GET, '', "&");
        } else if ($from_uri != "" && $to_uri != "") {

            if ($customer_uri != 0) {
                $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " sale_date>='" . $from_uri . "' AND sale_date<='" . $to_uri . "' AND customer_name LIKE '%Dragon_Gym%' AND branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
                $config['base_url'] = site_url() . '/report_sale_detail/search_detail/' . $per_page . "/" . $from_uri . "/" . $to_uri . "/" . 'Dragon_Gym';
            } else {

                $data['from'] = $from_uri;
                $data['to'] = $to_uri;

                $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " sale_date>='" . $from_uri . "' AND sale_date<='" . $to_uri . "' AND branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
                $config['base_url'] = site_url() . '/report_sale_detail/search_detail/' . $per_page . "/" . $from_uri . "/" . $to_uri . "/0";
            }
            $config['suffix'] = '' . http_build_query($_GET, '', "&");
        } else {
            $query = "SELECT * FROM v_sale_detail_finish WHERE " . $str . " 1=2 AND branch_id=" . $this->session->userdata("branch_id") . " GROUP BY sale_master_id ORDER BY sale_master_id DESC";
            $config['suffix'] = '' . http_build_query($_GET, '', "&");
            $config['base_url'] = site_url() . '/report_sale_detail/search_detail';
        }

        $offset = ($this->uri->segment(7) != '' ? $this->uri->segment(7) : 0);

        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = $per_page;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['uri_segment'] = 7;

        //$config['base_url']= site_url().'/report_sale_detail/search_detail';

        $this->pagination->initialize($config);
        $data['paginglinks'] = $this->pagination->create_links();
        $data['per_page'] = $this->uri->segment(7);
        $data['offset'] = $offset;

        if ($data['paginglinks'] != '') {
            $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($this->pagination->cur_page * $this->pagination->per_page) . ' of ' . $this->pagination->total_rows;
        }

        $query .= " limit {$per_page} offset {$offset} ";
        $data['sale_summary'] = $this->db->query($query)->result_array();

        $this->load->view('welcome/view', $data);
    }
    function export() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        
        $filename = "Sale_Detail_".date('dMy').'.csv';
        
        $from = $this->input->get("df");
        $to = $this->input->get("dt");
        $customer = $this->input->get("customer_name");

        $invoice_no = $this->input->get("invoice_no");
        $status = $this->input->get("status");
        $concate = '';
        if ($invoice_no != null && $invoice_no != "") {
            $concate = ' and vf.master_id ='.$invoice_no;
            $data['show_invoice'] = "Invoice# " . $invoice_no;
        }
        $data['show_customer']='';
        $customer_con = '';
        if ($customer != '') {
            $customer_con = " and c.customer_id = '$customer_id'";
            $data['show_customer'] = "Customer: " . $customer;
        }
        $data['show_date']='';
        $con_date = '';
        if ($from != '' && $to != '') {
            $con_date = " and cast(end_date as date) between '$from' and '$to' ";
            $data['show_date'] = "Date: " . $from . " To " . $to;
        }
        $q_status ='';
		if($status != '0'){
			$q_status = ' and vf.master_status = "'.$status.'"';
		}
        $query = "SELECT vf.invoice_no, vf.customer, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total
        FROM invoice_finished vf left JOIN customer as c ON vf.customer_id = c.customer_id WHERE 1=1 
         $concate $con_date $customer_con $q_status order by master_id desc ";
        $query_page = "select sum(grand_total) as grand_total, sum(sub_total) as sub_total FROM invoice_finished vf  "
                . " left JOIN customer as c ON vf.customer_id = c.customer_id WHERE 1=1 " 
                       . $concate . $con_date. $q_status . " $customer_con  Group by master_id";
        if ($con_date == '' && $invoice_no == "" && $customer == "" ) {
            $query = "SELECT vf.invoice_no, vf.customer, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total
        FROM invoice_finished vf left JOIN customer as c ON vf.customer_id = c.customer_id Group by master_id order by master_id desc ";
        $query_page = "SELECT sum(vf.sub_total) as sub_total, sum(vf.grand_total) as grand_total FROM invoice_finished vf
         order by master_id desc";
        }
        
        //$query_str = "SELECT * FROM v_sale_summary where STR_TO_DATE(end_date,'%d-%m-%Y')  BETWEEN STR_TO_DATE('".$df."','%d-%m-%Y')  and STR_TO_DATE('".$dt."','%d-%m-%Y')".$q_name;
        
        //$query = "select * from customer";
        
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename,  "\xEF\xBB\xBF" . $data);
    }
}
