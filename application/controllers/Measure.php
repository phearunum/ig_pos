<?php
class Measure extends CI_Controller{
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
        $data['page'] = "measure/measure_list";
      
        $data['record_measure']=$this->Base_model->get_data("v_measure");
              
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
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $this->lang->load('measure',$lang=='' ? 'en':$lang);
             
             $data['lbl_measure_title']         =$this->lang->line('title');
             $data['lbl_measure_name']          =$this->lang->line('measure_name');
             $data['lbl_measure_desc']          =$this->lang->line('lb_desc');
             $data['lbl_measure_qty']           =$this->lang->line('measure_qty');
             $data['lbl_measure_date_entry']    =$this->lang->line('lb_create_date');
             $data['lbl_measure_recorder']      =$this->lang->line('lb_recorder');
             $data['lbl_no']         =$this->lang->line('lb_no');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_action']        =$this->lang->line('lb_action');
             
             
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
        
    }
    
	public function response(){
		$data["records"] = $this->Base_model->loadToListJoin("select *,get_employee_name(measure_created_by)as recorder from measure where status=1");
		$this->load->view("report/report_stock/response",$data);
	}
	
    public function addnew(){
        $data['title'] = "MEASURE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "measure/frm_measure";
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $this->lang->load('measure',$lang=='' ? 'en':$lang);
                
             $data['lbl_measure_title']         =$this->lang->line('add_new_title');
             $data['lbl_measure_name']          =$this->lang->line('measure_name');
             $data['lbl_measure_desc']          =$this->lang->line('lb_desc');
             $data['lbl_measure_qty']           =$this->lang->line('measure_qty');
             $data['btn_create']      =$this->lang->line('btn_create');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
             
        
        $this->load->view("welcome/view",$data);
        
    }
    
    public function edit_load(){
        
        $data['title'] = "GROUP POSITION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "measure/frm_measure_update";
        
        $id=$this->uri->segment(3);
        $data['record_measure']=$this->Base_model->get_field("v_measure","measure_id",$id);
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $this->lang->load('measure',$lang=='' ? 'en':$lang);
                
             $data['lbl_measure_title']         =$this->lang->line('title');
             $data['lbl_measure_name']          =$this->lang->line('measure_name');
             $data['lbl_measure_desc']          =$this->lang->line('lb_desc');
             $data['lbl_measure_qty']           =$this->lang->line('measure_qty');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
        
        $this->load->view("welcome/view",$data);
        
    }
    
    public function save(){
        
            $measure      =$this->input->post("txt_measure_name");
            $measure_qty  =$this->input->post("txt_measure_qty");
            $desc         =$this->input->post("txt_description");
            
            $data=array(
                'measure_name'                  =>$measure,
                'measure_qty'                   =>$measure_qty,
                'measure_created_date'          =>date('Y-m-d'),
                'measure_created_by'            =>$this->Base_model->user_id(),
                'measure_note'                  =>$desc
            );
        
        $this->Base_model->save('measure',$data);
        
    //        $measure_id=0;
    //        $getmeasure_id=$this->Base_model->loadToListJoin("select measure_id from measures order by measure_id desc limit 1");
    //
    //        foreach($getmeasure_id as $g){
    //            $measure_id=$g->measure_id;
    //        }
    //
    //        $query="insert into permission(id_page,id_measure,ordering,name,active,control,class)
    //                select id_parent,".$measure_id.",ordering,name_en,active,url,clazz from tblpage order by id_parent,ordering";
    //        $this->db->query($query);
        
        redirect('measure');
        
    }
    
    public function update(){
        
        $id                =$this->input->post('txt_measure_id');
        $measure_name      =$this->input->post('txt_measure_name');
        $measure_qty       =$this->input->post("txt_measure_qty");
        $desc              =$this->input->post('txt_description');
        
        $data=array(
            'measure_name'             =>$measure_name,
            'measure_qty'              =>$measure_qty,
            'measure_note'             =>$desc
        );
        
        $this->Base_model->update('measure','measure_id',$id,$data);
        redirect('measure');
        
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->update('measure','measure_id',$id,array('status'=>0));
        redirect('measure');
    }
    
}
