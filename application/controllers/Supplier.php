<?php

class Supplier extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "SUPPLIER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "supplier/supplier_list";
              
        $data['record_suppliers']=$this->Base_model->get_data("v_supplier");
              
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
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('supplier',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('list_title');
             $data['txt_supplier_name']     =$this->lang->line('supplier_name');
             $data['txt_supplier_phone']    =$this->lang->line('supplier_phone');
             $data['txt_address']           =$this->lang->line('supplier_address');
             $data['txt_description']       =$this->lang->line('lb_desc');
             $data['lbl_title_list']        =$this->lang->line('list_title');
             $data['lbl_recorder']          =$this->lang->line('lb_recorder');
             $data['lbl_date']              =$this->lang->line('lb_create_date');
             $data['lbl_No']                =$this->lang->line('lb_no');
         
     
            
           
             $data['lbl_new']       =$this->lang->line('lb_new');
             $data['lbl_edit']      =$this->lang->line('lb_edit');
             $data['lbl_delete']    =$this->lang->line('lb_delete');
            
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
        
    }
    public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_supplier ");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "supplier/frm_supplier";
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('supplier',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('addnew_title');
             $data['txt_supplier_name']     =$this->lang->line('supplier_name');
             $data['txt_supplier_phone']    =$this->lang->line('supplier_phone');
             $data['txt_address']           =$this->lang->line('supplier_address');
             $data['txt_description']       =$this->lang->line('lb_desc');
            
     
             
           
             $data['btn_create']         =$this->lang->line('btn_create');
             $data['btn_cancel']         =$this->lang->line('btn_cancel');
             $data['lbl_note_for_form']  =$this->lang->line('val_mess_require');
             $data['lbl_field']          =$this->lang->line('lb_field');
             $data['lbl_field_value']    =$this->lang->line('lb_field_value');
//END TRANSLATE
        
        $this->load->view("welcome/view",$data);
        
    }
    
    public function edit_load(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "supplier/frm_supplier_update";
        
        $id=$this->uri->segment(3);
        $data['record_suppliers']=$this->Base_model->get_field("v_supplier","supplier_id",$id);
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('supplier',$lang=='' ? 'en':$lang);
            
        $data['lbl_title']             =$this->lang->line('addnew_title');
        $data['txt_supplier_name']     =$this->lang->line('supplier_name');
        $data['txt_supplier_phone']    =$this->lang->line('supplier_phone');
        $data['txt_address']           =$this->lang->line('supplier_address');
        $data['txt_description']       =$this->lang->line('lb_desc');


        

        $data['btn_update']         =$this->lang->line('btn_update');
        $data['btn_cancel']         =$this->lang->line('btn_cancel');
        $data['lbl_note_for_form']  =$this->lang->line('val_mess_require');
        $data['lbl_field']          =$this->lang->line('lb_field');
        $data['lbl_field_value']    =$this->lang->line('lb_field_value');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            
            $supplier_name       =$this->input->post("txt_supplier_name");
            $supplier_phone      =$this->input->post("txt_supplier_phone");
            $supplier_address    =$this->input->post("txt_address");
            $note                =$this->input->post("txt_description");
            
            $data=array(
                'supplier_name'                  =>$supplier_name,
                'supplier_phone'                 =>$supplier_phone,
                'supplier_address'               =>$supplier_address,
                'supplier_created_date'          =>date('Y-m-d'),
                'supplier_created_by'            =>$this->Base_model->user_id(),
                'supplier_note'                  =>$note
            );
        
        $this->Base_model->save('supplier',$data);
        
        redirect('supplier');
        
    }
    public function update(){
        $id                  =$this->input->post('txt_supplier_id');
        $supplier_name       =$this->input->post("txt_supplier_name");
        $supplier_phone      =$this->input->post("txt_supplier_phone");
        $supplier_address    =$this->input->post("txt_address");
        $note                =$this->input->post("txt_description");

        $data=array(
                    'supplier_name'                  =>$supplier_name,
                    'supplier_phone'                 =>$supplier_phone,
                    'supplier_address'               =>$supplier_address,
                    'supplier_modified_date'         =>date('Y-m-d'),
                    'supplier_modified_by'           =>$this->Base_model->user_id(),
                    'supplier_note'                  =>$note
                 );
        
        $this->Base_model->update('supplier','supplier_id',$id,$data);
        redirect('supplier');
        
    }
    public function search_supplier(){
        $this->load->view("search/search");
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->run_query('update supplier set supplier_status=0,supplier_modified_by='.$this->Base_model->user_id().',supplier_modified_date='.date('Y-m-d').' where supplier_id='.$id);
        redirect('supplier');
    }
}
