<?php

class Card_Balance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }

    public function index(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer/list_card_balance";
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('customer',$lang=='' ? 'en':$lang);
            
        $data['lb_customer_type']             =$this->lang->line('customer_type_name');
        $data['lb_customer_name']             =$this->lang->line('customer_name');
        $data['lb_card_number']               =$this->lang->line('card_number');
        $data['lb_chip_number']               =$this->lang->line('card_chip');
        $data['lb_serial_number']             =$this->lang->line('card_serial');
        $data['lb_balance']                   =$this->lang->line('balance');
        $data['lb_discount']                  =$this->lang->line('card_dicount');
        $data['lb_point']                     =$this->lang->line('point');
        $data['lb_card_expired']              =$this->lang->line('card_expire_date');
        $data['lb_no']                        =$this->lang->line('lb_no');
        $data['chip']                         =$this->lang->line('chip');
        $data['card']                         =$this->lang->line('card');
        $data['serial']                       =$this->lang->line('serial');
        $data['btn_search']                   =$this->lang->line('btn_search');
        $data['btn_export']                   =$this->lang->line('btn_export');
        $data['list_name']                    =$this->lang->line('customer_card_balance_list_name');
        $data['lb_customer'] = $this->lang->line('customer');
        $data['lb_chip'] = $this->lang->line('chip');
        $data['lb_cardnum'] = $this->lang->line('cardnum');
        $data['lb_cardser'] = $this->lang->line('cardser');
        $data['lb_branch'] = $this->lang->line('lb_branch');

        $data['branch']=$this->Base_model->loadToListJoin('select branch_id,branch_name from branch where branch_status=1');
        $this->load->view("welcome/view",$data);
    }
    public function response_card_balance(){        
        $card_no=$this->input->get("txt_card_no");
        $chip=$this->input->get("txt_card_chip");
        $serial=$this->input->get("txt_card_serial");
        $customer_id=$this->input->get("txtcustomer_id");
        $branch=$this->input->get("branch_id");
        $query ="";
        if($card_no!='')
            $query .=" and customer_card_number='".$card_no."'";
        if($chip!='')
            $query .=" and customer_chip='".$chip."'";
        if($serial!='')
            $query .=" and customer_card_serial='".$serial."'";
        if($customer_id!='')
            $query .=" and customer_id=".$customer_id;
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
            c.`customer_id` AS `customer_id`,
            c.`customer_name` AS `customer_name`,
            ct.customer_type_name as customer_type_name,
            c.customer_chip as customer_chip,
            c.customer_card_number as customer_card_number,
            c.customer_card_serial as customer_card_serial,
            c.customer_balance as customer_balance,
            ifnull(c.customer_discount,0) as customer_discount,
            c.customer_point as customer_point,
            c.customer_card_expired as customer_card_expired
            FROM `customer` c
            Inner join customer_type ct on (c.customer_type_id=ct.customer_type_id)  
            where c.customer_status=1  $query
            order by customer_id desc");
        $this->load->view("report/report_stock/response", $data);
    }
}