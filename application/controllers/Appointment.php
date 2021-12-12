<?php

class Appointment extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        $data['title'] = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "appointment/list_appointment"; 
        $data['date']= date('Y-m-d');
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
        $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
         $data['record_data']=$this->Base_model->loadToListJoin("select * from v_next_repair where app_date_action = CURDATE()");
         
        $this->load->view("welcome/view",$data);        
    }  
    public function addnew(){
        $data['title'] = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "appointment/frm_appointment";        
        $data['customer_name']= $this->Base_model->get_data("customer");
    
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        
        $data['title'] = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "appointment/frm_appointment_update";
        $id=$this->uri->segment(3);        
                              
        $data['record_data']=$this->Base_model->get_field("v_next_repair","app_id",$id);
       
        
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            
            $customer_name          =   $this->input->post("txtcustomer_id");
            $repair_next_time       =   $this->input->post("nextrepair");
            $repair_next_date       =   $this->input->post("nextdaterepair");
            $previousrepair         =   $this->input->post("previousrepair");
            $previousrepairdate     =   $this->input->post("previousrepairdate");
            $description            =   $this->input->post("txt_description");
            
            $data=array(
                'app_action'                    =>  $repair_next_time,
                'app_date_action'               =>  $repair_next_date,
                'app_customer_last_repair_info' =>  $previousrepair,
                'app_customer_last_repair_date' =>  $previousrepairdate,
                'app_customer_id'               =>  $customer_name,
                'app_des'                       =>  $description,
                'app_create_by'                 =>  $this->session->userdata('user_id'),
                'app_create_date'               =>  date('Y-m-d'),
                'app_status'                    =>  'Pendding',
            );
          
            $this->Base_model->save('appointment',$data);
        
        redirect('appointment');        
    }
    public function update_pendding_stuts(){
        $id=$this->uri->segment(3);
        $data=array(                
                'app_status'                    =>  'Done',
                'app_date_modified_by'          =>  $this->session->userdata('user_id'),
                'app_date_modified'             =>  date('Y-m-d'),                
            );
        
        $this->Base_model->update('appointment','app_id',$id,$data);
        redirect('appointment');
    }
    
    public function update(){    
            $id                     =   $this->input->post("app_id");
            $customer_name          =   $this->input->post("txtcustomer_id");
            $repair_next_time       =   $this->input->post("nextrepair");
            $repair_next_date       =   $this->input->post("nextdaterepair");
            $previousrepair         =   $this->input->post("previousrepair");
            $previousrepairdate     =   $this->input->post("previousrepairdate");
            $description            =   $this->input->post("txt_description");
            
            $data=array(
                'app_action'                    =>  $repair_next_time,
                'app_date_action'               =>  $repair_next_date,
                'app_customer_last_repair_info' =>  $previousrepair,
                'app_customer_last_repair_date' =>  $previousrepairdate,
                'app_customer_id'               =>  $customer_name,
                'app_des'                       =>  $description,
                'app_date_modified_by'          =>  $this->session->userdata('user_id'),
                'app_date_modified'             =>  date('Y-m-d'),
               
            );
        $this->Base_model->update('appointment','app_id',$id,$data);
        redirect('appointment');
        
    }    
    public function delete(){
        
        $id=$this->uri->segment(3);
        //$img=$this->uri->segment(4);
        
        $this->Base_model->delete_by('appointment','app_id',$id);
        //unlink("./img/products/".$img);
        
        redirect('appointment');
    }
    
    public function search(){
        $data['title'] = "SUPPLIER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "appointment/list_appointment"; 
        
        $date_from= $this->input->post("datefrom");
        $date_to=$this->input->post("dateto");        
        
        $data['date'] = $date_from.'->'.$date_to;
     
        $query = "select * from v_next_repair where app_date_action BETWEEN '".$date_from."' and '".$date_to."'";
        
        $data['record_data']=$this->Base_model->loadToListJoin($query);
 
       $this->load->view('welcome/view', $data);
    }
    public function search_ajax(){
        
        $date_from=$this->uri->segment(3);
        $date_to=$this->uri->segment(4); 
       $data['date'] = $date_from.'->'.$date_to;
       $query = "select * from v_next_repair where app_date_action BETWEEN '".$date_from."' and '".$date_to."'";
       $data['record_data']=$this->Base_model->loadToListJoin($query);
       
        $this->load->view("report/report_sale/response/response_alert_appointment",$data);
    }
    
    public function  update_birhtday_status(){
       $id=$this->uri->segment(3);       
         $data=array(                
                'is_alert_false' =>  '0',
            );
         
        $this->Base_model->update('customer','customer_id',$id,$data);       
        $curr_page=$this->session->userdata('curr_page');
        if($curr_page==null){
            $curr_page='report_alert_birthday';
        }
        redirect($curr_page);
    }
}
