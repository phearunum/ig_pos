<?php
class Group_position extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");        
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "group_position/group_position_list";
              
        $data['record_positions']=$this->Base_model->get_data("v_position");
              
        //permission data
        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('button',$lang=='' ? 'en':$lang);    
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $this->lang->load('group_position',$lang=='' ? 'en':$lang);

             $data['lbl_recorder']    =$this->lang->line('lb_recorder');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_no']          =$this->lang->line('lb_no');
             $data['lbl_action']          =$this->lang->line('lb_action');
             $data['lbl_position_title']         =$this->lang->line('list_name');
             $data['lbl_position_name']          =$this->lang->line('group_name');
             $data['lbl_position_desc']          =$this->lang->line('lb_desc');
             $data['lbl_position_date_entry']    =$this->lang->line('lb_create_date');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
        
    }
     public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_position where status=1");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "group_position/frm_group_position";
        
        //BEGIN TRANSLATE     
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('group_position',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);

         $data['btn_create']      =$this->lang->line('btn_create');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

         $data['lbl_position_title']         =$this->lang->line('addnew_name');
         $data['lbl_position_name']          =$this->lang->line('group_name');
         $data['lbl_position_desc']          =$this->lang->line('lb_desc');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "group_position/frm_group_position_update";
        
        $id=$this->uri->segment(3);
        $data['record_positions']=$this->Base_model->get_field("v_position","position_id",$id);
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('group_position',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);

         $data['btn_update']      =$this->lang->line('btn_update');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

         $data['lbl_position_title']         =$this->lang->line('addnew_name');
         $data['lbl_position_name']          =$this->lang->line('group_name');
         $data['lbl_position_desc']          =$this->lang->line('lb_desc');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function save() {
        $position      =$this->input->post("txt_position_name");
        $is_car_wash   =$this->input->post("ch_is_car_wash");
        $desc          =$this->input->post("txt_description");
        
        $data=array(
            'position_name'                  =>$position,
            'position_is_car_wash'           =>$is_car_wash,
            'position_created_date'          =>date('Y-m-d'),
            'position_created_by'            =>$this->Base_model->user_id(),
            'position_note'                  =>$desc
        );
        $group_id = $this->Base_model->save('position',$data);
        //GROUP POSITION
        $query="INSERT INTO permissions
            SELECT null,page_id,".$group_id.",page_active,0,0,0,null,null,null
            FROM page ORDER BY page_id_parent,page_ordering";
        $this->db->query($query);
        redirect('group_position');
        
    }
    public function update(){
        $id                =$this->input->post('txt_position_id');
        $position_name     =$this->input->post('txt_position_name');
        $is_car_wash       =$this->input->post("ch_is_car_wash");
        $desc              =$this->input->post('txt_description');
        
        $data=array(
            'position_name'             =>$position_name,
            'position_is_car_wash'      =>$is_car_wash,
            'position_note'             =>$desc
        );
        
        $this->Base_model->update('position','position_id',$id,$data);
        redirect('group_position');
        
    }
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->update('position','position_id',$id,array('status'=>0));
        $this->Base_model->delete_by('permissions','position_id',$id);
        redirect('group_position');
    }
    // public function updates(){
    //     $re=$this->Base_model->loadToListJoin("select position_id from position");
    //     foreach($re as $r){
    //         $query="INSERT INTO permissions
    //         SELECT null,page_id,".$group_id.",page_active,0,0,0,null,null,null
    //         FROM page ORDER BY page_id_parent,page_ordering";
    //         $this->db->query($query);
    //     }
    // }

    
}
