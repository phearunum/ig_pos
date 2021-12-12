<?php
class Employee extends CI_Controller{
    //put your code here
   


    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in(); 
        //require_once(APPPATH . 'libraries/encrypt.php'); 
        //$this->en = new encrypt("12345"); 
        $this->load->library("encrypt");
    }
    
    public function response(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and employee_brand_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("select * from v_employee where status=1 $branch");
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses(){
        $card=$this->input->get('txt_emp_card');
        $emp_id=$this->input->get('txt_emp_id');
        $pos_id=$this->input->get('cb_position');
        $shift_id=$this->input->get('cb_shift');
        $branch_id=$this->input->get('cb_branch');
        $s_card='';
        $s_emp='';
        $s_pos='';
        $s_shift='';
        $s_branch='';
        if($card!=""){
            $s_card='and employee_card="'.$card.'" ';
        }
        if($emp_id!=""){
            $s_emp="and employee_id=$emp_id";
        }
        if($pos_id!=0){
            $s_pos="and employee_position_id=$pos_id";
        }
        if($shift_id!=0){
            $s_shift="and employee_shift_id=$shift_id";
        }
        if($branch_id!=0){
            $s_branch="and employee_brand_id=$branch_id";
        }
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and employee_brand_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("select * from v_employee where status=1 $branch $s_branch $s_card $s_emp $s_pos $s_shift");
        $this->load->view("report/report_stock/response",$data);
    }
    
    public function index(){
        
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "employee/employee_list";
        
        
        $data['record_employee']=$this->Base_model->get_data("v_employee");
        //permission data
        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('employee',$lang=='' ? 'en':$lang);
         $data['lbl_title']             =$this->lang->line('list_name');
         $data['lbl_emp_position']      =$this->lang->line('position');
         $data['lbl_emp_name']          =$this->lang->line('employee_name');
         $data['lbl_emp_sex']           =$this->lang->line('sex');
         $data['lbl_emp_dob']           =$this->lang->line('dob');
         $data['lbl_emp_shift']         =$this->lang->line('shift');
         $data['lbl_emp_stock_name']    =$this->lang->line('stock_name');
         $data['lbl_emp_phone']         =$this->lang->line('phone');
         $data['lbl_emp_email']         =$this->lang->line('email');
         $data['lbl_emp_salary']        =$this->lang->line('employee_salary');
         $data['lbl_emp_hired_date']    =$this->lang->line('hired_date');
         $data['lbl_emp_address']       =$this->lang->line('address');
         $data['lbl_emp_note']          =$this->lang->line('lb_note');
         $data['lbl_emp_is_seller']     =$this->lang->line('is_seller');
         $data['lbl_emp_branch']        =$this->lang->line('branch');
         $data['lbl_emp_title_list']    =$this->lang->line('list_name');
         $data['lbl_card_no']           =$this->lang->line('card_n');
         $data['lbl_action']            =$this->lang->line('action');
         $data['lbl_new']               =$this->lang->line('lb_new');
         $data['lbl_edit']              =$this->lang->line('lb_edit');
         $data['lbl_delete']            =$this->lang->line('lb_delete');
         $data['btn_export']            =$this->lang->line('btn_export');
          $data['no']            =$this->lang->line('no');
         $data['btn_search']                =$this->lang->line('search');
         $data['lb_cardnum']                =$this->lang->line('lb_cardnum');
         $data['lb_emp']                =$this->lang->line('lb_emp');
         $data['lb_shift']                =$this->lang->line('lb_shift');
         $data['lb_position']                =$this->lang->line('lb_position');
         $data['lb_branch']                =$this->lang->line('lb_branch');
        //END TRANSLATE
         $data['rd_position']=$this->Base_model->loadToListJoin("select * from position where status=1");
         $data['rd_shift']=$this->Base_model->loadToListJoin("select * from shift where status=1");
         $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['rd_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $this->load->view("welcome/view",$data);
        
    }
    
    public function addnew(){
        $data['title']  = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "employee/frm_employee";
        
       
        
        $data['record_shift']=$this->Base_model->loadToListJoin("SELECT shift_id,shift_name FROM shift");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['record_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $data['record_position']=$this->Base_model->loadToListJoin("SELECT position_id,position_name FROM position where status=1");
       
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('employee',$lang=='' ? 'en':$lang);
            
         $data['lbl_emp_title']         =$this->lang->line('addnew_name');
         $data['lbl_emp_position']      =$this->lang->line('position');
         $data['lbl_female']         =$this->lang->line('female');
         $data['lbl_male']         =$this->lang->line('male');
         $data['lb_cardnum']                =$this->lang->line('lb_cardnum'); 
         $data['lbl_emp_name']          =$this->lang->line('employee_name');
         $data['lbl_emp_sex']           =$this->lang->line('sex');
         $data['lbl_emp_dob']           =$this->lang->line('dob');
         $data['lbl_emp_shift']         =$this->lang->line('shift');
         $data['lbl_emp_stock_name']    =$this->lang->line('stock_name');
         $data['lbl_emp_phone']         =$this->lang->line('phone');
         $data['lbl_emp_email']         =$this->lang->line('email');
         $data['lbl_emp_salary']        =$this->lang->line('employee_salary');
         $data['lbl_emp_hired_date']    =$this->lang->line('hired_date');
         $data['lbl_emp_address']       =$this->lang->line('address');
         $data['lbl_emp_note']          =$this->lang->line('lb_note');
         $data['lbl_emp_is_seller']     =$this->lang->line('is_seller');
         $data['lbl_emp_branch']        =$this->lang->line('branch');
        
         $data['btn_create']      =$this->lang->line('btn_create');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');

         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

         
         //END TRAN SLATE
            
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        $data['title'] = "EMPLOYEE UPDATE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "employee/frm_employee_update";
        
        $id=$this->uri->segment(3);
       
        $data['record_employee']=$this->Base_model->get_field("v_employee","employee_id",$id);
        
        $data['record_shift']=$this->Base_model->loadToListJoin("SELECT shift_id,shift_name FROM shift");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['record_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $data['record_position']=$this->Base_model->loadToListJoin("SELECT position_id,position_name FROM position  where status=1");
        $data['record_stock_location']=$this->Base_model->get_field("stock_location","stock_location_branch_id",$this->Base_model->branch_id());
        
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('employee',$lang=='' ? 'en':$lang);
         $data['lb_cardnum']                =$this->lang->line('lb_cardnum');  
         $data['lbl_emp_title']         =$this->lang->line('addnew_name');
         $data['lbl_emp_position']      =$this->lang->line('position');
         $data['lbl_female']         =$this->lang->line('female');
         $data['lbl_male']         =$this->lang->line('male');  
         $data['lbl_emp_name']          =$this->lang->line('employee_name');
         $data['lbl_emp_sex']           =$this->lang->line('sex');
         $data['lbl_emp_dob']           =$this->lang->line('dob');
         $data['lbl_emp_shift']         =$this->lang->line('shift');
         $data['lbl_emp_stock_name']    =$this->lang->line('stock_name');
         $data['lbl_emp_phone']         =$this->lang->line('phone');
         $data['lbl_emp_email']         =$this->lang->line('email');      
         $data['lbl_emp_hired_date']    =$this->lang->line('hired_date');
         $data['lbl_emp_address']       =$this->lang->line('address');
         $data['lbl_emp_note']          =$this->lang->line('lb_note');        
         $data['btn_update']      =$this->lang->line('btn_update');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

         $data['lbl_emp_branch']     =$this->lang->line('branch');
         $data['lbl_emp_salary']        =$this->lang->line('employee_salary');
         $data['lbl_emp_is_seller']     =$this->lang->line('is_seller');
//END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    public function edit_password_load(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "employee/frm_change_password";


        $id=$this->uri->segment(3);
        $data['employee_record']=$this->Base_model->get_field("v_user","employee_id",$id);
        
        $password=$this->Base_model->get_value("v_user","user_password","user_id",$id);
        
        // $tdes = new TripleDES("12345");
        // $data['password'] = $tdes->decrypt($password);
        $data['password']= $this->encrypt->decode($data["employee_record"][0]->user_password);
        //var_dump($data);die();
        $this->load->view("welcome/view",$data);
        //$data['password'] = $this->tdes->decrypt($password);
        
        // $id=$this->uri->segment(3);
        // $data['employee_record']=$this->Base_model->get_field("v_user","employee_id",$id);
        
        // $password=$this->Base_model->get_value("v_user","user_password","user_id",$id);
        //$data['password']= $this->encrypt->decode($password);
        // $tdes = new TripleDES("12345");
        // $data['password'] = $tdes->decrypt($password);
        // var_dump($tdes);
        
        //$this->load->view("welcome/view",$data);
    }
    public function update_password_change(){
            //$this->load->library('encrypt');
            
            $id=$this->input->post('txt_employee_id');
            $username=$this->input->post("txt_username");
            $password=$this->input->post("txt_password");
            $encryptedPassword = $this->encrypt->encode($password);
            //echo "Password".$encryptedPassword;
            //var_dump($encryptedPassword);die();
            //ARRAY RECORD
            //$tdes = new TripleDES("12345");

            //$phpEncrypted = $tdes->encrypt($password);
            $employee_record=array(
                                'user_name'           =>$username,
                                'user_password'       =>$encryptedPassword
            );
            
            //END RECORD       
        
        //SAVE DATA    
        $this->Base_model->update('user','employee_id',$id,$employee_record);
        //END SAVE DATA 
        redirect('employee/edit_password_load/'.$id);
    }
    public function save(){
            
            $position_id    =$this->input->post("cbo_position");
            $name           =$this->input->post("txt_employee_name");
            $gender         =$this->input->post('rad_gender');
            $phone          =$this->input->post('txt_phone');
            $email          =$this->input->post('txt_email');
            $address        =$this->input->post('txt_address');
            $shift_id       =$this->input->post('cbo_shift');
            $branch_id      =$this->input->post('cbo_branch');
            $note           =$this->input->post('txt_note');
            $employee_hire_date=$this->input->post('txt_emp_hired_date');
            $salary         =$this->input->post('txt_employee_salary');
            $employee_dob   =$this->input->post('txt_dob');
            $stock_location =$this->input->post("cbo_stock_location");
            $is_seller      =$this->input->post("ch_seller");
            $employee_card  =$this->input->post("txt_employee_card");
        //ARRAY RECORD    
            $employee_record=array(
                                'employee_name'               =>$name,
                                'employee_sex'                =>$gender,
                                'employee_position_id'        =>$position_id,
                                'employee_phone'              =>$phone,
                                'employee_shift_id'           =>$shift_id,
                                'employee_brand_id'           =>$branch_id,
                                'employee_email'              =>$email,
                                'employee_created_date'       =>date('Y-m-d'),
                                'employee_created_by'         =>$this->Base_model->user_id(),
                                'employee_address'            =>$address,
                                'employee_note'               =>$note,
                                'employee_salary'             =>$salary,
                                'employee_dob'                =>$employee_dob,
                                'employee_hired_date'         =>$employee_hire_date,
                                'employee_stock_location_id'  =>$stock_location,
                                'employee_is_seller'          =>$is_seller,
                                'employee_card'               =>$employee_card
            );
        //END RECORD       
         
        //SAVE DATA    
        $this->Base_model->save('employee',$employee_record);
        //END SAVE DATA
        
        redirect('employee'); 
    }
    
    public function update(){
            
            $id             =$this->input->post('txt_employee_id');
            $position_id    =$this->input->post("cbo_position");
            $name           =$this->input->post("txt_employee_name");
            $gender         =$this->input->post('rad_gender');
            $phone          =$this->input->post('txt_phone');
            $email          =$this->input->post('txt_email');
            $address        =$this->input->post('txt_address');
            $shift_id       =$this->input->post('cbo_shift');
            $branch_id      =$this->input->post('cbo_branch');
            $note           =$this->input->post('txt_note');
            $employee_hire_date=$this->input->post('txt_emp_hired_date');
            $salary         =$this->input->post('txt_employee_salary');
            $employee_dob   =$this->input->post('txt_dob');
            $stock_location =$this->input->post("cbo_stock_location");
            $is_seller      =$this->input->post("ch_seller");
            $employee_card  =$this->input->post("txt_employee_card");
        //ARRAY RECORD
        
            $employee_record=array(
                                'employee_name'               =>$name,
                                'employee_sex'                =>$gender,
                                'employee_position_id'        =>$position_id,
                                'employee_phone'              =>$phone,
                                'employee_shift_id'           =>$shift_id,
                                'employee_brand_id'           =>$branch_id,
                                'employee_email'              =>$email,
                                'employee_modified_date'      =>date('Y-m-d'),
                                'employee_modified_by'        =>$this->Base_model->user_id(),
                                'employee_address'            =>$address,
                                'employee_note'               =>$note,
                                'employee_salary'             =>$salary,
                                'employee_dob'                =>$employee_dob,
                                'employee_hired_date'         =>$employee_hire_date,
                                'employee_stock_location_id'  =>$stock_location,
                                'employee_is_seller'          =>$is_seller,
                                'employee_card'               =>$employee_card
            );
        //END RECORD      
         
        //UPDATE DATA    
        $this->Base_model->update('employee','employee_id',$id,$employee_record);
        //END UPDATE DATA 
        redirect('employee');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->update('employee','employee_id',$id,array('status'=>0));
        redirect('employee');
        
    }
}
class TripleDES {
        private $bPassword="";
        private $sPassword="";

        function __construct($Password) {
            $this->bPassword  = md5(utf8_encode($Password),TRUE);
            $this->bPassword .= substr($this->bPassword,0,8);
            $this->sPassword = $Password;
        }

        function Password($Password = "") {
            if($Password == "") {
                return $this->sPassword;
            } else {
                $this->bPassword  = md5(utf8_encode($Password),TRUE);
                $this->bPassword .= substr($this->bPassword,0,8);
                $this->sPassword - $Password;
            }
        }

        function PasswordHash() {
            return $this->bPassword;
        }

        function Encrypt($Message, $Password = "") {
            if($Password <> "") { $this->Password($Password); }
            $size=mcrypt_get_block_size('tripledes','ecb');
            $padding=$size-((strlen($Message)) % $size);
            $Message .= str_repeat(chr($padding),$padding);
            $encrypt  = mcrypt_encrypt('tripledes',$this->bPassword,$Message,'ecb');   
            return base64_encode($encrypt);
        }

        function Decrypt($message, $Password = "") {
            if($Password <> "") { $this->Password($Password); }
            return mcrypt_decrypt('tripledes', $this->bPassword, base64_decode($message), 'ecb');
        }

}
