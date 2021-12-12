<?php

class Vat extends CI_Controller{
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
        $data['page'] = "tax/frm_tax_update";
        
        $data['record_tax']=$this->Base_model->get_data("tax"); 
        //permission data
            $name=$this->uri->segment(1);
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            // $id=0;

            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
            
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
                
             
             
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $this->lang->load('vat',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             
              $this->lang->load('button',$lang=='' ? 'en':$lang);
              $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $data['lbl_vat_title']   =$this->lang->line('title');
             $data['lbl_vat_vat']     =$this->lang->line('vat');
             $data['lbl_vat_desc']    =$this->lang->line('lb_desc');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

             $data['btn_update']      =$this->lang->line('btn_update');
      
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             
        //END TRAN SLATE
        
        $this->load->view("welcome/view",$data);
    }
    
    public function update(){
        
        $id                   =$this->input->post('txt_tax_id');
        $tax_amount           =$this->input->post('txt_tax_amount');
        $desc                 =$this->input->post('txt_description');        
        
        $data=array(    
            'tax_amount'            =>$tax_amount,           
            'tax_des'               =>$desc,
            'tax_modified_date'     =>date('Y-m-d'),
            'tax_modified_by'       =>$this->Base_model->user_id()
        );
        
        $this->Base_model->update('tax','tax_id',$id,$data);        
        redirect('vat');
    }
    
}
