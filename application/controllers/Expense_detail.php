<?php
class Expense_detail extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        date_default_timezone_set("Asia/Phnom_Penh");
        $this->Base_model->check_loged_in();
    }
	
    public function index() {
        $data['title'] = "EXPENSE DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/expense_detail_list";

        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
	
        $data['record_expense_detail'] = $this->Base_model->get_data("v_expense_detail");
        
         // TRANSLATED BY SOPHANITH
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('expense',$lang=='' ? 'en':$lang);

             $data['lbl_title']              =$this->lang->line('expense_detail_list_name');
             $data['txt_expense']            =$this->lang->line('expense_name');
             $data['txt_recorder']           =$this->lang->line('lb_recorder');
             $data['txt_description']        =$this->lang->line('lb_desc');
             $data['txt_date']               =$this->lang->line('lb_create_date');
             $data['txt_expense_cart_no']    =$this->lang->line('expense_detail_chart_no');
             $data['txt_modi_date']          =$this->lang->line('lb_modified_date');
             $data['txt_modi_by']            =$this->lang->line('lb_modifier');
             $data['txt_expense_type']       =$this->lang->line('expense_type');
             
            
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['lbl_new']               =$this->lang->line('lb_new');
             $data['lbl_edit']              =$this->lang->line('lb_edit');
             $data['lbl_delete']            =$this->lang->line('lb_delete');
             $data['lbl_action']            =$this->lang->line('lb_action');
        //END TRAN SLATED
             
        $this->load->view("welcome/view", $data);
        
    }
    public function edit_load($id){
        $data['title'] = "EXPENSE DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/frm_expense_detail_update";
        $data['record_expense_type'] = $this->Base_model->get_data("v_expense_type");
        $data['record_expense_detail'] = $this->Base_model->get_data_by("select * from v_expense_detail where expense_detail_id=".$id);
        
        // TRANSLATED BY SOPHANITH
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('expense',$lang=='' ? 'en':$lang);
            
         $data['lbl_title']              =$this->lang->line('expense_detail_list_name');
         $data['txt_expense']            =$this->lang->line('expense_name');
         $data['txt_expense_cart_no']    =$this->lang->line('expense_detail_chart_no');
         $data['txt_expense_type']       =$this->lang->line('expense_type');
         
       
         $data['btn_cancel']            =$this->lang->line('btn_cancel');
         $data['btn_update']            =$this->lang->line('btn_update');
         $data['lbl_note_for_form']     =$this->lang->line('val_mess_require');
         $data['lbl_field']             =$this->lang->line('lb_field');
         $data['lbl_field_value']       =$this->lang->line('lb_field_value');
        //END TRAN SLATED
        $this->load->view("welcome/view", $data);
    }
    public function update(){
        $expense_detail_id=$this->input->post("txt_expense_detail_id");
        $expense_type_id = $this->input->post("cbo_expense_name");
        $expense_chart_no = $this->input->post("txt_expense_chart_no");
        $expense_detail_name = $this->input->post("txt_expense_detail_name");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        
        $data = array(
            'expense_type_id'       => $expense_type_id,
            'expense_detail_name'   => $expense_detail_name,
            'expense_chart_number'  => $expense_chart_no,
            'expense_detail_modified_date'  => $date->format('Y-m-d h:i:s'),
            'expense_detail_modified_by'    => $this->Base_model->user_id()
        );

        $this->Base_model->update("expense_detail","expense_detail_id",$expense_detail_id, $data);
        redirect("expense_detail");
        
    }
    public function addnew() {
        $data['title'] = "EXPENSE DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/frm_expense_detail";
        //$data['record_item_detail']=$this->Base_model->get_data("v_item_detail");
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
        $data['record_expense_name'] = $this->Base_model->get_data("v_expense_type");

        // TRANSLATED BY SOPHANITH
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('expense',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('expense_detail_list_name');
             $data['txt_expense']            =$this->lang->line('expense_name');
             $data['txt_expense_cart_no']    =$this->lang->line('expense_detail_chart_no');
             $data['txt_expense_type']       =$this->lang->line('expense_type');
             
           
             $data['btn_cancel']            =$this->lang->line('btn_cancel');
             $data['btn_create']            =$this->lang->line('btn_create');
             $data['lbl_note_for_form']     =$this->lang->line('val_mess_require');
             $data['lbl_field']             =$this->lang->line('lb_field');
             $data['lbl_field_value']       =$this->lang->line('lb_field_value');
        //END TRAN SLATED
        $this->load->view("welcome/view", $data);
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_expense_detail where expense_detail_status=1");
        
        
        $this->load->view("report/report_stock/response",$data);
    }
    public function save() {
        $expense_type_id = $this->input->post("cbo_expense_name");
        $expense_chart_no = $this->input->post("txt_expense_chart_no");
        $expense_detail_name = $this->input->post("txt_expense_detail_name");

        if($this->Base_model->get_data_by("SELECT expense_chart_number FROM expense_detail WHERE expense_chart_number='".$expense_chart_no."'")){
                
                $this->session->set_flashdata('error', '<span style="color:#D71A21">Existing item!</span>');
                redirect("expense_detail/addnew");
        }
        
        $data = array(
            'expense_type_id'       => $expense_type_id,
            'expense_detail_name'   => $expense_detail_name,
            'expense_chart_number'  => $expense_chart_no,
            'expense_detail_created_date'  => date("Y-m-d H:i:s"),
            'expense_detail_modified_date' => date("Y-m-d H:i:s"),
            'expense_detail_created_by'    => $this->Base_model->user_id()
        );

        $this->Base_model->save("expense_detail", $data);
        redirect("expense_detail");
    }
    
    public function delete($id){
        $this->Base_model->update("expense_detail","expense_detail_id",$id,array('expense_detail_status'=>0));
        redirect('expense_detail');
    }
}
