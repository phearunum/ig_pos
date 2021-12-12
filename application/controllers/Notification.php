<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nofification
 *
 * @author hpt-srieng
 */
class Notification extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
        
        // if($this->session->userdata("user_id")==""){
        //                 redirect("logout");
        //             }
                    
        // if($this->session->userdata("group_id")==""){
        //     redirect("logout");
        // }
    }
    public function dis_active(){
        
        $cust_id=$this->uri->segment(3);
        $disactive_record=array(
            'customer_alert_active'     =>0
        );
        $this->Base_model->update('customer','customer_id',$cust_id,$disactive_record);
        
        header("Location: ".  site_url("customeregistration/edit_load/") .'/'. $cust_id);
        
    }
    public function showall(){
        
        $data['title'] = "SCAN CARD";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "notification/rpt_show_all_notification";
        
        $data['record_customers']=$this->Base_model->loadToListJoin("select * from v_customer_registration where card_expired_date<='".date('Y-m-d')."' and customer_enabled=1");
        
        $this->load->view("welcome/view",$data);
        
    }
    public function disable(){
        $cust_id=$this->uri->segment(3);
        $disactive_record=array(
            'customer_enabled'     =>0
        );
        $this->Base_model->update('customer','customer_id',$cust_id,$disactive_record);
        
        $this->showall();
    }
}
