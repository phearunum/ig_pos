<?php
class Stock extends CI_Controller{
    
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function adjust(){
        $data['title'] = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock/stock_adjust/frm_stock_addjust";
       
        $data['record_stock_location']=$this->Base_model->get_field("stock_location","stock_location_branch_id",$this->Base_model->branch_id());
        $data['record_measure']=$this->Base_model->loadToListJoin("select * from measure");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']=$this->Base_model->loadToListJoin("select * from branch where 1=1 $branch AND branch_status!=0");
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             $data['lbl_stock_title']        =$this->lang->line('stock_increase_addnew_title');
             $data['lbl_stock_itemName']     =$this->lang->line('item_name');
             $data['lbl_stock_QTY']          =$this->lang->line('qty');
             $data['lb_part']               =$this->lang->line('part_number');
             $data['lbl_stock_name']         =$this->lang->line('stock_location');
             $data['lbl_stock_description']  =$this->lang->line('lb_desc');
                    
             $data['btn_create']      =$this->lang->line('btn_create');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_branch']         =$this->lang->line('branch');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             //end TRANSLATE
        
             $this->load->view("welcome/view",$data);
        
    }
    public function waste(){
        $data['title'] = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock/stock_wast/frm_stock_wast";
       
        $data['record_stock_location']=$this->Base_model->get_field("stock_location","stock_location_branch_id",$this->Base_model->branch_id());
        $data['record_measure']=$this->Base_model->loadToListJoin("select * from measure");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']=$this->Base_model->loadToListJoin("select * from branch where 1=1 $branch AND branch_status!=0");
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             $data['lbl_stock_title']        =$this->lang->line('stock_increase_addnew_title');
             $data['lbl_stock_itemName']     =$this->lang->line('item_name');
             $data['lbl_stock_QTY']          =$this->lang->line('qty');
             $data['lb_part']               =$this->lang->line('part_number');
             $data['lbl_stock_name']         =$this->lang->line('stock_location');
             $data['lbl_stock_description']  =$this->lang->line('lb_desc');
             $data['lbl_branch']               =$this->lang->line('branch');
                    
             $data['btn_create']      =$this->lang->line('btn_create');
             $data['btn_cancel']      =$this->lang->line('btn_cancel');
             $data['lbl_stock_waste_list_title']         =$this->lang->line('stock_waste_list_title');
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_field']       =$this->lang->line('lb_field');
             $data['lbl_field_value'] =$this->lang->line('lb_field_value');
             $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
             $data['lbl_allbranch'] =$this->lang->line('allbranch');
             $data['lbl_allstock'] =$this->lang->line('allstock');
             //end TRANSLATE
        
             $this->load->view("welcome/view",$data);
    }
    public function waste_list(){
        $data['title']  = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "stock/stock_wast/stock_wast_list";        
        
        $data['record_stock_adjust']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_adjust where branch_id ='".$this->Base_model->branch_id()."' ORDER BY stock_adjust_id DESC LIMIT 25");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");
        //permission data
            $name =$this->uri->segment(1);
            $name2=$this->uri->segment(2);
           
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name.'/'.$name2."' AND position_id=".$this->Base_model->position_id());
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
                $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             
            
             
             $data['lbl_title']               =$this->lang->line('stock_increase_list_title');
             $data['lbl_part']                =$this->lang->line('part_number');
             $data['lbl_stock_itemName']     =$this->lang->line('item_name');
             $data['lbl_stock_qty']           =$this->lang->line('qty');
             $data['lbl_stock_measure']       =$this->lang->line('measure_name');
             $data['lbl_stock_location']      =$this->lang->line('stock_location');
             $data['lbl_stock_description']   =$this->lang->line('lb_desc');
             $data['lbl_stock_date']          =$this->lang->line('lb_create_date');
             $data['lbl_stock_by']            =$this->lang->line('lb_recorder');
             $data['lbl_item_name']              =$this->lang->line('item_name');
             $data['lbl_allbranch'] =$this->lang->line('allbranch');
             $data['lbl_allstock'] =$this->lang->line('allstock');
             $data['lbl_branch'] =$this->lang->line('branch');
              
             $data['lbl_stock_waste_list_title']         =$this->lang->line('stock_waste_list_title');
             
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_from']        =$this->lang->line('lb_from');
             $data['lbl_to']          =$this->lang->line('lb_to');
             $data['btn_export']      =$this->lang->line('btn_export');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_edit']      =$this->lang->line('lb_edit');
   
             $data['btn_search']      =$this->lang->line('btn_search');
     
//END TRANSLATE
        
        //$data['record_measure']=$this->Base_model->get_data("measure");
        $this->load->view("welcome/view",$data);
    }
    public function response_stock_waste(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_waste where 1=1 $branch ORDER BY stock_waste_id DESC LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }
    public function response_stock_adjust(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_adjust where 1=1 $branch ORDER BY stock_adjust_id DESC LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }
    public function adjust_list(){
        $data['title']  = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "stock/stock_adjust/stock_adjust_list";        
        
        $data['record_stock_adjust']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_adjust where branch_id ='".$this->Base_model->branch_id()."' ORDER BY stock_adjust_id DESC LIMIT 25");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");
        //permission data
            $name =$this->uri->segment(1);
            $name2=$this->uri->segment(2);
           
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name.'/'.$name2."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
             }
            //$data['record_permission']=$this->Base_model->get_permission($name,$name2);
            
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
       // end permission data
            
            //BEGIN TRANSLATE
                $lang = $this->input->cookie('language');
                $this->lang->load('button',$lang=='' ? 'en':$lang);
                $this->lang->load('validation',$lang=='' ? 'en':$lang);
                $this->lang->load('lable',$lang=='' ? 'en':$lang);
                $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             
            
             
             $data['lbl_title']               =$this->lang->line('stock_increase_list_title');
             $data['lbl_part']                =$this->lang->line('part_number');
             $data['lbl_item_name']      =$this->lang->line('item_name');
             $data['lbl_stock_qty']           =$this->lang->line('qty');
             $data['lbl_stock_measure']       =$this->lang->line('measure_name');
             $data['lbl_stock_location']      =$this->lang->line('stock_location');
             $data['lbl_stock_description']   =$this->lang->line('lb_desc');
             $data['lbl_stock_date']          =$this->lang->line('lb_create_date');
             $data['lbl_stock_by']            =$this->lang->line('lb_recorder');
             $data['lbl_allbranch'] =$this->lang->line('allbranch');
             $data['lbl_allstock'] =$this->lang->line('allstock');
              $data['lbl_branch'] =$this->lang->line('branch');
              $data['lbl_stock_itemName']     =$this->lang->line('item_name');
            
             
             $data['lbl_new']         =$this->lang->line('lb_new');
             $data['lbl_from']        =$this->lang->line('lb_from');
             $data['lbl_to']          =$this->lang->line('lb_to');
             $data['btn_export']      =$this->lang->line('btn_export');
             $data['lbl_edit']        =$this->lang->line('lb_edit');
             $data['lbl_delete']      =$this->lang->line('lb_delete');
             $data['lbl_edit']      =$this->lang->line('lb_edit');
   
             $data['btn_search']      =$this->lang->line('btn_search');
     
//END TRANSLATE
        
        //$data['record_measure']=$this->Base_model->get_data("measure");
        $this->load->view("welcome/view",$data);
    }
    
    public function adjust_edit_load(){
        
        //===================
        $data['title']  = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "stock/stock_adjust/frm_stock_adjust_update";
        //===================
        
        $id        =$this->uri->segment(3);
        $product_id=$this->Base_model->get_value("stock_adjust","stock_adjust_item_id","stock_adjust_id",$id);
        $qty       =$this->Base_model->get_value("stock_adjust","stock_adjust_qty","stock_adjust_id",$id);
        $measure_id=$this->Base_model->get_value("stock_adjust","measure_id","stock_adjust_id",$id);
        $stock_location=$this->Base_model->get_value("stock_adjust","stock_location_id","stock_adjust_id",$id);
        
        $data['qty']=$qty;
        $data['purchase_detail_record']=$this->Base_model->get_field('stock_adjust','stock_adjust_id',$id);
        $data['stock_record'] =$this->Base_model->loadToListJoin("select * from stock where stock_location_id=$stock_location and stock_item_id=".$product_id."  and branch_id=".$this->Base_model->branch_id());
        $data['record_stock_location'] =$this->Base_model->get_field("stock_location","stock_location_branch_id",$this->Base_model->branch_id());
        
        $getproductname=$this->Base_model->loadToListJoin("select item_detail_name from item_detail where item_detail_id=".$product_id);
        
        $proname="";
        
        foreach($getproductname as $gn){
            $proname=$gn->item_detail_name;
        }
        
        $data['proname']=$proname;
        $data['qty']=$qty;
        $data['id']=$id;
        
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
         $data['lbl_stock_title']        =$this->lang->line('stock_increase_addnew_title');
         $data['lbl_stock_itemName']     =$this->lang->line('item_name');
         $data['lbl_stock_QTY']          =$this->lang->line('qty');
         $data['lb_part']               =$this->lang->line('part_number');
         $data['lbl_stock_name']         =$this->lang->line('stock_location');
         $data['lbl_stock_description']  =$this->lang->line('lb_desc');
         $data['lbl_stock_measure']='stock_measure';
        
         $data['btn_update']      =$this->lang->line('btn_update');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
 
         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note_for_form'] =$this->lang->line('val_mess_require');
         //end TRANSLATE
        
        $this->load->view('welcome/view',$data);
    }
    
    public function waste_edit_load(){
        
        //===================
        $data['title']  = "STOCK WASTE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "stock/stock_wast/frm_stock_wast_update";
        //===================
        
        $id        =$this->uri->segment(3);
        $product_id=$this->Base_model->get_value("stock_waste","stock_waste_item_id","stock_waste_id",$id);
        $qty       =$this->Base_model->get_value("stock_waste","stock_waste_qty","stock_waste_id",$id);
        $measure_id=$this->Base_model->get_value("stock_waste","measure_id","stock_waste_id",$id);
        $stock_location=$this->Base_model->get_value("stock_waste","stock_location_id","stock_waste_id",$id);
        $data['qty']=$qty;
        
        $data['purchase_detail_record']=$this->Base_model->get_field('stock_waste','stock_waste_id',$id);
        $data['stock_record']=$this->Base_model->loadToListJoin("select * from stock where stock_location_id=$stock_location and stock_item_id=".$product_id." and branch_id=".$this->Base_model->branch_id());
        $data['record_stock_location']=$this->Base_model->get_field("stock_location","stock_location_branch_id",$this->Base_model->branch_id());
        
        $getproductname=$this->Base_model->loadToListJoin("select item_detail_name from item_detail where item_detail_id=".$product_id);
        
        $proname="";
        foreach($getproductname as $gn){
            $proname=$gn->item_detail_name;
        }
        
        $data['proname']=$proname;
        $data['qty']=$qty;
        $data['id']=$id;
            
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
         $data['lbl_stock_title']        =$this->lang->line('stock_waste_addnew_title');
         $data['lbl_stock_itemName']     =$this->lang->line('item_name');
         $data['lbl_stock_qty']          =$this->lang->line('qty');
         $data['lb_part']               =$this->lang->line('part_number');
         $data['lbl_stock_name']         =$this->lang->line('stock_location');
         $data['lbl_stock_description']  =$this->lang->line('lb_desc');
         $data['lbl_stock_measure']='stock_measure';
        
         $data['btn_update']      =$this->lang->line('btn_update');
         $data['btn_cancel']      =$this->lang->line('btn_cancel');
 
         $data['lbl_new']         =$this->lang->line('lb_new');
         $data['lbl_field']       =$this->lang->line('lb_field');
         $data['lbl_field_value'] =$this->lang->line('lb_field_value');
         $data['lbl_note'] =$this->lang->line('val_mess_require');
         //end TRANSLATE
             
        $this->load->view('welcome/view',$data);
    }
    public function check_exist_stock(){
        $item=$this->input->post('item');
        $branch=$this->input->post('branch');
        $stock=$this->input->post('stock');
        if($this->Base_model->check_exists("stock_id","stock",array('stock_item_id'=>$item,'branch_id'=>$branch,'stock_location_id'=>$stock))){
            $response['status']='S001';
        }else{
            $response['status']='E001';
        }
        echo json_encode($response);
    }
    
    public function save_adjust(){
            $product_id     =$this->input->post("txtpro_id");
            //$measure_id     =$this->input->post("cbo_measure");
            // $measure_id     =$this->Base_model->get_value_byQuery("select measure_id from item_detail where item_detail_id=$product_id","measure_id");
            $qty            =$this->input->post("txt_qty");
            $desc           =$this->input->post("txt_description");
            $stock_location =$this->input->post("cbo_stock_location");
            $branch_id      =$this->input->post("cbo_branch");
            $data=array(
                    'stock_adjust_item_id'           =>$product_id,
                    // 'measure_id'                     =>$measure_id,
                    'stock_adjust_qty'               =>$qty,
                    'stock_adjust_created_date'      =>date('Y-m-d'),
                    'stock_adjust_created_by'        =>$this->Base_model->user_id(),
                    'stock_adjust_branch_id'         =>$branch_id,
                    'stock_location_id'              =>$stock_location,
                    'stock_adjust_note'              =>$desc
            );
        if($this->Base_model->check_exists("stock_id","stock",array('stock_item_id'=>$product_id,'branch_id'=>$branch_id,'stock_location_id'=>$stock_location))){
            $this->Base_model->save('stock_adjust',$data);
            $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$product_id and branch_id=$branch_id and stock_location_id=$stock_location order by stock_created_date desc limit 1");
           
            if($rd_stock!=""){
                foreach($rd_stock as $rd){
                    $update_stock=array(
                         'stock_qty'           => $rd->stock_qty+$qty
                    );
                     $this->Base_model->update('stock','stock_id',$rd->stock_id,$update_stock);
                    
                }
            }
            $response['status']='S001';
            $response['message']='Data has been saved !!';
        }else{
            $response['status']='E001';
            $response['message']='Item not exist in stock!!'; 
        }
        
    
        echo json_encode($response);
        
    }

    ///////
    public function delete_stock_adjust(){
 
        $id=$this->uri->segment(3);
    
        $rd_adj=$this->Base_model->loadToListJoin("select * from stock_adjust where stock_adjust_id=$id");
        foreach($rd_adj as $rd){

            $qty=$rd->stock_adjust_qty;
            $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$rd->stock_adjust_item_id and branch_id=$rd->stock_adjust_branch_id and stock_location_id=$rd->stock_location_id order by stock_created_date desc");
            $total_in_stock=$this->Base_model->get_value_byQuery("select sum(stock_qty) total from stock where stock_item_id=$rd->stock_adjust_item_id and branch_id=$rd->stock_adjust_branch_id and stock_location_id=$rd->stock_location_id order by stock_created_date desc","total");
            if($total_in_stock<$qty){
                $response['status']='E001';
                $response['message']='You cannot delete Item !! Item in stock less than this adjust qty !!';
            }else{
                for($i=0;$i<count($rd_stock);$i++){
                    if($qty<=$rd_stock[$i]->stock_qty){
             
                        $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>$rd_stock[$i]->stock_qty-$qty));
                        break;
                    }else{
                        if(($rd_stock[$i]->stock_qty)>0){
                            $qty=$qty-$rd_stock[$i]->stock_qty;
                            $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>0));
                        }
                        
                    }

                 }
                 $this->Base_model->delete_by('stock_adjust','stock_adjust_id',$id);
                 $response['status']='S001';
                 $response['message']='Record has been deleted!!';
            }
            
        }
        
        echo json_encode($response);
      
        //redirect('stock/adjust_list');
        
    }
    public function stock_adjust_update(){
        $id=$this->input->post('id');
        $qty=$this->input->post('qty');
        $oldqty=$this->input->post("qty_old");
        $data=array(
            'stock_adjust_qty'    => $qty
         
        );
        
        

        $stock_adjust=$this->Base_model->loadToListJoin("select * from stock_adjust where stock_adjust_id=$id");
        foreach($stock_adjust as $sa){
            //$qtys=0;
            
            if($qty>$oldqty){
                //++stock
                $this->Base_model->update('stock_adjust','stock_adjust_id',$id,$data);
                $qtys=$qty-$oldqty;
                $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$sa->stock_adjust_item_id and branch_id=$sa->stock_adjust_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc limit 1");
                foreach($rd_stock as $rd){
                    $update_stock=array(
                         'stock_qty'           => $rd->stock_qty+$qtys
                    );
                     $this->Base_model->update('stock','stock_id',$rd->stock_id,$update_stock);
                    
                }
                $response['status']='S001';
                $response['message']='Data has been updated!!';
            }else if($qty==$oldqty){
                $response['status']='S001';
                $response['message']='Data has been updated!!';
            }else{
                //--stock

                $qtys=$oldqty-$qty;
                $total_in_stock=$this->Base_model->get_value_byQuery("select sum(stock_qty) total from stock where stock_item_id=$sa->stock_adjust_item_id and branch_id=$sa->stock_adjust_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc","total");
                if($total_in_stock<$qtys){
                    $response['status']='E001';
                    $response['message']='You cannot adjust Item !! Item in stock less than qty!!';
                }else{
                    $this->Base_model->update('stock_adjust','stock_adjust_id',$id,$data);
                    $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$sa->stock_adjust_item_id and branch_id=$sa->stock_adjust_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc");
                    $this->cut_stock_adjust($rd_stock,$qtys);
                    $response['status']='S001';
                    $response['message']='Data has been updated!!';

                } 
            }

        }
        
        echo json_encode($response);   
    }

    //this fun cut desc in stock
    private function cut_stock_adjust($rd_stock,$qtys){
        for($i=0;$i<count($rd_stock);$i++){
                        if($qtys<=$rd_stock[$i]->stock_qty){
                            $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>$rd_stock[$i]->stock_qty-$qtys));
                            break;
                        }else{
                            if(($rd_stock[$i]->stock_qty)>0){
                                $qtys=$qtys-$rd_stock[$i]->stock_qty;
                                $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>0));
                            }
                            
                        }

                    }
    }
    public function save_waste(){
            $product_id     =$this->input->post("txtpro_id");
            //$measure_id     =$this->input->post("cbo_measure");
            $measure_id     =$this->Base_model->get_value_byQuery("select measure_id from item_detail where item_detail_id=$product_id","measure_id");
            $qty            =$this->input->post("txt_qty");
            $desc           =$this->input->post("txt_description");
            $stock_location =$this->input->post("cbo_stock_location");
            $branch_id      =$this->input->post("cbo_branch");
            $data=array(
                    'stock_waste_item_id'           =>$product_id,
                    // 'measure_id'                    =>$measure_id,
                    'stock_waste_qty'               =>$qty,
                    'stock_waste_created_date'      =>date('Y-m-d'),
                    'stock_waste_created_by'        =>$this->Base_model->user_id(),
                    'stock_waste_branch_id'         =>$branch_id,
                    'stock_location_id'             =>$stock_location,
                    'stock_waste_note'              =>$desc
            );
        
        if($this->Base_model->check_exists("stock_id","stock",array('stock_item_id'=>$product_id,'branch_id'=>$branch_id,'stock_location_id'=>$stock_location))){

                $total_in_stock=$this->Base_model->get_value_byQuery("select sum(stock_qty) total from stock where stock_item_id=$product_id and branch_id=$branch_id and stock_location_id=$stock_location order by stock_created_date desc","total");
                if($total_in_stock<$qty){
                    $response['status']='E001';
                    $response['message']='You cannot adjust Item !! Item in stock less than qty!!';
                }else{
                    $this->Base_model->save('stock_waste',$data);
                    $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$product_id and branch_id=$branch_id and stock_location_id=$stock_location order by stock_created_date desc");
                    $this->cut_stock_adjust($rd_stock,$qty);
                    $response['status']='S001';
                    $response['message']='Data has been saved!!';

                }
        }else{
            $response['status']='E001';
            $response['message']='Item not exist in stock!!'; 
        }
        
    
        echo json_encode($response);
        
    }

     public function stock_waste_update(){
        $id=$this->input->post('id');
        $qty=$this->input->post('qty');
        $oldqty=$this->input->post("qty_old");
        $data=array(
            'stock_waste_qty'    => $qty
         
        );
        $stock_waste=$this->Base_model->loadToListJoin("select * from stock_waste where stock_waste_id=$id");
        foreach($stock_waste as $sa){
            //$qtys=0;
            
            if($qty<$oldqty){
                //++stock
                $this->Base_model->update('stock_waste','stock_waste_id',$id,$data);
                $qtys=$oldqty-$qty;
                $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$sa->stock_waste_item_id and branch_id=$sa->stock_waste_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc limit 1");
                foreach($rd_stock as $rd){
                    $update_stock=array(
                         'stock_qty'           => $rd->stock_qty+$qtys
                    );
                     $this->Base_model->update('stock','stock_id',$rd->stock_id,$update_stock);
                    
                }
                $response['status']='S001';
                $response['message']='Data has been updated!!';
            }else if($qty==$oldqty){
                $response['status']='S001';
                $response['message']='Data has been updated!!';
            }else{
                //--stock

                $qtys=$qty-$oldqty;
                $total_in_stock=$this->Base_model->get_value_byQuery("select sum(stock_qty) total from stock where stock_item_id=$sa->stock_waste_item_id and branch_id=$sa->stock_waste_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc","total");
                if($total_in_stock<$qtys){
                    $response['status']='E001';
                    $response['message']='You cannot adjust Item !! Item in stock less than qty!!';
                }else{
                    $this->Base_model->update('stock_waste','stock_waste_id',$id,$data);
                    $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$sa->stock_waste_item_id and branch_id=$sa->stock_waste_branch_id and stock_location_id=$sa->stock_location_id order by stock_created_date desc");
                    $this->cut_stock_adjust($rd_stock,$qtys);
                    $response['status']='S001';
                    $response['message']='Data has been updated!!';

                } 
            }

        }
        
        echo json_encode($response);   
    }
    
    public function delete_stock_waste(){

        $id=$this->uri->segment(3);
        
        $rd_waste=$this->Base_model->loadToListJoin("select * from stock_waste where stock_waste_id=$id");
     
        foreach($rd_waste as $sw){
            $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$sw->stock_waste_item_id and branch_id=$sw->stock_waste_branch_id and stock_location_id=$sw->stock_location_id order by stock_created_date desc limit 1");
           
            if($rd_stock!=""){
                foreach($rd_stock as $rd){
                    $update_stock=array(
                         'stock_qty'           => $rd->stock_qty+$sw->stock_waste_qty
                    );
                     $this->Base_model->update('stock','stock_id',$rd->stock_id,$update_stock);
                     $this->Base_model->delete_by('stock_waste','stock_waste_id',$id);
                }
            }
        }
        $response['status']='S001';
        $response['message']='Record has been deleted!!';
            
        echo json_encode($response);
        
    }
//    public function check_stock(){
//        $product_id = $this->input->post('product_id');
//        $qty = $this->input->post('qty');
//        $stock_id = $this->input->post('stock_id');
//        $stock_qty = $this->Base_model->get_value_byQuery("select stock_qty as qty from stock where stock_item_id='$product_id' and stock_location_id='$stock_id'",'qty');
//        echo $stock_qty;
//    }
    //START => function search
    public function search_stock_adjust(){
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $branch=$this->input->get("branch");
        $stock=$this->input->get("stock");
        $part=$this->input->get("part");
        $item=$this->input->get("item");

        $s_date="";
        $s_branch="";
        $s_stock="";
        $s_part="";
        $s_item="";
        $branch_p="";
        if($this->Base_model->is_supper_user()==false){
            $branch_p=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        if($df!="" && $dt!=""){
            $s_date="and  date_format(date_entry,'%Y-%m-%d') between '".$df."' and '".$dt."' ";
        }
        if($branch!=0){
            $s_branch=" and branch_id=$branch";
        }
        if($stock!=0){
            $s_stock="and stock_location_id=$stock";
        }
        if($part!=""){
            $s_part="and item_detail_part_number like '".$part."' ";
        }
        if($item!=""){
            $s_item="and item_detail_name like '".$item."'";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_adjust where 1=1 $s_date $branch_p $s_branch $s_stock $s_part $s_item ORDER BY stock_adjust_id DESC LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }
       
    public function search_stock_waste(){
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $branch=$this->input->get("branch");
        $stock=$this->input->get("stock");
        $part=$this->input->get("part");
        $item=$this->input->get("item");

        $s_date="";
        $s_branch="";
        $s_stock="";
        $s_part="";
        $s_item="";
        $branch_p="";
        if($this->Base_model->is_supper_user()==false){
            $branch_p=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        if($df!="" && $dt!=""){
            $s_date="and  date_format(date_entry,'%Y-%m-%d') between '".$df."' and '".$dt."' ";
        }
        if($branch!=0){
            $s_branch=" and branch_id=$branch";
        }
        if($stock!=0){
            $s_stock="and stock_location_id=$stock";
        }
        if($part!=""){
            $s_part="and item_detail_part_number like '".$part."' ";
        }
        if($item!=""){
            $s_item="and stock_waste_item_id=$item";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock_waste where 1=1 $s_date $branch_p $s_branch $s_stock $s_part $s_item ORDER BY stock_waste_id DESC LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }
    //END => function search
    public function check_stock(){
        $product_id = $this->input->post('product_id');
        $qty = $this->input->post('qty');
        $stock_id = $this->input->post('stock_id');
        $stock_qty = $this->Base_model->get_value_byQuery("select stock_qty as qty from stock where stock_item_id='$product_id' and stock_location_id='$stock_id'",'qty');
        echo $stock_qty;
    }


}
