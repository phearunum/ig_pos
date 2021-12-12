<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report_order_by_table
 *
 * @author hpt-srieng
 */

class Report_order_by_table extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        
        $data['title'] = "REPORT ORDER BY TABLE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_order_by_table";
        
        $data['date']=date('Y-m-d');
        
        $data['record_employee']=$this->Base_model->get_data_by("select employee_name,layout_manage_by,layout_id from v_order_by_table where employee_name<>'' AND DATE_FORMAT(end_date,'%Y-%m-%d')=CURDATE() group by layout_manage_by;");
        $data['record_cashier']=$this->Base_model->get_data_by("SELECT employee_name,employee_id FROM employee");
        
        //translate
        $lang = $this->input->cookie('language');
             
             $data['lbl_title']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_title");
             $data['lbl_saler']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_saler");
             $data['lbl_select_saler']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_select_saler");
             $data['lbl_emp_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_emp_name"); 
             $data['lbl_table_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_table_name"); 
             $data['lbl_invoice_qty']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_invoice_qty"); 
             $data['lbl_total']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_total");
        
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             
             $data['btn_search']         =$this->lang->line('btn_search');
             $data['btn_from']        =$this->lang->line('lbl_from');
             $data['btn_to']      =$this->lang->line('lbl_to');
             $data['btn_no']        =$this->lang->line('btn_no');
        
        $this->load->view("welcome/view",$data);
        
    }
    
    public function search(){
        
        $date_from=$this->uri->segment(3);
        $date_to=$this->uri->segment(4);
        $cashier=$this->uri->segment(5);
        
        $data['date']=$date_from.'->'.$date_to;
        
        if($cashier==0){
            $data['record_employee']=$this->Base_model->get_data_by("SELECT employee_name,layout_manage_by,layout_id from v_order_by_table WHERE DATE_FORMAT(end_date,'%Y-%m-%d')>='".$date_from."' AND DATE_FORMAT(end_date,'%Y-%m-%d')<='".$date_to."' AND employee_name<>'' GROUP BY layout_manage_by");
        }else{
            $data['record_employee']=$this->Base_model->get_data_by("SELECT employee_name,layout_manage_by,layout_id from v_order_by_table WHERE DATE_FORMAT(end_date,'%Y-%m-%d')>='".$date_from."' AND DATE_FORMAT(end_date,'%Y-%m-%d')<='".$date_to."' AND layout_manage_by=".$cashier." GROUP BY layout_manage_by");
        }
        
        $data['date_from']=$date_from;
        $data['date_to']=$date_to;
        
        
        //translate
        $lang = $this->input->cookie('language');
             
             $data['lbl_title']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_title");
             $data['lbl_saler']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_saler");
             $data['lbl_select_saler']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_select_saler");
             $data['lbl_emp_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_emp_name"); 
             $data['lbl_table_name']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_table_name"); 
             $data['lbl_invoice_qty']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_invoice_qty"); 
             $data['lbl_total']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_by_table","form_translate_label_name","lbl_total");
        
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             
             $data['btn_search']         =$this->lang->line('btn_search');
             $data['btn_from']        =$this->lang->line('lbl_from');
             $data['btn_to']      =$this->lang->line('lbl_to');
             $data['btn_no']        =$this->lang->line('btn_no');
        
        
        
        $this->load->view("report/report_sale/response/response_order_by_table",$data);
    }
}
