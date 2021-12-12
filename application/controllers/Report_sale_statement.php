<?php

class Report_sale_statement extends CI_Controller{
   
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
        $data['page'] = "report/report_sale_statement/frm_search_sale_statement";  
        
        $this->load->view("welcome/view",$data);
    }
    public function get_statement(){
        $btn=$this->input->post("btn_submit");
        switch($btn){
            case"Print":
                    $this->print_statement();
                break;
            case"Search":
                    $this->search();
                break;
        }
    }
    public function print_statement(){
        $customer_id=$this->input->post("txtcust_id");
        $from_date=$this->input->post("txt_from_date");
        $to_date=$this->input->post("txt_to_date");
        
        $data['record_sale_statement']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id')." AND sale_detail_created_date>='".$from_date."' AND sale_detail_created_date<='".$to_date."' AND sale_detail_customer_id=".$customer_id);
        //$data['text_display'] = 'Today Purchase Summary Report';
        
        $data['record_company_profile']=$this->Base_model->get_data("company_profile");
        // load view when action above finish
        
        //get auto number
        
        $statement_no=$this->get_invoice_no($customer_id);
        $data['statement_no']=$statement_no;
        //end get auto number
        
        $data['customer_id']=$customer_id;
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $data['invoice_date']=date('Y-m-d');
        
        $get_customer=$this->Base_model->loadToListJoin("select customer_name from customer where customer_id=".$customer_id);
        $customer_name;
        foreach($get_customer as $c){
            $customer_name=$c->customer_name;
        }
        $data['customer_name']=$customer_name;
        
        $statement_record=array(
            'branch_id'     =>$this->session->userdata('branch_id'),
            'customer_id'   =>$customer_id,
            'statement_no'  =>$statement_no,
            'sale_statement_no_created_by'     =>$this->session->userdata('user_id'),
            'sale_statement_no_created_date'   =>date('Y-m-d'),
            'sale_statement_from_date'     =>$from_date,
            'sale_statement_to_date'       =>$to_date,
            'status'        =>'DONE'
        );
        
        $this->Base_model->save('sale_statement_no',$statement_record);
        
        $this->load->view("report/report_sale_statement/report_sale_statement",$data);
    }
    
    public function search(){
        
        $data['title'] = "Report Purchase Summary ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page'] = "report/report_sale_statement/report_sale_statement_search";
        
        $customer_id=$this->input->post("txtcust_id");
        $from_date=$this->input->post("txt_from_date");
        $to_date=$this->input->post("txt_to_date");
        
        $data['record_sale_statement']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_master_branch_id=" .$this->session->userdata('branch_id')." AND sale_detail_created_date>='".$from_date."' AND sale_detail_created_date<='".$to_date."' AND sale_detail_customer_id=".$customer_id);
        //$data['text_display'] = 'Today Purchase Summary Report';
        
        $data['record_company_profile']=$this->Base_model->get_data("company_profile");
        // load view when action above finish
        
        //get auto number
        
        $statement_no=$this->get_invoice_no($customer_id);
        $data['statement_no']=$statement_no;
        //end get auto number
        
        $data['customer_id']=$customer_id;
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $data['invoice_date']=date('Y-m-d');
        
        $get_customer=$this->Base_model->loadToListJoin("select customer_name from customer where customer_id=".$customer_id);
        $customer_name;
        foreach($get_customer as $c){
            $customer_name=$c->customer_name;
        }
        $data['customer_name']=$customer_name;
        $this->load->view("welcome/view",$data);
        
    }
    //START => function search
    public function get_invoice_no($customer_id){
        
        $invNO=0;
        $records=$this->Base_model->loadToListJoin('SELECT max(statement_no) as no FROM sale_statement_no WHERE status="DONE" AND branch_id='.$this->session->userdata('branch_id').' AND customer_id='.$customer_id);
                     
            foreach($records as $inv){
                $iv=$inv->no;
            if($iv>0){
                $invNO=$iv+1;
            }else{
                $invNO=1;
            }
            return $invNO;
        }
        
    }
    public function pay_statement(){
        
    }
}
