<?php

class Customer_type extends CI_Controller{
    //put your code here
    
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
        $data['page'] = "customer_type/list_customer_type";
        
        // $data['record_customer_type']=$this->Base_model->LoadToListJoin("SELECT 
        //     c.customer_type_id,c.customer_type_name,c.customer_type_des,c.customer_type_created_date,
        //     c.customer_type_modified_by,c.customer_type_modified_date,e.employee_name as recorder
        //     FROM 
        //     customer_type as c 
        //     INNER JOIN employee as e ON c.customer_type_created_by = e.employee_id ");
        //permission data
            $name=$this->uri->segment(1);
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            // $id=0;

            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
            // $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
            $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
            
            //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
           
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('customer_type',$lang=='' ? 'en':$lang);
             
             $data['lbl_title']         =$this->lang->line('list_title');
             $data['lbl_cus_type']      =$this->lang->line('customer_type_name');
             $data['lbl_description']   =$this->lang->line('lb_desc');
             $data['lbl_create_date']   =$this->lang->line('lb_create_date');
             $data['lbl_create_by']     =$this->lang->line('lb_recorder');
             $data['lbl_edit']      =$this->lang->line('lb_edit');
             $data['btn_no']        =$this->lang->line('lb_no');
             $data['btn_delete']    =$this->lang->line('lb_delete');
             $data['lbl_new']       =$this->lang->line('lb_new');
             //end translate
            
        $this->load->view("welcome/view",$data);
        
    }
     public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
            c.customer_type_id,c.customer_type_name,c.customer_type_des,c.customer_type_created_date,
            c.customer_type_modified_by,c.customer_type_modified_date,e.employee_name as recorder
            FROM 
            customer_type as c 
            INNER JOIN employee as e ON c.customer_type_created_by = e.employee_id where customer_type_status=1");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer_type/frm_customer_type";
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('customer_type',$lang=='' ? 'en':$lang);
             
             $data['lbl_title']         =$this->lang->line('addnew_title');
             $data['lbl_cus_type']         =$this->lang->line('customer_type_name');
             $data['lbl_description']         =$this->lang->line('lb_desc');
        
            
             
             $data['btn_create']         =$this->lang->line('btn_create');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             $data['lbl_new']       =$this->lang->line('lb_new');
             $data['lbl_note']      =$this->lang->line('val_mess_require');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_vale']    =$this->lang->line('lb_field_value');
             //end translate
        
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "customer_type/frm_customer_type_update";
        
        $id=$this->uri->segment(3);
        $data['record_customer_type']=$this->Base_model->get_field("customer_type","customer_type_id",$id);
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('customer_type',$lang=='' ? 'en':$lang);
         
         $data['lbl_title']         =$this->lang->line('addnew_title');
         $data['lbl_cus_type']         =$this->lang->line('customer_type_name');
         $data['lbl_description']         =$this->lang->line('lb_desc');
    
        
         
         $data['btn_update']         =$this->lang->line('btn_update');
         $data['btn_cancel']        =$this->lang->line('btn_cancel');
         $data['lbl_new']       =$this->lang->line('lb_new');
         $data['lbl_note']      =$this->lang->line('val_mess_require');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_vale']    =$this->lang->line('lb_field_value');
         //end translate
        
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            $customer_type  =   $this->input->post("txt_customer_typename");
            $desc           =   $this->input->post("txt_description");
            
            $data=array(
                'customer_type_name'             =>$customer_type,
                'customer_type_created_date'     =>date('Y-m-d'),
                'customer_type_created_by'       =>$this->Base_model->user_id(),                
                'customer_type_des'              =>$desc
            );
        
        $this->Base_model->save('customer_type',$data);
        redirect('customer_type');
        
    }
    
    public function update(){
        
        $id                   =$this->input->post('txt_customer_id');
        $customer_type_name   =$this->input->post('txt_customer_typename');
        $desc                 =$this->input->post('txt_description');        
        
        $data=array(
            'customer_type_name'              =>$customer_type_name,           
            'customer_type_des'               =>$desc,
            'customer_type_modified_date'     =>date('Y-m-d'),
            'customer_type_modified_by'       =>$this->Base_model->user_id()
        );        
        $this->Base_model->update('customer_type','customer_type_id',$id,$data);
        
        redirect('customer_type');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->run_query('update customer_type set customer_type_status=0,customer_type_modified_by='.$this->Base_model->user_id().',customer_type_modified_date='.date('Y-m-d').' where customer_type_id='.$id);
        redirect('customer_type');
    }
}
