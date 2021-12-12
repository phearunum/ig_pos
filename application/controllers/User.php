<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->load->library("pagination");
        $this->load->library("encrypt");
        $this->load->helper("url");
        $this->Base_model->check_loged_in();
    }

    public function index(){
        $data['title'] = "USER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "user/user_list";

        // $data['user_record']=$this->Base_model->get_data("v_user");
        //permission data
        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');

            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('user',$lang=='' ? 'en':$lang);

             $data['lbl_user_title']         =$this->lang->line('list_user_name');
             $data['lbl_user_name']          =$this->lang->line('staff_name');
             $data['lbl_user_username']      =$this->lang->line('user_name');
             $data['lbl_user_password']      =$this->lang->line('password');
             $data['lbl_user_desc']          =$this->lang->line('lb_desc');
             $data['lbl_user_printer']       =$this->lang->line('printer_location');
             $data['lbl_branch']       =$this->lang->line('lb_branch');


             $data['lbl_recorder']    =$this->lang->line('lb_recorder');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_no']          =$this->lang->line('lb_no');

        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
     public function response() {
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and employee_brand_id =".$this->Base_model->branch_id()." ";
        }
        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_user where status=1 $branch");
        $this->load->view("report/report_stock/response", $data);
    }
    public function loadlist(){
        $data['title'] = "CUSTOMER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "user/user_list";

        //$data['record_customers']=$this->Base_model->loadToListJoin("SELECT * FROM v_customer_registration LIMIT 10");

        //permission data

        $getid=$this->Base_model->loadToListJoin("SELECT id FROM permission WHERE control='customeregistration/loadlist' AND id_group=".$this->Base_model->position_id());
        $id=0;

        foreach($getid as $g){
            $id=$g->id;
        }

        $data['card_type']=$this->Base_model->loadToListJoin("SELECT card_type_id,card_type_name FROM card_type");
        $data['permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE id=".$id);
        //end permission data

        //Pagination
        $config = array();
        $config["base_url"] = site_url() . "/customeregistration/loadlist";
        $config["total_rows"] = $this->Base_model->record_count("v_customer_registration");
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["record_customers"] = $this->Base_model->fetch_countries($config["per_page"], $page,"v_customer_registration");

        $data["links"] = $this->pagination->create_links();
        //End Pagination
        $this->load->view("welcome/view",$data);

    }
    public function addnew(){
        $data['title'] = "USER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "user/frm_user_registration";

        $data['record_employee']=$this->Base_model->loadToListJoin("SELECT employee_id,employee_name FROM employee WHERE status!=0 AND employee_id NOT IN (SELECT employee_id FROM user WHERE status!=0)");
        $data['record_printer_location']=$this->Base_model->loadToListJoin("SELECT * FROM printer_location WHERE status!=0");

        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('user',$lang=='' ? 'en':$lang);

        $data['lbl_user_title']         =$this->lang->line('addnew_title');
        $data['lbl_user_employee_name'] =$this->lang->line('staff_name');
        $data['lbl_user_username']      =$this->lang->line('user_name');
        $data['lbl_user_password']      =$this->lang->line('password');
        $data['lbl_user_printer']       =$this->lang->line('printer_location');
        $data['lbl_user_note']          =$this->lang->line('lb_note');

        $data['btn_create']    =$this->lang->line('btn_create');
        $data['btn_cancel']    =$this->lang->line('btn_cancel');
        $data['lbl_new']           =$this->lang->line('lb_new');
        $data['lbl_field']         =$this->lang->line('lb_field');
        $data['lbl_field_value']   =$this->lang->line('lb_field_value');
        $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

        $data['is_supper_user']=$this->Base_model->is_supper_user();
        //END TRANSLATE

        $this->load->view("welcome/view",$data);
    }

    public function save(){
        $employee_id=$this->input->post("cbo_employee_name");
        $username=$this->input->post("txt_username");
        $password=$this->input->post('txt_password');
        $note=$this->input->post("txt_note");
        $is_supper_user  =$this->input->post('ch_user');
        $printer_location=$this->input->post("cbo_printer_location_name");

        if($is_supper_user==""){
            $is_supper_user="0";
        }

        $encryptedPassword = $this->encrypt->encode($password);
        //ARRAY RECORD
        $user_data=array(
            'employee_id'               =>$employee_id,
            'user_name'                 =>$username,
            'user_password'             =>$encryptedPassword,
            'user_printer_location_id'  =>$printer_location,
            'user_created_date'         =>date('Y-m-d'),
            'user_note'                 =>$note,
            'is_supper_user'            =>$is_supper_user,
            'user_created_by'           =>$this->Base_model->user_id()

        );
        $this->Base_model->save('user',$user_data);
        redirect("user");
    }
    public function edit_load(){

        $data['title'] = "User";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "user/frm_user_registration_update";
        //$this->load->library('encrypt');

        $id=$this->uri->segment(3);
        $data['record_employee']=$this->Base_model->loadToListJoin("SELECT employee_id,employee_name FROM employee WHERE status=1");
        $data['record_user']=$this->Base_model->get_field("v_user","user_id",$id);

        $password=$this->Base_model->get_value("v_user","user_password","user_id",$id);

        // $tdes = new TripleDES("12345");
        // $data['password'] = $tdes->decrypt($password);
        $data['password']= $this->encrypt->decode($password);

        $data['record_printer_location']=$this->Base_model->loadToListJoin("SELECT * FROM printer_location WHERE status=1");

        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('user',$lang=='' ? 'en':$lang);

         $data['lbl_user_title']         =$this->lang->line('addnew_title');
         $data['lbl_user_employee_name'] =$this->lang->line('staff_name');
         $data['lbl_user_username']      =$this->lang->line('user_name');
         $data['lbl_user_password']      =$this->lang->line('password');
         $data['lbl_user_printer']       =$this->lang->line('printer_location');
         $data['lbl_user_note']          =$this->lang->line('lb_note');
         $data['btn_update']    =$this->lang->line('btn_update');
         $data['btn_cancel']    =$this->lang->line('btn_cancel');
         $data['lbl_new']           =$this->lang->line('lb_new');
         $data['lbl_field']         =$this->lang->line('lb_field');
         $data['lbl_field_value']   =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

         $data['is_supper_user']=$this->Base_model->is_supper_user();
    //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }

    public function update(){

            $this->load->library('encrypt');

            $user_id=$this->input->post("txt_user_id");
            $employee_id=$this->input->post("cbo_employee_name");
            $username=$this->input->post("txt_username");
            $password=$this->input->post('txt_password');
            $note=$this->input->post("txt_note");
            $is_supper_user  =$this->input->post('ch_user');
            $printer_location=$this->input->post("cbo_printer_location_name");
            $encryptedPassword = $this->encrypt->encode($password);

            if($is_supper_user==""){
            $is_supper_user="0";
           }

            $user_data=array(
                                'employee_id'               =>$employee_id,
                                'user_name'                 =>$username,
                                'user_password'             =>$encryptedPassword,
                                'user_created_date'         =>date('Y-m-d'),
                                'user_note'                 =>$note,
                                'is_supper_user'            =>$is_supper_user,
                                'user_printer_location_id'  =>$printer_location,
                                'user_created_by'           =>$this->Base_model->user_id()
            );

        //UPDATE DATA
        $this->Base_model->update('user','user_id',$user_id,$user_data);
        //END UPDATE DATA
        redirect("user");
    }

    public function delete(){

        $id=$this->uri->segment(3);

        $this->Base_model->delete_by('user','user_id',$id);
        redirect('user');

    }
}

class TripleDES {
        private $bPassword="";
        private $sPassword="";

        function __construct($Password) {
            $this->bPassword  = md5(utf8_encode($Password),TRUE);
            $this->bPassword .= substr($this->bPassword,0,8);
            $this->sPassword - $Password;
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
