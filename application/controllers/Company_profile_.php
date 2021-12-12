<?php
class Company_profile extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->load->model("Upload");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "company_profile/frm_company_profile";        
        $profile=$this->Base_model->loadToListJoin("select * from company_profile where company_profile_branch_id=0"); 
        $company_profile_name="";
        $company_profile_branch_id=0;
        $company_profile_email="";
        $company_profile_address="";
        $company_profile_image="";
        $company_profile_id=0;
        $company_profile_phone="";
		$company_profile_wifi="";
		$company_profile_set_up_point="";
        //permission data
            $data['record_branch']  =$this->Base_model->get_data("company_profile");
            $name=$this->uri->segment(1);
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            // $id=0;
            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
            // $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        $data['record_permission']=$this->Base_model->get_permission($name."/index/1");
        //end permission data
        $branch_profile = $this->uri->segment(3);
        if($branch_profile==null){ 
            //create new
        }
        else {
            $count = $this->Base_model->get_value_byQuery("select count(*) as a from branch where branch_id=".$branch_profile,'a');
            if($count==0){
                redirect("branch");
            }
            else{
                $profile=$this->Base_model->loadToListJoin("select * from company_profile limit 1"); 
                foreach($profile as $p){
                    $company_profile_name=$p->company_profile_name;
                    $company_profile_branch_id=$p->company_profile_branch_id;
                    $company_profile_email=$p->company_profile_email;
                    $company_profile_address=$p->company_profile_address;
                    $company_profile_image=$p->company_profile_image;
                    $company_profile_id=$p->company_profile_id;
                    $company_profile_phone=$p->company_profile_phone;
                    $company_profile_wifi=$p->company_profile_wifi;
					$company_profile_set_up_point = $p->company_profile_set_up_point;
                }
            }
        }
        $data['company_profile_name']=$company_profile_name;
        $data['company_profile_branch_id']=$company_profile_branch_id;
        $data['company_profile_phone']=$company_profile_phone;
        $data['company_profile_email']=$company_profile_email;
        $data['company_profile_address']=$company_profile_address;
        $data['company_profile_image']=$company_profile_image;
        $data['company_profile_id']=$company_profile_id;
	   $data['company_profile_wifi']=$company_profile_wifi;
	   $data['company_profile_set_up_point']=$company_profile_set_up_point;

        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
 
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $this->lang->load('company_profile',$lang=='' ? 'en':$lang);
             $data['lbl_com_title']         =$this->lang->line('company_title');
             $data['lbl_com_name']          =$this->lang->line('company_name');
             $data['lbl_com_phone']         =$this->lang->line('company_phone');
             $data['lbl_com_address']       =$this->lang->line('company_address');
             $data['lbl_com_email']         =$this->lang->line('company_email');
             $data['lbl_wifi']         =$this->lang->line('wifi');

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
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "company_profile/frm_company_profile";

         $this->load->view("welcome/view",$data);
     }
     public function response(){
        $data["records"] = $this->Base_model->loadToListJoin("select 
            br.branch_id,
            br.branch_name,
            br.branch_location,
            br.branch_phone,
            em.employee_name as createby,
            br.branch_created_date
            from branch br
            inner join employee em on br.branch_created_by=em.employee_id");
        $this->load->view("report/report_stock/response",$data);
    }
    public function save(){
        $id=$this->input->post('txt_id');
        //$img=$this->input->post('txt_getfile');
        $name=$this->input->post('txt_company_name');
        $phone1=$this->input->post('txt_phone');
        $email=$this->input->post('txt_email');
        $address=$this->input->post('txt_address');
		$wifi=$this->input->post('txt_wifi');
		$point = $this->input->post('txt_point');

            $image = basename( $_FILES["userfile"]["name"]);    
            $img="";
            if($image!=""){
                $img=$this->Upload->upload_img("userfile","./img/company","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
            }            
            
            //end do upload
            $data_branch = array(
                'company_profile_name'               => $name,
                'company_profile_image'              => $img,
                'branch_created_date'       => date('Y-m-d'),
                'branch_created_by'         => $this->Base_model->user_id()
            );
            $this->Base_model->save('branch',$data_branch);
            $branch = $this->Base_model->get_value_byQuery("select branch_id from branch where branch_name='".$name."' and branch_location='".$address."' and branch_phone='".$phone1."' limit 1","branch_id");
            if($image==""){
                        $data = array(
                        'company_profile_name'               => $name,
                        'company_profile_phone'              => $phone1,                       
                        'company_profile_address'            => $address,
                        'company_profile_image'              => $image,
                        'company_profile_email'              => $email,
                        'company_profile_branch_id'          => $branch,
						'company_profile_wifi'               =>$wifi,
						'company_profile_set_up_point'               =>$point,

                        );
            }else{
                        $data = array(
                        'company_profile_name'               => $name,
                        'company_profile_phone'              => $phone1,                   
                        'company_profile_address'            => $address,
                        'company_profile_image'              => $image,
                        'company_profile_email'              => $email,
                        'company_profile_branch_id'          => $branch,
						'company_profile_wifi'		     =>$wifi,
						'company_profile_set_up_point'               =>$point,

                        );
            }
            $this->Base_model->save('company_profile',$data);
            $this->Base_model->run_query("update company_profile set company_profile_image=replace(company_profile_image,' ','_') where company_profile_branch_id=".$branch);
            redirect("company_profile");
    } 
     
    public function edit_load(){
        $id=$this->input->post('branch_id');
        echo json_encode($this->Base_model->loadToListJoin("select * from branch where branch_id=".$id));
    }
    public function updates(){
        
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

    public function update(){
        $id=$this->input->post('txt_id');
        $img=$this->input->post('userfile');
        $name=$this->input->post('txt_company_name');
            $config = array(
            'upload_path' => './img/company',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );

            $this->load->library('upload', $config);
            $data1 = array('upload_data' => $this->upload->data());
            $image = basename( $_FILES["userfile"]["name"]); 


            if($image!=""){
                   
      
                    $img=$this->Upload->upload_img("userfile","./img/company","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
                 
                $data_branch = array(
                    'company_profile_name'               => $name,
                    'company_profile_image'             =>$img,
                    'company_profile_modified_date'      => date('Y-m-d'),
                    'company_profile_modified_by'        => $this->Base_model->user_id()
                    );
            }
            else{
                $data_branch = array(
                'company_profile_name'               => $name,
                'company_profile_modified_date'      => date('Y-m-d'),
                'company_profile_modified_by'        => $this->Base_model->user_id()
                );

            }


            
            $this->Base_model->update('company_profile','company_profile_id',$id,$data_branch);
            redirect("company_profile/index/1");
    }
        public function save_branch(){  
            $id=$this->input->post("txt_company_branch_id");
            echo $id;
            $branch_name      =   $this->input->post("txt_branch_name");
            $branch_location  =   $this->input->post("txt_branch_address");            
            $branch_phone     =   $this->input->post("txt_branch_phone");
            $branch_wifi      =   $this->input->post("txt_branch_wifi");
       
        
        if($id==""){
             $data=array(               
                'branch_name'               =>$branch_name,
                'branch_location'           =>$branch_location,                               
                'branch_phone'              =>$branch_phone,
                'branch_wifi_password'       =>$branch_wifi,
                'branch_created_by'      => $this->Base_model->user_id(),
                'branch_created_date'     =>date('Y-m-d')           
             
            );
            $this->Base_model->save('branch',$data);
        }else{
            $data=array(               
                'branch_name'               =>$branch_name,
                'branch_location'           =>$branch_location,                               
                'branch_phone'              =>$branch_phone,
                'branch_wifi_password'       =>$branch_wifi,
                'branch_modified_by'      => $this->Base_model->user_id(),
                'branch_modified_date'     =>date('Y-m-d')           
             
            );
            $this->Base_model->update('branch','branch_id',$id,$data);
        }
        
        redirect('company_profile');
        
    }
}
