<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of floor
 *
 * @author hpt-srieng
 */

class Floor_layout extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
        
        //BEGIN TRANSLATE
             
             
    }
    public function index(){
        $data['title'] = "FLOOR";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "floor/frm_layout";
        //floor template
        $lang = $this->input->cookie('language');
        $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
       
       
         $data['lbl_floor_title']         =$this->lang->line('title_add_floor');
         $data['lbl_floor_width']         =$this->lang->line('floor_width');
         $data['lbl_floor_height']        =$this->lang->line('floor_height');
         $data['lbl_floor_outline']       =$this->lang->line('floor_outline_width');
         $data['lbl_floor_background']    =$this->lang->line('floor_bg_color');
         $data['lbl_floor_fore_color']    =$this->lang->line('floor_fore_color');
         $data['lbl_floor_outline_color'] =$this->lang->line('floor_outline_color');
         $data['lbl_floor_font_size']     =$this->lang->line('floor_font_size');
         $data['lbl_floor']               =$this->lang->line('lb_floor_name');
         $data['btn_update']        =$this->lang->line('btn_update');
         $data['btn_cancel']        =$this->lang->line('btn_cancel');
         $data['lbl_field']         =$this->lang->line('lb_field');
         $data['lbl_field_value']   =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
         $data['get_floor_template_record']=$this->Base_model->get_data_by("SELECT * FROM floor_template where floor_template_branch_id=".$this->Base_model->branch_id()." LIMIT 1");
         //table template
         $data['lbl_table_title']         =$this->lang->line('title_add_table');
         $data['lbl_table_width']         =$this->lang->line('table_width');
         $data['lbl_table_height']        =$this->lang->line('table_height');
         $data['lbl_table_outline']       =$this->lang->line('table_outline_width');
         $data['lbl_table_background']    =$this->lang->line('table_bg_color');
         $data['lbl_table_fore_color']    =$this->lang->line('table_fore_color');
         $data['lbl_table_outline_color'] =$this->lang->line('table_outline_color');
         $data['lbl_table_busy_color']    =$this->lang->line('table_busy_bg_color');
         $data['lbl_table_booking_color'] =$this->lang->line('table_booking_bg_color');
         $data['lbl_table_split_color']   =$this->lang->line('table_split_bg_color');
         $data['lbl_table_printed_color'] =$this->lang->line('table_printed_bg_color');
         $data['lbl_table_font_size']     =$this->lang->line('table_font_size');
         $data['lbl_table_table']         =$this->lang->line('lb_table');
         $data['lbl_table_busy']          =$this->lang->line('lb_busy');
         $data['lbl_table_booking']       =$this->lang->line('lb_booking');
         $data['lbl_table_split']         =$this->lang->line('lb_split');
         $data['lbl_table_printed']       =$this->lang->line('lb_printed');
         
         
         $data['btn_update']      =$this->lang->line('btn_update');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
         $data['get_table_template_record']=$this->Base_model->get_data_by("SELECT * FROM table_template where table_template_branch_id=".$this->Base_model->branch_id()." LIMIT 1");
        //
         $data['table_layout']=$this->Base_model->get_data_by("SELECT * FROM floor_table_layout WHERE layout_branch_id=".$this->Base_model->branch_id()." and floor_id=30");
            $data['table_template']=$this->Base_model->get_data_by("SELECT * FROM table_template WHERE table_template_branch_id=".$this->Base_model->branch_id());
        //
        $data['record_permission'] = $this->Base_model->get_permission($this->uri->segment(1));

        $this->load->view("welcome/view",$data);
    }

    public function load_all_layout(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $re_master=$this->Base_model->loadToListJoin("select * from branch where branch_status=1 $branch");
        $total=count($re_master);
        $i=0;
        echo '{"layout":[';
        foreach($re_master as $r){
            $i=$i+1;
            $floor=$this->Base_model->loadToListJoin("select * from floor where floor_branch_id=$r->branch_id and status=1");
            echo '{"branch_id":"'.$r->branch_id.'","branch_name":"'.$r->branch_name.'","floor": ';
                echo json_encode($floor); 
            echo '}';
            if($i!=$total){echo ',';}
        }
        echo ']}';
    }

    public function save_floor(){
        $floor_name=$this->input->post('name');
        $branch_id=$this->input->post('id');
        $id=$this->input->post('f_id');
        $discount=$this->input->post('dis');
        $delivery=$this->input->post('delivery');

        $floor_data=array(
                'floor_name'            => $floor_name,
                'is_delivery'           =>$delivery,
                'dis'                   =>$discount,
                'floor_branch_id'       => $branch_id,
                'floor_created_date'    => date('Y-m-d'),
                'floor_created_by'      => $this->Base_model->user_id()
            ); 
        if($id=="")  
            $this->Base_model->save("floor",$floor_data);
        else
            $this->Base_model->update('floor','floor_id',$id,$floor_data);
    }
    public function delete_floor(){
        $id=$this->input->post('id');
        $this->Base_model->update('floor','floor_id',$id,array('status'=>0));
        $this->Base_model->update('floor_table_layout','floor_id',$id,array('status'=>0));
    }
    public function save_table(){
        //data:{'id':b_id,'name':name,'t_id':id,'qty':qty,'f_id':f_id},
            $floor_id=$this->input->post("f_id");
            $table_qty=$this->input->post("qty");
            $name=$this->input->post('name');
            $branch_id=$this->input->post('id');
            $t_id=$this->input->post('t_id');
            if($t_id==""){
                for($i=1;$i<=$table_qty;$i++){
                    $table_record=array(
                        'floor_id'               =>$floor_id,
                        'layout_name'            =>($name.''.$i),
                        'layout_created_date'    => date('Y-m-d'),
                        'layout_created_by'      => $this->Base_model->user_id(),
                        'layout_branch_id'       =>$branch_id,
                        'layout_type'            =>'TABLE'
                    );
                    $this->Base_model->save("floor_table_layout",$table_record);
                }

            }else{
                    $this->Base_model->update('floor_table_layout','layout_id',$t_id,array('layout_name'=>$name));
            }     
    }
    public function save_draw_table(){
        $location_x=$this->input->post('x');
        $location_y=$this->input->post('y');
        $layout_id=$this->input->post('id');
        
        $record_location=array(
            'layout_location_x' =>$location_x,
            'layout_location_y' =>$location_y
        );  
        $this->Base_model->update("floor_table_layout","layout_id",$layout_id,$record_location);
        
    }
    public function delete_table(){
        $id=$this->input->post('id');
        $this->Base_model->update('floor_table_layout','layout_id',$id,array('status'=>0));
    }
    public function load_table(){
        $branch_id=$this->input->post('b');
        $floor_id=$this->input->post('f');
        $re_master=$this->Base_model->get_data_by("select * from table_template");
        $total=count($re_master);
        $i=0;
        echo '{"layout":[';
        foreach($re_master as $r){
            $i=$i+1;
            $floor=$this->Base_model->loadToListJoin("SELECT * FROM floor_table_layout where floor_id=$floor_id and layout_branch_id=$branch_id and status=1");
            echo '{"table_template_width":"'.$r->table_template_width.'","table_template_height":"'.$r->table_template_height.'","table_template_bg_color":"'.$r->table_template_bg_color.'","table_template_fore_color":"'.$r->table_template_fore_color.'","table_template_outline_color":"'.$r->table_template_outline_color.'","table_template_outline_width":"'.$r->table_template_outline_width.'","table_template_busy_color":"'.$r->table_template_busy_color.'","table_template_font_size":"'.$r->table_template_font_size.'","layouts": ';
                echo json_encode($floor); 
            echo '}';
            if($i!=$total){echo ',';}
        }
        echo ']}';
    }
    //
    public function load_form_template(){
        $result=$this->Base_model->get_data_by("SELECT * FROM floor_template LIMIT 1");
        echo json_encode($result);
    }
    public function load_table_template(){

    }

    //old 
    
    public function floor_template(){
        $data['title'] = "FLOOR";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "floor/floor_template/frm_floor_template";
        
        $data['get_floor_template_record']=$this->Base_model->get_data_by("SELECT * FROM floor_template where floor_template_branch_id=".$this->Base_model->branch_id()." LIMIT 1");
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
            $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
           
           
             $data['lbl_floor_title']         =$this->lang->line('title_add_floor');
             $data['lbl_floor_width']         =$this->lang->line('floor_width');
             $data['lbl_floor_height']        =$this->lang->line('floor_height');
             $data['lbl_floor_outline']       =$this->lang->line('floor_outline_width');
             $data['lbl_floor_background']    =$this->lang->line('floor_bg_color');
             $data['lbl_floor_fore_color']    =$this->lang->line('floor_fore_color');
             $data['lbl_floor_outline_color'] =$this->lang->line('floor_outline_color');
             $data['lbl_floor_font_size']     =$this->lang->line('floor_font_size');
             $data['lbl_floor']               =$this->lang->line('lb_floor_name');
             $data['btn_update']        =$this->lang->line('btn_update');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             $data['lbl_field']         =$this->lang->line('lb_field');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
    }
    public function table_template(){
        $data['title'] = "TABLE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "floor/table_template/frm_table_template";
        
        $data['get_table_template_record']=$this->Base_model->get_data_by("SELECT * FROM table_template where table_template_branch_id=".$this->Base_model->branch_id()." LIMIT 1");
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
                
             $data['lbl_table_title']         =$this->lang->line('title_add_table');
             $data['lbl_table_width']         =$this->lang->line('table_width');
             $data['lbl_table_height']        =$this->lang->line('table_height');
             $data['lbl_table_outline']       =$this->lang->line('table_outline_width');
             $data['lbl_table_background']    =$this->lang->line('table_bg_color');
             $data['lbl_table_fore_color']    =$this->lang->line('table_fore_color');
             $data['lbl_table_outline_color'] =$this->lang->line('table_outline_color');
             $data['lbl_table_busy_color']    =$this->lang->line('table_busy_bg_color');
             $data['lbl_table_booking_color'] =$this->lang->line('table_booking_bg_color');
             $data['lbl_table_split_color']   =$this->lang->line('table_split_bg_color');
             $data['lbl_table_printed_color'] =$this->lang->line('table_printed_bg_color');
             $data['lbl_table_font_size']     =$this->lang->line('table_font_size');
             $data['lbl_table_table']         =$this->lang->line('lb_table');
             $data['lbl_table_busy']          =$this->lang->line('lb_busy');
             $data['lbl_table_booking']       =$this->lang->line('lb_booking');
             $data['lbl_table_split']         =$this->lang->line('lb_split');
             $data['lbl_table_printed']       =$this->lang->line('lb_printed');
             
             
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRANSLATE
        
        $this->load->view("welcome/view",$data);
    }
    
    public function save_floor_template(){
        
        $width=$this->input->post("txt_floor_width");
        $height=$this->input->post("txt_floor_height");
        $outline_width=$this->input->post("txt_outline_width");
        $background_color=$this->input->post("txt_background_color");
        $fore_color=$this->input->post("txt_fore_color");
        $outline_color=$this->input->post("txt_outline_color");
        $font_size=$this->input->post("txt_font_size");
        
        if($this->Base_model->get_data_by("SELECT floor_template_branch_id FROM floor_template where floor_template_branch_id=".$this->Base_model->branch_id())){
                $floor_template_data=array(
                'floor_template_width'          =>$width,
                'floor_template_height'         =>$height,
                'floor_template_bg_color'       =>$background_color,
                'floor_template_fore_color'     =>$fore_color,
                'floor_template_outline_color'  =>$outline_color,
                'floor_template_outline_width'  =>$outline_width,
                'floor_template_created_by'     =>$this->Base_model->user_id(),
                'floor_template_created_date'   =>date('Y-m-d'),
                'floor_template_font_size'      =>$font_size
            );
            
            $this->Base_model->update("floor_template","floor_template_branch_id",$this->Base_model->branch_id(),$floor_template_data);
        }else{
            $floor_template_data=array(
                'floor_template_width'          =>$width,
                'floor_template_height'         =>$height,
                'floor_template_bg_color'       =>$background_color,
                'floor_template_fore_color'     =>$fore_color,
                'floor_template_outline_color'  =>$outline_color,
                'floor_template_outline_width'  =>$outline_width,
                'floor_template_created_by'     =>$this->Base_model->user_id(),
                'floor_template_created_date'   =>date('Y-m-d'),
                'floor_template_branch_id='     =>$this->Base_model->branch_id(),
                'floor_template_font_size'      =>$font_size
            );
            
            $this->Base_model->save("floor_template",$floor_template_data);
        }
        redirect("floor_layout/floor_template");
    }
    public function save_table_template(){
        $width=$this->input->post("txt_table_width");
        $height=$this->input->post("txt_table_height");
        $outline_width=$this->input->post("txt_outline_width");
        $background_color=$this->input->post("txt_background_color");
        $fore_color=$this->input->post("txt_fore_color");
        $outline_color=$this->input->post("txt_outline_color");
        $bc_bg_color=$this->input->post("txt_bc_bg_color");
        $booking_bg_color=$this->input->post("txt_booking_bg_color");
        $split_bg_color=$this->input->post("txt_split_bg_color");
        $printed_bg_color=$this->input->post("txt_printed_bg_color");
        $font_size=$this->input->post("txt_font_size");
        
        if($this->Base_model->get_data_by("SELECT table_template_branch_id FROM table_template where table_template_branch_id=".$this->Base_model->branch_id())){
                $table_template_data=array(
                'table_template_width'          =>$width,
                'table_template_height'         =>$height,
                'table_template_bg_color'       =>$background_color,
                'table_template_fore_color'     =>$fore_color,
                'table_template_outline_color'  =>$outline_color,
                'table_template_outline_width'  =>$outline_width,
                'table_template_created_by'     =>$this->Base_model->user_id(),
                'table_template_created_date'   =>date('Y-m-d'),
                'table_template_busy_color'     =>$bc_bg_color,
                'table_template_booking_color'  =>$booking_bg_color,
                'table_template_split_color'    =>$split_bg_color,
                'table_template_printed_color'  =>$printed_bg_color,
                'table_template_font_size'      =>$font_size
            
            );
            
            $this->Base_model->update("table_template","table_template_branch_id",$this->Base_model->branch_id(),$table_template_data);
        }else{
            $table_template_data=array(
                'table_template_width'          =>$width,
                'table_template_height'         =>$height,
                'table_template_bg_color'       =>$background_color,
                'table_template_fore_color'     =>$fore_color,
                'table_template_outline_color'  =>$outline_color,
                'table_template_outline_width'  =>$outline_width,
                'table_template_created_by'     =>$this->Base_model->user_id(),
                'table_template_created_date'   =>date('Y-m-d'),
                'table_template_branch_id='     =>$this->Base_model->branch_id(),
                'table_template_busy_color'     =>$bc_bg_color,
                'table_template_booking_color'  =>$booking_bg_color,
                'table_template_split_color'    =>$split_bg_color,
                'table_template_printed_color'  =>$printed_bg_color,
                'table_template_font_size'      =>$font_size
            );
            
            $this->Base_model->save("table_template",$table_template_data);
        }
        redirect("floor_layout/table_template");;
    }
    
    public function add_floor(){
        
        $get_floor=$this->Base_model->get_data_by("SELECT COUNT(*) as floor_count FROM floor WHERE floor_branch_id=".$this->Base_model->branch_id());
        $floor_count=0;
        foreach($get_floor as $gf){
            $floor_count=$gf->floor_count+1;
        }
            
            $floor_name='floor'.$floor_count;
            
            $floor_data=array(
                'floor_name'            => $floor_name,
                'floor_branch_id'       => $this->Base_model->branch_id(),
                'floor_created_date'    => date('Y-m-d'),
                'floor_created_by'      => $this->Base_model->user_id()
            );
            
            $this->Base_model->save("floor",$floor_data);
            
            $data['floor_record']  =$this->Base_model->get_data_by("SELECT * FROM floor WHERE floor_branch_id=".$this->Base_model->branch_id());
            $data['floor_template']=$this->Base_model->get_data_by("SELECT * FROM floor_template WHERE floor_template_branch_id=".$this->Base_model->branch_id());
            $this->load->view("floor/get_floor",$data); 
    }
    
    public function display_table(){
            $data['title'] = "FLOOR";
            $data['header'] = "template/header";
            $data['menu'] = "template/menu";
            $data['footer'] = "template/footer";
            $data['page'] = "floor/frm_floor";
            
            $floor_id=$this->uri->segment(3);
            $data['floor_id']=$floor_id;
            //$this->session->set_userdata("floor_id", $floor_id);
       
            $data['table_layout']=$this->Base_model->get_data_by("SELECT * FROM floor_table_layout WHERE layout_branch_id=".$this->Base_model->branch_id()." and floor_id=".$floor_id);
            $data['table_template']=$this->Base_model->get_data_by("SELECT * FROM table_template WHERE table_template_branch_id=".$this->Base_model->branch_id());
            
            $data['floor_record']=$this->Base_model->get_data_by("SELECT * FROM floor WHERE floor_branch_id=".$this->Base_model->branch_id());
            $data['floor_template']=$this->Base_model->get_data_by("SELECT * FROM floor_template WHERE floor_template_branch_id=".$this->Base_model->branch_id());
            
            $lang = $this->input->cookie('language');
            $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $data['btn_add_floor']      =$this->lang->line('add_floor');
            $data['btn_edit_table']     =$this->lang->line('edit_table');
            $data['btn_edit_floor']     =$this->lang->line('edit_floor');

            $data['btn_save']           =$this->lang->line('btn_save');
            $data['btn_add_table']      =$this->lang->line('add_table');
            $data['btn_floor_template'] =$this->lang->line('floor_template');
            $data['btn_table_template'] =$this->lang->line('table_template');
            
            $this->load->view("welcome/view",$data);
            
    }
    
    
    

            
    public function save_rename_floor(){
            
        $floor_id=$this->input->post("txt_floor_id");
        $floor_name=$this->input->post("txt_floor_name");
        $is_car_wash=$this->input->post("ch_is_car_wash");
        
            $rename_data=array(
                'floor_name'            =>$floor_name,
                'layout_is_car_wash'    =>$is_car_wash
            );
            if($this->Base_model->get_data_by("SELECT floor_name FROM floor WHERE floor_name='".$floor_name."' AND floor_id<>".$floor_id)){
                $this->session->set_flashdata('error','<h3 style="color:red;">Floor Name Dupplicate!</h3>');
                redirect("floor_layout/floor_edit_load/".$floor_id);
            }
            $this->Base_model->update('floor','floor_id',$floor_id,$rename_data);
             
        redirect("floor_layout");
    }
    
    public function save_rename_table(){
            
        $layout_id=$this->input->post("txt_table_id");
        $layout_name=$this->input->post("txt_table_name");
           
            $rename_data=array(
                'layout_name'            =>$layout_name,
            );
            if($this->Base_model->get_data_by("SELECT layout_name FROM floor_table_layout WHERE layout_name='".$layout_name."' AND layout_id<>".$layout_id)){
                $this->session->set_flashdata('error','<h3 style="color:red;">Table Name Dupplicate!</h3>');
                redirect("floor_layout/table_edit_load/".$layout_id);
            }
            $this->Base_model->update('floor_table_layout','layout_id',$layout_id,$rename_data);
             
        redirect("floor_layout");
    }
    public function save_table_edit(){
        $layout_id =$this->input->post("txt_table_layout_id");
        $table_name=$this->input->post("txt_table_name");
        $floor_id  =$this->input->post("txt_floor_id");
            
        $btn_table=$this->input->post("btn_table");
            
        switch($btn_table){
            case'Save':
                    $rename_data=array(
                        'layout_name'  =>$table_name
                    );
                    $this->Base_model->update('floor_table_layout','layout_id',$layout_id,$rename_data);
                break;
            case'Delete':
                    $this->Base_model->delete_by('floor_table_layout','layout_id',$layout_id);
                break;
        }
        
        redirect("floor_layout/display_table/".$floor_id);
    }
    
    
    
    
    
    public function floor_edit_load(){
        
        $data['title'] = "FLOOR";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "floor/frm_floor_update";
        
        $floor_id=$this->uri->segment(3);
        $data['floor_template']=$this->Base_model->get_data_by("SELECT * FROM floor_template WHERE floor_template_branch_id=".$this->Base_model->branch_id());
        $data['floor_record']  =$this->Base_model->get_data_by("SELECT * FROM floor WHERE floor_branch_id=".$this->Base_model->branch_id()." and floor_id=".$floor_id);
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $data['lbl_floor_title']          =$this->lang->line('title_edit_floor');
             $data['lbl_floor_name']           =$this->lang->line('floor_name');
             $data['lbl_floor_preview']        =$this->lang->line('floor_priview');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRANSLATE
        
        $this->load->view("welcome/view",$data);
    }
    
    public function table_edit_load(){
        
        $data['title']  = "TABLE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "floor/frm_table_update";
        
        $table_id=$this->uri->segment(3);
        $data['table_template']=$this->Base_model->get_data_by("SELECT * FROM table_template WHERE table_template_branch_id=".$this->Base_model->branch_id());
        $data['table_record']=$this->Base_model->get_data_by("SELECT * FROM floor_table_layout WHERE layout_branch_id=".$this->Base_model->branch_id()." and layout_id=".$table_id);
        
        //BEGIN TRANSLATE 
             $lang = $this->input->cookie('language');
             $this->lang->load('floor_layout',$lang=='' ? 'en':$lang);
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $data['lbl_table_title']          =$this->lang->line('title_edit_table');
             $data['lbl_table_name']           =$this->lang->line('table_name');
             $data['lbl_table_preview']        =$this->lang->line('table_priview');
             $data['btn_update']      =$this->lang->line('btn_update');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRANSLATE
        
        $this->load->view("welcome/view",$data);
        
    }
    
    function response_floor(){
            $branch_id      = $this->Base_model->branch_id();
            if($branch_id!=""){
            $floor_template = $this->Base_model->loadToListJoin("select * from floor_template where floor_template_branch_id=$branch_id");
                if($floor_template!=""){
                    echo '{' . '"success"' . ':1,' . '"floor_template":[{';
                    foreach ($floor_template as $f){
                        echo '"width"' . ':"' . $f->floor_template_width . '",' .'"height"' . ':"' . $f->floor_template_height . '",' . '"bg_color"' . ':"' . $f->floor_template_bg_color . '",' . '"fore_color"' . ':"' . $f->floor_template_fore_color . '",' . '"outline_color"' . ':"' . $f->floor_template_outline_color . '",' . '"font_size"' . ':"' . $f->floor_template_font_size . '",' . '"outline_width"' . ':"' . $f->floor_template_outline_width . '","layout_list":';
                            $layout = $this->Base_model->loadToListJoin("select * from floor where floor_branch_id=$branch_id");
                        echo json_encode($layout);
                        if (!end($layout)) {
                            echo "},{";
                        }
                    }
                echo "}]}";
            }
        }
    }
}
