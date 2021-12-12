<?php
class Purchase extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
       
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index() {
        $data['title']  = "Purchase Order List";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "purchase/purchase_new/purchase_list";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $name = $this->uri->segment(1);
       
        $data['record_permission']=$this->Base_model->get_permission($name);
        
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('purchase',$lang=='' ? 'en':$lang);
        
        $data['lbl_list']               =$this->lang->line('purchase_order_list_name');
        $data['lbl_po_number']          =$this->lang->line('po_number');
        $data['lbl_po_date']            =$this->lang->line('po_date');
        $data['lbl_supplier']           =$this->lang->line('supplier');
        $data['lbl_supplier_phone']     =$this->lang->line('supplier_phone');
        $data['lbl_supplier_phone']     =$this->lang->line('supplier_phone');
        $data['lbl_deposit']            =$this->lang->line('deposit');
        $data['lbl_discount']           =$this->lang->line('discount');
        $data['lbl_total']              =$this->lang->line('lb_total');
        $data['lbl_credit']             =$this->lang->line('credit');
        $data['lbl_due_date']           =$this->lang->line('due_date');
        $data['lbl_status']             =$this->lang->line('status');
        $data['lbl_recorder']           =$this->lang->line('lb_recorder');
        $data['lbl_edit']               =$this->lang->line('lb_edit');
        $data['lbl_new']                =$this->lang->line('lb_new');
        $data['lbl_view']                =$this->lang->line('lb_view');
        $data['btn_search']             =$this->lang->line('btn_search');
        $data['btn_export']             =$this->lang->line('btn_export');
        $data['lbl_from']               =$this->lang->line('lb_from');
        $data['lbl_to']                 =$this->lang->line('lb_to');
        $data['lbl_grand_total']        =$this->lang->line('lb_grand_total');
        $data['lbl_total']              =$this->lang->line('lb_total');
        $data['lbl_no']                 =$this->lang->line('no');
        $data['lbl_branch']              = $this->lang->line('branch');
        $data['lbl_purchase']           = $this->lang->line('purchase');
        $data['lbl_measure']            = $this->lang->line('measure');

        //place holder purchase
        $data['lb_supplier']            = $this->lang->line('supplier');
        $data['lb_po']            = $this->lang->line('po');
        $data['lb_allbranch']            = $this->lang->line('allbranch');


        //BEGIN TRANSLATE
        
        
        $this->load->view("welcome/view", $data);
//        }
    }
    public function addnew() {

        $data['title']  = "PURCHASE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "purchase/purchase_new/frm_purchase";

        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));

        $data['purchase_no'] = '';
        $data['date_now'] = $date->format('Y-m-d H:i');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        $data['supplier']= $this->Base_model->loadToListJoin("SELECT * FROM supplier where supplier_status=1");
        $data['record_measure'] = $this->Base_model->loadToListJoin("SELECT * FROM measure where status=1");
        $data['record_stock_location'] = $this->Base_model->get_field("stock_location", "stock_location_branch_id", $this->Base_model->branch_id());
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('purchase',$lang=='' ? 'en':$lang);

        $data['lbl_title'] = $this->lang->line('purchase_order_addnew_name');
        $data['lbl_no'] = $this->lang->line('no');
        $data['lbl_part']  = $this->lang->line('part_number');
        $data['lbl_name']  = $this->lang->line('item_name');
        $data['lbl_qty']   = $this->lang->line('qty');
        $data['lbl_amount']   = $this->lang->line('amount');
        $data['lbl_measure_note'] = $this->lang->line('measure_note');
        $data['lbl_stock_name'] = $this->lang->line('stock');
        $data['lbl_date'] = $this->lang->line('po_date');
        $data['lbl_date_expired'] = $this->lang->line('expire');
        $data['lbl_date_alert'] = $this->lang->line('alert');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['lbl_ref'] =  $this->lang->line('ref_no');
        $data['lbl_paid'] = $this->lang->line('paid');
        $data['lbl_due_date'] = $this->lang->line('due_date');
        $data['lbl_branch']     = $this->lang->line('branch');
        $data['lbl_purchase']   = $this->lang->line('purchase');
        $data['lbl_measure']    = $this->lang->line('measure');
       
        $data['lbl_retail_qty'] = $this->lang->line('retail_qty');
        $data['lbl_retail_amount'] = $this->lang->line('retail_amount');
     
        $data['lbl_discount'] = $this->lang->line('discount');
        $data['lbl_grand_total']  =$this->lang->line('lb_grand_total');
        $data['lbl_deposit']  =$this->lang->line('deposit');
        $data['lbl_desc'] = $this->lang->line('lb_desc');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_stock'] = $this->lang->line('stock');
        $data['lbl_current_stock'] = $this->lang->line('lb_current_stock');
        $data['lbl_total_stock'] = $this->lang->line('lb_total_stock');
        $data['lbl_stock'] = $this->lang->line('stock');
      
        $data['lbl_price'] = $this->lang->line('amount');
        
        
       
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_delete'] = $this->lang->line('lb_delete');
        $data['btn_save_all'] =$this->lang->line('btn_save_all');
        $data['btn_save'] =$this->lang->line('btn_save');
        $data['btn_add'] =$this->lang->line('btn_add');
        $data['btn_clear']   =$this->lang->line('btn_clear');
        $data['lbl_new'] =$this->lang->line('lb_new');
        $data['lbl_note']   =$this->lang->line('val_mess_require');

        $data['lbl_all_stock']            = $this->lang->line('lbl_all_stock');
        $data['lbl_all_branch']           = $this->lang->line('lbl_all_branch');
        $data['lbl_select_measure']       = $this->lang->line('lbl_select_measure');
        $data['lbl_input_price']          = $this->lang->line('lbl_input_price');
        $data['lbl_supplier']            = $this->lang->line('lbl_supplier');
        
        $this->load->view("welcome/view", $data);
    }

    public function get_stock(){
        $branch_id = $this->uri->segment(3);
        $stock_location_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $data=$this->Base_model->get_value_sql("SELECT SUM(s.stock_qty) AS stock_qty FROM stock s where s.branch_id=$branch_id AND s.stock_location_id=$stock_location_id AND s.stock_item_id=$item_id","stock_qty");
        echo json_encode($data);
    }

    public function addnew_update($id) {

        $data['title']  = "PURCHASE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "purchase/purchase_new/frm_purchase_update";
        $data['id']=$id;
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));

        $data['purchase_no'] = '';
        $data['date_now'] = $date->format('Y-m-d H:i');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch_all']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
         $data['branch']= $this->Base_model->loadToListJoin("SELECT p.purchase_branch_id FROM purchase p WHERE p.purchase_no=$id");
        $data['supplier']= $this->Base_model->loadToListJoin("SELECT * FROM supplier where supplier_status=1");
       $data['rd_supplier']  = $this->Base_model->loadToListJoin("SELECT * from purchase p WHERE p.purchase_no  = $id ");
        $data['record_measure'] = $this->Base_model->loadToListJoin("SELECT * FROM measure where status=1");
        $data['record_stock_location'] = $this->Base_model->get_field("stock_location", "stock_location_branch_id", $this->Base_model->branch_id());
        $branch_id = $this->Base_model->branch_id();
        $data['rd_stock']  = $this->Base_model->loadToListJoin("SELECT * from stock_location s WHERE s.stock_location_branch_id=$branch_id");
        $data['rd_stock_all']  = $this->Base_model->loadToListJoin("SELECT * from stock_location s");

        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('purchase',$lang=='' ? 'en':$lang);

        $data['lbl_title'] = $this->lang->line('purchase_order_addnew_name');
        $data['lbl_no'] = $this->lang->line('no');
        $data['lbl_part']  = $this->lang->line('part_number');
        $data['lbl_name']  = $this->lang->line('item_name');
        $data['lbl_qty']   = $this->lang->line('qty');
        $data['lbl_amount']   = $this->lang->line('amount');
        $data['lbl_measure_note'] = $this->lang->line('measure_note');
        $data['lbl_stock_name'] = $this->lang->line('stock');
        $data['lbl_date'] = $this->lang->line('po_date');
        $data['lbl_date_expired'] = $this->lang->line('expire');
        $data['lbl_date_alert'] = $this->lang->line('alert');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['lbl_ref'] =  $this->lang->line('ref_no');
        $data['lbl_paid'] = $this->lang->line('paid');
        $data['lbl_due_date'] = $this->lang->line('due_date');
        $data['lbl_branch']     = $this->lang->line('branch');
        $data['lbl_purchase']   = $this->lang->line('purchase');
        $data['lbl_measure']    = $this->lang->line('measure');
       
        $data['lbl_retail_qty'] = $this->lang->line('retail_qty');
        $data['lbl_retail_amount'] = $this->lang->line('retail_amount');
     
        $data['lbl_discount'] = $this->lang->line('discount');
        $data['lbl_grand_total']  =$this->lang->line('lb_grand_total');
        $data['lbl_deposit']  =$this->lang->line('deposit');
        $data['lbl_desc'] = $this->lang->line('lb_desc');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_stock'] = $this->lang->line('stock');
        $data['lbl_current_stock'] = $this->lang->line('lb_current_stock');
        $data['lbl_total_stock'] = $this->lang->line('lb_total_stock');
        $data['lbl_stock'] = $this->lang->line('stock');
      
        $data['lbl_price'] = $this->lang->line('amount');
        
        
       
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_delete'] = $this->lang->line('lb_delete');
        $data['btn_save_all'] =$this->lang->line('btn_save_all');
        $data['btn_save'] =$this->lang->line('btn_save');
        $data['btn_add'] =$this->lang->line('btn_add');
        $data['btn_clear']   =$this->lang->line('btn_clear');
        $data['lbl_new'] =$this->lang->line('lb_new');
        $data['lbl_note']   =$this->lang->line('val_mess_require');

        $data['lbl_all_stock']            = $this->lang->line('lbl_all_stock');
        $data['lbl_all_branch']           = $this->lang->line('lbl_all_branch');
        $data['lbl_select_measure']       = $this->lang->line('lbl_select_measure');
        $data['lbl_input_price']          = $this->lang->line('lbl_input_price');
         $data['lbl_supplier']            = $this->lang->line('lbl_supplier');
       
        
        $this->load->view("welcome/view", $data);
    }



    public function searchproduct() {
        $this->load->view("search/inventory.php");
    }

    public function searchsupplier() {
        $this->load->view("expense/searchsupplier.php");
    }

    public function scanbarcode() {
        $barcode = $this->uri->segment(3);
        if ($this->Base_model->loadToListJoin("SELECT * FROM tbl_itemdetail where BARCODE='" . $barcode . "'")) {
            $data['itemname'] = $this->Base_model->loadToListJoin("SELECT * FROM tbl_itemdetail where BARCODE='" . $barcode . "'");

            $this->load->view("expense/scanbarcode", $data);
        } else {
            $this->load->view("expense/display");
        }
    }
    private function get_po_no(){
        $rs=$this->Base_model->get_value_sql("select * from purchase order by purchase_no desc limit 1","purchase_no");

        $result=0;
        if($rs=="" || $rs==null){
            $result='1';
        }  else {
          
            $result=$rs+1;
            //$result=sprintf('%06d',$result);
          

        }
        return $result;
    }
    public function update_amount_po(){
        $ref_no = $this->input->post('ref_no');
        $po_id = $this->input->post('po_id');
        $po_date=$this->input->post('po_date');
        $dis=$this->input->post('dis');
        $due_date=$this->input->post('due_date');
        $desc=$this->input->post('desc');
        $supplier=$this->input->post('supplier');
        $deposit=$this->input->post('deposit');
        $date=$this->input->post('po_date');
        $grand_total=$this->input->post('grand_total');
        $pro_id=$this->input->post('pro_id');
        $user=$this->Base_model->user_id();
        $branch=$this->Base_model->branch_id();
        $dates=new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $status=1;
       /* if($deposit==($grand_total-$dis)){
            $status=0;
        }*/

        $data_save=array(
                //'purchase_no'=>$this->get_po_no(),
                'refference_no'=>$ref_no,
                'purchase_supplier_id'=>$supplier,
                'purchase_modified_by' => $user,
                'purchase_modified_date' => $date,
                'purchase_branch_id'=>$branch,
                'purchase_due_date'=>$due_date,
                'purchase_deposit'=>$deposit,
                'purchase_discount'=>$dis,
                'purchase_note'=>$desc,
                'purchase_vat'=>0,
                //'purchase_amount'=>$grand_total,
                //'status'=>$status,
                'purchase_total_amount'=>$grand_total


        );
        //$this->Base_model->update('purchase', $data_save);
        $this->Base_model->updates('purchase',array('purchase_no'=>$po_id), $data_save);
        $this->update_credit($po_id);
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been saved!!";
        echo json_encode($response);

    }



    public function save() {
        
        $ref_no = $this->input->post('ref_no');
        $data=$this->input->post('data');
        $po_date=$this->input->post('po_date');
        $dis=$this->input->post('dis');
        $due_date=$this->input->post('due_date');
        $desc=$this->input->post('desc');
        $supplier=$this->input->post('supplier');
        $deposit=$this->input->post('deposit');
        $date=$this->input->post('po_date');
        $grand_total=$this->input->post('grand_total');
        $pro_id=$this->input->post('pro_id');
        $branch_id=$this->input->post('branch_id');

        $user=$this->Base_model->user_id();
        $branch=$this->input->post('branch');
        $dates=new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $status=1;
       /* if($deposit==($grand_total-$dis)){
            $status=0;
        }*/

        $data_save=array(
                'purchase_no'=>$this->get_po_no(),
                'refference_no'=>$ref_no,
                'purchase_supplier_id'=>$supplier,
                'purchase_created_by' => $user,
                'purchase_created_date' => $date,
                'purchase_branch_id'=>$branch,
                'purchase_due_date'=>$due_date,
                'purchase_deposit'=>$deposit,
                'purchase_discount'=>$dis,
                'purchase_note'=>$desc,
                'purchase_vat'=>0,
                //'purchase_amount'=>$grand_total,
                //'status'=>$status,
                'purchase_total_amount'=>$grand_total
        );
        $this->Base_model->save('purchase', $data_save);

        $last_po_id=$this->Base_model->get_value("purchase", "max(purchase_no)","purchase_created_by",$user);

        $da=json_decode($data);


        foreach ($da as $d) {
                $data_save_detail=array(
                    'purchase_no'=>$last_po_id,
                    'purchase_detail_item_detail_id'=>$d->item_id,
                    'measure_id'=>$d->measure_id,
                    'measure_qty'=>$d->measure_qty,
                    'purchase_detail_unit_cost'=>$d->amount,
                    'purchase_detail_qty'=>$d->qty,
                    'purchase_detail_total_amount'=>$d->t_amount,
                    'purchase_created_date'=>$dates->format('Y-m-d H:i'),
                    'purchase_created_by'=>$user,
                    'status'=>1,
                    'stock_location_id'=>$d->stock_id,
                    'purchase_detail_item_expired_date'=>$d->ex_date,
                    'purchase_detail_item_alert_date'=>$d->ex_alert

                );
                 $this->Base_model->save('purchase_detail',$data_save_detail);
                 $last_po_detail_id=$this->Base_model->get_value("purchase_detail", "max(purchase_detail_id)","purchase_created_by",$user);
                 //save to po pay
                 /*if($deposit!="" && $deposit!="" && $deposit>0){
                    $data_po_pay=array(
                        'purchase_no'=>$last_po_id,
                        'purchase_pay_date'=>$date->format('Y-m-d H:i:s'),
                        'purchase_pay_amount'
                    );
                    $this->Base_model->save('purchase_pay',$data_po_pay);

                 }*/
                 //end save to po pay
                 

                 $this->update_credit($last_po_id);

                 //save to stock
                    $data_stock=array(
                        'branch_id'=>$branch,
                        'stock_qty'=>($d->measure_qty*$d->qty),
                        'stock_item_id'=>$d->item_id,
                        'measure_id'=>$d->measure_id,
                        'stock_created_date'=>$dates->format('Y-m-d H:i:s'),
                        'stock_created_by'=>$user,
                        'stock_location_id'=>$d->stock_id,
                        'stock_costing'=>($d->amount/$d->measure_qty),
                        'stock_expire_date'=>$d->ex_date,
                        'stock_alert_date'=>$d->ex_alert,
                        'po_detail_id'=>$last_po_detail_id,
                        'note_id'=>$last_po_detail_id
                     );
                    $this->Base_model->save('stock',$data_stock);
            }

            $response["success"] = 1;
            $response["statusCode"] = 'S0001';
            $response["message"] = "Record has been saved!!";
            echo json_encode($response);
    }

    public function save_and_update() {
        $master_id = $this->input->post('master_id');
        $ref_no = $this->input->post('ref_no');
        $data=$this->input->post('data');
        $po_date=$this->input->post('po_date');
        $dis=$this->input->post('dis');
        $due_date=$this->input->post('due_date');
        $desc=$this->input->post('desc');
        $supplier=$this->input->post('supplier');
        $deposit=$this->input->post('deposit');
        $date=$this->input->post('po_date');
        $grand_total=$this->input->post('grand_total');
        $pro_id=$this->input->post('pro_id');
        $chPaid  = $this->input->post('chPaid');


        $user=$this->Base_model->user_id();
        $branch=$this->input->post('branch');
        $dates=new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $status=1;
        $data_rd=json_decode($data);
       /* if($deposit==($grand_total-$dis)){
            $status=0;
        }*/

        if($master_id==''){
            /////Save purchase: 
                $data_save=array(
                'purchase_no'=>$this->get_po_no(),
                'refference_no'=>$ref_no,
                'purchase_supplier_id'=>$supplier,
                'purchase_created_by' => $user,
                'purchase_created_date' => $date,
                'purchase_branch_id'=>$branch,
                'purchase_due_date'=>$due_date,
                'purchase_deposit'=>$deposit,
                'purchase_discount'=>$dis,
                'purchase_note'=>$desc,
                'purchase_vat'=>0,
                'status'=>$chPaid,
                //'purchase_amount'=>$grand_total,
                //'status'=>$status,
                'purchase_total_amount'=>$grand_total
        );
        $this->Base_model->save('purchase', $data_save);
        $last_po_id=$this->Base_model->get_value("purchase", "max(purchase_no)","purchase_created_by",$user);


        foreach ($data_rd as $d) {
                $data_save_detail=array(
                    'purchase_no'=>$last_po_id,
                    'purchase_detail_item_detail_id'=>$d->item_id,
                    'measure_id'=>$d->measure_id,
                    'measure_qty'=>$d->measure_qty,
                    'purchase_detail_unit_cost'=>$d->amount,
                    'purchase_detail_qty'=>$d->qty,
                    'purchase_detail_total_amount'=>$d->t_amount,
                    'purchase_created_date'=>$dates->format('Y-m-d H:i'),
                    'purchase_created_by'=>$user,
                    'status'=>1,
                    'stock_location_id'=>$d->stock_id,
                    'purchase_detail_item_expired_date'=>$d->ex_date,
                    'purchase_detail_item_alert_date'=>$d->ex_alert

                );
                 $this->Base_model->save('purchase_detail',$data_save_detail);
                 $last_po_detail_id=$this->Base_model->get_value("purchase_detail", "max(purchase_detail_id)","purchase_created_by",$user);
                 //save to po pay
                 /*if($deposit!="" && $deposit!="" && $deposit>0){
                    $data_po_pay=array(
                        'purchase_no'=>$last_po_id,
                        'purchase_pay_date'=>$date->format('Y-m-d H:i:s'),
                        'purchase_pay_amount'
                    );
                    $this->Base_model->save('purchase_pay',$data_po_pay);

                 }*/
                 //end save to po pay
                 

                 $this->update_credit($master_id);

                 //save to stock
                    $data_stock=array(
                        'branch_id'=>$branch,
                        'stock_qty'=>($d->measure_qty*$d->qty),
                        'stock_item_id'=>$d->item_id,
                        'measure_id'=>$d->measure_id,
                        'stock_created_date'=>$dates->format('Y-m-d H:i:s'),
                        'stock_created_by'=>$user,
                        'stock_location_id'=>$d->stock_id,
                        'stock_costing'=>($d->amount/$d->measure_qty),
                        'stock_expire_date'=>$d->ex_date,
                        'stock_alert_date'=>$d->ex_alert,
                        'po_detail_id'=>$last_po_detail_id
                     );
                    $this->Base_model->save('stock',$data_stock);
            }

            $response["success"] = 1;
            $response["statusCode"] = 'S0001';
            $response["message"] = "Record has been saved!!";

        }else{
            /////Update purchase : 
               $this->update_credit($master_id);
               $data_update=array(
                'purchase_no'=>$master_id,
                'refference_no'=>$ref_no,
                'purchase_supplier_id'=>$supplier,
                'purchase_created_by' => $user,
                'purchase_created_date' => $date,
                'purchase_branch_id'=>$branch,
                'purchase_due_date'=>$due_date,
                'purchase_deposit'=>$deposit,
                'purchase_discount'=>$dis,
                'purchase_note'=>$desc,
                'purchase_vat'=>0,
                'status'=>$chPaid,
                //'purchase_amount'=>$grand_total,
                //'status'=>$status,
                'purchase_total_amount'=>$grand_total
        );
        $this->Base_model->update('purchase','purchase_no',$master_id,$data_update);
    
             $response["message"] = "Record  updated!!".$master_id;
        }
       
            echo json_encode($response);
    }

    public function save_update_po(){
        ////Master data : 
        $master_id  = $this->input->post('master_id');
        $txt_product_id_update  = $this->input->post('product_update_id');
        $cbo_supplier_id  = $this->input->post('cbo_supplier_id');
        $txtrefno  = $this->input->post('txtrefno');
        $txtDate  = $this->input->post('txtDate');
        $txtDesc  = $this->input->post('txtDesc');
        $chk_vat  = $this->input->post('chk_vat');
        $discount_invoice  = $this->input->post('discount_invoice');
        $txt_grand_toal  = $this->input->post('txt_grand_toal');
        $desposit  = $this->input->post('desposit');
        $chPaid  = $this->input->post('chPaid');
        $user=$this->Base_model->user_id();
        $branch  = $this->input->post('cbo_branch_id');
        $branch_=$this->Base_model->branch_id();
        $dates=new DateTime('now', new DateTimeZone('Asia/Bangkok'));
    
        ////Detail data : 
        $data  = $this->input->post('data');
        $data_rd = json_decode($data);

        if($txt_product_id_update==""){
        foreach($data_rd as $d){
            if($this->Base_model->check_exists("purchase_no","purchase_detail",array('purchase_no'=>$master_id,'purchase_detail_item_detail_id'=>$d->item_id))){
                 $response["success"] = 1;
                 $response["statusCode"] = 'S01';
                 $response["message"] = "Record Exit!!";
            }else{
                $data_save_detail=array(
                    'purchase_no'=>$master_id,
                    'purchase_detail_item_detail_id'=>$d->item_id,
                    'measure_id'=>$d->measure_id,
                    'measure_qty'=>$d->measure_qty,
                    'purchase_detail_unit_cost'=>$d->amount,
                    'purchase_detail_qty'=>$d->qty,
                    'purchase_detail_total_amount'=>$d->t_amount,
                    'purchase_created_date'=>$dates->format('Y-m-d H:i:s'),
                    'purchase_created_by'=>$user,
                    'status'=>1,
                    'stock_location_id'=>$d->stock_id,
                    'purchase_detail_item_expired_date'=>$d->alert_date,
                    'purchase_detail_item_alert_date'=>$d->expire_date
                );
                 if($this->Base_model->save('purchase_detail',$data_save_detail)){
                     $last_po_detail_id=$this->Base_model->get_value("purchase_detail", "max(purchase_detail_id)","purchase_created_by",$user);
                 
                 //updata master purchase
                  $this->update_po_master($master_id);
                  $this->update_credit($master_id);
                  //end update master purchase
                 //save to stock
                    $data_stock=array(
                        'branch_id'=>$branch,
                        'stock_qty'=>($d->measure_qty*$d->qty),
                        'stock_item_id'=>$d->item_id,
                        'measure_id'=>$d->measure_id,
                        'stock_created_date'=>$dates->format('Y-m-d H:i:s'),
                        'stock_created_by'=>$user,
                        'stock_location_id'=>$d->stock_id,
                        'stock_costing'=>($d->amount/$d->measure_qty),
                        'stock_expire_date'=>$d->expire_date,
                        'stock_alert_date'=>$d->alert_date,
                        'po_detail_id'=>$last_po_detail_id,
                        'note_id'=>$last_po_detail_id
                     );
                $this->Base_model->save('stock',$data_stock);

                    // $response["success"] = 1;
                    $response["status"] = 'S01';
                    $response["message"] = "Record has been saved!!";
                 } 

               }
            }
        }else{
             foreach ($data_rd as $da) {
                   $data_update_detail=array(

                    'purchase_detail_unit_cost'=>$da->amount,
                    'purchase_detail_qty'=>$da->qty,
                    'purchase_detail_total_amount'=>$da->t_amount,
                    'purchase_modified_date'=>$dates->format('Y-m-d H:i:s'),
                    'purchase_modified_by'=>$user,
                    'measure_id' =>$da->measure_id,
                    'measure_qty'=>$da->measure_qty,
                    'purchase_detail_item_expired_date'=>$da->expire_date,
                    'purchase_detail_item_alert_date'=>$da->alert_date,
                    'measure_id'=>$da->measure_id,
                    'stock_location_id'=>$da->stock_id,
                );
                $this->Base_model->updates('purchase_detail',array('purchase_detail_id'=>$txt_product_id_update),$data_update_detail);
                //update stock with expire info
                $this->Base_model->updates('stock',
                    array(
                        'po_detail_id'       =>$txt_product_id_update,
                        ),
                    array(
                            'branch_id'=>$branch,
                            'stock_qty'=>($da->measure_qty*$da->qty),
                            'stock_item_id'=>$da->item_id,
                            'measure_id'=>$da->measure_id,
                            'stock_created_date'=>$dates->format('Y-m-d H:i:s'),
                            'stock_created_by'=>$user,
                            'stock_location_id'=>$da->stock_id,
                            'stock_costing'=>($da->amount/$da->measure_qty),
                            'stock_expire_date'=>$da->expire_date,
                            'stock_alert_date'=>$da->alert_date,
                          )
                 );
                 $this->update_po_master($master_id);
                 $this->update_credit($master_id);
             }
                // $response["success"] = 1;
                $response["status"] = 'U01';
                $response["message"] = "Record has been updated!!";
        }
        echo json_encode($response);
    }

    public  function load_measure_qty($id){
          $qty_measure  =   $this->Base_model->loadToListJoin("SELECT * from measure m WHERE m.measure_id = $id");
          echo  json_encode($qty_measure);
    }
    private function update_costing($item_id,$stock_id){
         $costing=$this->Base_model->get_value_sql("select avg(purchase_detail_unit_cost) as costing from purchase_detail where purchase_detail_item_detail_id=$item_id and stock_location_id=$stock_id ","costing");
         $this->Base_model->updates('stock',array('stock_location_id'=>$stock_id,'stock_item_id'=>$item_id),array('stock_costing'=>$costing));
    }

    private function update_po_master($id){
        //$status=1;
    
         $old_master=$this->Base_model->loadToListJoin("SELECT * from purchase where purchase_no=$id");
                  $po_amount=$this->Base_model->get_value_sql("SELECT sum(purchase_detail_total_amount) as po_amount from purchase_detail where purchase_no=$id","po_amount");
                  foreach($old_master as $om){

                    $data_update_master=array(
                       // 'purchase_amount'=>$po_amount,
                        'purchase_total_amount'=>$po_amount,
                       
                    );
                    $this->Base_model->updates('purchase',array('purchase_no'=>$id),$data_update_master);

                  }

    }


    public function pay() {
        //CHECK DATA IF NULL BY SRIENG

        if (!$this->Base_model->get_data_by("SELECT status FROM purchase_detail WHERE status='ACTIVE'")) {
            $this->session->set_flashdata('error', '<h3 class="error_message">Please input data before submit!</h3>');
            echo "purchase/addnew";
            exit();
        }
        
        $user_ids =  $this->Base_model->user_id();
        $no = 0;
        $record_purchase_no = $this->Base_model->loadToListJoin("SELECT purchase_no FROM purchase WHERE status='ACTIVE' #AND purchase_created_by=" .$user_ids);
        foreach ($record_purchase_no as $rpm) {
            $no = $rpm->purchase_no;
        } 

        $supplier = $this->input->post('txtsupplier_id');
      
        $is_paid = $this->input->post("chPaid");
        $is_paid_status = $this->input->post("chPaid_status");
        $duedate = $this->input->post("txt_due_date");
        $refno = $this->input->post("txtrefno");
        $deposit = $this->input->post("desposit");
        $desc = $this->input->post('txtDesc');
        $discount_invoice = $this->input->post("discount_invoice");
        $needpay = $this->input->post("needpay");
        $vat=$this->input->post("chk_vat");
        
        $status = "CREDIT";
        $purchase_iscredit = 0;
        
        if($deposit >= $needpay || $is_paid == 1 ){
            $status = "PAID";
            $purchase_iscredit = 1;
        }else{
            $status = "CREDIT";
            $purchase_iscredit = 0;
            
        }
        //UPDATE PURCHASE DETAIL
        $record_purchase_detail = array(
            'status' => $status,
            'supplier_id' => $supplier,
            'branch_id' => $this->Base_model->branch_id()
        );
        $this->Base_model->update('purchase_detail', 'purchase_no', $no, $record_purchase_detail);
        //END
        $purchase_ud_no = 0;
        $record_purchase_nos = $this->Base_model->loadToListJoin("SELECT purchase_no FROM purchase WHERE status='ACTIVE' #AND purchase_created_by=" . $this->Base_model->user_id());
        foreach ($record_purchase_nos as $rpms) {
            $purchase_ud_no = $rpms->purchase_no;
        }
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        //UPDATE PURCHASE MASTER
        $record_purchase_master = array(
            'status' => $status,
            'refference_no' => $refno,
            'purchase_supplier_id' => $supplier,
            'purchase_deposit' => $deposit,
            'purchase_note' => $desc,
            'purchase_discount_invoice_dollor' => $discount_invoice,
            'purchase_get_pay' => $needpay,
            'purchase_iscredit' => $purchase_iscredit,
            'purchase_due_date' => $duedate,
            'purchase_modified_date'=>$date->format("Y-m-d h:i:s"),
            'purchase_vat'  =>$vat
        );
        $this->Base_model->update('purchase', 'purchase_no', $purchase_ud_no, $record_purchase_master);
        //END UPDATE PURCHASE MASTER 
            
        //select purchase_pay_id for condition check
        $purchase_pay_id = 0;
        $record_purchase_pay = $this->Base_model->loadToListJoin("SELECT * FROM `v_purchase_pay` where purchase_no = ".$purchase_ud_no." ORDER BY purchase_pay_id DESC LIMIT 1");
        
        foreach ($record_purchase_pay as $rppd) {
           $purchase_pay_id = $rppd->purchase_pay_id;
        }  
        if($purchase_pay_id == 0){
            
                if ($is_paid == 1) {
                    $gettotal = $this->Base_model->loadToListJoin("SELECT REPLACE(total,',','') as total from v_purchase_sammary where purchase_no=" . $no);
                    $totals = 0;
                    foreach ($gettotal as $t) {
                        $totals = $t->total - $deposit;
                    }            
                    $savedata = array(
                        'supplier_id' => $supplier,
                        'purchase_no' => $no,
                        'purchase_pay_amount' => $totals,
                        'purchase_pay_total' => $totals,
                        'purchase_pay_credit_amount' => 0,
                        'purchase_pay_date' => date('Y-m-d'),
                        'purchase_pay_due_date' => $duedate,
                        'purchase_pay_created_date' => date('Y-m-d'),
                        'purchase_pay_created_by' => $this->Base_model->user_id(),
                        'branch_id' => $this->Base_model->branch_id(),
                    );
                    $this->Base_model->save("purchase_pay", $savedata);
                }else {
                    $gettotal = $this->Base_model->loadToListJoin("select REPLACE(total,',','') as total from v_purchase_sammary where purchase_no=" . $no);

                    $totals = 0;

                    foreach ($gettotal as $t) {
                         $totals = $t->total - $deposit;
                    }
                    $savedata = array(
                        'supplier_id' => $supplier,
                        'purchase_no' => $no,
                        'purchase_pay_amount' => $deposit,
                        'purchase_pay_total' => $deposit,
                        'purchase_pay_credit_amount' => $totals,
                        'purchase_pay_date' => date('Y-m-d'),
                        'purchase_pay_created_date' => date('Y-m-d'),
                        'purchase_pay_created_by' => $this->Base_model->user_id(),
                        'branch_id' => $this->Base_model->branch_id()
                    );
                    $this->Base_model->save("purchase_pay", $savedata);
                    }             
        }else{
                if ($is_paid != 1) {
                    $gettotal = $this->Base_model->loadToListJoin("SELECT REPLACE(total,',','') as total from v_purchase_sammary where purchase_no=" . $no);
                    $totals = 0;
                    foreach ($gettotal as $t) {
                        $totals = $t->total - $deposit;
                    }            
                    $savedata = array(
                        'supplier_id' => $supplier,
                        'purchase_no' => $no,
                        'purchase_pay_amount' => $deposit,
                        'purchase_pay_total' => $deposit,
                        'purchase_pay_credit_amount' => $totals,
                        'purchase_pay_date' => date('Y-m-d'),
                        'purchase_pay_due_date' => $duedate,
                        'purchase_pay_created_date' => date('Y-m-d'),
                        'purchase_pay_created_by' => $this->Base_model->user_id(),
                        'branch_id' => $this->Base_model->branch_id(),
                    );
                    $this->Base_model->update('purchase_pay', 'purchase_pay_id', $purchase_pay_id, $savedata);
                }else {
                    $gettotal = $this->Base_model->loadToListJoin("select REPLACE(total,',','') as total from v_purchase_sammary where purchase_no=" . $no);
                    $totals = 0;

                    foreach ($gettotal as $t) {
                         $totals = $t->total - $deposit;
                    }
                    $savedata = array(
                        'supplier_id' => $supplier,
                        'purchase_no' => $no,
                        'purchase_pay_amount' => $totals,
                        'purchase_pay_total' => $totals,
                        'purchase_pay_credit_amount' => $totals,
                        'purchase_pay_date' => date('Y-m-d'),
                        'purchase_pay_created_date' => date('Y-m-d'),
                        'purchase_pay_created_by' => $this->Base_model->user_id(),
                        'branch_id' => $this->Base_model->branch_id()
                    );
                    $this->Base_model->update('purchase_pay', 'purchase_pay_id', $purchase_pay_id, $savedata);
                    }      
        }
        $this->session->set_userdata('old_purchase_id','');
        $this->session->set_userdata('edit_pro_id','');         
       // $this->session->unset_userdata('edit_pro_id');
        
        echo 'purchase';
       
    }
    public function re_edit() {
        $purchase_id = $this->uri->segment(3);

        $purchase_record = array(
            'status' => 'ACTIVE'
        );
        $purchase_detail_record = array(
            'status' => 'ACTIVE'
        );
        $this->Base_model->update('purchase', 'purchase_no', $purchase_id, $purchase_record);
        $this->Base_model->update('purchase_detail', 'purchase_no', $purchase_id, $purchase_detail_record);
        redirect("purchase");
        
    }
    
    public function read_purchase_detail() {
        $id = $this->input->post('id');
        $product_id = 0;
        $part_number = '';
        $product = '';
        $qty = 0;
        $price = 0;
        $total = 0;
        $stock_id = 0;
        $date = '';
        $date_alert = '';
        $date_expire = '';
        $measure_id='';
        $purchase = $this->Base_model->loadToListJoin("select * from v_purchase_detail where purchase_detail_id='$id'");
        foreach ($purchase as $p) {
            $product_id = $p->item_detail_id;
            $part_number = $p->item_detail_part_number;
            $product = $p->item_detail_name;
            $qty = $p->purchase_detail_qty;
            $price = $p->purchase_detail_unit_cost;
            $total = $qty * $price;
            $stock_id = $p->stock_location_id;
            $date = $p->purchase_detail_date;
            $date_alert = $p->purchase_detail_item_alert_date;
            $date_expire = $p->purchase_detail_item_expired_date;
            $measure_id=$p->measure_id;
            $this->session->set_userdata('purchase_detail_id', $id);

        }

        echo $product_id . ':' . $product . ':' . $part_number . ':' . $qty . ':' . $price . ':' . $stock_id . ':' . $date . ':' . $date_alert . ':' . $date_expire. ':' . $measure_id;
    }

    

    public function delete_update() {
        
//        print_r($this->session->userdata('edit_pro_id'));
//        exit();
        $id = $this->uri->segment(3);
        $index = $this->uri->segment(4);  
        
        $id_edit = $this->session->userdata('purchase_nos');
        if ($index == "1") {
            //UPDATE STOCK
            $item_detail_id = 0;
            $p_qty = 0;
            $measure_qty = 0;

            $record_purchase_detail = $this->Base_model->get_data_by("SELECT purchase_no,item_detail_id,purchase_detail_qty,measure_qty FROM v_purchase_detail WHERE purchase_detail_id=" . $id);

            foreach ($record_purchase_detail as $rpd) {
                $item_detail_id = $rpd->item_detail_id;
                $p_qty = $rpd->purchase_detail_qty;
                $measure_qty = $rpd->measure_qty;
                $purchase_no = $rpd->purchase_no;
            }
            $stock_qty = $this->Base_model->get_value("stock", "stock_qty", "stock_item_id", $item_detail_id);
            print_r($stock_qty);
            $stock_data = array(
                'stock_qty' => $stock_qty - ($p_qty * $measure_qty)
            );

            $this->Base_model->update('stock', 'stock_item_id', $item_detail_id, $stock_data);
            //END UPDATE STOCK
            //DELETE FROM PURCHASE DETAIL
            $this->Base_model->delete_by('purchase_detail', 'purchase_detail_id', $id);
            //END DELETE
           redirect("purchase/edit_load_purchase_order/".$this->session->userdata('edit_pro_id'));
        } else {
            //DELETE FROM PURCHASE DETAIL
            $count = $this->Base_model->get_count_value("purchase_detail", "status", "status", "ACTIVE");

            if ($count == 1) {
                $this->Base_model->delete_by('purchase', 'status', 'ACTIVE');
            }
            $this->Base_model->delete_by('purchase_detail', 'purchase_detail_id', $id);
            //END DELETE
            redirect("purchase/edit_load_purchase_order/".$this->session->userdata('edit_pro_id'));
        }
    }

    public function update() {
        $id = $this->input->post('txt_purchase_id');
        $proid = $this->input->post("txt_item_id");
        $redirect = $this->input->post("txt_measure_id");
        $qty = $this->input->post('txt_qty');
        $oldqty = $this->input->post("txt_old_qty");
        $price = $this->input->post("txt_price");
        $date = $this->input->post("txtDate");
        $stock_location_name = $this->input->post("cbo_sock_location");

        $data = array(
            'purchase_detail_qty' => $qty,
            'purchase_detail_date' => $date,
            'purchase_detail_unit_cost' => $price
        );

        $this->Base_model->update('purchase_detail', 'purchase_detail_id', $id, $data);

        //update stock
        if ($this->Base_model->get_data_by("SELECT stock_qty FROM stock WHERE stock_item_id=" . $proid)) {

            //update stock qty/////////////////////////////////////////////

            $stockqty = 0;
            $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock WHERE stock_item_id=" . $proid);

            foreach ($stockvalue as $sv) {
                $stockqty = $sv->stock_qty;
            }

        }

        //end update stock
        if ($redirect == 1) {
            redirect('purchase');
        } else {
            redirect("purchase/addnew");
        }
    }

    public function edit_load() {

        //===================
        $data['title'] = "EXPENSE UPDATE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/frm_purchase_update";
        //===================

        $id = $this->uri->segment(3);
        $product_id = $this->uri->segment(4);
        $qty = $this->uri->segment(5);
        $redirect = $this->uri->segment(6);


        $data['purchase_detail_record'] = $this->Base_model->get_field('purchase_detail', 'purchase_detail_id', $id);
        $data['stock_record'] = $this->Base_model->get_data_by("select * from stock where stock_item_id=" . $product_id);
        $data['record_stock_location'] = $this->Base_model->get_field("stock_location", "stock_location_branch_id", $this->Base_model->branch_id());

        $getproductname = $this->Base_model->loadToListJoin("select item_detail_name from item_detail where item_detail_id=" . $product_id);
        $price = $this->Base_model->get_value("purchase_detail", "purchase_detail_unit_cost", "purchase_detail_id", $id);
        $date = $this->Base_model->get_value("purchase_detail", "purchase_detail_date", "purchase_detail_id", $id);
        $proname = "";

        foreach ($getproductname as $gn) {
            $proname = $gn->item_detail_name;
        }
        $data['redirect'] = $redirect;
        $data['proname'] = $proname;
        $data['qty'] = $qty;
        $data['price'] = $price;
        $data['date'] = $date;
        $data['id'] = $id;

        $this->load->view('welcome/view', $data);
    }

    public function delete() {

        $id = $this->uri->segment(3);
        $index = $this->uri->segment(4);
        
        if ($index == "1") {
            //UPDATE STOCK
            $item_detail_id = 0;
            $p_qty = 0;
            $measure_qty = 0;

            $record_purchase_detail = $this->Base_model->get_data_by("SELECT item_detail_id,purchase_detail_qty,measure_qty FROM v_purchase_detail WHERE purchase_detail_id=" . $id);

            foreach ($record_purchase_detail as $rpd) {
                $item_detail_id = $rpd->item_detail_id;
                $p_qty = $rpd->purchase_detail_qty;
                $measure_qty = $rpd->measure_qty;
            }
            $stock_qty = $this->Base_model->get_value("stock", "stock_qty", "stock_item_id", $item_detail_id);
            print_r($stock_qty);
            $stock_data = array(
                'stock_qty' => $stock_qty - ($p_qty * $measure_qty)
            );

            $this->Base_model->update('stock', 'stock_item_id', $item_detail_id, $stock_data);
            //END UPDATE STOCK
            //DELETE FROM PURCHASE DETAIL
            $this->Base_model->delete_by('purchase_detail', 'purchase_detail_id', $id);
            //END DELETE
            redirect("purchase/addnew");
        } else {
            //DELETE FROM PURCHASE DETAIL
            $count = $this->Base_model->get_count_value("purchase_detail", "status", "status", "ACTIVE");

            if ($count == 1) {
                $this->Base_model->delete_by('purchase', 'status', 'ACTIVE');
            }
            $this->Base_model->delete_by('purchase_detail', 'purchase_detail_id', $id);
            //END DELETE
            if($this->session->userdata('edit_pro_id')){
                redirect("purchase/edit_load_purchase_order/".$this->session->userdata('edit_pro_id'));
            }else{
            redirect("purchase/addnew");
            
            }
        }
    }

    public function checkValidation($field1, $field2, $tblname, $txt1, $txt2) {

        $this->db->select($field1);
        $this->db->select($field2);
        $this->db->from($tblname);
        $this->db->where($field1, $txt1);
        $this->db->where($field2, $txt2);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //Order information here...
            $this->index();
            exit();
        }
    }

    public function getuser() {
        $id['id'] = $this->uri->segment(3);
        $this->load->view('expense/getuser', $id);
    }

    public function getlist() {

        $id = $this->uri->segment(3);
        $record = $this->Base_model->loadToListJoin('SELECT * FROM tbl_itemdetail WHERE NAME="' . $id . "'");
        foreach ($record as $item) {
            $this->load->view('expense/getlist');
        }
    }

    public function view_detail($id) {
        $data['title'] = "PURCHASE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_new/purchase_list_detail";
        $data['id'] = $id;

        $name=$this->uri->segment(1);
        $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('purchase',$lang=='' ? 'en':$lang);

        $data['lbl_list']       = $this->lang->line('view_detail_po_name');
        $data['lbl_no']         = $this->lang->line('no');
        $data['lbl_item']       = $this->lang->line('item_name');
        $data['lbl_stock']      = $this->lang->line('stock');
        $data['lbl_qty']        = $this->lang->line('qty');
        $data['lbl_measure']    = $this->lang->line('measure');
        $data['lbl_price']      = $this->lang->line('amount');
        $data['lbl_retail_qty']= $this->lang->line('retail_qty');
        $data['lbl_retail_amount']= $this->lang->line('retail_amount');
        $data['lbl_total']       = $this->lang->line('lb_total');
        $data['lbl_view_back']       = $this->lang->line('lbl_view_back');
        
        $this->load->view("welcome/view", $data);
    }

    public function void_purchase() {

        //$txtqty=$this->input->post('txtQty');
        $purchase_no = $this->uri->segment(3);
        //$chitem=$this->input->post('foo');
        /////////////////////////count item////////////////////////////
        $count_data = $this->Base_model->get_data_by("SELECT count(status) as countitem FROM purchase_detail where purchase_no=" . $purchase_no);
        $count = 0;

        foreach ($count_data as $c) {
            $count = $c->countitem;
        }

        $ch[] = array();
        $getqty[] = array();
        $getqtystock[] = array();

        for ($i = 1; $i <= $count; $i++) {

            $ch[$i] = $this->input->post('foo' . $i);

            if ($ch[$i] == "") {
                $ch[$i] = 0;
            }
            if ($ch[$i] != 0) {

                $qty_discount = $this->Base_model->get_data_by("SELECT qty FROM tbl_sale where id=" . $ch[$i]);


                foreach ($qty_discount as $q) {
                    $getqty[$i] = $q->qty;
                }

                $data = array(
                    'qty' => $getqty[$i] + $txtqty
                );

                $this->db->where('id', $ch[$i]);
                $this->db->update('tbl_sale', $data);

                //update tbl_stock
                $pro_id[] = array();
                $getproduct_id = $this->Base_model->get_data_by("SELECT product_id FROM tbl_sale WHERE id=" . $ch[$i]);

                foreach ($getproduct_id as $p_id) {
                    $pro_id[$i] = $p_id->product_id;
                }
                $qty_stock = $this->Base_model->get_data_by("SELECT qty FROM tbl_stock where item=" . $pro_id[$i]);

                foreach ($qty_stock as $s) {
                    $getqtystock[$i] = $s->qty;
                }

                $data1 = array(
                    'qty' => $getqtystock[$i] - $txtqty
                );

                $this->db->where('item', $pro_id[$i]);
                $this->db->update('tbl_stock', $data1);
                //end update stock
            }
        }
        /////////////////////////////////////////////////////////////
        redirect('sale');
    }

    //START => function search
    public function search() {

        //START => Get Value From Textbox 
        $purchaseno = $this->input->post("purchaseno");
        $from = $this->input->post("datefrom");
        $to = $this->input->post("dateto");
        $recorder = $this->input->post("recorder");
        $supplier = $this->input->post("Supplier");
        //END => Get Value From Textbox 

        $data['title'] = "PURCHASE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_list";


        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }

        $view_all = $this->Base_model->get_value("permission", "permission_viewall", "permission_id", $id);
        $str = $view_all == 1 ? '' : ' employee_id=' . $this->Base_model->user_id() . " AND ";
        //end permission data
        //START => load data to table 
        $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_created_date= CURDATE() and employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
        //END =>  load data to table when load page

        $data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Query doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>';

        // START => search data  
        // Search Empty textbox and combox (Line 1)
        if ($purchaseno == "" && $from == "" && $to == "" && $recorder == "0" && $supplier == "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
            $data['text_display'] = 'Today Purchase Summary Report';
        }
        // Search by Purchase NO (Line 2)
        else if ($purchaseno != "" && $from == "" && $to == "" && $recorder == "0" && $supplier == "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_no ='" . $purchaseno . "' and employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
            $data['text_display'] = 'Purchase No : ' . $purchaseno;
        }
        // Search by Item Name (Line 3)
        else if ($purchaseno == "" && $from == "" && $to == "" && $recorder == "0" && $supplier != "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " supplier_name ='" . $supplier . "' and employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
            $data['text_display'] = 'Supplier Name : ' . $supplier;
        }
        // Search by Date Purchase (Line 4)
        else if ($purchaseno == "" && $from != "" && $to != "" && $recorder == "0" && $supplier == "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_created_date BETWEEN  '" . $from . "' and '" . $to . "'  and  employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
            $data['text_display'] = 'Date : ' . $from . ' -> ' . $to;
        }
        // Search by date purchase and recorder (Line 5)
        else if ($purchaseno == "" && $from != "" && $to != "" && $recorder != "0" && $supplier == "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_created_date BETWEEN  '" . $from . "' and '" . $to . "' and recorder = '" . $recorder . "' and  employee_brand_id = '" . $this->Base_model->branch_id() . "'  order by purchase_no asc");
            $data['text_display'] = 'Recorder : ' . $recorder . '<br/>' . 'Date : ' . $from . ' -> ' . $to;
        }
        // Search by date purchase and supplier (Line 6)
        else if ($purchaseno == "" && $from != "" && $to != "" && $recorder == "0" && $supplier != "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_created_date BETWEEN  '" . $from . "' and '" . $to . "' and  employee_brand_id = '" . $this->Base_model->branch_id() . "' and supplier_name ='" . $supplier . "'  order by purchase_no asc");
            $data['text_display'] = 'Supplier : ' . $supplier . '<br/> Date : ' . $from . ' -> ' . $to;
        }
        // Search by date purchase and location and Recorder (Line 7)
        else if ($purchaseno == "" && $from != "" && $to != "" && $recorder != "0" && $supplier != "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " purchase_created_date BETWEEN  '" . $from . "' and '" . $to . "' and  employee_brand_id = '" . $this->Base_model->branch_id() . "' and stock_location_name ='" . $supplier . "' and employee_name = '" . $recorder . "' order by purchase_no DESC");
            $data['text_display'] = 'Location : ' . $supplier . '<br/> Recorder: ' . $recorder . '<br/> Date : ' . $from . ' -> ' . $to;
        }

        // Search by recorder (Line 8)
        else if ($purchaseno == "" && $from == "" && $to == "" && $recorder != "0" && $supplier == "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " recorder = '" . $recorder . "'  and  employee_brand_id = '" . $this->Base_model->branch_id() . "' order by purchase_no asc");
            $data['text_display'] = 'Recorder : ' . $recorder;
        }

        // Search by Location and Recorder (Line 10)
        else if ($purchaseno == "" && $from == "" && $to == "" && $recorder != "0" && $supplier != "0") {
            $data['purchase_sammary_record'] = $this->Base_model->loadToListJoin("select * from v_purchase_list  where " . $str . " recorder = '" . $recorder . "' and  employee_brand_id = '" . $this->Base_model->branch_id() . "' and supplier_name ='" . $supplier . "'  order by purchase_no asc");
            $data['text_display'] = 'Supplier : ' . $supplier . '<br /> Recorder : ' . $recorder;
        }
        // End Searching data

        $data['recorder'] = $this->Base_model->loadToListJoin("select employee_name as recorder from employee");

        $data['supplier'] = $this->Base_model->loadToListJoin("select supplier_name,employee_brand_id  from v_purchase_sammary where " . $str . " employee_brand_id = '" . $this->Base_model->branch_id() . "' group by supplier_name");
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }
        $data['record_permission'] = $this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=" . $id);
        //end permission data
        // load view when action above finish 
        $this->load->view("welcome/view", $data);
    }

    //END => function search

    public function display_product() {
        $data['id'] = $this->input->post("id");
        $this->load->view("purchase/frm_display_product", $data);
    }

    public function display_measure_qty() {
        $id = $this->input->post("id");
        if($id!=""){
            echo $this->Base_model->get_value_sql("SELECT measure_qty FROM measure WHERE measure_id=$id","measure_qty");
        }else{
            echo "";
        }
    }

    public function show_panel() {
        $data['purchase_detail_record'] = $this->Base_model->loadToListJoin("SELECT purchase_no,purchase_detail_id,item_detail_id,measure_id,item_detail_name,purchase_detail_qty,measure_name,purchase_detail_unit_cost,total,stock_location_name,stock_location_id,item_detail_part_number FROM v_purchase_detail"
                . " WHERE status='ACTIVE' and employee_id = " . $this->Base_model->user_id());

        $this->load->view("purchase/purchase_response/purchase_response_list", $data);
    }
    
    public function response(){        
        //permission data
           $branch="";
            if($this->Base_model->is_supper_user()==false){
                $branch=" and purchase_branch_id =".$this->Base_model->branch_id()." ";
            }
           $name=$this->uri->segment(1);
           $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
           $id=0;          
           foreach($getid as $g){
               $id=$g->permission_id;
           }
           
            $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
            $str=$view_all==1?'':' and employee_brand_id  ='.$this->Base_model->branch_id();
            
            $edit = 0;
            $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
            /*$concate = "";
            
            if($edit==1){
                $concate=",purchase_no_link as purchase_click ";
            }
            else{
                $concate=",purchase_no as purchase_click ";
            }
            $query = "SELECT *$concate FROM v_purchase_list where 1=1 $str limit 50";*/
            
        //end permission data
         
        $data['records']=$this->Base_model->loadToListJoin("SELECT 
            p.purchase_no AS purchase_no,
            p.refference_no AS refference_no,
            p.purchase_supplier_id AS purchase_supplier_id,
            s.supplier_name AS supplier_name,
            s.supplier_phone AS supplier_phone,
            s.supplier_address AS supplier_address,
            p.purchase_created_date AS purchase_created_date,
            p.purchase_created_by AS purchase_created_by,
            p.purchase_modified_by AS purchase_modified_by,
            p.purchase_modified_date AS purchase_modified_date,
            p.purchase_branch_id AS purchase_branch_id,
            b.branch_name AS branch_name,
            p.purchase_due_date AS purchase_due_date,
            p.purchase_deposit AS purchase_deposit,
            p.purchase_discount AS purchase_discount,
            p.purchase_note AS purchase_note,p.purchase_vat AS purchase_vat,
            p.purchase_total_amount AS purchase_total_amount,
            p.status AS status,
            (p.purchase_total_amount - ((ifnull(get_po_pay(p.purchase_no),0) + p.purchase_deposit) + ((p.purchase_discount / 100) * p.purchase_total_amount))) AS purchase_credit,
            get_employee_name(p.purchase_created_by) AS created_by 
            from ((purchase p
            left join supplier s on((s.supplier_id = p.purchase_supplier_id))) 
            join branch b on((b.branch_id = p.purchase_branch_id)))
            join employee e on e.employee_id = p.purchase_created_by
            where 1=1 AND e.employee_brand_id=".$this->Base_model->branch_id()." $branch
            order by p.purchase_no desc ");
        
        $this->load->view("report/report_stock/response",$data);
    }

    public function response_detail($po_id){        
        //permission data
            $branch=$this->Base_model->branch_id();
           $name=$this->uri->segment(1);
           $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
           $id=0;          
           foreach($getid as $g){
               $id=$g->permission_id;
           }
           
            $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
            $str=$view_all==1?'':' and employee_brand_id  ='.$this->Base_model->branch_id();
            
            $edit = 0;
            $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
            
        //end permission data
         
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase_detail where purchase_no=$po_id");
        $this->load->view("report/report_stock/response",$data);
    }

    public function responses(){
        
        $df= $this->input->get("df");
        $dt= $this->input->get("dt");        
        $customer_name= $this->input->get("customer_name");  
        $seller= $this->input->get("seller"); 
        $invoice= $this->input->get("invoice"); 
        
        $q_name='';
        $q_seller='';
        $q_invoice='';        
        $q_date = '';
        
        if($customer_name != ""){
            $q_name = " and item_detail_id = '".$customer_name."' ";          
        }
        if($seller !=null){
            $q_seller = " and supplier_name like '%$seller%' ";
        }
        if($invoice!=null){
            $q_invoice = " and invoiceno like '%$invoice%' ";
        }
        if($df != '' && $dt!= ''){
           $q_date=  "and purchase_created_date between '".$df."' and '".$dt."'";           
        }
        //permission data
        $name=$this->uri->segment(1);
        $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
        $id=0;

        foreach($getid as $g){
            $id=$g->permission_id;
        }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        
        $str=$view_all==1?'SELECT purchase_no_link,supplier_name,total,purchase_pay_amout,purchase_pay_credit_amount,recorder,purchase_created_date,modifier_recoder,purchase_pay_created_date FROM v_purchase_list where 1=1 ':'SELECT purchase_no as purchase_no_link,supplier_name,total,purchase_pay_amout,purchase_pay_credit_amount,recorder,purchase_created_date,modifier_recoder,purchase_pay_created_date FROM v_purchase_list and purchase_created_by='.$this->Base_model->user_id();        
        
        $edit = 0;
        $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
        $concate = "";
        if($edit==1){
            $concate=",purchase_no_link as purchase_click ";
        }
        else{
            $concate=",purchase_no as purchase_click ";
        }
        $query = "SELECT *$concate FROM v_purchase_list where 1=1";
        
        $query_str = $query.$q_seller.$q_date;
        
        $data['records']=$this->Base_model->loadToListJoin($query_str);
        
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response",$data);
    }

    public function load_all($id) {
       // $id = $this->input->post("item_id");
        $result = $this->Base_model->get_data_by("SELECT * from v_purchase_detail where purchase_no=" . $id . " ");
        if ($result != "") {
            echo json_encode($result);
        } else {
            $response["success"] = 0;
            $response["statusCode"] = 'E0001';
            $response["message"] = "Data null!";
            echo json_encode($response);
        }
    }
    public function load_master($id) {
       // $id = $this->input->post("item_id");
        $status_pay=0;
        $result = $this->Base_model->get_data_by("SELECT * from v_purchase where purchase_no=" . $id . " ");
        if($this->Base_model->check_exists('purchase_no','purchase_pay',array('purchase_no'=>$id))){
            $status_pay=1;
        }else{
            $status_pay=0;
        }
        if ($result != "") {

            foreach($result as $r){
                $arr=array(
                    'purchase_amount'=>$r->purchase_total_amount,
                    'purchase_discount'=>$r->purchase_discount,
                    'purchase_total_amount'=>$r->purchase_total_amount-(($r->purchase_discount/100)*$r->purchase_total_amount),
                    'purchase_deposit'=>$r->purchase_deposit,
                    'status'=>$r->status,
                    'status_pay'=>$status_pay,
                    'supplier_id'=>$r->purchase_supplier_id,
                    'supplier_name'=>$r->supplier_name,
                    'ref'=>$r->refference_no,
                    'note'=>$r->purchase_note,
                    'po_date'=>$r->purchase_created_date,
                    'due_date'=>$r->purchase_due_date,
                    'branch'=>$r->purchase_branch_id

                );
            }
             echo json_encode($arr);

            //echo json_encode($result);
        } else {
            $response["success"] = 0;
            $response["statusCode"] = 'E0001';
            $response["message"] = "Data null!";
            echo json_encode($response);
        }
    }


    public function delete_item(){
        $id              =$this->input->post('id');
        $po_id           =$this->input->post('po_id');
        $stock_id        =$this->input->post('stock_id');
        $note_id         =$this->input->post('note_id');
        $this->purchase_return($id);
        $this->Base_model->delete_by('purchase_detail', 'purchase_detail_id', $id);
        $this->Base_model->delete_by('stock','note_id',$note_id);
        $this->update_po_master($po_id,$stock_id);
        //$this->update_costing($po_id,$stock_id);

        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been deleted!!";
        echo json_encode($response);
    }

    private function purchase_return($po_detail_id){
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $po=$this->Base_model->loadToListJoin("select * from purchase_detail where purchase_detail_id=$po_detail_id");
        foreach ($po as $p) {
            $data=array(
                'purchase_no'=>$p->purchase_no,
                'purchase_return_item_detail_id'=>$p->purchase_detail_item_detail_id,
                'stock_location_id'=>$p->stock_location_id,
                'measure_id'=>$p->measure_id,
                'measure_qty'=>$p->measure_qty,
                'purchase_return_unit_cost'=>$p->purchase_detail_unit_cost,
                'purchase_return_qty'=>$p->purchase_detail_qty,
                'purchase_return_total_amount'=>$p->purchase_detail_total_amount,
                'purchase_return_date'=>$date->format('Y-m-d H:i:s'),
                'purchase_return_created_by'=>$this->Base_model->user_id()

            );
            $this->Base_model->save('purchase_return',$data);
        }
        
    }

    private function update_credit($id){
        $total_pay=$this->Base_model->get_value_sql("select sum(purchase_pay_amount) as total from purchase_pay where purchase_no=$id","total");
        $total_master=$this->Base_model->get_value_sql("select purchase_total_amount as total from purchase where purchase_no=$id","total");
        $total_deposit=$this->Base_model->get_value_sql("select purchase_deposit as total from purchase where purchase_no=$id","total");
        $total_discount=$this->Base_model->get_value_sql("select purchase_discount as total from purchase where purchase_no=$id","total");
        $total_return=$this->Base_model->get_value_sql("select purchase_return_total_amount as total from purchase_return where purchase_no=$id","total");
        $total_discount=number_format(($total_discount/100)*$total_master, 5, '.', '');
           $total_pay=number_format($total_pay, 5, '.', '');
           $total_master=number_format($total_master, 5, '.', '');
           $total_deposit=number_format($total_deposit, 5, '.', '');
           if($total_return!="" && $total_return!=null){
                $total_return=number_format($total_return, 5, '.', '');
           }else{
                $total_return=0;
           }

        if(($total_pay+$total_deposit+$total_discount)==$total_master){
             $this->Base_model->updates('purchase',array('purchase_no'=>$id),array('status'=>0));
        }else{
            $this->Base_model->updates('purchase',array('purchase_no'=>$id),array('status'=>1));
        }
    }

    public function response_search() {    
        $branch=$this->Base_model->branch_id();    
     
        $start_date=$this->input->get('sd');
        $end_date=$this->input->get('ed');
        $sup_id=$this->input->get('sup_id');
        $po_id=$this->input->get('po_id');
        $branch_id=$this->input->get('branch_id');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and purchase_branch_id =".$this->Base_model->branch_id()." ";
        }
        $dates="";
        $sup="";
        $po="";
        $s_branch="";

        
        if($start_date!="" && $end_date!="" && $start_date!=null && $end_date!=null){
            $dates=" and p.purchase_created_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
        
        if($sup_id!="" && $sup_id!=null){
            $sup=' and p.purchase_supplier_id='.(int)$sup_id.' ';
        }
        if($po_id!="" && $po_id!=null){
            $po=' and p.purchase_no='.$po_id.' ' ;
        }
        if($branch_id!=0){
            $s_branch=" and p.purchase_branch_id=$branch_id";
        }
        //echo json_encode("select * from v_payment_master where 1=1  $invoice $date $room_id $cust_id $statuss $floor_id $room_type order by id");
        $data['records'] = $this->Base_model->loadToListJoin("SELECT 
            p.purchase_no AS purchase_no,
            p.refference_no AS refference_no,
            p.purchase_supplier_id AS purchase_supplier_id,
            s.supplier_name AS supplier_name,
            s.supplier_phone AS supplier_phone,
            s.supplier_address AS supplier_address,
            p.purchase_created_date AS purchase_created_date,
            p.purchase_created_by AS purchase_created_by,
            p.purchase_modified_by AS purchase_modified_by,
            p.purchase_modified_date AS purchase_modified_date,
            p.purchase_branch_id AS purchase_branch_id,
            b.branch_name AS branch_name,
            p.purchase_due_date AS purchase_due_date,
            p.purchase_deposit AS purchase_deposit,
            p.purchase_discount AS purchase_discount,
            p.purchase_note AS purchase_note,p.purchase_vat AS purchase_vat,
            p.purchase_total_amount AS purchase_total_amount,
            p.status AS status,
            (p.purchase_total_amount - ((ifnull(get_po_pay(p.purchase_no),0) + p.purchase_deposit) + ((p.purchase_discount / 100) * p.purchase_total_amount))) AS purchase_credit,
            get_employee_name(p.purchase_created_by) AS created_by 
            from ((purchase p
            left join supplier s on((s.supplier_id = p.purchase_supplier_id))) 
            join branch b on((b.branch_id = p.purchase_branch_id)))
            join employee e on e.employee_id = p.purchase_created_by
            where 1=1 AND e.employee_brand_id=".$this->Base_model->branch_id()." $branch $s_branch $dates $sup $po");
        $this->load->view("report/report_stock/response",$data);
    }

}
