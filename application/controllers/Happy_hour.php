<?php

class happy_hour extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "Happy Hour";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "happy_hour/frm_happy_hour";
        
        //$data['records']=$this->Base_model->get_data("happy_hour"); 
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
            $data['branch'] = $this->Base_model->loadToListJoin("SELECT branch_id,branch_name FROM branch WHERE branch_status!=0");
            //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
                
             
         
             $this->lang->load('happy_hour',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);
             $data['pro_title']       =$this->lang->line('title');
             $data['pro_name']       =$this->lang->line('pro_name'); 
             $data['pro_from_date']       =$this->lang->line('pro_from_date');  
             $data['pro_to_date']       =$this->lang->line('pro_to_date');  
             $data['pro_start_time']       =$this->lang->line('pro_start_time');  
             $data['pro_end_time']       =$this->lang->line('pro_end_time');  
             $data['pro_discount']       =$this->lang->line('pro_discount'); 
             $data['pro_desc']       =$this->lang->line('lb_desc');   

             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
            
        $this->load->view("welcome/view",$data);
        
    }
    public function update(){
        $branch_id = $this->input->post('txt_branch_id');        
        $id                   =$this->input->post('txt_id');
        $name                  =$this->input->post('txt_name');
        $from_date   =$this->input->post('txt_from_date');
        $to_date    =$this->input->post('txt_to_date');
        $start_time =$this->input->post('txt_start_time');
        $end_time =$this->input->post('txt_end_time');
        $discount =$this->input->post('txt_discount');
        $des                 =$this->input->post('txt_description');        
        $data['action'] = 'Successfull Updated!!!';
        $data=array(    
            'happy_hour_name'            =>$name,           
            'happy_hour_from_date'       =>$from_date,
            'happy_hour_to_date'     =>$to_date,
            'happy_hour_start_time' =>$start_time,
            'happy_hour_end_time'   =>$end_time,
            'happy_hour_discount'   =>$discount,
            'happy_hour_description'       =>$des,
            'happy_hour_brand_id'            =>$branch_id 
        );

        $happy_hour = $this->Base_model->loadToListJoin("SELECT * FROM happy_hour WHERE id=".$id);

        if(count($happy_hour)>0){
            $this->Base_model->update('happy_hour','id',$id,$data);
        }else{
           $new_id= $this->Base_model->save('happy_hour',$data);           
        }             
        redirect('happy_hour');
    } 

    public function happy_hour_by_branch(){
        $branch_id = $this->input->post('branch_id');        
        $happy_hour = $this->Base_model->loadToListJoin("SELECT * FROM happy_hour WHERE happy_hour_brand_id=".$branch_id);
        echo json_encode($happy_hour);
    }


    public function load_happy_hour(){
        $super_user= $this->Base_model->is_supper_user();
        $branch_condition = "AND branch_id=". $this->Base_model->branch_id();
        if($super_user){
            $branch_condition = "";
        }




        $re_master=$this->Base_model->loadToListJoin("select * from branch where branch_status=1 ".$branch_condition);
        $total=count($re_master);
        $i=0;
        echo '{"branch_happy_hour":[';
        foreach($re_master as $r){
            $i=$i+1;         
            $happy_hour=$this->Base_model->loadToListJoin("select * from happy_hour where happy_hour_brand_id=$r->branch_id"); 
        echo '{"branch_id":"'.$r->branch_id.'","branch_name":"'.$r->branch_name.'","happy_hour": ';
                echo json_encode($happy_hour); 
            echo '}';
            if($i!=$total){echo ',';}
        }
        echo ']}';          
          
    }
}
