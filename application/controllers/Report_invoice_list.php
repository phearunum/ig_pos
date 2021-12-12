<?php
class Report_invoice_list extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        
        $data['title'] = "REPORT INVOICE LIST";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_invoice_list";
        
        $data['date']='Last 50 Records';//date('Y-m-d');
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
                
             $data['lbl_inv_title']         =$this->lang->line('report_invoice_list_name');
             $data['lbl_inv_invoice_no']    =$this->lang->line('invoice_no');
             $data['lbl_inv_cashier']       =$this->lang->line('cashier');
             $data['lbl_inv_total']         =$this->lang->line('lb_total');
             $data['lbl_inv_status']        =$this->lang->line('status');
             $data['lbl_inv_total_invoice'] =$this->lang->line('total_invoice');
             $data['lbl_inv_total_cancel']  =$this->lang->line('total_cancel');
             $data['lbl_inv_total_paid']    =$this->lang->line('total_paid');
             $data['lbl_create_date']       =$this->lang->line('lb_create_date');
             $data['lbl_pax']               =$this->lang->line('lb_pax');
            

             $data['lbl_from']        =$this->lang->line('lb_from');
             $data['lbl_to']          =$this->lang->line('lb_to');
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             
        //END TRANSLATE
        
        $this->load->view("welcome/view",$data);
    }
    public function response(){
        //sleep(500);
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
        vf.master_id AS master_id,
        vf.invoice_no AS invoice_no,
        vf.invoice_creator AS invoice_creator,
        vf.pax AS pax,
        ifnull(vf.cashier,vf.invoice_creator) AS cashier,
        vf.customer AS customer,
        vf.sale_master_cashier AS sale_master_cashier,
        vf.start_date AS start_date,
        vf.end_date AS end_date,
        sum(ifnull(grand_total,0)) AS grand_total,
         vf.master_status AS sale_master_status
        FROM invoice_finished  vf GROUP BY vf.master_id");
        $this->load->view("report/report_stock/response", $data);
    }
    public function responses(){
        //sleep(500);
        $datefrom = $this->input->get("datefrom");
        $dateto = $this->input->get("dateto");
        $txt_invoice_no = $this->input->get("txt_invoice_no");
        $query ='';
        if($datefrom!='' && $dateto!='')
            $query .= " and date_format(end_date,'%Y-%m-%d') between '$datefrom' and '$dateto'";
        if($txt_invoice_no!='')
            $query .= " and lpad(invoice_no,6,0)=".$txt_invoice_no;
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
        vf.master_id AS master_id,
        vf.invoice_no AS invoice_no,
        vf.invoice_creator AS invoice_creator,
        vf.pax AS pax,
        vf.cashier AS cashier,
        vf.customer AS customer,
        vf.sale_master_cashier AS sale_master_cashier,
        vf.start_date AS start_date,
        vf.end_date AS end_date,
        sum(ifnull(grand_total,0)) AS grand_total,
         vf.master_status AS sale_master_status
		FROM invoice_finished  vf
		WHERE 1=1 $query GROUP BY vf.master_id");
        $this->load->view("report/report_stock/response", $data);
    }
}