<?php
class Report_profitandlost extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
        $data['title'] = "Report Profit & Lost";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_profit_lost/report_profit_and_lost"; 
        
        //START => load data to table when page load 
        
        $data['year']= $this->Base_model->loadToListJoin("select distinct date_format(end_date,'%Y') as sale_detail_year FROM v_invoice_finished");
        
        // load view when action above finish
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $data['lbl_report_profit_year']      =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_year");
             $data['lbl_report_profit_month']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_month");
             
             //end translate
        
        $this->load->view("welcome/view",$data);        
    }
    
    public function get_month(){
        $data['year']=$this->uri->segment(3);
        $this->load->view("report/report_profit_lost/frm_get_month",$data);
    }
    
    //START => function search
    public function search_pnl(){
        
        $m=$this->uri->segment(3);
        $y=$this->uri->segment(4);
        
        //translate
        $lang = $this->input->cookie('language');
        $data['lbl_report_profit_title']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_title");
        $data['lbl_report_profit_income']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_income");
             $data['lbl_report_profit_sale']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_sale");
             $data['lbl_report_profit_discount']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_discount");
             $data['lbl_report_profit_totalIncome']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_total_income");
             $data['lbl_report_profit_purchase']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_purchase");
             $data['lbl_report_profit_TotalPurchase']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_total_purchase");
             $data['lbl_report_profit_grandprofit']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_grand_profit");
             $data['lbl_report_profit_TotalGrandprofit']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_total_grand_profit");
             $data['lbl_report_profit_expense']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_expense");
             $data['lbl_report_profit_TotalExpense']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_total_expense");
             $data['lbl_report_profit_lose']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_profitandlost","form_translate_label_name","lbl_total_profit_and_lost");  
        
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             
             $data['btn_export']         =$this->lang->line('btn_export');
        //end translate
        
        if($y !=""){
            $data['year']=$m.'/'.$y;
            $data['record_sale']= $this->Base_model->loadToListJoin("SELECT sum(sub_total) as sale_detail_total,sum(total_discount_dollar) as sale_detail_total_discount_dollar,sum(invoice_tax) as tax FROM v_invoice_finished where date_format(end_date,'%m/%Y')='".$m.'/'.$y."'");
            //$data['record_sale_return']= $this->Base_model->loadToListJoin("SELECT sum(sale_return_qty*sale_return_price) as total_s_return FROM v_sale_return where date_format(sale_return_created_date,'%m/%Y')='".$m.'/'.$y."'");
            $data['record_purchase_cost']= $this->Base_model->loadToListJoin("SELECT sum(total_cost) as purchase_cost FROM v_cost_goods_sold where date_format(purchase_created_date,'%m/%Y')='".$m.'/'.$y."'");
            $data['record_expense']= $this->Base_model->loadToListJoin("SELECT * FROM v_expense where date_format(expense_created_date,'%m/%Y')='".$m.'/'.$y."'");
            //$data['purchase_return_records']= $this->Base_model->loadToListJoin("SELECT sum(purchase_return_qty*purchase_return_price) as total_p_return FROM v_purchase_return where date_format(purchase_return_date,'%m/%Y')='".$m.'/'.$y."'");
            //$data['record_purchase_cost']=$this->Base_model->loadToListJoin("SELECT sum(totlal_purchase_cost) as purchase_cost FROM v_sale_price_and_cost WHERE date_format(sale_detail_created_date,'%m/%Y')='".$m.'/'.$y."'");
            
            
            
            $this->load->view("report/report_profit_lost/frm_get_pnl",$data);
        }else{
            $data['year']=$m;
            $data['record_sale']= $this->Base_model->loadToListJoin("SELECT sum(grand_total) as sale_detail_total,sum(total_discount_dollar) as sale_detail_total_discount_dollar,sum(invoice_tax) as tax FROM v_invoice_finished where date_format(end_date,'%Y')='".$m."'");
            //$data['record_sale_return']= $this->Base_model->loadToListJoin("SELECT sum(sale_return_qty*sale_return_price) as total_s_return FROM v_sale_return where date_format(sale_return_created_date,'%m/%Y')='".$m.'/'.$y."'");
            $data['record_purchase_cost']= $this->Base_model->loadToListJoin("SELECT sum(total_cost) as purchase_cost FROM v_cost_goods_sold where date_format(purchase_created_date,'%Y')='".$m."'");
            $data['record_expense']= $this->Base_model->loadToListJoin("SELECT * FROM v_expense where date_format(expense_created_date,'%Y')='".$m."'");
            //$data['purchase_return_records']= $this->Base_model->loadToListJoin("SELECT sum(purchase_return_qty*purchase_return_price) as total_p_return FROM v_purchase_return where date_format(purchase_return_date,'%Y')='".$y."'");
            //$data['record_purchase_cost']=$this->Base_model->loadToListJoin("SELECT sum(totlal_purchase_cost) as purchase_cost FROM v_sale_price_and_cost WHERE date_format(sale_detail_created_date,'%m/%Y')='".$m.'/'.$y."'");
            
            $this->load->view("report/report_profit_lost/frm_get_pnl",$data);
        }
        
    }
    //END => function search
}
