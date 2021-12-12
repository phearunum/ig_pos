<?php

class card_topup extends CI_Controller {
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
        $data['page'] = "customer/list_card_topup";

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
       
        $data['lb_topup_date']                   =$this->lang->line('topup_date');
        $data['lb_topup_start_time']                  =$this->lang->line('topup_start_time');
        $data['lb_topup_amount']                     =$this->lang->line('topup_amount');
        $data['lb_current_amount']              =$this->lang->line('current_amount');
        $data['lb_current_date']              =$this->lang->line('current_date');
        $data['lb_topup_end_time']                  =$this->lang->line('topup_end_time');
        $data['lb_recorder']                        =$this->lang->line('lb_recorder');
        $data['lb_modifier']                        =$this->lang->line('lb_modifier');
        $data['chip']                           =$this->lang->line('chip');
        $data['card']                           =$this->lang->line('card');
        $data['serial']                        =$this->lang->line('serial');
        $data['btn_search']                           =$this->lang->line('btn_search');
        $data['btn_export']                        =$this->lang->line('btn_export');
        $data['list_name']                      =$this->lang->line('card_topup_title');
        $data['from']                           =$this->lang->line('lb_from');
        $data['to']                        =$this->lang->line('lb_to');
        $data['lbl_title']                        =$this->lang->line('card_topup_title');
        $data['lb_edit']                        =$this->lang->line('lb_edit');
        $data['lb_grand_total']                        =$this->lang->line('lb_grand_total');
        $data['lb_balance']                        =$this->lang->line('balance');
        $data['lb_chip'] = $this->lang->line('chip');
        $data['lb_cardnum'] = $this->lang->line('cardnum');
        $data['lb_cardser'] = $this->lang->line('cardser');
        
        $this->load->view("welcome/view",$data);
    }
    public function response_card_topup(){
        //sleep(10);
        $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_id,
            t.transaction_date,
            t.transaction_amount,
            t.transaction_balance,
            t.transaction_remain,
            e.employee_name as recorder
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where t.transaction_action=1 and customer_status=1");       
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses_card_topup(){ 
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $card = $this->input->get("card");
        $chip = $this->input->get("chip");
        $serial = $this->input->get("serial");
        $query ='';
        if($dt!='' && $df!=''){
          $query= " and transaction_date  BETWEEN '".$df."' and '".$dt."'" ; 
        }
        if($card!=''){
            $query= " and customer_card_number='".$card."'" ;
        }
        if($df!='' && $dt!='' && $card!=''){
            $query= " and transaction_date  BETWEEN '".$df."' and '".$dt."' and customer_card_number='".$card."'" ;
        }
        $q_chip='';
        if($chip!='')
            $q_chip = " and customer_chip='$chip'";
        $q_serial='';
        if($serial!='')
            $q_serial= " and customer_card_serial='$serial'";
        
        $data['records']=$this->Base_model->loadToListJoin("select c.customer_id,
            c.customer_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            t.transaction_id,
            t.transaction_date,
            t.transaction_amount,
            t.transaction_balance,
            t.transaction_remain,
            e.employee_name as recorder
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         where t.transaction_action=1 and customer_status=1  ".$query.$q_chip.$q_serial);        
        $this->load->view("report/report_stock/response",$data);        
    }


    public function order_list_topup(){
        $t_id=$this->input->post('t_id');
        $data['topup_detail']=$this->Base_model->loadToListJoin("select c.customer_id,
            concat(c.customer_name,'(',c.customer_card_number,')') as description,
            t.transaction_date,
            t.transaction_amount,
            concat('".base_url("img/company/")."',(select company_profile_image
            from company_profile
            limit 1)) as logo,
            t.transaction_balance,
            c.customer_balance,
            e.employee_name as recorder,
            b.branch_name,
            b.branch_location,
            b.branch_phone,
            b.branch_email,
            concat((select company_profile_name
            from company_profile
            limit 1),'(',b.branch_name,')') as com_name
         from customer c
         Inner join transaction t on  c.customer_id=t.transaction_customer_id
         Inner join employee e on t.transaction_by=e.employee_id
         Inner join branch b on b.branch_id=e.employee_brand_id
         where t.transaction_action=1 and customer_status=1 and transaction_id=$t_id");    
        echo json_encode($data);
    }

    public function scan_card(){
        $card_chip = $this->input->post("card_chip");
        $data=$this->Base_model->loadToListJoin("SELECT 
            c.customer_id  AS  customer_id,
            c.customer_name  AS  customer_name ,
            c.customer_gender  AS  customer_gender ,
            c.customer_chip AS customer_chip,
            c.customer_card_number AS card_number,
            c.customer_card_serial AS card_serail,
            c.customer_balance AS balance,
            c.customer_discount AS discount,
            ct.customer_type_name AS  customer_type ,
            c.customer_enable AS customer_enable,
            if( c.customer_enable=1,'Enable','Disable') AS customer_enable_status,
            c.customer_address  AS  customer_address ,
            c.customer_email  AS  customer_email ,
            c.customer_dob  AS  customer_dob ,
            c.customer_phone  AS customer_phone,
            c.customer_created_date AS customer_created_date,
            e.employee_name AS customer_created_by,
            b.branch_name AS branch_name
            FROM customer c
            INNER JOIN employee e ON (c.customer_created_by=e.employee_id) 
            INNER JOIN customer_type ct ON (c.customer_type_id=ct.customer_type_id) 
            INNER JOIN branch b ON (c.customer_branch_id=b.branch_id) 
            WHERE c.customer_status=1 AND c.customer_chip LIKE '$card_chip'");                
        echo json_encode($data);
    }

    public function record_card_topup(){
        $customer_id=$this->input->post("topup_customer_id");
        $topup_amount=$this->input->post("topup_amount");
        $customer_balance=$this->input->post("topup_customer_balance");
        $new_balance = $topup_amount+$customer_balance;
        $discount=$this->input->post("topup_customer_discount");
        
        $user=$this->Base_model->user_id();
        $cash_id = $this->Base_model->get_value_sql("select cash_id from cash_register where cash_user_id =$user and cash_status = 'ACTIVE'","cash_id");

        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $data = array(
                    'transaction_customer_id' => $customer_id,
                    'transaction_by' => $user,
                    'transaction_date' => $date->format('Y-m-d H:i:s'),
                    'transaction_amount' => $topup_amount,
                    'transaction_balance' => $new_balance,
                    'transaction_remain' => $customer_balance,
                    'transaction_action'=> '1',
                    'cash_id' => $cash_id,
                    'branch_id' => $this->Base_model->branch_id()
                );
        $tid=$this->Base_model->save("transaction",$data);
        $customer_topup = array(
                            'customer_balance' => $new_balance,
                            'customer_discount' => $discount
                        );
        $this->Base_model->update('customer', 'customer_id', $customer_id, $customer_topup);
        echo json_encode($tid);
    }

}