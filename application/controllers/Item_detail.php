<?php
header('Access-Control-Allow-Origin: *');
class Item_detail extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->load->model("Upload");
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        $data['title'] = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "item_detail/list_item_detail";        
        $data['item_detail_stock']=$this->Base_model->loadToListJoin("select distinct item_detail_cut_stock from item_detail");
        $data['item_type']=$this->Base_model->loadToListJoin("select item_type_id,item_type_name from item_type");        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_detail',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('list_name');
             $data['txt_item_main']         =$this->lang->line('item_main');
             $data['txt_item_type']         =$this->lang->line('item_type');
             $data['txt_item_name']         =$this->lang->line('item_name');
             $data['txt_part_num']          =$this->lang->line('part_number');
             $data['txt_retail_price']      =$this->lang->line('retail_price');
             $data['txt_create_date']       =$this->lang->line('lb_create_date');
             $data['txt_recorder']          =$this->lang->line('lb_recorder');
             $data['txt_cut_stock']         =$this->lang->line('cut_stock');
             $data['lbl_print_location']    =$this->lang->line('printer');
             $data['ingredient']         =$this->lang->line('ingredient');
             $data['measure']    =$this->lang->line('measure');
             
            
             $data['lbl_new']    =$this->lang->line('lb_new');
             $data['lbl_edit']   =$this->lang->line('lb_edit');
             $data['lbl_delete'] =$this->lang->line('lb_delete');
             $data['lbl_no']     =$this->lang->line('lb_no');
             $data['lbl_action']     =$this->lang->line('lb_action');

            $data['allitem']          =$this->lang->line('allitem');
             $data['all']          =$this->lang->line('all');
             $data['lb_search']          =$this->lang->line('search');
        //END TRAN SLATE

                
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
             
        $this->load->view("welcome/view",$data);        
    }
    public function response(){
       // sleep(1000);
        $data['records']=$this->Base_model->loadToListJoin("SELECT * from v_item_detail order by item_type_id desc");
        $this->load->view("report/report_stock/response",$data);
    }
    
    public function response_search(){
        $txtpartnumber = $this->input->get("txtpartnumber");
        $txt_item_type_id = $this->input->get("txt_item_type_id");
        $txt_item_id = $this->input->get("txt_item_id");
        $cbo_cut_stock = $this->input->get("cbo_cut_stock");

        /// start query search by vichet
        $query ="";
        if($txtpartnumber != "")
            $query .= " and item_detail_part_number='$txtpartnumber'";
        if($txt_item_type_id!=0)
            $query .= " and item_type_id=$txt_item_type_id";
        if($txt_item_id != "")
            $query .= " and item_detail_id=$txt_item_id";
        if($cbo_cut_stock != -1)
            $query .= " and item_detail_cut_stock=$cbo_cut_stock";
        ///
        $data['records']=$this->Base_model->loadToListJoin("SELECT * from v_item_detail where 1=1 $query order by item_type_id desc");
        $this->load->view("report/report_stock/response",$data);
    }
    
    public function response_by_type(){
        $id=$this->input->get('id');
        $data['records']=$this->Base_model->loadToListJoin("select * from v_item_detail where item_type_id=$id");
        $this->load->view("report/report_stock/response",$data);
    }
    public function item_detail_response(){
			$id=$this->uri->segment(3);
			//echo "<script> alert($id); </script>";
			//if($id!= null || $id!=''){
				$data = $this->Base_model->loadToListJoin("select * from v_item_detail where item_type_id=$id");
			//} else {
			//	$data = $this->Base_model->loadToListJoin("select * from v_item_detail where item_type_id=$id");
			//}
            echo json_encode($data);
    }
    public function response_view_detail(){
        $id=$this->input->get('id');
        $data['records']=$this->Base_model->loadToListJoin("select * from v_item_detail where item_detail_id=$id");
        $this->load->view("report/report_stock/response",$data);
    }


    public function searchitemmain(){
        $this->load->view("search/search.php");
    }



    public function addnew(){
        
        $data['title']  = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "item_detail/frm_item_detail";    
        $data['records_item_type']= $this->Base_model->get_data("item_type");
        $data['record_item_detail']=$this->Base_model->get_data("v_item_detail");        
        
        $data['id']=$this->uri->segment(3);
        $data['record_printer_location']=$this->Base_model->loadToListJoin("SELECT * FROM printer_location WHERE status=1");
        $data['measure']=$this->Base_model->get_data("measure");
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('item_detail',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('add_name');
             $data['txt_item_main']         =$this->lang->line('item_main');
             $data['txt_item_type']          =$this->lang->line('item_type');
             $data['txt_item_name']          =$this->lang->line('item_name');
             $data['txt_part_num']           =$this->lang->line('part_number');
             $data['txt_retail_price']       =$this->lang->line('retail_price');
             $data['txt_cut_stock']          =$this->lang->line('cut_stock');
             $data['txt_description']        =$this->lang->line('lb_desc');
             $data['txt_Print_location']     =$this->lang->line('printer');
             $data['txt_measure']                =$this->lang->line('measure');

             $data['lb_alert']               =$this->lang->line('alert');
             $data['btn_create']        =$this->lang->line('btn_create');
             $data['btn_update']        =$this->lang->line('btn_update');
             $data['btn_cancel']        =$this->lang->line('btn_cancel');
             $data['lbl_field']         =$this->lang->line('lb_field');
             $data['lbl_field_value']   =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
       // var_dump($data['measure']);
        //break;
        $this->load->view("welcome/view",$data);
    }
    // public function itemmain(){
    //     $this->load->view("search/search.php");
    // }

    public function edit_load(){
        
        $data['title']  = "ITEM DETAIL";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "item_detail/frm_item_detail_update";
        $id=$this->uri->segment(3);        
        $data['measure']=$this->Base_model->get_data("measure");
        $data['record_card_type'] = $this->Base_model->loadToListJoin("select item_type_id,item_type_name from item_type");
        $data['record_item_detail']=$this->Base_model->get_field("v_item_detail","item_detail_id",$id);
        $data['record_printer_location']=$this->Base_model->get_data("printer_location");
//BEGIN TRANSLATE
            $lang = $this->input->cookie('language');  
            $this->lang->load('content',$lang=='' ? 'en':$lang);
            $data['btn_update']       =$this->lang->line('btn_update');
            $data['lbl_field']        =$this->lang->line('lbl_field');
            $data['lbl_field_value']  =$this->lang->line('lbl_field_value');
            $data['lbl_note_for_form']=$this->lang->line('lbl_note_for_form');
            $data['btn_cancel']       =$this->lang->line('btn_cancel');
            $data['lbl_new']          =$this->lang->line('lbl_new');
             
//END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    public function save(){
            $item_id             =   $this->input->post("txt_item_id");
            $item_type           =   $this->input->post("cbo_item_type");
            $item_name           =   $this->input->post("txt_item_name");
            $whole_sale          =   $this->input->post("txt_item_wholesale");
            $retail_sale         =   $this->input->post("txt_item_retailsale");
            $file                =   $_FILES["userfile"]["name"];            
            $desc                =   $this->input->post("txt_description");
            $cutstock            =   $this->input->post("cutstock");
            $remain_alert        =   $this->input->post("txt_remain_alert");
            $partnumber          =   $this->input->post("txt_part_number");
            $printer_location    =   $this->input->post("cbo_printer_location_name");
            $check               =   $this->input->post("hideshow");
            $measure             =   $this->input->post("cb_measure"); 
            $color               =   $this->input->post('txt_color');

            

            if($cutstock==1){

            }else{
                $cutstock=0;
            }


               if($check==1){

            }else{
                $check=0;
            }


            $image="";
            if($item_id==""){

                //save
                    if($file!="" && $file!=null){
                        $image = $this->Upload->upload_img("userfile", "./img/products", "2048000", "2048", "2048", "gif|jpg|png|jpeg|pdf");
                    }
                    $data=array(
                    'item_type_id'                      =>$item_type,
                    'item_detail_name'                  =>$item_name,
                    'item_detail_whole_price'           =>$whole_sale,
                    'item_detail_retail_price'          =>$retail_sale,
                    'item_detail_photo'                 =>$image,
                    'item_detail_cut_stock'             =>$cutstock,
                    'item_detail_remain_alert'          =>$remain_alert,
                    'item_detail_printer_location_id'   =>$printer_location,
                    'item_detail_des'                   =>$desc,
                    'item_detail_created_by'            =>$this->Base_model->user_id(),
                    'item_detail_created_date'          =>date('Y-m-d'),
                    'item_detail_hide_show'             =>$check,
                    'item_detail_part_number'           =>$partnumber,
                    'measure_id'                        =>$measure,
                    'color'                             =>$color
                );  

                if($this->Base_model->check_exists("item_detail_part_number","item_detail",array('item_detail_part_number'=>$partnumber))){
                    $response["message"] =  "Item Existing Part Number!!";
                    $response["status"] = "E001";
                }else{
                    if($this->Base_model->check_exists("item_detail_name","item_detail",array('item_detail_name'=>$item_name))){
                        $response["message"] =  "Item Existing Item Name!!";
                        $response["status"] = "E001";
                    }else{
                        $this->Base_model->save('item_detail',$data);
                        $response["message"] =  "Item has been inserted!!";
                        $response["status"] = "S001";
                    }
                }
                
            }else{
                //update


                $old_part=$this->Base_model->get_value_sql("select item_detail_part_number from item_detail where item_detail_id=$item_id","item_detail_part_number");
                $old_item=$this->Base_model->get_value_sql("select item_detail_name from item_detail where item_detail_id=$item_id","item_detail_name");
                $old_photo=$this->Base_model->get_value_sql("select item_detail_photo from item_detail where item_detail_id=$item_id","item_detail_photo");
                
                if($this->Base_model->check_exists("item_detail_part_number","item_detail",array('item_detail_part_number'=>$partnumber))){
                            if($old_part==$partnumber){
                                goto update;
                            }else{
                                $response["message"] =  "Item Existing Part Number!!";
                                $response["status"] = "E001";
                            }

                            
                            
                         
                    /*}else{
                        $response["message"] =  "Item Existing Item Name!!";
                        $response["status"] = "E001";
                    }*/
                    
                } else{
               
                
                     update:
                     
                        if($file!="" && $file!=null){
                         
                          if($old_photo!="" && $old_photo!=null){
                                @unlink("./img/products/".$old_photo);
                          }

                            $image = $this->Upload->upload_img("userfile", "./img/products", "2048000", "2048", "2048", "gif|jpg|png|jpeg|pdf");
                            $response["image"] = $image;
                        }else{
                            $image=$old_photo;
                        }   
                        $data=array(
                            'item_type_id'                      =>$item_type,
                            'item_detail_name'                  =>$item_name,
                            'item_detail_whole_price'           =>$whole_sale,
                            'item_detail_retail_price'          =>$retail_sale,
                            'item_detail_photo'                 =>$image,
                            'item_detail_cut_stock'             =>$cutstock,
                            'item_detail_remain_alert'          =>$remain_alert,
                            'item_detail_printer_location_id'   =>$printer_location,
                            'item_detail_des'                   =>$desc,
                            'item_detail_modified_by'            =>$this->Base_model->user_id(),
                            'item_detail_modified_date'          =>date('Y-m-d'),
                            'item_detail_part_number'           =>$partnumber,
                            'item_detail_hide_show'             =>$check,
                            'measure_id'                        =>$measure,
                            'color'                             =>$color
                        );
                        $this->Base_model->update('item_detail','item_detail_id',$item_id,$data);
                        $response["message"] =  "Item has been updated!!";
                        $response["status"] = "S001";
                    
                }

                 
            }

            echo json_encode($response);
            
                   
    }


    
    public function update(){            
            $id                  =   $this->input->post("txt_item_id");
            $item_type           =   $this->input->post("selectcustomertype");
            $item_name           =   $this->input->post("txt_item_name");
            $whole_sale          =   $this->input->post("txt_item_wholesale");
            $retail_sale         =   $this->input->post("txt_item_retailsale");
            $photo               =   $this->input->post("userfile");            
            $desc                =   $this->input->post("txt_description");
            $cutstock            =   $this->input->post("cutstock");
            $img                 =   $this->input->post("txt_getfile");
            $remain_alert        =   $this->input->post("txt_remain_alert");
            $partnumber          =   $this->input->post("txt_part_number");
            $printer_location    =   $this->input->post("cbo_printer_location_name");
            $measure             =   $this->input->post("cb_measure"); 
            
            if($cutstock==1){

            }else{
                $cutstock=0;
            }
            //=======upload photo========
            
                    $config = array(
                        'upload_path' => './img/products',
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "2048",
                        'max_width' => "2048"
                    );
                    
                    $this->load->library('upload', $config);
                    $data1 = array('upload_data' => $this->upload->data());
                    $image = basename( $_FILES["userfile"]["name"]);

                    if(!$this->upload->do_upload())
                    {
                        $error = array('error' => $this->upload->display_errors());
                    }
             //end do upload
             if($image==""){
                        $data=array(
                                        'item_type_id'                      =>$item_type,
                                        'item_detail_name'                  =>$item_name,
                                        'item_detail_whole_price'           =>$whole_sale,
                                        'item_detail_retail_price'          =>$retail_sale,
                                        'item_detail_photo'                 =>$img,
                                        'item_detail_cut_stock'             =>$cutstock,
                                        'item_detail_printer_location_id'   =>$printer_location,
                                        'item_detail_remain_alert'          =>$remain_alert,
                                        'item_detail_des'                   =>$desc,
                                        'item_detail_created_by'            =>$this->session->userdata('user_id'),
                                        'item_detail_created_date'          =>date('Y-m-d'),
                                        'item_detail_part_number'           =>$partnumber,
                                        'measure_id'                        =>$measure
                        );
                    }else{
                        //REMOVE IMAGE FROM FOLDER
                        unlink("./img/products/".$img);
                        //END REMOVE IMAGE
                        $data=array(
                                        'item_type_id'                      =>$item_type,
                                        'item_detail_name'                  =>$item_name,
                                        'item_detail_whole_price'           =>$whole_sale,
                                        'item_detail_printer_location_id'   =>$printer_location,
                                        'item_detail_retail_price'          =>$retail_sale,
                                        'item_detail_photo'                 =>$image,
                                        'item_detail_cut_stock'             =>$cutstock,
                                        'item_detail_remain_alert'          =>$remain_alert,
                                        'item_detail_des'                   =>$desc,
                                        'item_detail_modified_by'           =>$this->Base_model->user_id(),
                                        'item_detail_modified_date'         =>date('Y-m-d'),
                                        'item_detail_part_number'           =>$partnumber,
                                         'measure_id'                        =>$measure
                            );
        }
        
        $this->Base_model->update('item_detail','item_detail_id',$id,$data);
        redirect('item_detail');
        
    }
    
    public function delete(){
        
        $id=$this->uri->segment(3);
       $old_img=$this->Base_model->get_value("item_detail","item_detail_photo","item_detail_id",$id);
        
        $this->Base_model->delete_by('item_detail','item_detail_id',$id);
        try{
            unlink("location: ../../img/products/".$old_img);
        }
        catch(Exception $ex){}
        
        redirect('item_detail');
    }

    public function load($id=0) {
        $record = $this->Base_model->select("SELECT `id`.`item_type_id` AS `item_type_id`,`id`.item_detail_hide_show,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_is_car_wash` AS `item_type_is_car_wash`,`it`.`item_type_is_ingredient` AS `item_type_is_ingredient`,`id`.`item_detail_part_number` AS `item_detail_part_number`,`id`.`item_detail_id` AS `item_detail_id`,`id`.`item_detail_name` AS `item_detail_name`,`id`.`item_detail_whole_price` AS `item_detail_whole_price`,`id`.`item_detail_retail_price` AS `item_detail_retail_price`,`id`.`item_detail_created_by` AS `item_detail_created_by`,`id`.`item_detail_created_date` AS `item_detail_created_date`,`id`.`item_detail_des` AS `item_detail_des`,`id`.`item_detail_modified_by` AS `item_detail_modified_by`,`id`.`item_detail_modified_date` AS `item_detail_modified_date`,`e`.`employee_name` AS `recorder`,`id`.`item_detail_photo` AS `item_detail_photo`,`pl`.`printer_location_name` AS `printer_location_name`,`id`.`item_detail_printer_location_id` AS `item_detail_printer_location_id`,`id`.`item_detail_like_count` AS `item_detail_like_count`,`id`.`item_detail_remain_alert` AS `item_detail_remain_alert`,`id`.`item_detail_cut_stock` AS `item_detail_cut_stock`,`id`.`measure_id` AS `measure_id`,`m`.`measure_name` AS `measure_name`,`m`.`measure_note` AS `measure_note`,`m`.`measure_qty` AS `measure_qty`,
            id.color
            FROM `item_detail` `id`
            LEFT JOIN `item_type` `it` ON`id`.`item_type_id` = `it`.`item_type_id`
            LEFT JOIN `employee` `e` ON`id`.`item_detail_created_by` = `e`.`employee_id`
            LEFT JOIN `printer_location` `pl` ON`pl`.`printer_location_id` = `id`.`item_detail_printer_location_id`
            LEFT JOIN `measure` `m` ON`id`.`measure_id` = `m`.`measure_id`  where item_detail_id=?", array($id));
       
        if($record!="" && $record!=null){
            foreach ($record as $r) {
            
            $arr = array(
                //TOTAL SALE
                'item_detail_id'=>$r->item_detail_id,
                'item_type_id'          =>  $r->item_type_id,
                'item_type_name'          =>  $r->item_type_name,
                'item_detail_name'        =>  $r->item_detail_name,
                'item_detail_part_number' =>  $r->item_detail_part_number,
                'item_detail_des'=>$r->item_detail_des,
                'item_detail_retail_price'=>$r->item_detail_retail_price,
                'item_detail_photo'=>$r->item_detail_photo,
                'item_detail_cut_stock'=>$r->item_detail_cut_stock,
                'item_detail_remain_alert'=>$r->item_detail_remain_alert,
                'item_detail_printer_location_id'=>$r->item_detail_printer_location_id,
                'measure_id'=>$r->measure_id,
                'item_type_is_ingredient'=>$r->item_type_is_ingredient,
                'item_detail_hide_show'=>$r->item_detail_hide_show,
                'color'=>$r->color


            );
        }
        echo json_encode($arr);
        }
        
    }

}
