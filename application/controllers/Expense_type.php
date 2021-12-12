<?php

class Expense_type extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();

        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        $data['title']  = "EXPENSE TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "expense_type/list_expense_type";
        
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
        //
             // TRANSLATED BY SOPHANITH
             $lang = $this->input->cookie('language');
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $this->lang->load('expense',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('expense_type_list_name');
             $data['lbl_type_name']          =$this->lang->line('expense_type');
             $data['lbl_description']        =$this->lang->line('lb_desc');
             $data['lbl_created_date']       =$this->lang->line('lb_create_date');
             $data['lbl_recorder']           =$this->lang->line('lb_recorder');
             $data['lbl_modi_date']          =$this->lang->line('lb_modified_date');
             $data['lbl_modi_by']            =$this->lang->line('lb_modifier');
             
           
             $data['lbl_new']               =$this->lang->line('lb_new');
             $data['lbl_delete']            =$this->lang->line('lb_delete');
             $data['lbl_no']                =$this->lang->line('lb_no');
             $data['lbl_edit']              =$this->lang->line('lb_edit');
             $data['lbl_action']              =$this->lang->line('lb_action');
             
        //END TRAN SLATED
             
        $this->load->view("welcome/view",$data);
    }
    public function response(){
        //sleep(100);
        $data['records']=$this->Base_model->loadToListJoin("select * from v_expense_type");
        $this->load->view("report/report_stock/response",$data);
    }
    public function addnew(){
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "expense_type/frm_expense_type";
        
         // TRANSLATED BY SOPHANITH
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('expense',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('expense_type_addnew_name');
             $data['lbl_type_name']          =$this->lang->line('expense_type');
             $data['lbl_description']        =$this->lang->line('lb_desc');
             
         
             $data['lbl_note_for_form']                =$this->lang->line('val_mess_require');
             $data['lbl_field']                        =$this->lang->line('lb_field');
              $data['lbl_field_value']                 =$this->lang->line('lb_field_value');
             $data['btn_create']                       =$this->lang->line('btn_create');
             $data['btn_cancel']                       =$this->lang->line('btn_cancel');
             
        //END TRAN SLATED
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "expense_type/frm_expense_type_update";
        
        $id=$this->uri->segment(3);
        $data['record_customer_type']=$this->Base_model->get_field("expense_type","expense_type_id",$id);
        
         // TRANSLATED BY SOPHANITH
         $lang = $this->input->cookie('language');
         $this->lang->load('button',$lang=='' ? 'en':$lang);
         $this->lang->load('validation',$lang=='' ? 'en':$lang);
         $this->lang->load('lable',$lang=='' ? 'en':$lang);

         $this->lang->load('expense',$lang=='' ? 'en':$lang);
             
          $data['lbl_title']              =$this->lang->line('expense_type_addnew_name');
          $data['lbl_type_name']          =$this->lang->line('expense_type');
          $data['lbl_description']        =$this->lang->line('lb_desc');
          
      
          $data['lbl_note_for_form']                =$this->lang->line('val_mess_require');
          $data['lbl_field']                        =$this->lang->line('lb_field');
           $data['lbl_field_value']                 =$this->lang->line('lb_field_value');
          $data['btn_update']                       =$this->lang->line('btn_update');
          $data['btn_cancel']                       =$this->lang->line('btn_cancel');
             
        //END TRAN SLATED
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            $expense_type   =   $this->input->post("txt_expense_typename");
            $expense_chart  =   $this->input->post("txt_expense_chart_no");
            $desc           =   $this->input->post("txt_description");
            
            $data=array(
                'expense_type_name'             =>$expense_type,
                'expense_chart_number'          =>$expense_chart,
                'expense_type_created_date'     =>date('Y-m-d'),
                'expense_type_created_by'       =>$this->Base_model->user_id(),                
                'expense_type_des'              =>$desc
            );
        
        $this->Base_model->save('expense_type',$data);
        redirect('expense_type');
        
    }
    
    public function update(){
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $id                 =   $this->input->post('txt_expense_id');
        $expense_type       =   $this->input->post("txt_expense_typename");
        $expense_chart      =   $this->input->post("txt_expense_chart_no");
        $desc               =   $this->input->post("txt_description");
            
            $data=array(
                'expense_type_name'              =>$expense_type,
                'expense_type_modified_date'     =>$date->format('Y-m-d h:i:s'),
                'expense_chart_number'           =>$expense_chart,
                'expense_type_modified_by'       =>$this->Base_model->user_id(),                
                'expense_type_des'               =>$desc
            ); 
        
        $this->Base_model->update('expense_type','expense_type_id',$id,$data);
            
        redirect('expense_type');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('expense_type','expense_type_id',$id);
        redirect('expense_type');
    }
}
