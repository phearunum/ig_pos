<?php

class Report_alert_birthday extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page'] = "report/report_alert_birthday/frm_report_alert_birthday";
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    public function response(){        
        $data['records']=$this->Base_model->loadToListJoin("SELECT customer_id,customer_name,customer_phone,balance FROM v_customer WHERE	balance <= customer_amount_remain_alert ");
        $this->load->view("report/report_alert_birthday/response",$data);        
    }
   
}
