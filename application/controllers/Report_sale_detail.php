<?php

class Report_sale_detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('Base_model');
        $this->load->library("pagination");
        $this->load->helper("url");
        date_default_timezone_set("Asia/Phnom_Penh");
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
        $data['page'] = "report/report_sale/report_sale_detail";

        //$data['paginglinks']  = "";
       // $data['sale_summary'] = "";
       // $data['shift_time'] = $this->Base_model->loadToListJoin("SELECT * FROM time_template ORDER BY template_time_id DESC");
        $data['text_display'] = 'Today Report Sale Detail';
    
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
            $data['lbl_title']                   =$this->lang->line('sale_detail_list_name');
            $data['lbl_from']                   =$this->lang->line('lb_from');
            $data['lbl_to']                     =$this->lang->line('lb_to');
            $data['lbl_customer']               =$this->lang->line('customer');
            $data['btn_search']                 =$this->lang->line('btn_search');
            $data['btn_export']                 =$this->lang->line('btn_export');
            $data['lbl_no']                     =$this->lang->line('lb_no');

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
            //END TRAN SLATE
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");

        $this->load->view("welcome/view", $data);
    }
    public function response() {
        $query =" AND DATE(sm.sale_master_end_date) BETWEEN CURDATE() AND CURDATE() ";
        if($this->Base_model->is_supper_user()==false)
            $query .=" AND `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        $data['records'] = $this->Base_model->loadToListJoin('CALL p_sale_detail("'.$query.'")');

        $this->load->view("report/report_stock/response", $data);
    }
    public function responses() {
        $df = $this->input->get("datefrom");
        $dt = $this->input->get("dateto");
        $customer_id   = $this->input->get("txtcustomer_id");
        $invoice_no    = $this->input->get("txt_invoice_no");
        $branch = $this->input->get("branch");
        /*$time_start    = $this->input->get("txt_time_start");
        $time_to       = $this->input->get("txt_time_to");
        $txt_seller_name = $this->input->get("txt_seller_name");*/
        $query ="";
        if($df!="" && $dt!="")
            $query .=" AND DATE(sm.sale_master_end_date) BETWEEN '$df' AND '$dt'";
        if($customer_id!="")
            $query .=" AND `sm`.`sale_master_customer_id`=$customer_id";
        if($invoice_no!="")
            $query .=" AND LPAD(`sm`.`sale_master_invoice_no`,6,0)='$invoice_no'";
        if($this->Base_model->is_supper_user()==false)
            $query .=" AND `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        else{
            if($branch!=0)
                $query .=" AND `sm`.`sale_master_branch_id`=".$branch;
        }
        $data['records'] = $this->Base_model->loadToListJoin('CALL p_sale_detail("'.$query.'")');
        
        $this->load->view("report/report_stock/response", $data);
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
        
        $query = "SELECT vf.invoice_no, vf.customer, date_format(vf.end_date,'%Y-%m-%d') as end_date,
	vf.item_name, vf.qty, vf.unit_price, vf.unit_cost, vf.sub_total, vf.total_discount_dollar, vf.tax_amount,
	vf.service_charge_amount, vf.grand_total
        FROM invoice_finished vf left JOIN customer as c ON vf.customer_id = c.customer_id WHERE 1=1 
         $concate $con_date $customer_con  order by master_id desc ";
        $query_page = "select sum(grand_total) as grand_total, sum(sub_total) as sub_total FROM invoice_finished vf  "
                . " left JOIN customer as c ON vf.customer_id = c.customer_id WHERE 1=1 " 
                       . $concate . $con_date . " $customer_con  Group by master_id";
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
