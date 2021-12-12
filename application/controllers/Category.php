<?php


class category extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "Main Category";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "category/list_category";        
        
        //
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
           
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('category',$lang=='' ? 'en':$lang);
         
         $data['lbl_title']         =$this->lang->line('list_category');
         $data['lbl_category_name']      =$this->lang->line('category_name');
         $data['lbl_description']   =$this->lang->line('lb_desc');
         $data['lbl_create_date']   =$this->lang->line('lb_create_date');
         $data['lbl_create_by']     =$this->lang->line('lb_recorder');
         $data['lbl_edit']      =$this->lang->line('lb_edit');
         $data['btn_no']        =$this->lang->line('lb_no');
         $data['lbl_delete']    =$this->lang->line('lb_delete');
         $data['lbl_new']       =$this->lang->line('lb_new');
         //end translate
             
        $this->load->view("welcome/view",$data);        
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_category");
        $this->load->view("report/report_stock/response",$data);
    }
    public function addnew(){
        $data['title']  = "Main Category";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "category/frm_category";
        
       //BEGIN TRANSLATE
       $lang = $this->input->cookie('language');
       $this->lang->load('button',$lang=='' ? 'en':$lang);
       $this->lang->load('validation',$lang=='' ? 'en':$lang);
       $this->lang->load('lable',$lang=='' ? 'en':$lang);
       $this->lang->load('category',$lang=='' ? 'en':$lang);
          
       $data['lbl_addnew_title']         =$this->lang->line('addnew_title');
       $data['lbl_category_name']          =$this->lang->line('category_name');
       $data['lbl_category_desc']          =$this->lang->line('lb_desc');

       $data['btn_create']      =$this->lang->line('btn_create');
       $data['btn_cancel']      =$this->lang->line('btn_cancel');
       $data['lbl_field']       =$this->lang->line('lb_field');
       $data['lbl_field_value'] =$this->lang->line('lb_field_value');
       $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
      //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        
        $data['title']  = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "category/frm_category_update";
        $id=$this->uri->segment(3);        
        $data['record_category']=$this->Base_model->get_field("category","category_id",$id);
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('category',$lang=='' ? 'en':$lang);
        
        $data['lbl_addnew_title']         =$this->lang->line('addnew_title');
        $data['lbl_category_name']          =$this->lang->line('category_name');
        $data['lbl_category_desc']          =$this->lang->line('lb_desc');

        $data['btn_update']      =$this->lang->line('btn_update');
        $data['btn_cancel']      =$this->lang->line('btn_cancel');
        $data['lbl_field']       =$this->lang->line('lb_field');
        $data['lbl_field_value'] =$this->lang->line('lb_field_value');
        $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            
            $item_name           =   $this->input->post("txt_category_name");      
            $desc                =   $this->input->post("txt_description");
            
//            if($this->Base_model->get_data_by("SELECT item_detail_part_number FROM item_detail WHERE item_detail_part_number='".$partnumber."'")){
//                
//                $this->session->set_flashdata('error', '<span style="color:#D71A21">Existing item!</span>');
//                redirect("item_detail/addnew");
//            }
            
            //=======upload photo========
             
            //end do upload
            
            $data=array(
                'category_name'                  =>$item_name,
                'category_description'                   =>$desc,
                'category_created_by'            =>$this->Base_model->user_id(),
                'category_created_date'          =>date('Y-m-d')
            );
          
        $this->Base_model->save('category',$data);
        redirect('category');        
    }
    
    public function update(){            
            $id                  =   $this->input->post("txt_id");
            $item_name           =   $this->input->post("txt_name");         
            $desc                =   $this->input->post("txt_description");
             
                        $data=array(
                                        'category_name'                  =>$item_name,
                                        'category_description'                   =>$desc,
                                        'category_modified_by'           =>$this->Base_model->user_id(),
                                        'category_modified_date'         =>date('Y-m-d')
                            );
        $this->Base_model->update('category','category_id',$id,$data);
        redirect('category');
        
    }
    
    public function delete(){
        
        $id=$this->uri->segment(3);
       // $img=$this->uri->segment(4);
        
        $this->Base_model->delete_by('category','category_id',$id);
        //unlink("./img/products/".$img);
        
        redirect('category');
    }
}
