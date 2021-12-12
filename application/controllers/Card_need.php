<?php

class card_need extends CI_Controller {

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
        $data['page'] = "customer/list_card_need_topup";
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
        $data['lb_current_amount']            =$this->lang->line('current_amount');
        $data['lb_topup']                     =$this->lang->line('topup');
        $data['chip']                         =$this->lang->line('chip');
        $data['card']                         =$this->lang->line('card');
        $data['serial']                       =$this->lang->line('serial');
        $data['btn_search']                   =$this->lang->line('btn_search');
        $data['btn_export']                   =$this->lang->line('btn_export');
        $data['list_name']                    =$this->lang->line('card_need_topup_title');
        $data['from']                         =$this->lang->line('lb_from');
        $data['to']                           =$this->lang->line('lb_to');
        $data['lbl_title']                    =$this->lang->line('card_topup_title');
        $data['lb_grand_total']               =$this->lang->line('lb_grand_total');
        
        $this->load->view("welcome/view",$data);
    }
    public function response_card_need(){        
        $data['records']=$this->Base_model->loadToListJoin("SELECT 
            c.`customer_id` AS `customer_id`,
            c.`customer_name` AS `customer_name`,
            c.customer_card_number as customer_card_number,
            c.customer_chip AS customer_chip,
            c.customer_card_serial AS customer_card_serial,
            c.customer_balance as customer_balance
            FROM `customer` c
            where c.customer_status=1 and c.customer_balance<=c.customer_amount_remain_alert
            order by c.customer_balance ");
        $this->load->view("report/report_stock/response",$data);        
    }
	
}
