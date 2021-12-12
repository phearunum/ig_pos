<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pump
 *
 * @author hpt-srieng
 */
class pump extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "PUMP";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "pump/pump_list";
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
        $data['record_pump']=$this->Base_model->loadToListJoin("SELECT * FROM v_pump");
        $this->load->view("welcome/view",$data);
    }
    public function addnew(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "pump/frm_pump";
        
        $data['record_branch']=$this->Base_model->loadToListJoin("SELECT branch_id,branch_name FROM branch");
        
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "pump/frm_pump_update";
        
        $id=$this->uri->segment(3);
        $data['record_pump']=$this->Base_model->get_field("v_pump","pump_id",$id);
        $data['record_branch']=$this->Base_model->loadToListJoin("SELECT branch_id,branch_name FROM branch");
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            
            $branch     =$this->input->post("cbo_branch");
            $pump_name  =$this->input->post("txt_pump_name");
            $desc       =$this->input->post("txt_description");
            
            $data=array(
                'pump_branch_id'        =>$branch,
                'pump_created_date'     =>date('Y-m-d'),
                'pump_created_by'       =>$this->session->userdata('user_id'),
                'pump_name'             =>$pump_name,
                'pump_note'             =>$desc
            );
        
        $this->Base_model->save('pump',$data);
        redirect('pump');
            
    }
    
    public function update(){
        
            $id         =$this->input->post('txt_pump_id');
            $branch     =$this->input->post("cbo_branch");
            $pump_name  =$this->input->post("txt_pump_name");
            $desc       =$this->input->post("txt_description");
            
            $data=array(
                'pump_branch_id'        =>$branch,
                'pump_modified_date'    =>date('Y-m-d'),
                'pump_modified_by'      =>$this->session->userdata('user_id'),
                'pump_name'             =>$pump_name,
                'pump_note'             =>$desc
            );
        
        $this->Base_model->update('pump','pump_id',$id,$data);
        redirect('pump');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('pump','pump_id',$id);
        redirect('pump');
    }
}
