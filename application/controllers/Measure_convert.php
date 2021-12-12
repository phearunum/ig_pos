<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of measure_convert_convert
 *
 * @author hpt-srieng
 */
class Measure_convert extends CI_Controller{
    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "MEASURE_CONVERT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "measure_convert/measure_convert_list";
              
        $data['record_measure_convert']=$this->Base_model->get_data("v_measure_convert");
              
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
        $data['title'] = "MEASURE_CONVERT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "measure_convert/frm_measure_convert";
        
        $data['record_measure']=$this->Base_model->get_data("measure");
        
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "measure_convert/frm_measure_convert_update";
        
        $id=$this->uri->segment(3);
        $data['record_measure_convert']=$this->Base_model->get_field("v_measure_convert","measure_convert_id",$id);
        $data['record_measure']=$this->Base_model->get_data("measure");
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            $measure_id                =$this->input->post("cbo_measure");
            $measure_convert_name      =$this->input->post("txt_measure_convert_name");
            $qty                       =$this->input->post("txt_measure_convert_qty");
            $desc                      =$this->input->post("txt_description");
            
            $data=array(
                'measure_id'                            =>$measure_id,
                'measure_convert_name'                  =>$measure_convert_name,
                'measure_convert_qty'                   =>$qty,
                'measure_convert_created_date'          =>date('Y-m-d'),
                'measure_convert_created_by'            =>$this->session->userdata('user_id'),
                'measure_convert_note'                  =>$desc
            );
        
        $this->Base_model->save('measure_convert',$data);
        
        
        
//        $measure_convert_id=0;
//        $getmeasure_convert_id=$this->Base_model->loadToListJoin("select measure_convert_id from measure_converts order by measure_convert_id desc limit 1");
//
//        foreach($getmeasure_convert_id as $g){
//            $measure_convert_id=$g->measure_convert_id;
//        }
//
//        $query="insert into permission(id_page,id_measure_convert,ordering,name,active,control,class)
//                select id_parent,".$measure_convert_id.",ordering,name_en,active,url,clazz from tblpage order by id_parent,ordering";
//        $this->db->query($query);
        
        redirect('measure_convert');
        
    }
    
    public function update(){
        
            $id                        =$this->input->post('txt_measure_convert_id');
            $measure_id                =$this->input->post("cbo_measure");
            $measure_convert_name      =$this->input->post("txt_measure_convert_name");
            $qty                       =$this->input->post("txt_measure_convert_qty");
            $desc                      =$this->input->post("txt_description");
            
            $data=array(
                'measure_id'                            =>$measure_id,
                'measure_convert_name'                  =>$measure_convert_name,
                'measure_convert_qty'                   =>$qty,
                'measure_convert_created_date'          =>date('Y-m-d'),
                'measure_convert_created_by'            =>$this->session->userdata('user_id'),
                'measure_convert_note'                  =>$desc
            );
        
        
        $this->Base_model->update('measure_convert','measure_convert_id',$id,$data);
        redirect('measure_convert');
        
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('measure_convert','measure_convert_id',$id);
        redirect('measure_convert');
    }
    
}
