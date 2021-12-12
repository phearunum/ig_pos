<?php
class Ingredient extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }   
    public function index(){
        $data['title'] = "INGREDIENT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "ingredient/list_ingredient_detail";
        
       
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
         //BEGIN TRANSLATE
         $lang = $this->input->cookie('language');
         $this->lang->load('button',$lang=='' ? 'en':$lang);
         $this->lang->load('validation',$lang=='' ? 'en':$lang);
         $this->lang->load('lable',$lang=='' ? 'en':$lang);

         $this->lang->load('ingredient',$lang=='' ? 'en':$lang);
         
         $data['lbl_ingredient_title']         =$this->lang->line('ing_list_name');
         $data['lbl_ingredient']          =$this->lang->line('ingredient');
         $data['lbl_part']          =$this->lang->line('part_number');
         $data['lbl_qty']          =$this->lang->line('qty');
         $data['lbl_costing']           =$this->lang->line('costing');
         $data['lbl_create_date']    =$this->lang->line('lb_create_date');
         $data['lbl_recorder']      =$this->lang->line('lb_recorder');
         $data['lbl_modified_date']    =$this->lang->line('lb_modified_date');
         $data['lbl_modifier']      =$this->lang->line('lb_modifier');
         $data['lbl_desc']         =$this->lang->line('lb_desc');   
         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['lbl_delete']      =$this->lang->line('lb_delete');
         $data['lbl_edit']        =$this->lang->line('lb_edit');
         $data['lbl_action']        =$this->lang->line('lb_action');
         
    //END TRAN SLATE
        
        $this->load->view("welcome/view",$data);
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from v_item_detail where item_detail_id in (select distinct ingredient_item_detail_id from ingredient)");
        $this->load->view("report/report_stock/response",$data);
    }
    public function addnew(){
        $data['title'] = "INGREDIENT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "ingredient/frm_ingredient";
        
        $no=$this->uri->segment(3);
        
        if($no!=""){
            $data['ingredient_no']=$no;
        }else{
            if ($this->Base_model->loadToListJoin("select ingredient_status from ingredient where ingredient_created_by=" . $this->Base_model->user_id())) {
                $invNo = $this->Base_model->loadToListJoin("select ingredient_no from ingredient where ingredient_created_by=" . $this->Base_model->user_id() . " limit 1");

                $invoiceno = 0;
                foreach ($invNo as $inv) {
                    $invoiceno = $inv->ingredient_no;
                }

                $data['ingredient_no'] = $invoiceno;
            } else {
                $data['ingredient_no'] = $this->get_invoice_no();
            }
        }
        $data['records_ingredient']= $this->Base_model->get_data_by('select item_detail_id,item_detail_name from v_item_detail where item_type_is_ingredient=1');
        $data['record_measure']=$this->Base_model->get_data("measure");
        
        $data['record_list_ingredient']=$this->Base_model->get_data_by("select * from v_ingredient where ingredient_status='ACTIVE'");
        
         //BEGIN TRANSLATE
         $lang = $this->input->cookie('language');
         $this->lang->load('button',$lang=='' ? 'en':$lang);
         $this->lang->load('validation',$lang=='' ? 'en':$lang);
         $this->lang->load('lable',$lang=='' ? 'en':$lang);

         $this->lang->load('ingredient',$lang=='' ? 'en':$lang);
         
         $data['lbl_ingredient_title']         =$this->lang->line('addnew_ing_name');
         $data['lbl_ingredient']          =$this->lang->line('ingredient');
         $data['lbl_food_name']          =$this->lang->line('food_name');
         $data['lbl_amount']          =$this->lang->line('amount');
         $data['lbl_qty']          =$this->lang->line('qty');
         $data['lbl_no']          =$this->lang->line('lb_no');
         $data['lbl_action']          =$this->lang->line('lb_action');
         $data['lbl_desc']         =$this->lang->line('lb_desc');   
         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['btn_save']      =$this->lang->line('btn_save');
         $data['btn_add']         =$this->lang->line('btn_add');
         $data['btn_delete']      =$this->lang->line('btn_delete');
         $data['btn_cancel']        =$this->lang->line('btn_cancel');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
        //END TRAN SLATE
        $this->load->view("welcome/view",$data);
    }
    
    public function get_invoice_no(){
        
        $invNO=0;
        $records=$this->Base_model->loadToListJoin('SELECT max(ingredient_no) as no FROM ingredient');
                     
            foreach($records as $inv){
                $iv=$inv->no;
            if($iv>0){
                $invNO=$iv+1;
            }else{
                $invNO=1;
            }
            return $invNO;
        }
        
    }
    
    public function save(){
        
        
        $item_id=$this->input->post("item_id");
        $data=$this->input->post("data");
        $no=$this->input->post("no");

        if($this->Base_model->get_data_by("select * from ingredient where ingredient_item_detail_id=$item_id")){
            $response["success"] = 0;
            $response["statusCode"] = 'E0001';
            $response["message"] = "Data Exist!";
            echo json_encode($response);
        }else{


                $da = json_decode($data);
            foreach ($da as $d) {
                $data_save=array(
                    'ingredient_no'=>$no,
                    'ingredient_item_detail_id'=>$item_id,
                    'ingredient_item_ingredient_id'=>$d->inc_id,
                    'ingredient_qty'=>$d->qty,
                    'ingredient_created_date'       =>date('Y-m-d'),
                    'ingredient_created_by'         =>$this->Base_model->user_id(),
                    'ingredient_desc'               =>$d->des


                );
                 $this->Base_model->save('ingredient',$data_save);
            }
            $response["success"] = 1;
            $response["statusCode"] = 'S0001';
            $response["message"] = "Someting Cool has been saved!";
            echo json_encode($response);
        }
        
        
      
    }

    public function get_measure_name(){
        $ingredient_id = $this->input->get("ingredient_id");

        $measure_name = $this->Base_model->get_value_sql("SELECT 
        m.measure_name
        from item_detail it
        join measure m on m.measure_id =it.measure_id
        WHERE item_detail_id =$ingredient_id","measure_name");

          echo  json_encode($measure_name);
    }

    public function save_update(){
        
        $item_id=$this->input->post("item_id");
        $inc=$this->input->post("inc");
        $no=$this->input->post("no");
        $qty=$this->input->post("qty");
        $inc_edit=$this->input->post("edit_inc");
        $des=$this->input->post("des");


        if($inc_edit==""){
                if($this->Base_model->get_data_by("select * from ingredient where ingredient_item_detail_id=$item_id and ingredient_item_ingredient_id=$inc")){
                    $response["success"] = 0;
                    $response["statusCode"] = 'E0001';
                    $response["message"] = "Data Exist!";
                    echo json_encode($response);
                }else{
                       
                  
                        $data_save=array(
                            'ingredient_no'=>$no,
                            'ingredient_item_detail_id'=>$item_id,
                            'ingredient_item_ingredient_id'=>$inc,
                            'ingredient_qty'=>$qty,
                            'ingredient_desc' =>$des,
                            'ingredient_created_date'       =>date('Y-m-d'),
                            'ingredient_created_by'         =>$this->Base_model->user_id()
                        );
                        
                    $this->Base_model->save('ingredient',$data_save);
                    
                    $response["success"] = 1;
                    $response["statusCode"] = 'S0001';
                    $response["message"] = "Someting Cool has been saved!";
                    echo json_encode($response);
            }
        }else{
            if($this->Base_model->get_data_by("select * from ingredient where ingredient_item_detail_id=$item_id and ingredient_item_ingredient_id=$inc")){
                    if($inc==$inc_edit){
                        goto a;
                    }else{
                        $response["success"] = 0;
                        $response["statusCode"] = 'E0001';
                        $response["message"] = "Data Exist!";
                        echo json_encode($response);
                    }
                    
                }else{
                       a:
                  
                        $data_update=array(
                            //'ingredient_no'=>$no,
                            'ingredient_item_detail_id'=>$item_id,
                            'ingredient_item_ingredient_id'=>$inc,
                            'ingredient_qty'=>$qty,
                            'ingredient_desc' =>$des,
                            'ingredient_modified_date'       =>date('Y-m-d'),
                            'ingredient_modified_by'         =>$this->Base_model->user_id()


                        );
                        //updates($tbname, $cond, $data)
                         $this->Base_model->updates('ingredient',array('ingredient_item_detail_id'=>$item_id,' ingredient_item_ingredient_id'=>$inc_edit),$data_update);
                    
                    $response["success"] = 1;
                    $response["statusCode"] = 'S0001';
                    $response["message"] = "Someting Cool has been updated!";
                    echo json_encode($response);
            }

        }
        
      
    }
    public function add(){
        $item_detail_id     = $this->input->post("txtpro_id");
        $ingredient_id      = $this->input->post("txt_ingredient_id"); 
        $ingredient_qty     = $this->input->post("txt_qty");
        $ingredient_measure = $this->input->post("cbo_measure");
        $ingredient_desc    = $this->input->post("txt_description");
        $no=$this->input->post("txtno");
       
        $ingredient_data=array(
            'ingredient_item_detail_id'     =>$item_detail_id,
            'ingredient_measure_id'         =>$ingredient_measure,
            'ingredient_qty'                =>$ingredient_qty,
            'ingredient_item_ingredient_id' =>$ingredient_id,
            'ingredient_desc'               =>$ingredient_desc,
            'ingredient_created_date'       =>date('Y-m-d'),
            'ingredient_created_by'         =>$this->Base_model->user_id(),
            'ingredient_status'             =>'ACTIVE',
            'ingredient_no'                 =>$no
        );
        
        $this->Base_model->save('ingredient',$ingredient_data);
        redirect('ingredient/addnew');
        
    }
    
    public function pay(){
        
            $no=$this->input->post("txtno");
            $item_id=$this->input->post("txtpro_id");
            //UPDATE PURCHASE DETAIL
                $record_ingredient=array(
                    'ingredient_item_detail_id'         => $item_id,
                    'ingredient_status'                 => "DONE"
                );
                
                $this->Base_model->update('ingredient','ingredient_no',$no,$record_ingredient);
            //END
            redirect('ingredient');
    }
    public function edit_load(){
        
        $data['title'] = "INGREDIENT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "ingredient/frm_ingredient_update";
        
        $ingredient_id=$this->uri->segment(3);
        $data['ingredient_id']=$ingredient_id;
        $data['record_measure']=$this->Base_model->get_data("measure");
        
        $data['record_list_ingredient']=$this->Base_model->get_data_by("select * from v_ingredient where ingredient_id=".$ingredient_id);
        
        $this->load->view("welcome/view",$data);
        
    }
    
    public function update($id){
        $data['title'] = "INGREDIENT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "ingredient/frm_ingredient_update";
        //$data['ingredient_id']=$id;
        //$data['record_measure']=$this->Base_model->get_data("measure");
        $data['records_ingredient']= $this->Base_model->get_data_by('select item_detail_id,item_detail_name from v_item_detail where item_type_is_ingredient=1');
        $data['id']=$id;
        //get_value($tblname, $field, $wherefield, $wherecondition)
        $data['no']=$this->Base_model->get_value("ingredient","ingredient_no","ingredient_item_detail_id",$id);
        $data['item_name']=$this->Base_model->get_value("item_detail","item_detail_name","item_detail_id",$id);
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('ingredient',$lang=='' ? 'en':$lang);
        
        $data['lbl_ingredient_title']         =$this->lang->line('addnew_ing_name');
        $data['lbl_ingredient']          =$this->lang->line('ingredient');
        $data['lbl_food_name']          =$this->lang->line('food_name');
        $data['lbl_amount']          =$this->lang->line('amount');
        $data['lbl_qty']          =$this->lang->line('qty');
        $data['lbl_no']          =$this->lang->line('lb_no');
        $data['lbl_action']          =$this->lang->line('lb_action');
        $data['lbl_desc']         =$this->lang->line('lb_desc');   
        $data['lbl_new']         =$this->lang->line('lb_new');
        $data['btn_save']      =$this->lang->line('btn_save');
        $data['btn_add']         =$this->lang->line('btn_add');
        $data['btn_delete']      =$this->lang->line('btn_delete');
        $data['btn_cancel']        =$this->lang->line('btn_cancel');
        $data['btn_clear']        =$this->lang->line('btn_clear');
        $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
       //END TRAN SLATE
        $this->load->view("welcome/view",$data);
        
    }
    
    public function searchproduct(){
        $this->load->view("search/search.php");
    }
    
    public function delete(){
        $item_id=$this->input->post("item_id");
        $inc=$this->input->post("inc");

        $this->Base_model->run_query("delete from ingredient where ingredient_id=$inc");
        
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Someting Cool has been saved!";
        echo json_encode($response);
    }
    public function delete_inc($id){
        $item_id=$this->uri->segment(4);
        $this->Base_model->run_query("delete from ingredient where ingredient_id=$id");
        redirect('ingredient');
    }
    public function deletes($id){
       
        $this->Base_model->run_query("delete from ingredient where ingredient_item_detail_id=$id");
        redirect('ingredient');
       /* $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Someting Cool has been saved!";
        echo json_encode($response);*/
    }
    public function load_all($id) {
       // $id = $this->input->post("item_id");
        $result = $this->Base_model->get_data_by("select * from v_ingredient where ingredient_item_detail_id=" . $id . " ");
        if ($result != "") {
            echo json_encode($result);
        } else {
            $response["success"] = 0;
            $response["statusCode"] = 'E0001';
            $response["message"] = "Data null!";
            echo json_encode($response);
        }
    }

    public function list_ingredient($id){
        $data['title'] = "INGREDIENT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "ingredient/list_ingredient_detail";
        $data['id']=$id;
        $data['record_list_ingredient']=$this->Base_model->get_data_by("select ingredient_id,item_name from v_ingredient where ingredient_item_detail_id=$id");
        
        $data['record_expandable_list_ing']=$this->Base_model->get_data_by("select ingredient_id,item_name,ingredient_no from v_ingredient group by ingredient_no");
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
        $this->load->view("welcome/view",$data);
    }

    public function response_detail(){
        $data['records']=$this->Base_model->loadToListJoin("select *,concat(item_detail_name,' ( Price: $ ',item_main_retail_price,')') as item_with_price from v_ingredient where item_detail_name!='' ");
        $this->load->view("report/report_stock/response",$data);
    }
}
