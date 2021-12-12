<?php

class Report_stock_detial extends CI_Controller{
   
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
        $data['page'] = "report/report_stock_detail/report_stock_pirce";
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_stock_detail where branch_id =".$this->session->userdata('branch_id'));
        $this->load->view("report/report_stock_detail/response",$data);
    }
}
