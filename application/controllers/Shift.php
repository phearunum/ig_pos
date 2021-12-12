<?php
class Shift extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }


    public function index(){
        $data['title'] = "SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "shift/shift_list";

        //$data['record_shift']=$this->Base_model->get_data("v_shift");

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

            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('shift',$lang=='' ? 'en':$lang);
             $data['lbl_shift_title']         =$this->lang->line('list_name');
             $data['lbl_shift_name']          =$this->lang->line('shift_name');
             $data['lbl_shift_start_time']    =$this->lang->line('start_time');
             $data['lbl_shift_end_time']      =$this->lang->line('end_time');
             $data['lbl_shift_desc']          =$this->lang->line('lb_desc');
             $data['lbl_shift_date_entry']    =$this->lang->line('lb_create_date');
             $data['lbl_recorder']    =$this->lang->line('lb_recorder');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_no']          =$this->lang->line('lb_no');

        //END TRANSLATE
        $this->load->view("welcome/view",$data);

    }
     public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_shift");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "shift/frm_shift";


        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('shift',$lang=='' ? 'en':$lang);

             $data['lbl_shift_title']         =$this->lang->line('addnew_title');
             $data['lbl_shift_name']          =$this->lang->line('shift_name');
             $data['lbl_shift_start_time']    =$this->lang->line('start_time');
             $data['lbl_shift_end_time']      =$this->lang->line('end_time');
             $data['lbl_shift_desc']          =$this->lang->line('lb_desc');
             $data['lbl_new']           =$this->lang->line('lb_new');
             $data['lbl_field']         =$this->lang->line('lb_field');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             $data['btn_create']        =$this->lang->line('btn_create');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }

    public function edit_load(){
        $data['title'] = "SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "shift/frm_shift_update";

        $id=$this->uri->segment(3);
        $data['record_shift']=$this->Base_model->get_field("v_shift","shift_id",$id);

        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('shift',$lang=='' ? 'en':$lang);

         $data['lbl_shift_title']         =$this->lang->line('addnew_title');
         $data['lbl_shift_name']          =$this->lang->line('shift_name');
         $data['lbl_shift_start_time']    =$this->lang->line('start_time');
         $data['lbl_shift_end_time']      =$this->lang->line('end_time');
         $data['lbl_shift_desc']          =$this->lang->line('lb_desc');
         $data['lbl_new']           =$this->lang->line('lb_new');
         $data['lbl_field']         =$this->lang->line('lb_field');
         $data['lbl_field_value']   =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
         $data['btn_update']        =$this->lang->line('btn_update');
         $data['btn_cancel']        =$this->lang->line('btn_cancel');
    //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }

    public function save(){

            $shift      =$this->input->post("txt_shift_name");
            $start_time =$this->input->post("txt_time_start");
            $stop_time  =$this->input->post("txt_time_stop");
            $desc       =$this->input->post("txt_description");

            $data=array(
                'shift_name'                  =>$shift,
                'shift_from'                  =>$start_time,
                'shift_until'                 =>$stop_time,
                'shift_created_date'          =>date('Y-m-d'),
                'shift_created_by'            =>$this->Base_model->user_id(),
                'shift_note'                  =>$desc
            );

        $this->Base_model->save('shift',$data);

//        $shift_id=0;
//        $getshift_id=$this->Base_model->loadToListJoin("select shift_id from shifts order by shift_id desc limit 1");
//
//        foreach($getshift_id as $g){
//            $shift_id=$g->shift_id;
//        }
//
//        $query="insert into permission(id_page,id_shift,ordering,name,active,control,class)
//                select id_parent,".$shift_id.",ordering,name_en,active,url,clazz from tblpage order by id_parent,ordering";
//        $this->db->query($query);

        redirect('shift');

    }

    public function update(){

        $id             =$this->input->post('txt_shift_id');
        $shift          =$this->input->post("txt_shift_name");
        $start_time     =$this->input->post("txt_time_start");
        $stop_time      =$this->input->post("txt_time_stop");
        $desc           =$this->input->post("txt_description");

            $data=array(
                'shift_name'                  =>$shift,
                'shift_from'                  =>$start_time,
                'shift_until'                 =>$stop_time,
                'shift_created_date'          =>date('Y-m-d'),
                'shift_created_by'            =>$this->Base_model->user_id(),
                'shift_note'                  =>$desc
            );
        $this->Base_model->update('shift','shift_id',$id,$data);
        redirect('shift');

    }

    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('shift','shift_id',$id);
        redirect('shift');
    }
}
