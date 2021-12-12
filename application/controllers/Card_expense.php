<?php

class card_expense extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }

    // Card Expense
    public function index(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer/list_card_expense";
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('customer',$lang=='' ? 'en':$lang);
            
       
        $data['lb_customer_name']             =$this->lang->line('customer_name');
        $data['lb_customer_type']             =$this->lang->line('customer_type_name');
        $data['lb_card_number']               =$this->lang->line('card_number');
        $data['lb_serial_number']             =$this->lang->line('card_serial');
        $data['lb_chip_number']               =$this->lang->line('card_chip');
        $data['lb_date_expense']              =$this->lang->line('date_expense');
        $data['lb_expense_amount']            =$this->lang->line('amount_expense');
        $data['lb_current_amount']            =$this->lang->line('current_amount');
        $data['lb_recorder']                  =$this->lang->line('lb_recorder');
        $data['chip']                         =$this->lang->line('chip');
        $data['card']                         =$this->lang->line('card');
        $data['serial']                       =$this->lang->line('serial');
        $data['btn_search']                   =$this->lang->line('btn_search');
        $data['btn_export']                   =$this->lang->line('btn_export');
        $data['list_name']                    =$this->lang->line('expense_list_name');
        $data['from']                         =$this->lang->line('lb_from');
        $data['to']                           =$this->lang->line('lb_to');
        $data['lbl_title']                    =$this->lang->line('card_topup_title');
        $data['lb_grand_total']               =$this->lang->line('lb_grand_total');
        $data['lb_chip'] = $this->lang->line('chip');
        $data['lb_cardnum'] = $this->lang->line('cardnum');
        $data['lb_cardser'] = $this->lang->line('cardser');
        
        $this->load->view("welcome/view",$data);
    }
    public function response_card_expense(){
        $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            t.transaction_customer_id,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_date,
            t.transaction_amount,
             t.transaction_id,
            t.transaction_balance,
            t.transaction_remain,
            e.employee_name as recorder
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where t.transaction_action=0 and customer_status=1");       
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses_card_expense(){ 
        
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $card = $this->input->get("card");
        $chip = $this->input->get("chip");
        $serial = $this->input->get("serial");
        $query ='';
        if($dt!='' && $df!=''){
          $query= " and transaction_spend_date  BETWEEN '".$df."' and '".$dt."'" ; 
        }
        if($card!=''){
            $query= " and customer_card_number='".$card."'" ;
        }
        if($df!='' && $dt!='' && $card!=''){
            $query= " and transaction_spend_date  BETWEEN '".$df."' and '".$dt."' and customer_card_number='".$card."'" ;
        }
        $q_chip='';
        if($chip!='')
            $q_chip = " and customer_chip='$chip'";
        $q_serial='';
        if($serial!='')
            $q_serial=" and customer_card_serial='$serial'";
        $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            c.customer_card_number,
            t.transaction_customer_id,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_date,
            t.transaction_id,
            t.transaction_amount,
            t.transaction_balance,
            t.transaction_remain,
            e.employee_name as recorder
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where t.transaction_action=0 and customer_status=1 ".$query.$q_chip.$q_serial);        
        $this->load->view("report/report_stock/response",$data);        
    }
    // End Card Expense

}
