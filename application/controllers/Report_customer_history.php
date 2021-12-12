<?php
class report_customer_history extends CI_Controller{
   
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
        $data['page'] = "customer/report_customer/report_customer_history";        
        //START => load data to table when page load 
        
        $data['customer_name']=$this->Base_model->loadToListJoin("SELECT customer,customer_id,customer_phone,customer_plate_no,car_care FROM v_customer_history where  car_care = 0 and customer <> '' GROUP BY customer ");
        
        $data['date'] = date('d-m-Y');
        
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
     public function search(){
        
        $customer =$this->uri->segment(3); 
        $data['name'] = $this->input->post("txt_customer_name");
        
        $q_customer = ' ';
        
        if($customer != ""){$q_customer = ' and customer_id = "'.$customer.'"' ;}
       
        $query = "SELECT customer,customer_id,customer_phone,customer_plate_no FROM v_customer_history where car_care = 0 and customer_id ".$q_customer." and  customer <> '' GROUP BY customer";        
        $data['customer_name']=$this->Base_model->loadToListJoin($query);
       
        $this->load->view("report/report_sale/response/response_customer_history",$data);
    }
    
}
