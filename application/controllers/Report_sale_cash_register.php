<?php
class Report_sale_cash_register extends CI_Controller{
   
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
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_sale/report_sale_cash_register";        
        //START => load data to table when page load 
       $data['date']= date('m-d-Y');
       $data['cash_register']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_cash_register where end_date = CURDATE()");
       $data['cashier']=$this->Base_model->loadToListJoin("SELECT cashier FROM v_sale_cash_register"); 
       //load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    
     public function search(){
        
        $date_from=$this->uri->segment(3);
        $date_to=$this->uri->segment(4);  
        $cashier = $this->uri->segment(5);  
        
       
        $q_cashier = ' ';
        
        if ($date_from != "" && $date_to != "" && $cashier != '0') {$q_cashier = ' and cashier = "'.$cashier.'"'; $data['date'] = $date_from . '<span style="font-size:16px;"> ⇒ </span>' . $date_to.'<br> Cashier : '.$cashier;} 
        elseif($date_from != "" && $date_to != "" && $cashier == 0){$q_cashier =' ';  $data['date'] = $date_from . '<span style="font-size:16px;"> ⇒ </span>' . $date_to;}
        
        $query = "SELECT * FROM v_sale_cash_register where start_date <= '".$date_from."' and end_date >= '".$date_to."'" .$q_cashier;
        
        
        $data['cash_register']=$this->Base_model->loadToListJoin($query);
        
               
        $data['cashier']=$this->Base_model->loadToListJoin("SELECT cashier FROM v_sale_cash_register"); 
               
        $this->load->view("report/report_sale/response/response_sale_cash_register",$data);
    }

    
    
}
