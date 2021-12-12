<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of measure
 *
 * @author hpt-srieng
 */

class Point extends CI_Controller{
    
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        
        $data['title'] = "MEASURE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "point/point_list";
              
        $data['record_measure']=$this->Base_model->loadToListJoin("select * from v_point where employee_brand_id = ".$this->session->userdata('branch_id'));
              
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
            
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
        $this->load->view("welcome/view",$data);
        
    }
    public function addnew(){
        $data['title'] = "MEASURE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "point/frm_point";
        
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "point/frm_point_update";
        
        $id=$this->uri->segment(3);
        $data['record_measure']=$this->Base_model->get_field("point","id",$id);
        
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            $id=$this->input->post('txtId');
            $point=$this->input->post('txtPoint');
            $from=$this->input->post('txtFrom');
            $to=$this->input->post('txtTo');
            $desc=$this->input->post('txtDesc');
            
        $data=array(
            'point'=>$point,
            'froms'=>$from,
            'tos'=>$to,
            'date_created' => date('Y-m-d'),
            'created_by'   => $this->session->userdata('user_id'),
            'desc'=>$desc
        );        
        $this->Base_model->save('point',$data);
   
        redirect('point');
        
    }
    
    public function update(){
            $id=$this->input->post('txtId');
            $point=$this->input->post('txtPoint');
            $from=$this->input->post('txtFrom');
            $to=$this->input->post('txtTo');
            $desc=$this->input->post('txtDesc');
            
        $data=array(
            'point'=>$point,
            'froms'=>$from,
            'tos'=>$to,
            'date_created' => date('Y-m-d'),
            'created_by'   => $this->session->userdata('user_id'),
            'desc'=>$desc
        );        
        
        $this->Base_model->update('point','id',$id,$data);
        redirect('point');
        
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('point','id',$id);
        redirect('point');
    }
}
