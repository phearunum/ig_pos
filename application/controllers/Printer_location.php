<?php
class Printer_location extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "LIST PRINTER LOCATION";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "printer/list_printer_location";  
        
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
        //$data['record_printer_location']=$this->Base_model->get_data("printer_location");

        $lang = $this->input->cookie('language');
         $this->lang->load('printer_location',$lang=='' ? 'en':$lang);
         $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $data['lbl_list_title']        =$this->lang->line('list_title');
        $data['lbl_is_counter']        =$this->lang->line('list_is_counter');
        $data['lbl_is_close_shift']    =$this->lang->line('list_is_close_shift');
        $data['lbl_description']       =$this->lang->line('lb_desc');
        $data['lbl_printer_name']      =$this->lang->line('list_printer_name');
        $data['lbl_created_date']      =$this->lang->line('lb_create_date');
        $data['lbl_action']            =$this->lang->line('lb_action');
        
        $data['lbl_edit']      =$this->lang->line('lb_edit');
        $data['lbl_delete']    =$this->lang->line('lb_delete');
        $data['lbl_new']       =$this->lang->line('lb_new');
        $data['btn_no']        =$this->lang->line('lb_no');
        $this->load->view("welcome/view",$data);
    }
    public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM printer_location where status=1");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew(){
        $data['title'] = "PRINTER LOCATION (New)";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "printer/frm_printer_location";  

        $user_id=$this->Base_model->user_id();        
        $is_super_user=$this->Base_model->is_supper_user();
        $q_branch="";
        if($is_super_user!=true){
            $user_branch=$this->Base_model->get_value_sql("SELECT e.employee_brand_id AS branch_id FROM employee e WHERE status=1 AND e.employee_id=$user_id","branch_id");
            $q_branch=" AND b.branch_id=$user_branch ";
        }

        $data['branch']  =$this->Base_model->loadToListJoin("SELECT * FROM branch b WHERE b.branch_status=1 $q_branch ");


        $data['rd_printer']  =$this->Base_model->loadToListJoin("SELECT printer_id,printer_name FROM printer ");
        
          //BEGIN TRANSLATE REWRITE BY SRIENG
             $lang = $this->input->cookie('language');
             $this->lang->load('printer_location',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $data['printer_option']            =$this->lang->line('printer_option');
             $data['lbl_title']             =$this->lang->line('update_title');
             $data['lbl_is_counter']        =$this->lang->line('list_is_counter');
             $data['lbl_is_close_shift']        =$this->lang->line('list_is_close_shift');
             $data['lbl_description']       =$this->lang->line('lb_desc');
             $data['lbl_printer_name']      =$this->lang->line('list_printer_name');
             $data['lbl_created_date']      =$this->lang->line('lb_create_date');
             $data['lbl_printer']      =$this->lang->line('lbl_printer');
             
             $data['btn_create']        =$this->lang->line('btn_update');
             $data['lbl_field']         =$this->lang->line('lb_field');
              $data['lbl_printer_kitchent_ip']         =$this->lang->line('lbl_printer_kitchent_ip');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             
          //END TRAN SLATE
          
        $this->load->view("welcome/view",$data);
       }
    
        public function edit_load(){
        
        $data['title'] = "PRINTER LOCATION (Update)";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "printer/frm_printer_location_update";
        
        $id=$this->uri->segment(3);
        $data['record_printer_location']=$this->Base_model->get_field("printer_location","printer_location_id",$id);


       $data['rd_printer']  =$this->Base_model->loadToListJoin("SELECT printer_id,printer_name FROM printer");

       $data['printer_id']  =$this->Base_model->get_value_sql("SELECT * FROM printer p WHERE p.printer_location_id=$id","printer_id");
       $data['printer_ip']  =$this->Base_model->get_value_sql("SELECT * FROM printer p WHERE p.printer_location_id=$id","printer_print_kitchen");
        
        
        //BEGIN TRANSLATE REWRITE BY SRIENG
             $lang = $this->input->cookie('language');
             $this->lang->load('printer_location',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $data['printer_option']            =$this->lang->line('printer_option');
             $data['lbl_title']             =$this->lang->line('update_title');
             $data['lbl_is_counter']        =$this->lang->line('list_is_counter');
             $data['lbl_is_close_shift']        =$this->lang->line('list_is_close_shift');
             $data['lbl_description']       =$this->lang->line('lb_desc');
             $data['lbl_printer_name']      =$this->lang->line('list_printer_name');
             $data['lbl_created_date']      =$this->lang->line('lb_create_date');
             $data['lbl_printer']      =$this->lang->line('lbl_printer');
             
             $data['btn_update']        =$this->lang->line('btn_update');
             $data['lbl_field']         =$this->lang->line('lb_field');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             $data['lbl_printer_kitchent_ip']         =$this->lang->line('lbl_printer_kitchent_ip');
            
             
             
          //END TRAN SLATE
        
        $this->load->view("welcome/view",$data);
    }
    
        public function save(){
            ///////For save to printer location: 
            $printer_location      =   $this->input->post("txt_print_location_name");
            $is_counter            =   $this->input->post("ch_is_counter");
            $is_shift              =   $this->input->post("ch_is_shift");
            $desc                  =   $this->input->post("txt_description");
            $com_printer           =   $this->input->post("com_printer");
            
            $data=array(
                    'printer_location_name'             =>$printer_location,
                    'printer_location_is_counter'       =>$is_counter,
                    'printer_location_created_date'     =>date('Y-m-d'),
                    'printer_location_created_by'       =>$this->Base_model->user_id(),                
                    'printer_location_desc'              =>$desc,
                // 'printer_location_is_shift'         =>$is_shift
            );
            
           $id_printer  = $this->Base_model->save('printer_location',$data);


        /////After save this record must be update prnter by id of printer for printer: 
            $printer_kitchen_id                  =   $this->input->post("txt_id_ip_kitchen");
            $printer_kitchen_ip                  =   $this->input->post("txt_print_ip_kitchen");
            $data = array(
                  'printer_print_kitchen' =>$printer_kitchen_ip,
                  'printer_location_id' =>$id_printer, 
            );

            $this->Base_model->update('printer','printer_id',$printer_kitchen_id,$data);
            redirect('printer_location');
        
    }
    
    public function update(){
        /////Go to update printer location : 
        
        $id                     = $this->input->post('txt_location_id');
        $printer_location_name  = $this->input->post('txt_print_location_name');
        $is_counter             = $this->input->post("ch_is_counter");
        $desc                   = $this->input->post('txt_description'); 
        $is_close_shift         =  $this->input->post('ch_is_shift'); 
        
        $data=array(
            'printer_location_name'              =>$printer_location_name,
            'printer_location_is_counter'        =>$is_counter,
            'printer_location_desc'              =>$desc,
            'printer_location_created_date'      =>date('Y-m-d'),
            'printer_location_created_by'        =>$this->Base_model->user_id(),
            //'printer_location_is_shift'          =>$is_close_shift
        );
        
        $this->Base_model->update('printer_location','printer_location_id',$id,$data); 
        /////Alter to update printer location must be to update some field in table printer: 
        $printer_kitchen_id                  =   $this->input->post("txt_id_ip_kitchen");
        $printer_kitchen_ip                  =   $this->input->post("txt_print_ip_kitchen");
        $data = array(
                  'printer_print_kitchen' =>$printer_kitchen_ip,
                  'printer_location_id'   =>$id, 
            );
        $this->Base_model->update('printer','printer_id',$id,$data); 
        redirect('printer_location');

    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('printer_location','printer_location_id',$id);
        redirect('printer_location');
    }

    public  function find_printer_by_id($id){
            $id  = $id;
            $find_field_by_id  = $this->Base_model->loadToListJoin("SELECT printer_id,printer_name,printer_print_kitchen  
                FROM printer p WHERE printer_id =$id");
            echo  json_encode($find_field_by_id);
    }


}
