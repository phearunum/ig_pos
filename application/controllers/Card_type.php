<?php

class Card_type extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "card_type/list_card_type";
        
        $data['record_card_type']=$this->Base_model->get_data("v_card_type");
        //permission data
        $name=$this->uri->segment(1);
       
        $getid=$this->Base_model->loadToListJoin("SELECT id FROM permission WHERE control='".$name."' AND id_group=".$this->session->userdata('group_id'));
        $id=0;
        
        foreach($getid as $g){
            $id=$g->id;
        }
        $data['card_type']=$this->Base_model->loadToListJoin("SELECT card_type_id,card_type_name FROM card_type");
        $data['permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE id=".$id);
        //end permission data
        $this->load->view("welcome/view",$data);
        
    }
    public function addnew(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "card_type/frm_card_type";
        
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "card_type/frm_card_type_update";
        
        $id=$this->uri->segment(3);
        $data['record_card_type']=$this->Base_model->get_field("v_card_type","card_type_id",$id);
        
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            $card_type  =$this->input->post("txt_card_typename");
            $desc       =$this->input->post("txt_description");
            $is_count   =$this->input->post("ch_iscard_count");
            
            $data=array(
                'card_type_name'        =>$card_type,
                'date_created'          =>date('Y-m-d'),
                'created_by'            =>$this->session->userdata('user_id'),
                'is_count'              =>$is_count,
                'card_type_description' =>$desc
            );
        
        $this->Base_model->save('card_type',$data);
        redirect('card_type');
        
    }
    
    public function update(){
        
        $id             =$this->input->post('txt_card_id');
        $card_type_name =$this->input->post('txt_card_typename');
        $desc           =$this->input->post('txt_description');
        $is_count       =$this->input->post("ch_iscard_count");
        
        $data=array(
            'card_type_name'          =>$card_type_name,
            'is_count'                =>$is_count,
            'card_type_description'   =>$desc
        );
        
        $this->Base_model->update('card_type','card_type_id',$id,$data);
        redirect('card_type');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('card_type','card_type_id',$id);
        redirect('card_type');
    }
}
