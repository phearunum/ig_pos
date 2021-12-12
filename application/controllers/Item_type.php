<?php
header('Access-Control-Allow-Origin: *');
class Item_type extends CI_Controller{
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
        $data['page'] = "item_type/list_item_type";
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

            $this->lang->load('item_type',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('item_type_list');
             $data['txt_item_type_name']    =$this->lang->line('item_type_name');
           
             $data['txt_create_date']       =$this->lang->line('lb_create_date');
             $data['txt_No']                =$this->lang->line('lb_no');
             $data['txt_recorder']          =$this->lang->line('lb_recorder');
             $data['txt_increadient']       =$this->lang->line('item_type_ingredient');
             $data['txt_main']                =$this->lang->line('main_cat');
          
            
            
             $data['lbl_new'] =$this->lang->line('lb_new');
             $data['lbl_edit'] =$this->lang->line('lb_edit');
             $data['lbl_delete'] =$this->lang->line('lb_delete');
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
        
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_item_type order by item_type_id desc");
        $this->load->view("report/report_stock/response",$data);
    }
	public function item_type_response(){
            $data = $this->Base_model->loadToListJoin("select * from item_type");
            echo json_encode($data);
    }
    public function edit_load(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_type/frm_item_type_update";
        
        $id=$this->uri->segment(3);
        $data['records_category'] = $this->Base_model->loadToListJoin("select category_id,category_name from category");
        $data['record_item_type']=$this->Base_model->get_field("item_type","item_type_id",$id);
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('item_type',$lang=='' ? 'en':$lang);
            
         $data['lbl_title']             =$this->lang->line('addnew_title');
         $data['txt_item_type_name']         =$this->lang->line('item_type_name');
         $data['txt_description']       =$this->lang->line('lb_desc');
         $data['main_cat']              =$this->lang->line('main_cat');
         $data['txt_is_ingredient']     =$this->lang->line('is_ingredient');
         $data['txt_is_car_wash']       =$this->lang->line('is_car_wash');
         
         $data['btn_update'] =$this->lang->line('btn_update');
         $data['btn_cancel'] =$this->lang->line('btn_cancel');
         $data['lbl_field'] =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
                
    //END TRAN SLATE 
        $this->load->view("welcome/view",$data);
        
    }
    public function addnew(){
        
        $data['title'] = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_type/frm_item_type";
        $data['records_category']= $this->Base_model->get_data("category");
        
         //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_type',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('addnew_title');
             $data['txt_item_type']         =$this->lang->line('item_type_name');
             $data['txt_description']       =$this->lang->line('lb_desc');
             $data['main_cat']              =$this->lang->line('main_cat');
             $data['txt_is_ingredient']     =$this->lang->line('is_ingredient');
             $data['txt_is_car_wash']       =$this->lang->line('is_car_wash');
             
             $data['btn_create'] =$this->lang->line('btn_create');
             $data['btn_cancel'] =$this->lang->line('btn_cancel');
             $data['lbl_field'] =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
                    
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function save(){
            $category_id = $this->input->post("selectcustomertype");
            $item_type      =   $this->input->post("txt_item_typename");
            $is_ingredient  =   $this->input->post("ch_ingredient");
            $is_car_wash    =   $this->input->post("ch_car_wash");
            $desc           =   $this->input->post("txt_description");
            if($is_ingredient!=1){
                $is_ingredient=0;
            }
            if($_FILES["userfile"]["name"]!=""){
                
                $image = basename($_FILES["userfile"]["name"]);
                
                $file_arr=  explode('.',$_FILES['userfile']['name']);
                $pic=time().'.'.$file_arr[count($file_arr)-1];
                
                $target_file = 'img/item_type/' . basename($pic);
                
                if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)){
                    
                }
            }  else {
                $pic="no_images.jpg";
            }
            $data=array(
                'category_id'                =>$category_id,
                'item_type_name'             =>$item_type,
                'item_type_is_ingredient'    =>$is_ingredient,
                'item_type_is_car_wash'      =>$is_car_wash,
                'item_type_photo'            =>$pic,
                'item_type_created_date'     =>date('Y-m-d'),
                'item_type_created_by'       =>$this->Base_model->user_id(),               
                'item_type_des'              =>$desc
            );
            
        $this->Base_model->save('item_type',$data);
        redirect('item_type');
        
    }
    
    public function update(){
        $update_pic           = $this->input->post("txt_getfile");
        $category             = $this->input->post("selectcustomertype");
        $id                   = $this->input->post('txt_item_id');
        $item_type_name       = $this->input->post('txt_item_typename');
        $is_ingredient        = $this->input->post("ch_ingredient");
        $is_car_wash          = $this->input->post("ch_car_wash");
        $desc                 = $this->input->post('txt_description');        
        //upload
        if($is_ingredient!=1){
                $is_ingredient=0;
            }
            
        $image = basename($_FILES["userfile"]["name"]);
        if($image==""){
            $pic= $update_pic;
        }
         else {
                $file_arr=  explode('.',$_FILES['userfile']['name']);
                $pic=time().'.'.$file_arr[count($file_arr)-1];

                $target_file = 'img/item_type/' . basename($pic);
                
                if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)){
                    if($update_pic!="no_images.jpg")
                     unlink("img/item_type/" . $update_pic);
                }
         }
        $data=array(
            'category_id'                 =>$category,
            'item_type_name'              =>$item_type_name,
            'item_type_is_ingredient'     =>$is_ingredient,
            'item_type_is_car_wash'       =>$is_car_wash,
            'item_type_photo'             =>$pic,
            'item_type_des'               =>$desc,
            'item_type_modified_date'     =>date('Y-m-d'),
            'item_type_modified_by'       =>$this->Base_model->user_id()
        );
        
        $this->Base_model->update('item_type','item_type_id',$id,$data);        
        redirect('item_type');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $old_img=$this->Base_model->get_value("item_type","item_type_photo","item_type_id",$id);
        $this->Base_model->delete_by('item_type','item_type_id',$id);
        if($old_img !='no_images.jpg'){
            try{
                unlink("location: ../../img/item_type/" . $old_img);
            }
            catch (Exception $ex){}
        }
        //break;
        redirect('item_type');
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
