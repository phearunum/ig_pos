<?php
class Stock_location extends CI_Controller{
    
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "STOCK LOCATION";
        $data['header'] = "template/header";
        //$data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock_location/stock_location_list";
        
        //permission data
        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('stock_location',$lang=='' ? 'en':$lang);
        $data['lbl_title']=$this->lang->line('list_name');
        $data['lb_stock_location_name']=$this->lang->line('stock_name');
        $data['lb_branch_name']=$this->lang->line('branch_name');
        $data['lb_no']=$this->lang->line('lb_no');
        $data['lb_new']=$this->lang->line('lb_new');
        $data['lb_edit']=$this->lang->line('lb_edit');
        $data['lbl_action']=$this->lang->line('lb_action');
        $data['lb_recorder']=$this->lang->line('lb_recorder');
        $data['lb_create_date']=$this->lang->line('lb_create_date');
        $data['list_name']=$this->lang->line('list_name');
        $this->load->view("welcome/view",$data);
    }
    public function response() {
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_stock_location where status=1 $branch");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock_location/frm_stock_location";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['record_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('stock_location',$lang=='' ? 'en':$lang);
        $data['lb_stock_location_name']=$this->lang->line('stock_name');
        $data['lb_branch_name']=$this->lang->line('branch_name');
        $data['lb_desc']        =$this->lang->line('lb_desc');
        $data['lb_require']        =$this->lang->line('val_mess_require');
        $data['lb_addnew_title']        =$this->lang->line('addnew_name');
        $data['btn_create']      =$this->lang->line('btn_create');
        $data['btn_cancel']      =$this->lang->line('btn_cancel');
        $data['lbl_field']       =$this->lang->line('lb_field');
        $data['lbl_field_value'] =$this->lang->line('lb_field_value');
        $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_load(){
        $data['title23'] = "STOCK LOCATION ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock_location/frm_stock_location_update";
        


        $id=$this->uri->segment(3);
        $data['record_stock_location']=$this->Base_model->get_field("v_stock_location","stock_location_id",$id);
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['record_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('stock_location',$lang=='' ? 'en':$lang);
        $data['lb_stock_location_name']=$this->lang->line('stock_name');
        $data['lb_branch_name']=$this->lang->line('branch_name');
        $data['lb_desc']        =$this->lang->line('lb_desc');
        $data['lb_require']        =$this->lang->line('val_mess_require');
        $data['lb_addnew_title']  =$this->lang->line('addnew_nameererer');
        $data['btn_update_new_data']      =$this->lang->line('btn_update');
        $data['btn_cancel']      =$this->lang->line('btn_cancel');
        $data['lbl_field']       =$this->lang->line('lb_field');
        $data['lbl_field_value'] =$this->lang->line('lb_field_value');
        $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');

        
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            
            $branch               =$this->input->post("cbo_branch");
            $stock_location_name  =$this->input->post("txt_stock_location_name");
            $desc                 =$this->input->post("txt_description");
            
            $data=array(
                'stock_location_branch_id'        =>$branch,
                'stock_location_created_date'     =>date('Y-m-d'),
                'stock_location_created_by'       =>$this->Base_model->user_id(),
                'stock_location_name'             =>$stock_location_name,
                'stock_location_note'             =>$desc
            );
            
        $this->Base_model->save('stock_location',$data);
        redirect('stock_location');
            
    }
    
    public function update(){
        
            $id         =$this->input->post('txt_stock_location_id');
            $branch     =$this->input->post("cbo_branch");
            $stock_location_name  =$this->input->post("txt_stock_location_name");
            $desc       =$this->input->post("txt_description");
            
            $data=array(
                'stock_location_branch_id'        =>$branch,
                'stock_location_modified_date'    =>date('Y-m-d'),
                'stock_location_modified_by'      =>$this->Base_model->user_id(),
                'stock_location_name'             =>$stock_location_name,
                'stock_location_note'             =>$desc
            );
        
        $this->Base_model->update('stock_location','stock_location_id',$id,$data);
        redirect('stock_location');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->update('stock_location','stock_location_id',$id,array('status'=>0));
        redirect('stock_location');
    }
}
