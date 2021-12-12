<?php

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->load->model('Upload');
        $this->Base_model->check_loged_in();
    }

    public function index() {
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "customer/list_customer";

        //permission data
        $name = $this->uri->segment(1);
        // $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        // $id = 0;
        // foreach ($getid as $g) {
        //     $id = $g->permission_id;
        // }
        // $data['record_permission'] = $this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=" . $id);
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data       
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('customer',$lang=='' ? 'en':$lang);
        $data['lbl_title'] =$this->lang->line('list_customer_title');
        $data['lbl_cus_type'] = $this->lang->line('customer_type_name');
        $data['lbl_cus_name'] = $this->lang->line('customer_name');
        $data['lbl_cus_chip'] = $this->lang->line('card_chip');
        $data['lbl_address'] = $this->lang->line('address');
        $data['lbl_phone'] = $this->lang->line('phone');
        $data['lbl_create_date'] = $this->lang->line('lb_create_date');
        $data['lbl_create_by'] = $this->lang->line('lb_recorder');
        $data['lbl_gender'] = $this->lang->line('gender');
        $data['lbl_email'] = $this->lang->line('email');
        $data['lbl_dob'] = $this->lang->line('dob');
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_no'] = $this->lang->line('lb_no');
        $data['btn_delete'] = $this->lang->line('lb_delete');
        $data['btn_search'] = $this->lang->line('search');
        $data['lbl_new'] = $this->lang->line('lb_new');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_view_card'] = $this->lang->line('view_card');
        $data['lbl_action'] = $this->lang->line('lb_action');
        $data['lbl_branch'] = $this->lang->line('branch');
        $data['lbl_enable'] = $this->lang->line('enable');
        //Place holder
        $data['lb_customer'] = $this->lang->line('customer');
        $data['lb_chip'] = $this->lang->line('chip');
        $data['lb_cardnum'] = $this->lang->line('cardnum');
        $data['lb_cardser'] = $this->lang->line('cardser');
        $data['lb_branch'] = $this->lang->line('lb_branch');

        $data['branch'] = $this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");

        //end translate
        $this->load->view("welcome/view", $data);
    }
    public function card_topup()
    {
        //$data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "customer/card_topup_alert";
        //
        $this->load->view("welcome/view", $data);
    }
    public function card_topup_response()
    {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT customer_name,customer_phone,customer_balance,customer_chip FROM customer WHERE customer_balance<=customer_amount_remain_alert");
        $this->load->view("report/report_stock/response", $data);
    }

    public function response() {
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
            c.`customer_id` AS `customer_id`,
            c.`customer_name` AS `customer_name`,
            c.`customer_gender` AS `customer_gender`,
            c.customer_chip AS customer_chip,
            ct.customer_type_name AS `customer_type`,
            c.customer_enable as customer_enable,
            if( c.customer_enable=1,'Enable','Disable') as customer_enable_status,
            c.`customer_address` AS `customer_address`,
            c.`customer_email` AS `customer_email`,
            c.`customer_dob` AS `customer_dob`,
            c.`customer_phone` AS `customer_phone`,
            c.`customer_created_date` AS `customer_created_date`,
            e.`employee_name` AS `customer_created_by`,
            b.`branch_name` AS branch_name
            FROM `customer` c
            Inner join employee e on (c.customer_created_by=e.employee_id) 
            Inner join customer_type ct on (c.customer_type_id=ct.customer_type_id) 
            Inner join branch b on (c.customer_branch_id=b.branch_id) 
            where c.customer_status=1
            order by customer_id desc");
        $this->load->view("report/report_stock/response", $data);
    }

    public function responses() {
        $card = $this->input->get("txt_card_no");
        $chip = $this->input->get("txt_card_chip");
        $serial = $this->input->get("txt_card_serial");
        $customer_id=$this->input->get("txtcustomer_id");
        $branch=$this->input->get("branch_id");
        $query ="";
        if($card!='')
            $query .=" and customer_card_number='".$card."'";
        if($chip!='')
            $query .=" and customer_chip='".$chip."'";
        if($serial!='')
            $query .=" and customer_card_serial='".$serial."'";
        if($customer_id!='')
            $query .=" and customer_id=".$customer_id;
        if($branch!=0)
            $query .=" and customer_branch_id=".$branch;
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
            c.`customer_id` AS `customer_id`,
            c.`customer_name` AS `customer_name`,
            c.`customer_gender` AS `customer_gender`,
            c.customer_chip AS customer_chip,
            ct.customer_type_name AS `customer_type`,
            c.customer_enable as customer_enable,
            if( c.customer_enable=1,'Enable','Disable') as customer_enable_status,
            c.`customer_address` AS `customer_address`,
            c.`customer_email` AS `customer_email`,
            c.`customer_dob` AS `customer_dob`,
            c.`customer_phone` AS `customer_phone`,
            c.`customer_created_date` AS `customer_created_date`,
            e.`employee_name` AS `customer_created_by`,
            b.`branch_name` AS branch_name
            FROM `customer` c
            Inner join employee e on (c.customer_created_by=e.employee_id) 
            Inner join customer_type ct on (c.customer_type_id=ct.customer_type_id) 
            Inner join branch b on (c.customer_branch_id=b.branch_id) 
            where c.customer_status=1 ".$query."
            order by customer_id desc");
            $this->load->view("report/report_stock/response", $data);
    }

    public function addnew() {
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer/frm_customer";
        $data['records_type'] = $this->Base_model->get_data("customer_type");
        $data['branch_list'] = $this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");

        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('customer',$lang=='' ? 'en':$lang);

        $data['lbl_customer'] = $this->lang->line('addnew_customer_title');
        $data['lbl_cus_type'] = $this->lang->line('customer_type_name');
        $data['lbl_cus_name'] = $this->lang->line('customer_name');
        $data['lbl_email'] = $this->lang->line('email');
        $data['lbl_password'] = $this->lang->line('password');
        $data['lbl_gender'] = $this->lang->line('gender');
        $data['lbl_dob'] = $this->lang->line('dob');
        $data['lbl_address'] = $this->lang->line('address');
        $data['lbl_phone'] = $this->lang->line('phone');
        $data['lbl_description'] = $this->lang->line('lb_desc');
        $data['lbl_create_date'] = $this->lang->line('lb_create_date');
        $data['lbl_create_by'] = $this->lang->line('lb_recorder');
        $data['btn_create'] = $this->lang->line('btn_create');
        $data['btn_cancel'] = $this->lang->line('btn_cancel');
        $data['lbl_new'] = $this->lang->line('lb_new');
        $data['lbl_note'] = $this->lang->line('val_mess_require');
        $data['lbl_field'] = $this->lang->line('lb_field');
        $data['lbl_field_value'] = $this->lang->line('lb_field_value');
        $data['lbl_branch'] = $this->lang->line('branch');
        $data['lbl_enable'] = $this->lang->line('enable');
        //end translate

        $this->load->view("welcome/view", $data);
    }

    public function save_customer() {
        
        $customer_type = $this->input->post("selectcustomertype");
        $customer_name = $this->input->post("txt_name");
        $customer_email = $this->input->post("txt_email");
        $customer_gender = $this->input->post("selectgender");
        $customer_dob = $this->input->post("txt_dob");
        $customer_address = $this->input->post("txt_address");
        $customer_phone = $this->input->post("txt_phone");
        $customer_branch = $this->input->post("selectbranch");
        $customer_enable = $this->input->post("ckenable");
        if($customer_enable==true) $temp=1;
        else $temp=0;
                
        //upload
                
        if($_FILES["userfile"]["name"]!=""){
                
                $image = basename($_FILES["userfile"]["name"]);
                
                $file_arr=  explode('.',$_FILES['userfile']['name']);
                $pic=time().'.'.$file_arr[count($file_arr)-1];
                
                $target_file = 'img/customers/' . basename($pic);
                
                if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)){
                    
                }
        }  else {
            $pic="no_images.jpg";
        }
        
        //end do upload
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $data = array(
            'customer_type_id' => $customer_type,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_dob' => $customer_dob,
            'customer_gender' => $customer_gender,
            'customer_address' => $customer_address,
            'customer_phone' => $customer_phone,
            'customer_created_date' => $date->format('Y-m-d H:i:s'),
            'customer_created_by' => $this->Base_model->user_id(),
            'customer_picture' => $pic, 
            'customer_branch_id' => $customer_branch, 
            'customer_enable'=>$temp,
            
        );
        $this->Base_model->save('customer', $data);
        $customer_id = $this->Base_model->loadToListJoin("SELECT customer_id FROM customer ORDER BY customer_id DESC limit 1");
        foreach ($customer_id as $cid) {
            $cus_id = $cid->customer_id;
        }
        
        redirect('customer');
    }

    public function edit_customer_load() {

        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer/frm_customer_update";
        $id = $this->uri->segment(3);
        
        $data['record_customer'] = $this->Base_model->loadToListJoin("SELECT 
            c.`customer_id` AS `customer_id`,
            c.`customer_name` AS `customer_name`,
            c.`customer_gender` AS `customer_gender`,
            c.customer_chip AS customer_chip,
            ct.customer_type_name AS `customer_type`,
            c.customer_enable as customer_enable,
            if( c.customer_enable=1,'Enable','Disable') as customer_enable_status,
            c.`customer_address` AS `customer_address`,
            c.`customer_email` AS `customer_email`,
            c.`customer_dob` AS `customer_dob`,
            c.customer_picture as customer_picture,
            c.`customer_phone` AS `customer_phone`,
            c.`customer_created_date` AS `customer_created_date`,
            e.`employee_name` AS `customer_created_by`,
            b.`branch_name` AS branch_name
            FROM `customer` c
            Inner join employee e on (c.customer_created_by=e.employee_id) 
            Inner join customer_type ct on (c.customer_type_id=ct.customer_type_id) 
            Inner join branch b on (c.customer_branch_id=b.branch_id) 
            where c.customer_status=1 and c.customer_id=".$id."
            order by customer_id desc");
        $data['records_type'] = $this->Base_model->get_data("customer_type");
        $data['gender']=$this->Base_model->loadToListJoin("select customer_gender from customer where customer_id=$id");
        $data['beanch_list']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");

         //BEGIN TRANSLATE
         $lang = $this->input->cookie('language');
         $this->lang->load('button',$lang=='' ? 'en':$lang);
         $this->lang->load('validation',$lang=='' ? 'en':$lang);
         $this->lang->load('lable',$lang=='' ? 'en':$lang);
 
         $this->lang->load('customer',$lang=='' ? 'en':$lang);
 
         $data['lbl_customer'] = $this->lang->line('addnew_customer_title');
         $data['lbl_cus_type'] = $this->lang->line('customer_type_name');
         $data['lbl_cus_name'] = $this->lang->line('customer_name');
         $data['lbl_email'] = $this->lang->line('email');
         $data['lbl_password'] = $this->lang->line('password');
         $data['lbl_gender'] = $this->lang->line('gender');
         $data['lbl_dob'] = $this->lang->line('dob');
         $data['lbl_address'] = $this->lang->line('address');
         $data['lbl_phone'] = $this->lang->line('phone');
         $data['lbl_description'] = $this->lang->line('lb_desc');
         $data['lbl_create_date'] = $this->lang->line('lb_create_date');
         $data['lbl_create_by'] = $this->lang->line('lb_recorder');
         $data['btn_update'] = $this->lang->line('btn_update');
         $data['btn_cancel'] = $this->lang->line('btn_cancel');
         $data['lbl_new'] = $this->lang->line('lb_new');
         $data['lbl_note'] = $this->lang->line('val_mess_require');
         $data['lbl_field'] = $this->lang->line('lb_field');
         $data['lbl_field_value'] = $this->lang->line('lb_field_value');
         $data['lbl_branch'] = $this->lang->line('branch');
         $data['lbl_enable'] = $this->lang->line('enable');
         //end translate

        $this->load->view("welcome/view", $data);
    }


    public function update_customer() {
        $cid=$this->input->post("txt_cid");
        $update_pic=$this->input->post("update_pic");
        $id = $this->input->post("txt_customer_id");
        $customer_type = $this->input->post("selectcustomertype");
        $customer_name = $this->input->post("txt_name");
        $customer_email = $this->input->post("txt_email");
        $customer_gender = $this->input->post("selectgender");
        $customer_dob = $this->input->post("txt_dob");
        $customer_address = $this->input->post("txt_address");
        $customer_phone = $this->input->post("txt_phone");
        $customer_branch = $this->input->post("selectbranch");
        $customer_enable = $this->input->post("ckenable");
        if($customer_enable==true) $temp=1;
        else $temp=0;
        $image = basename($_FILES["userfile"]["name"]);
        if($image==""){
            $pic= $update_pic;
        }
         else {
                $file_arr=  explode('.',$_FILES['userfile']['name']);
                $pic=time().'.'.$file_arr[count($file_arr)-1];

                $target_file = 'img/customers/' . basename($pic);
                
                if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)){
                    if($update_pic!="no_images.jpg")
                     unlink("img/customers/" . $update_pic);
                }
         }
        
         $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));  
       
             $data = array(
            'customer_type_id' => $customer_type,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_dob' => $customer_dob,
            'customer_gender' => $customer_gender,
            'customer_address' => $customer_address,
            'customer_phone' => $customer_phone,
            'customer_created_date' =>$date->format('Y-m-d H:i:s'),
            'customer_created_by' => $this->Base_model->user_id(),
            'customer_picture' => $pic, 
            'customer_branch_id' => $customer_branch,
            'customer_enable' => $temp,
            
            );

        $this->Base_model->update('customer', 'customer_id', $id, $data);
        
   
        redirect('customer');
       
        
    }
    public function delete() {
        $id = $this->uri->segment(3);
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $this->Base_model->run_query("update customer set customer_status=0,customer_modified_by=".$this->Base_model->user_id().",customer_modified_date='".$date->format('Y-m-d H:i:s')."' where customer_id=".$id); 
        redirect('customer');
    }


    /*Front End Customer Register*/
    public function save_customer_with_card(){       
        $customer_id = $this->input->post("register_customer_id");
        $customertype = $this->input->post("select_customertype");
        $customer_name = $this->input->post("customer_name");
        $selectgender = $this->input->post("selectgender");
        $customer_dob = $this->input->post("customer_dob");
        $customer_address = $this->input->post("customer_address");
        $customer_phone = $this->input->post("customer_phone");
        $customer_email = $this->input->post("customer_email");
        $branch = $this->input->post("select_branch");
        $card_number = $this->input->post("customer_card_number");
        $card_serail = $this->input->post("customer_card_serail");
        $chip_card = $this->input->post("customer_chip_card");
        $amount_alert = $this->input->post("customer_amount_alert");
        $card_expire = $this->input->post("customer_card_expire");
        $card_expire_alert = $this->input->post("customer_card_expire_alert");
        $chip_card = $this->input->post("customer_chip_card");
        $customer_discount = $this->input->post("customer_discount");
        $enable = $this->input->post("ckenable");
        $active = "0";
        if($enable=="on"){
            $active = "1";
        }

        $img=$_FILES["imgInp"]["name"];
       
        if($img!=""){
            $pic=$this->Upload->upload_img("imgInp","./img/customers/","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
        }else{
            $pic="no_images.jpg";
        }

        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));       

        if($customer_id==""){
            $data = array(            
            'customer_type_id' => $customertype,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_dob' => $customer_dob,
            'customer_gender' => $selectgender,
            'customer_address' => $customer_address,
            'customer_phone' => $customer_phone,
            'customer_created_date' => $date->format('Y-m-d H:i:s'),
            'customer_created_by' => $this->Base_model->user_id(),
            'customer_picture' => $pic, 
            'customer_branch_id' => $branch, 
            'customer_enable'=>$active,
            'customer_card_number' => $card_number,
            'customer_card_serial' => $card_serail, 
            'customer_chip' => $chip_card, 
            'customer_discount'=>$customer_discount,
            'customer_amount_remain_alert' =>$amount_alert,
            'customer_card_expired'=>$card_expire,
            'customer_card_expired_alert'=>$card_expire_alert
            );
            $this->Base_model->save('customer', $data);
        }else{
            $data = array(            
            'customer_type_id' => $customertype,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_dob' => $customer_dob,
            'customer_gender' => $selectgender,
            'customer_address' => $customer_address,
            'customer_phone' => $customer_phone,
            'customer_card_modified_date' => $date->format('Y-m-d H:i:s'),
            'customer_card_modified_by' => $this->Base_model->user_id(),
            'customer_picture' => $pic, 
            'customer_branch_id' => $branch, 
            'customer_enable'=>$active,
            'customer_card_number' => $card_number,
            'customer_card_serial' => $card_serail, 
            'customer_chip' => $chip_card, 
            'customer_discount'=>$customer_discount,
            'customer_amount_remain_alert' =>$amount_alert,
            'customer_card_expired'=>$card_expire,
            'customer_card_expired_alert'=>$card_expire_alert
            );
            $this->Base_model->update('customer', 'customer_id', $customer_id, $data);
        }
        
        echo json_encode("done");
    }

    public function load_customer_type(){
        $customer_type = $this->Base_model->loadToListJoin("SELECT customer_type_id,customer_type_name FROM customer_type");        
        echo json_encode($customer_type);        
    } 
    public function load_branch(){        
        $branch = $this->Base_model->loadToListJoin("SELECT branch_id,branch_name FROM branch WHERE branch_status!=0");        
        echo json_encode($branch);
    }

    public function customer_list_response(){
        $data['records'] = $this->Base_model->loadToListJoin("SELECT    c.customer_id,
            c.customer_type_id,
            ct.customer_type_name,
            c.customer_name,
            c.customer_email,
            c.customer_gender,
            c.customer_picture,
            c.customer_dob,
            c.customer_address,
            c.customer_phone,
            c.customer_status,
            if(c.customer_enable=1,'Enabled','Disabled') as customer_enable,
            c.customer_branch_id,
            b.branch_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            ifnull(c.customer_balance,'0') as customer_balance,
            ifnull(c.customer_discount,'0') as customer_discount,
            c.customer_card_expired,
            c.customer_card_expired_alert,
            c.customer_amount_remain_alert
            
     FROM           customer c
                LEFT JOIN  customer_type ct ON ct.customer_type_id = c.customer_type_id
                LEFT JOIN   branch b ON b.branch_id = c.customer_branch_id
     WHERE c.customer_status>0");
            $this->load->view("report/report_stock/response", $data);
    } 


    public function customer_list_responses(){
        $search_customer_name = $this->input->get("search_customer_name");
        $search_phone_number = $this->input->get("search_phone_number");
        $search_customer_branch = $this->input->get("search_customer_branch");
        $search_card_number = $this->input->get("search_card_number");
        $search_card_serail = $this->input->get("search_card_serail");        
        $search_name = "";
        if($search_customer_name!=""){
            $search_name =" AND customer_name LIKE '".trim($search_customer_name)."'";
        }
        $search_phone = "";
        if($search_phone_number!=""){
            $search_phone =" AND customer_phone LIKE '".trim($search_phone_number)."'";
        }
        $search_branch = "";
        if($search_customer_branch>0){
            $search_branch =" AND customer_branch_id = ".$search_customer_branch;
        }
        $card_number = "";
        if($search_card_number!=""){
            $card_number =" AND customer_card_number LIKE '".trim($search_card_number)."'";
        }
        $card_serail = "";
        if($search_card_serail!=""){
            $card_serail =" AND customer_card_serial LIKE '".trim($search_card_serail)."'";
        }
        $data['records'] = $this->Base_model->loadToListJoin("SELECT    c.customer_id,
            c.customer_type_id,
            ct.customer_type_name,
            c.customer_name,
            c.customer_email,
            c.customer_gender,
            c.customer_picture,
            c.customer_dob,
            c.customer_address,
            c.customer_phone,
            c.customer_status,
            if(c.customer_enable=1,'Enabled','Disabled') as customer_enable,
            c.customer_branch_id,
            b.branch_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            ifnull(c.customer_balance,'0') as customer_balance,
            ifnull(c.customer_discount,'0') as customer_discount,
            c.customer_card_expired,
            c.customer_card_expired_alert,
            c.customer_amount_remain_alert
            
     FROM           customer c
                LEFT JOIN  customer_type ct ON ct.customer_type_id = c.customer_type_id
                LEFT JOIN   branch b ON b.branch_id = c.customer_branch_id
     WHERE c.customer_status>0".$search_name.$search_phone.$search_branch.$card_number.$card_serail);
            $this->load->view("report/report_stock/response", $data);
    }

    public function customer_list_by_id(){
        $id = $this->input->post("customer_id");
        $data= $this->Base_model->loadToListJoin("SELECT    c.customer_id,
            c.customer_type_id,
            ct.customer_type_name,
            c.customer_name,
            c.customer_email,
            c.customer_gender,
            c.customer_picture,
            c.customer_dob,
            c.customer_address,
            c.customer_phone,
            c.customer_status,
            if(c.customer_enable=1,'Enabled','Disabled') as customer_enable,
            c.customer_branch_id,
            b.branch_name,
            c.customer_card_number,
            c.customer_card_serial,
            c.customer_chip,
            ifnull(c.customer_balance,'0') as customer_balance,
            ifnull(c.customer_discount,'0') as customer_discount,
            c.customer_card_expired,
            c.customer_card_expired_alert,
            c.customer_amount_remain_alert
            
     FROM           customer c
                LEFT JOIN  customer_type ct ON ct.customer_type_id = c.customer_type_id
                LEFT JOIN   branch b ON b.branch_id = c.customer_branch_id
     WHERE c.customer_status>0 AND customer_id=".$id);
            echo json_encode($data);
    } 

    public function delete_customer() {
        $id = $this->input->post("customer_id");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $this->Base_model->run_query("update customer set customer_status=0,customer_modified_by=".$this->Base_model->user_id().",customer_modified_date='".$date->format('Y-m-d H:i:s')."' where customer_id=".$id);  
        echo json_encode("done");      
    }   

    /* End Front End Customer Register*/   

}
