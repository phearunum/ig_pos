<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer_pay
 *
 * @author hpt-srieng
 */
class customer_pay extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function pay(){
        
        $data['title'] = "CUSTOMER CREDIT PAY";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "retail_sale/frm_pay_retail_sale";
        
        $no=$this->uri->segment(3);
        
        $data['records']=$this->Base_model->loadToListJoin("select customer_id,customer_name from v_customer_credit where customer_credit_invoice_no=".$no." and branch_id=".$this->session->userdata('branch_id')." group by customer_credit_invoice_no");
        //$data['total']=$this->Base_model->loadToListJoin("select sum(total) as total from v_expense where date(date)=CURDATE()");
        
        $data['no']=$no;
        
        $data['credit_amount']=$this->Base_model->loadToListJoin("select customer_credit_amount_credit from customer_credit where customer_credit_invoice_no=".$no." and branch_id=".$this->session->userdata('branch_id')." order by customer_credit_id desc limit 1");
        
        $data['history']=$this->Base_model->loadToListJoin("select
                                                            customer_credit_id,
                                                            customer_credit_invoice_no,
                                                            customer_credit_recieve_amount,
                                                            customer_credit_amount_credit,
                                                            recorder,
                                                            customer_credit_pay_date
                                                     from v_customer_credit where customer_credit_invoice_no=".$no." and branch_id=".$this->session->userdata('branch_id'));
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $data['date_now']=$date->format('Y-m-d');
        $this->load->view("welcome/view",$data);
    }
    public function save(){
        
        $no=$this->input->post("txtno");
        $supplier=$this->input->post("txtcut_id");
        $date=$this->input->post("txtdate");
        $amountcredit=$this->input->post("txtamountcredit");
        $pay=$this->input->post("txtpay");
        $discount=$this->input->post("txtdiscount");
        $description=$this->input->post("txtdiscription");
        $dateofpay=$this->input->post("txtdate");
            
        if($dateofpay==""){
            $dateofpay=date('Y-m-d');
        }   
            
        if($amountcredit==($pay+$discount)){
                
             $updatpurchase_detail=array(
                'sale_detail_status'                 => "PAID",
                'sale_detail_modified_date'          => $dateofpay
             );
                
            $this->db->where("sale_detail_branch_id",$this->session->userdata('branch_id')); 
            $this->Base_model->update('sale_detail','sale_detail_invoice_no',$no,$updatpurchase_detail);
            
            $updatpurchase=array(
                'sale_master_status'                 => "PAID",
                'sale_master_modified_date'          => $dateofpay
             );
                
            $this->db->where("sale_master_branch_id",$this->session->userdata('branch_id')); 
            $this->Base_model->update('sale_master','sale_master_invoice_no',$no,$updatpurchase);
        }
        
        $data=array(
            'customer_credit_invoice_no'     => $no,
            'customer_credit_recieve_amount' => $pay+$discount,
            'customer_id'                    => $supplier,
            'customer_credit_total'          => $amountcredit,
            'customer_credit_amount_credit'  => $amountcredit-($pay+$discount),
            'customer_credit_pay_date'       => $date,
            'customer_credit_note'           => $description,
            'customer_credit_created_date'   => $dateofpay,
            'customer_credit_created_by'     => $this->session->userdata('user_id'),
            'branch_id'                      => $this->session->userdata('branch_id'),
            'customer_credit_discount'       => $discount
        );
        
        $this->Base_model->save("customer_credit",$data);
        redirect("customer_pay/pay/".$no);
    }
    
    public function delete(){
        
            $id=$this->uri->segment(3);
            $no=$this->uri->segment(4);
            
            $this->db->where("branch_id",$this->session->userdata('branch_id'));
            $this->Base_model->delete_by('customer_credit','customer_credit_id',$id);
            redirect("customer_pay/pay/".$no);
    }
    public function reportpreview(){
        
        $no=$this->uri->segment(3);
        $data['title']=$this->Base_model->loadToListJoin("select * from v_expense where no=".$no." limit 1");
        $data['description']=$this->Base_model->loadToListJoin("select * from v_expense where no=".$no);
        
        $this->load->view("paypurchase/rpt_paypurchasepreview",$data);
    }
}
