<?php
class Item_note extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "ITEM NOTE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_note/list_item_note";
        
        $data['record_item_note']=$this->Base_model->get_data("item_note");
        
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

            $this->lang->load('item_note',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']         =$this->lang->line('list_name');
             $data['lbl_item_name']     =$this->lang->line('item_note');
             $data['lbl_item_price']    =$this->lang->line('price');
             $data['lbl_note']          =$this->lang->line('lb_note');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
     
//END TRANSLATE
             
        $this->load->view("welcome/view",$data);
        
    }
    
    public function addnew(){
        $data['title'] = "ITEM NOTE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_note/frm_item_note";
        
         //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_note',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']                 =$this->lang->line('add_new_name');
             $data['lbl_item_note_name']        =$this->lang->line('item_note');
             $data['lbl_item_note_price']       =$this->lang->line('price');
             $data['lbl_description']           =$this->lang->line('lb_desc');
         
     
            
             
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_create']      =$this->lang->line('btn_create');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']      =$this->lang->line('lb_field');
             $data['lbl_field_value']      =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form']      =$this->lang->line('val_mess_require');

//END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        
        $data['title'] = "ITEM NOTE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_note/frm_item_note_update";
        
        $id=$this->uri->segment(3);
        
        $data['record_item_note']=$this->Base_model->get_field("item_note","item_note_id",$id);
        
            //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_note',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']                 =$this->lang->line('add_new_name');
             $data['lbl_item_note_name']        =$this->lang->line('item_note');
             $data['lbl_item_note_price']       =$this->lang->line('price');
             $data['lbl_description']           =$this->lang->line('lb_desc');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_create']      =$this->lang->line('btn_create');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']      =$this->lang->line('lb_field');
             $data['lbl_field_value']      =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form']      =$this->lang->line('val_mess_require');

//END TRANSLATE
        
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            
            $item_note        =   $this->input->post("txt_item_note_name");
            $item_note_price  =   $this->input->post("txt_item_note_price");
            $desc             =   $this->input->post("txt_description");
            
            $data=array(
                'item_note_name'             =>$item_note,
                'item_note_price'            =>$item_note_price,
                'item_note_created_date'     =>date('Y-m-d'),
                'item_note_created_by'       =>$this->Base_model->user_id(),
                'item_note_branch_id'        =>$this->Base_model->branch_id(),
                'item_note_des'              =>$desc
            );
            
        $this->Base_model->save('item_note',$data);
        redirect('item_note');
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from item_note where item_note_status=1 ");
        $this->load->view("report/report_stock/response",$data);
    }
    public function update(){
        $id                   =$this->input->post('txt_item_note_id');
        $item_note_name       =$this->input->post('txt_item_note_name');
        $item_note_price      =$this->input->post("txt_item_note_price");
        $desc                 =$this->input->post('txt_description');        
        
        $data=array(
            'item_note_name'              =>$item_note_name,
            'item_note_price'             =>$item_note_price,
            'item_note_des'               =>$desc,
            'item_note_modified_date'     =>date('Y-m-d'),
            'item_note_branch_id'         =>$this->Base_model->branch_id(),
            'item_note_modified_by'       =>$this->Base_model->user_id()
        );
        
        $this->Base_model->update('item_note','item_note_id',$id,$data);        
        redirect('item_note');
    }
  


    public function delete(){
        $id=$this->uri->segment(3);
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        $this->Base_model->run_query('update item_note set item_note_status=0,item_note_modified_by='.$this->Base_model->user_id().',item_note_modified_date="'.$date.'" where item_note_id='.$id);
        redirect('item_note');
    }
}
