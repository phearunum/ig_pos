<?php

class Report_alert_next_repair extends CI_Controller{
   
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
        $data['page'] = "report/report_alert_next_repair/frm_report_alert_next_repair";
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    public function response(){
        
        $data['records']=$this->Base_model->loadToListJoin("select * from v_next_repair where app_date_action = CURDATE()");
        $this->load->view("report/report_alert_birthday/response",$data);
        
    }
   
}
