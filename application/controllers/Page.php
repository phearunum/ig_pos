<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author srieng
 */
class Page extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "page/list_page";
        
        $this->load->view("welcome/view",$data);
    }
    public function addnew(){
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "page/frm_page";
        
        $data['record_page_parent']     =$this->Base_model->get_data_by("select * from page where page_active=1 and page_url='' group by page_id_parent order by page_id_parent");
        
        $this->load->view("welcome/view",$data);
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from page");
        $this->load->view("report/report_stock/response",$data);
    }
    public function save(){
        $menu_parent    =$this->input->post("cbo_menu_parent");
        $sub_menu       =$this->input->post("txt_sub_menu");
        $controller     =$this->input->post("txt_controller_name");
        
        $position_id    =$this->Base_model->get_data_by("select position_id,position_name from position");
        $page_ordering  =$this->Base_model->get_value("page","max(page_ordering)","page_id_parent",$menu_parent);
        $n              =$this->Base_model->get_count_value("position","position_id","1","1");
        #print_r($page_ordering);
        
        $p_id[]         =array();
        $count=1;
        foreach($position_id as $p){ 
            $p_id[$count]=$p->position_id; 
            $count++;
        }
        $data_page     =array(
                'page_name'             =>$sub_menu,
                'page_id_parent'        =>$menu_parent,
                'page_ordering'         =>$page_ordering,
                'page_url'              =>$controller,
                'page_active'           =>1
        );
            $this->Base_model->save("page",$data_page);
            $page_id        =$this->Base_model->get_Aggregate("page","MAX(page_id)");
        for($i=1;$i<=$n;$i++){
            $data=array(
                'permission_page_id'    =>$page_id,
                'permission_page_id_parent'    =>$menu_parent,
                'position_id'           =>$p_id[$i],
                'permission_ordering'   =>$page_ordering,
                'permission_name'       =>$sub_menu,
                'permission_enable'     =>1,
                'permission_active'     =>1,
                'permission_page_only'  =>0,
                'permission_control'    =>$controller,
                'permission_follow_by'  =>$this->session->userdata("group_id")
            ); 
            $this->Base_model->save("permission",$data);
        }
        redirect('page');
    }
    public function edit_load(){
        $data['title'] = "PAGE UPDATE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "page/frm_page_update";
        
        $id=$this->uri->segment(3);
       
        $data['record_page']=$this->Base_model->get_field("page","page_id",$id);
        
        $data['record_permission']=$this->Base_model->get_field("permission","permission_page_id",$id);
        $data['permission']=$this->Base_model->loadToListJoin("select * from permission where permission_ordering=0");
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
//                
//             $data['lbl_emp_title']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_title");
//             $data['lbl_emp_position']      =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_position");
//             $data['lbl_emp_name']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_employee_name");
//             $data['lbl_emp_sex']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_sex");
//             $data['lbl_emp_dob']           =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_dob");
//             $data['lbl_emp_shift']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_shift");
//             $data['lbl_emp_stock_name']    =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_stock_name");
//             $data['lbl_emp_phone']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_phone");
//             $data['lbl_emp_email']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_email");
//             $data['lbl_emp_salary']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_salary");
//             $data['lbl_emp_hired_date']    =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_hired_date");
//             $data['lbl_emp_address']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_address");
//             $data['lbl_emp_note']          =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_note");
//             $data['lbl_emp_is_seller']     =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_is_seller");
//             $data['lbl_emp_branch']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_branch");
//             $data['lbl_emp_title_list']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_employee","form_translate_label_name","lbl_title_list");
//             
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_new']         =$this->lang->line('lbl_new');
             $data['lbl_edit']        =$this->lang->line('lbl_edit');
             $data['lbl_field']       =$this->lang->line('lbl_field');
             $data['lbl_field_value'] =$this->lang->line('lbl_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('lbl_note_for_form');
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    public function update(){
            
            $id             =$this->input->post('txt_page_id');
            $page_name    =$this->input->post("txt_page_name");
            $controller           =$this->input->post("txt_page_controller");
            $parent_id      =$this->input->post("txt_page_parent_id");
            $ordering         =$this->input->post('txt_page_ordering');
            $enable         =$this->input->post('txt_per_enable');
            $active         =$this->input->post('txt_per_active');
            $page_record=array(
                                'page_name'               =>$page_name,
                                'page_url'                =>$controller,
                                'page_id_parent'        =>$parent_id,
                                'page_ordering'              =>$ordering,
                                'page_active'           =>$active
            );
        $data=array(
                'permission_page_id_parent'    =>$parent_id,
                'permission_ordering'   =>$ordering,
                'permission_name'       =>$page_name,
                'permission_enable'     =>$enable,
                'permission_active'     =>$active,
                'permission_control'    =>$controller,
                'permission_follow_by'  =>$this->session->userdata("group_id")
            ); 
            $this->Base_model->update("permission", "permission_page_id", $id,$data);    
        $this->Base_model->update('page','page_id',$id,$page_record);
        //END UPDATE DATA 
        redirect('page');
    }
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('page','page_id',$id);
        $this->Base_model->delete_by('permission','permission_page_id',$id);
        redirect('page');
        
    }
}
