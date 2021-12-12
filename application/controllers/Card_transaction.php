<?php
class card_transaction extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "Report Card Transaction";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "customer/list_card_transaction";

        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('customer',$lang=='' ? 'en':$lang);
        $data['lb_chip_number']               =$this->lang->line('card_chip');
        $data['lb_customer_name']             =$this->lang->line('customer_name');
        $data['remain']                       =$this->lang->line('remain');
        $data['spend']                        =$this->lang->line('spend');
        $data['return']                        =$this->lang->line('return');
        $data['topup']                        =$this->lang->line('topup');
        $data['balance']                      =$this->lang->line('balance');   
        $data['action']                       =$this->lang->line('lb_action');
        $data['chip']                         =$this->lang->line('chip');
        $data['card']                         =$this->lang->line('card');
        $data['serial']                       =$this->lang->line('serial');
        $data['btn_search']                   =$this->lang->line('btn_search');
        $data['btn_export']                   =$this->lang->line('btn_export');
        $data['list_name']                    =$this->lang->line('report_card_tran');
        $data['from']                         =$this->lang->line('lb_from');
        $data['to']                           =$this->lang->line('lb_to');
        $data['create_date']                  =$this->lang->line('lb_create_date');
        $data['lb_customer'] = $this->lang->line('customer');
        $data['lb_chip'] = $this->lang->line('chip');
        $data['lb_cardnum'] = $this->lang->line('cardnum');
        $data['lb_cardser'] = $this->lang->line('cardser');
        $data['lb_branch'] = $this->lang->line('lb_branch');
        $data['lb_select'] = $this->lang->line('lb_select');

        $this->load->view("welcome/view",$data);
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_date,
            if(t.transaction_action=1,t.transaction_amount,0) as transaction_topup,
            if(t.transaction_action=2,t.transaction_amount,0) as transaction_return,
            if(t.transaction_action=0,t.transaction_amount,0) as transaction_expense,
            t.transaction_balance,
            t.transaction_remain,
            t.transaction_action,
            t.transaction_id,
            e.employee_name
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where customer_status=1");       
        $this->load->view("response/response",$data);
    }
    public function responses(){
        $df     = $this->input->get("df");
        $dt     = $this->input->get("dt");
        $card   = $this->input->get("card");
        $chip   = $this->input->get("chip");
        $serial = $this->input->get("serial");
        $action = $this->input->get("action");

        $q_date='';
        if($dt!='' && $df!='')
           $q_date= " and date_format(transaction_date,'%Y-%m-%d')  BETWEEN '".$df."' and '".$dt."'" ; 
        $q_card='';
        if($card!='')
            $q_card= " and customer_card_number='".$card."'" ;
        $q_chip='';
        if($chip!='')
            $q_chip = " and customer_chip='$chip'";
        $q_serial='';
        if($serial!='')
            $q_serial=" and customer_card_serial='$serial'";
        $q_status='';
        if($action!='') $q_status=" and transaction_action='$action'";
         $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_date,
            if(t.transaction_action=1,t.transaction_amount,0) as transaction_topup,
            if(t.transaction_action=2,t.transaction_amount,0) as transaction_return,
            if(t.transaction_action=0,t.transaction_amount,0) as transaction_expense,
            t.transaction_balance,
            t.transaction_remain,
            t.transaction_action,
            t.transaction_id,
            e.employee_name
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where customer_status=1".$q_date.$q_chip.$q_serial.$q_card.$q_status);  
        $this->load->view("response/response",$data);
    }
}
