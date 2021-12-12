<?php

class Report_sale extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "Report Purchase Summary ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page'] = "report/report_sale/report_sale"; 
        
        $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE  sale_master_branch_id=".$this->session->userdata('branch_id'));
        $data['customer']= $this->Base_model->loadToListJoin("SELECT DISTINCT customer_name,sale_master_branch_id FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
        $data['type']= $this->Base_model->loadToListJoin("SELECT DISTINCT sale_detail_item_type,sale_master_branch_id FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
        
        
        $this->load->view("welcome/view",$data);
    }
    
    public function search_sale(){
        
        $data['title'] = "Report Purchase Summary ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page'] = "report/report_sale/report_sale";        
        //START => load data to table when page load 
        
        //START => Get Value From Textbox 
              
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $customer_name   = $this->input->post("recorder");
       $tyep_gas   = $this->input->post("Supplier");
        //END => Get Value From Textbox 
        
         $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
        //$data['text_display'] = 'Today Purchase Summary Report';        
        
         $data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Query doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        
        // START => search data         
        // Search Empty textbox and combox (Line 1)
        if( $from == "" && $to =="" && $customer_name == "0" &&$tyep_gas == "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
            $data['text_display'] = 'Today Purchase Summary Report';        
        }
        // Search by Customer Name (Line 2)
        else if( $from == "" && $to =="" && $customer_name != "0" &&$tyep_gas == "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND customer_name = '".$customer_name."'");
            $data['text_display'] = '' ;
        }
        // Search by Type of Gas (Line 3)
        else if( $from == "" && $to =="" && $customer_name == "0" &&$tyep_gas != "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND sale_detail_item_type = '".$tyep_gas."'");
            $data['text_display'] = '' ;
        }
        // Search by Date (Line 4)
        else if( $from != "" && $to !="" && $customer_name == "0" &&$tyep_gas == "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND sale_detail_created_date BETWEEN  '".$from."' AND '".$to."'");
            $data['text_display'] = '' ;
        }
         // Search by Date with customer name (Line 5)
        else if( $from != "" && $to !="" && $customer_name != "0" &&$tyep_gas == "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND sale_detail_created_date BETWEEN  '".$from."' AND '".$to."' AND customer_name='".$customer_name."'");
            $data['text_display'] = '' ;
        }
        // Search by Date with customer name (Line 5)
        else if( $from != "" && $to !="" && $customer_name == "0" &&$tyep_gas != "0"){
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND sale_detail_created_date BETWEEN  '".$from."' AND '".$to."' AND sale_detail_item_type = '".$tyep_gas."'");
            $data['text_display'] = '' ;
        }
        else{
            $data['record_sale']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id = " .$this->session->userdata('branch_id') . " AND sale_detail_created_date BETWEEN  '".$from."' AND '".$to."' AND sale_detail_item_type = '".$tyep_gas."' AND customer_name='".$customer_name."'");
        }
        
        // End Searching data
        $data['customer']= $this->Base_model->loadToListJoin("SELECT DISTINCT customer_name,sale_master_branch_id FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
        $data['type']= $this->Base_model->loadToListJoin("SELECT DISTINCT sale_detail_item_type,sale_master_branch_id FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id'));
        
        // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
}
