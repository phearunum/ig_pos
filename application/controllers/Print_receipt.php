<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of print_receipt
 *
 * @author hpt-srieng
 **/

class print_receipt extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $invoice_no=$this->session->userdata("invoice_no");
        $data['company']=$this->Base_model->loadToListJoin("select * from company_profile where company_profile_branch_id=".$this->session->userdata("branch_id"));
        
        $data['record_info']=$this->Base_model->loadToListJoin("select sale_master_invoice_no,"
                . "sale_by,sale_master_sell_date,sale_master_time,recorder,customer_name from v_sale_summary where sale_master_invoice_no=".$invoice_no);
        
        $data['getlist']=$this->Base_model->loadToListJoin('SELECT sale_detail_id,'
                    . '                                         item_detail_name,'
                    . '                                         sale_detail_discount_dollar,'
                    . '                                         sale_detail_discount_percent,'
                    . '                                         sale_detail_qty,'
                    . '                                         sale_detail_unit_price,'
                    . '                                         total_with_discount as total'
                    . '                                         FROM v_sale_detail_finish'
                    . '                                         WHERE sale_detail_invoice_no='.$invoice_no);
        
        
        $data['total']=$this->Base_model->loadToListJoin('SELECT     sale_master_id,'
                    . '                                              sale_master_tax,SUM(sale_detail_discount_dollar) as discount_dollar,'
                    . '                                              subtotal*sale_detail_discount_percent/100 as discount_percent,'
                    . '                                              total_with_discount as subtotal,'
                    . '                                              grand_total as grandtotal from v_sale_summary'
                    . '                                          WHERE sale_master_invoice_no='.$invoice_no);
        
        $this->load->view("retail_sale/retail_sale_receipt",$data);
        $this->session->unset_userdata('invoice_no');
    }
}
