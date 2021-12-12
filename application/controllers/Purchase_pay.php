<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paypurchase
 *
 * @author hpt-srieng
 */
class purchase_pay extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
       $user_id = $this->session->userdata("user_id");
        if(empty($user_id))
         redirect(site_url(),'logout');
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function pay(){
        
        $data['title'] = "PAY FOR PURCHASE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/frm_pay_purchase";
        
        $no=$this->uri->segment(3);
        
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        
        //$data['records']=$this->Base_model->loadToListJoin("select supplier_id,supplier_name from v_purchase_pay where purchase_no=".$no." and branch_id=".$this->session->userdata('branch_id')." group by purchase_no");
        //$data['total']=$this->Base_model->loadToListJoin("select sum(total) as total from v_expense where date(date)=CURDATE()");
        
        $data['no']=$no;
        
       // $data['credit_amount']=$this->Base_model->loadToListJoin("select purchase_pay_credit_amount from purchase_pay where purchase_no=".$no." order by purchase_pay_id desc limit 1");
        
        //$data['history']=$this->Base_model->loadToListJoin("select
                    /*                                        purchase_pay_discount,
                                                            purchase_pay_id,
                                                            purchase_no,
                                                            purchase_pay_amount,
                                                            purchase_pay_credit_amount,
                                                            recorder as recorder,
                                                            purchase_pay_date
                                                     from v_purchase_pay where purchase_pay_amount <> 0 and purchase_no=".$no." and branch_id=".$this->session->userdata('branch_id'));*/
        
        $data['date_now']=$date->format('Y-m-d');
        
         //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        if($lang==''){
            $lang='en';
        }
        $data['lbl_title']                       = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_title");
        $data['lbl_supplier_name']               = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_supplier_name");
        $data['lbl_total_credit_amount']         = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_total_credit_amount");
        $data['lbl_date_pay']                    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_date_pay");
        $data['lbl_pay']                         = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_pay");
        $data['lbl_discount']                    = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_discount");
        $data['lbl_description']                 = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_description");
        $data['lbl_paid_amount']                 = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_paid_amount");
        $data['lbl_date']                        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_date");
        $data['lbl_user']                        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_user");
        $data['lbl_total_paid']                  = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "frm_pay_for_supplier_debt", "form_translate_label_name", "lbl_total_paid");
       
        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['lbl_delete'] = $this->lang->line('lbl_delete');
        $data['lbl_no'] = $this->lang->line('lbl_no');
        $data['btn_cancel'] =$this->lang->line('btn_cancel');
        $data['btn_save'] =$this->lang->line('btn_save');
        $data['lbl_note_for_form'] =$this->lang->line('lbl_note_for_form');
        
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
        
        $no=$this->input->post("txtno");
        $supplier=$this->input->post("txtsup_id");
        //$date=$this->input->post("txtdate");
        $amountcredit=$this->input->post("txtamountcredit");
        $pay=$this->input->post("txtpay");
        $discount=$this->input->post("txtdiscount");
        $description=$this->input->post("txtdiscription");
        $dateofpay=$this->input->post("txtdate");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        
        if($dateofpay==""){
            $dateofpay= $date->format('Y-m-d h:i:s');
        }
        
        if($pay >= $amountcredit ){
            $pay=$amountcredit;
        }
        
            
        if($amountcredit==($pay+$discount)){
                
             $updatpurchase_detail=array(
                'status'                 => "PAID",
                'purchase_modified_date' => $dateofpay
             );
                
            $this->db->where("branch_id",$this->session->userdata('branch_id')); 
            $this->Base_model->update('purchase_detail','purchase_no',$no,$updatpurchase_detail);
            
            $updatpurchase=array(
                'status'                 => "PAID",
                'purchase_modified_date' => $dateofpay,
                'purchase_iscredit'      => 1
             );
                
            $this->db->where("purchase_branch_id",$this->session->userdata('branch_id')); 
            $this->Base_model->update('purchase','purchase_no',$no,$updatpurchase);
        }
       
        $data=array(
            'purchase_no'                => $no,
            'purchase_pay_amount'        => $pay+$discount,
            'supplier_id'                => $supplier,
            'purchase_pay_total'         => $amountcredit,
            'purchase_pay_credit_amount' => $amountcredit-($pay+$discount),
            'purchase_pay_date'          => $dateofpay,
            'purchase_pay_note'          => $description,
            'purchase_pay_created_date'  => $date->format('Y-m-d H:i:s'),
            'purchase_pay_created_by'    => $this->session->userdata('user_id'),
            'branch_id'                  => $this->session->userdata('branch_id'),
            'purchase_pay_discount'      => $discount
        );
        
        $this->Base_model->save("purchase_pay",$data);
        redirect("report_purchase_dept");
        
    }
    
    public function delete(){
            $id=$this->uri->segment(3);
            $no=$this->uri->segment(4);
            $this->Base_model->delete_by('purchase_pay','purchase_pay_id',$id);
            
            redirect("purchase_pay/pay/".$no);
    }
    
    public function reportpreview(){
        
        $no=$this->uri->segment(3);
        $data['title']=$this->Base_model->loadToListJoin("select * from v_expense where no=".$no." limit 1");
        $data['description']=$this->Base_model->loadToListJoin("select * from v_expense where no=".$no);
        
        $this->load->view("paypurchase/rpt_paypurchasepreview",$data);
    }
}
