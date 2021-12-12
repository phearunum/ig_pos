<?php
header('Access-Control-Allow-Origin: *');
class Item_Main extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_main/list_item_main";
        $company_profile_image="";
        $data['record_item_type']=$this->Base_model->loadToListJoin("select * from v_item_type order by item_type_id desc");
        
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
        //
        //
            
            
            //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_main',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('item_main_list');
             $data['txt_item_main_name']    =$this->lang->line('item_main_name');
           
             $data['txt_create_date']       =$this->lang->line('lb_create_date');
             $data['txt_recorder']          =$this->lang->line('lb_recorder');
             $data['txt_type']       =$this->lang->line('item_type');
             $data['txt_No']       =$this->lang->line('No');
             $data['txt_modifided']       =$this->lang->line('txt_modifided');
             $data['txt_part_number']     =$this->lang->line('txt_part_number');          
             $data['lbl_new'] =$this->lang->line('lb_new');
             $data['lbl_edit'] =$this->lang->line('lb_edit');
             $data['lbl_delete'] =$this->lang->line('lb_delete');
             $data['remain_alert'] =$this->lang->line('remain_alert');
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
        
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select 
            im.item_main_id,
            im.item_main_name,
            e.employee_name as create_by,
            im.create_date,
            im.part_number,
            im.modified_date,
            im.remain_alert,
            it.item_type_name
            from item_main im
            inner join item_type it on it.item_type_id=im.item_type_id
            inner join employee e on e.employee_id=im.create_by
            where im.status=1
            order by item_main_id");
        $this->load->view("report/report_stock/response",$data);
    }
    public function add_sub_item(){
        $data['title']  = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "item_main/frm_sub_item";        
        $data['records_type']= $this->Base_model->get_data("item_type");
        $data['records_main']= $this->Base_model->get_data("item_main");
        $data['record_item_detail']=$this->Base_model->get_data("v_item_detail");
              
        
        $data['record_printer_location']=$this->Base_model->get_data("printer_location");
        $data['measure']=$this->Base_model->loadToListJoin("select * from measure where status=1");

        $id=$this->uri->segment(3);
        $data['rd_item_main']=$this->Base_model->loadToListJoin("select 
            im.item_main_id,
            im.item_main_name,
            im.create_by,
            im.create_date,
            im.part_number,
            im.modified_date,
            im.remain_alert,
            it.item_type_id,
            it.item_type_name
            from item_main im
            inner join item_type it on it.item_type_id=im.item_type_id
            where im.status=1 and im.item_main_id=$id
            order by item_main_id");
        $data['item_main_name']="";
        $data['item_main_id']="";
        foreach ($data['rd_item_main'] as $key => $value) {
            $data['item_main_name']=$value->item_main_name;
            $data['item_main_id']=$value->item_main_id;
        }

        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_detail',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('item_main_title');
             $data['txt_item_main']         =$this->lang->line('item_main');
             $data['txt_item_type']          =$this->lang->line('item_type');
             $data['txt_item_name']          =$this->lang->line('item_name');
             $data['txt_part_num']           =$this->lang->line('part_number');
             $data['txt_retail_price']       =$this->lang->line('retail_price');
             $data['txt_cut_stock']          =$this->lang->line('cut_stock');
             $data['txt_description']        =$this->lang->line('lb_desc');
             $data['txt_Print_location']     =$this->lang->line('printer');
             $data['txt_measure']                =$this->lang->line('measure');
             $data['ingredient']         =$this->lang->line('ingredient');
             $data['txt_create_date']       =$this->lang->line('lb_create_date');
             $data['txt_recorder']          =$this->lang->line('lb_recorder');

            // $data['txt_sale']               =$this->lang->line('btn_create');
             $data['btn_create']        =$this->lang->line('btn_create');
             $data['btn_clear']        =$this->lang->line('lb_clear');
             $data['btn_back']        =$this->lang->line('lb_back');
             $data['btn_update']        =$this->lang->line('btn_update');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             $data['lbl_field']         =$this->lang->line('lb_field');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             $data['lbl_no']     =$this->lang->line('lb_no');
             $data['lbl_action']     =$this->lang->line('lb_action');

        //END TRAN SLATE
       // var_dump($data['measure']);
        //break;
             
        $this->load->view("welcome/view",$data);
    }
    public function edit_load(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_main/frm_item_main_update";
        
        $id=$this->uri->segment(3);
        $data['records_type']= $this->Base_model->get_data("item_type");
        $data['records']=$this->Base_model->loadToListJoin("select 
            im.item_main_id,
            im.item_main_name,
            im.create_by,
            im.create_date,
            im.part_number,
            im.remain_alert,
            im.modified_date,
            it.item_type_id,
            it.item_type_name
            from item_main im
            inner join item_type it on it.item_type_id=im.item_type_id
            where im.status=1 and im.item_main_id=$id
            order by item_main_id");
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('item_main',$lang=='' ? 'en':$lang);
            
         $data['lbl_title']             =$this->lang->line('addnew_title');
         $data['txt_item_type_name']         =$this->lang->line('item_type_name');
         $data['item_type']       =$this->lang->line('item_type');
         $data['txt_part_number']     =$this->lang->line('txt_part_number');
         $data['txt_item_main']         =$this->lang->line('item_main_name');
         $data['btn_update'] =$this->lang->line('btn_update');
         $data['btn_cancel'] =$this->lang->line('btn_cancel');
         $data['remain_alert'] =$this->lang->line('remain_alert');
                
    //END TRAN SLATE 
        $this->load->view("welcome/view",$data);
        
    }
    
    public function addnew(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_main/frm_item_main";
        $data['records_type']= $this->Base_model->get_data("item_type");
        
         //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_main',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('addnew_title');
             $data['txt_item_main']         =$this->lang->line('item_main_name');
             $data['item_type']              =$this->lang->line('item_type');
             $data['txt_part_number']     =$this->lang->line('txt_part_number');
             $data['remain_alert']     =$this->lang->line('remain_alert');
             
             $data['btn_create'] =$this->lang->line('btn_create');
             $data['btn_cancel'] =$this->lang->line('btn_cancel');
                    
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }

    public function check_part_number(){
        $part_number=$this->input->post("part_number");
        $type=$this->input->post("type");
        if($type=="New"){
            $count=$this->Base_model->loadToListJoin("select count(*) as count from item_main where part_number='$part_number'");
        }
        elseif ($type=="Update") {
            $main_id=$this->input->post("item_main_id");
            $temp=$this->Base_model->loadToListJoin("select part_number from item_main where item_main_id=$main_id");
            $part_number_old=$temp[0]->part_number;
            $count=$this->Base_model->loadToListJoin("select count(*) as count from item_main where part_number='$part_number' and part_number not in('$part_number_old')");
        }
        echo json_encode($count);  
    }

    public function save(){
            $item_type = $this->input->post("selectitmetype");
            $item_main      =   $this->input->post("txt_item_main_name");
            $part_number           =   $this->input->post("txt_part_number");
            $remain_alert           =   $this->input->post("remain_alert");
            $data=array(
                'item_type_id'               =>$item_type,
                'remain_alert'               =>$remain_alert,
                'item_main_name'             =>$item_main,
                'part_number'                =>$part_number,
                'create_date'     =>date('Y-m-d'),
                'create_by'       =>$this->Base_model->user_id(),               
            );
            
        $this->Base_model->save('item_main',$data);
        redirect('item_main');
        
    }

    
    public function update(){
            $item_type = $this->input->post("selectitmetype");
            $main_id=$this->input->post("item_main_id");
            $item_main      =   $this->input->post("txt_item_main_name");
            $part_number           =   $this->input->post("txt_part_number");
            $remain_alert           =   $this->input->post("remain_alert");
            $data=array(
                'item_type_id'               =>$item_type,
                'item_main_name'             =>$item_main,
                'remain_alert'               =>$remain_alert,
                'part_number'                =>$part_number,
                'modified_date'     =>date('Y-m-d'),
                'modified_by'       =>$this->Base_model->user_id(),               
            );
        $this->Base_model->update('item_main','item_main_id',$main_id,$data);        
        //redirect('item_main');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->run_query("update item_main set status=0 where item_main_id=$id");
        redirect('item_main');
    }
     public function  getImgFile($id){
        //=======upload photo========
            $old_img=$this->Base_model->get_value("item_type","item_type_photo","item_type_id",$id);
                
            $config = array(
                'upload_path'   => './img/item_type',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite'     => TRUE,
                'max_size'      => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height'    => "600",
                'max_width'     => "1200"
            );
                $this->item_type_photo = basename($_FILES["userfile"]["name"]);
                
                if($this->item_type_photo==""){
                    $this->item_type_photo=$old_img;
                }else{
                    $this->load->library('upload', $config);
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->library('image_lib');   
                    if(!$this->upload->do_upload())
                    {
                        $error = array('error' => $this->upload->display_errors());
                    }
                }
            return $this->item_type_photo;
    }
}
