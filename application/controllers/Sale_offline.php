<?php

class Sale_offline extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "TABLE ORDER";
        $data['header'] = "template_cashier/header";
        $data['menu']   = "template_cashier/menu";
        $data['footer'] = "template_cashier/footer";
        $data['page'] = "cafe/sale_offline/frm_table_order";
        $user=$this->Base_model->user_id();
        if($user=="" || $user==null){
            redirect('logout');
        }
        $test=$this->Base_model->position_id();
        $data['permission']   = $this->Base_model->loadToListJoin("SELECT GROUP_CONCAT((CASE pa.page_ordering when 0 then p.permission_enable else NULL END)) `Cashier`,GROUP_CONCAT((CASE pa.page_ordering when 1 then p.permission_enable else NULL END)) `Customer`,GROUP_CONCAT((CASE pa.page_ordering when 2 then p.permission_enable else NULL END)) `Cash In/Out`,GROUP_CONCAT((CASE pa.page_ordering when 5 then p.permission_enable else NULL END)) `Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 6 then p.permission_enable else NULL END)) `Extra Item`,GROUP_CONCAT((CASE pa.page_ordering when 7 then p.permission_enable else NULL END)) `Table Start`,GROUP_CONCAT((CASE pa.page_ordering when 8 then p.permission_enable else NULL END)) `Void Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 9 then p.permission_enable else NULL END)) `Print Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 10 then p.permission_enable else NULL END)) `Update Cash` from permission p
                            inner join page pa on p.permission_page_id=pa.page_id
                            where pa.page_id_parent=10 and p.position_id=$test
                       GROUP BY pa.page_id_parent   ");
        ///
        $data['printer']   = $this->Base_model->loadToListJoin("select printer_location_id,printer_location_name from printer_location where printer_location_is_counter=1 ");
        $this->load->view("welcome/view",$data);
    }
    

    public function check_cash(){
        $cash = $this->Base_model->get_value_byQuery("select sale_offline_cash_id
            from branch
            inner join cash_register on cash_register.cash_id=branch.sale_offline_cash_id 
            inner join employee on employee.employee_id=cash_register.cash_user_id
            where cash_status='ACTIVE' and branch_id=".$this->Base_model->branch_id(),"sale_offline_cash_id");
        if($cash != ''){
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "success";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "error";
            echo json_encode($response);
        }
    }
    
    public function load_cash(){
        $cash = $this->Base_model->loadToListJoin("select sale_offline_cash_id,sale_offline_date,cash_amount,cash_amount_kh,employee_name,employee_id
            from branch
            inner join cash_register on cash_register.cash_id=branch.sale_offline_cash_id 
            inner join employee on employee.employee_id=cash_register.cash_user_id
            where cash_status='ACTIVE' and branch_id=".$this->Base_model->branch_id());

        $data=array();
        foreach($cash as $c){
            $data = array(
                'emp_id' =>$c->employee_id,
                'cash_id' =>$c->sale_offline_cash_id,
                'sale_date'=>$c->sale_offline_date,
                'sale_name'=>$c->employee_name,
                'cash_amount' =>$c->cash_amount,
                'cash_amount_kh' =>$c->cash_amount_kh
            );
            
        }
        echo json_encode($data);
    }

    public function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    public function save_cash(){
        $cash_us = $this->input->post("cash_us");
        $cash_kh = $this->input->post("cash_kh");
        $emp_id=$this->input->post("emp_id");
        $cash_id = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$emp_id,"cash_status","ACTIVE");
        $date=$this->input->post("date");
        if($this->validateDate($date)==false){
            $response["success"] = 0;
            $response["statusCode"] = "E0002";
            $response["message"] = "error date";
            echo json_encode($response);
            return;
        }
        $save_data = array(
            'cash_user_id'      =>$emp_id,
            'cash_amount'       =>$cash_us,
            'cash_amount_kh'    =>$cash_kh,
            'cash_branch_id'    =>$this->Base_model->branch_id(),
            'cash_startdate'    =>$date,
            'cash_status'       =>'ACTIVE',
            'cash_note'         =>'',
        );
        $update_data = array(
            'cash_amount'   =>$cash_us,
            'cash_amount_kh'    =>$cash_kh
        );
        if($cash_id ==''){
            $branch=$this->Base_model->branch_id();
            $this->Base_model->save("cash_register", $save_data);

            $update_branch = array(
                'sale_offline_cash_id'   =>$this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$emp_id,"cash_status","ACTIVE"),
                'sale_offline_date'    =>$date,
                'cashier_id'    =>$emp_id
            );
            $this->Base_model->update_array('branch', $update_branch, array("branch_id" => $this->Base_model->branch_id()));
        }else{
            $this->Base_model->update_array('cash_register', $update_data, array("cash_id" => $cash_id));
            $update_branch = array(
                'sale_offline_date'    =>$date
            );
            $this->Base_model->update_array('branch', $update_branch, array("branch_id" => $this->Base_model->branch_id()));
        }
        $cash = $this->Base_model->get_value_byQuery("select sale_offline_cash_id
            from branch
            inner join cash_register on cash_register.cash_id=branch.sale_offline_cash_id 
            inner join employee on employee.employee_id=cash_register.cash_user_id
            where cash_status='ACTIVE' and branch_id=".$this->Base_model->branch_id(),"sale_offline_cash_id");
        if($cash != ''){
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "success";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "error";
            echo json_encode($response);
        }
        
    }


    public function order_list_cash_out(){
        $cash_id=$this->input->post('cash_id');
        $real_us=$this->input->post("real_us");
        $real_kh=$this->input->post("real_kh");
        $date=$this->input->post("date");

        $this->Base_model->run_query("update cash_register set cash_real_us=".$real_us.",cash_real_kh=".$real_kh.",cash_status='FINISH',cash_enddate='".$date." 00:00:00' where cash_id=".$cash_id);
        $this->Base_model->run_query("update branch set sale_offline_cash_id=0,sale_offline_date='0000-00-00',cashier_id=0 where sale_offline_cash_id=".$cash_id);
    }
    public function load_cashier(){
        $cashier=$this->Base_model->loadToListJoin("select employee_name,employee_id from employee where status=1 and employee_brand_id=".$this->Base_model->branch_id());
        echo json_encode($cashier);
    }
    
}
