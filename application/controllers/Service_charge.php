<?php
class Service_charge extends CI_Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    } 
     
    public function index(){
        
        $data['title'] = "SERVICE CHARGE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "service_charge/frm_service_charge";
        
        $data['record_service_charge']=$this->Base_model->get_data("service_charge"); 
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
       
       //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('service_charge',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $data['lbl_service_title']         =$this->lang->line('title');
             $data['lbl_service_charge']        =$this->lang->line('service_name');
             $data['lbl_service_desc']          =$this->lang->line('lb_desc');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRANSLATE
            
        $this->load->view("welcome/view",$data);
    }
    public function update(){
        
        $id                   =$this->input->post('txt_service_charge_id');
        $service_amount       =$this->input->post('txt_service_charge_amount');
        $desc                 =$this->input->post('txt_description');        
        
        $data=array(    
            'service_amount'            =>$service_amount,           
            'service_des'               =>$desc
        );
        $this->Base_model->update('service_charge','service_id',$id,$data);        
        redirect('service_charge');
    }
}
