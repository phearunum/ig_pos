<?php

class Branch extends CI_Controller{
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
        $data['page'] = "branch/list_branch";
        
        $data['record_customer']=$this->Base_model->LoadToListJoin("SELECT
                                                                    b.branch_id,
                                                                    b.branch_name,
                                                                    b.branch_location,
                                                                    b.branch_phone,
                                                                    b.branch_created_date,
                                                                    b.branch_modified_date,
                                                                    b.branch_modified_by,
                                                                    e.employee_name AS recorder,
                                                                    b.branch_des,
                                                                    cp.company_profile_image as logo
                                                                    FROM
                                                                            branch AS b
                                                                    INNER JOIN employee AS e ON b.branch_created_by = e.employee_id
                                                                    left outer join company_profile cp on b.branch_id=cp.company_profile_branch_id
                                                                    ");
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data

            $lang = $this->input->cookie('language');
                
            
             
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('branch',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $this->lang->load('branch',$lang=='' ? 'en':$lang);
             $data['lbl_branch_title']         =$this->lang->line('branch_title');
             $data['lbl_branch_name']          =$this->lang->line('branch_name');
             $data['lbl_branch_location']   =$this->lang->line('branch_location');
             $data['lbl_branch_phone']         =$this->lang->line('branch_phone');
             $data['lbl_branch_address']       =$this->lang->line('branch_address');
             $data['lbl_branch_email']         =$this->lang->line('branch_email');
             $data['lbl_branch_createby']         =$this->lang->line('branch_createby');
             $data['lbl_branch_createdate']         =$this->lang->line('branch_createdate');

             $data['btn_update']            =$this->lang->line('btn_update');
             $data['btn_save']              =$this->lang->line('btn_save');
             $data['btn_cancel']            =$this->lang->line('btn_cancel');
             $data['lbl_field']             =$this->lang->line('lb_field');
             $data['lbl_field_value']       =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form']     =$this->lang->line('val_mess_require');
             $data['lbl_branch_title']      =$this->lang->line('branch_title');
             $data['lbl_branch_name']      =$this->lang->line('branch_name');
             $data['lbl_branch_location']      =$this->lang->line('branch_location');
             $data['lbl_branch_phone']      =$this->lang->line('branch_phone');
             $data['lbl_branch_email']      =$this->lang->line('branch_email');
             $data['lbl_branch_address']      =$this->lang->line('branch_address');
             $data['lbl_branch_createby']      =$this->lang->line('branch_createby');
             $data['lbl_branch_createdate']      =$this->lang->line('branch_createdate');
             $data['lbl_action']      =$this->lang->line('lb_action');
        //END TRAN SLATE
        
            $this->load->view("welcome/view",$data);
        
    }
    
    public function addnew(){
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "branch/frm_company_profile";
        $data['records_type']= $this->Base_model->get_data("branch");
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "branch/frm_company_profile";
        $id=$this->uri->segment(3);        
        
        $data['records_type']= $this->Base_model->loadToListJoin("select * from customer_type");
     
        $data['record_branch']=$this->Base_model->get_field("branch","branch_id",$id);
        
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){  

            $data_branch = array(
                'branch_name'               => $name,
                'branch_location'           => $address,
                'branch_phone'              => $phone1,
                'branch_wifi_password'      => $wifi,
                'branch_created_date'       => date('Y-m-d'),
                'branch_created_by'         => $this->Base_model->user_id()
            );

            $branch_name      =   $this->input->post("txt_branch_name");
            $branch_location  =   $this->input->post("txt_branch_address");            
            $branch_phone     =   $this->input->post("txt_branch_phone");
            $branch_wifi      =   $this->input->post("txt_branch_wifi");
       
            $data=array(               
                'branch_name'               =>$branch_name,
                'branch_location'           =>$branch_location,                               
                'branch_phone'              =>$branch_phone,
                'branch_wifi_password'       =>$branch_wifi,
                'branch_created_by'      => $this->Base_model->user_id(),
                'branch_created_date'     =>date('Y-m-d')           
             
            );
        
        $this->Base_model->save('branch',$data);
        redirect('company_profile');
        
    }
    
    public function update(){
        
            $branch_id      =   $this->input->post("txt_branch_id");
            $branch_name      =   $this->input->post("txt_branch_name");
            $branch_location  =   $this->input->post("txt_branch_location");            
            $branch_phone     =   $this->input->post("txt_branch_phone");
            $desc             =   $this->input->post("txt_description");  
            
            $data=array(  
                'branch_id'                    =>$branch_id,
                'branch_name'               =>$branch_name,
                'branch_location'           =>$branch_location,
                'branch_wifi_password'    =>$branch_wifi_password,                               
                'branch_phone'              =>$branch_phone,
                'branch_modified_date'     =>date('Y-m-d'),
                'branch_modified_by'       =>$this->session->userdata('user_id'),                
                'branch_des'              =>$desc
            );
            
        $this->Base_model->update('branch','branch_id',$branch_id,$data);
        
        redirect('branch');
    }

    public function responses(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data["records"] = $this->Base_model->loadToListJoin("select 
            br.branch_id,
            br.branch_name,
            br.branch_location,
            br.branch_wifi_password,
            br.branch_phone,
            em.employee_name as createby, 
            br.branch_created_date,
            em.employee_name as modifyby,
            br.branch_created_date
            from branch br
        inner join employee em on br.branch_created_by=em.employee_id where br.branch_status=1 $branch");
        $this->load->view("report/report_stock/response",$data);
    }
    
    public function delete(){
        $data=array(               
                'branch_status'  =>0      
            );
        $id=$this->uri->segment(3);
        $this->Base_model->update('branch','branch_id',$id,$data);
        redirect('company_profile/index/1');
    }
    
}
