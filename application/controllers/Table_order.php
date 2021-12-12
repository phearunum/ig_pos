<?php
class Table_order extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "TABLE ORDER";
        $data['header'] = "template_cashier/header";
        $data['menu']   = "template_cashier/menu";
        $data['footer'] = "template_cashier/footer";
        $data['page']   = "cafe/frm_table_order";
        $user=$this->Base_model->user_id();
        if($user=="" || $user==null){
            redirect('logout');
        }
        $test=$this->Base_model->position_id();
		$data['permission']   = $this->Base_model->loadToListJoin("SELECT GROUP_CONCAT((CASE pa.page_ordering when 0 then p.permission_enable else NULL END)) `Cashier`,GROUP_CONCAT((CASE pa.page_ordering when 1 then p.permission_enable else NULL END)) `Customer`,GROUP_CONCAT((CASE pa.page_ordering when 2 then p.permission_enable else NULL END)) `Cash In/Out`,GROUP_CONCAT((CASE pa.page_ordering when 5 then p.permission_enable else NULL END)) `Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 6 then p.permission_enable else NULL END)) `Extra Item`,GROUP_CONCAT((CASE pa.page_ordering when 7 then p.permission_enable else NULL END)) `Table Start`,GROUP_CONCAT((CASE pa.page_ordering when 8 then p.permission_enable else NULL END)) `Void Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 9 then p.permission_enable else NULL END)) `Print Sale Data`,GROUP_CONCAT((CASE pa.page_ordering when 10 then p.permission_enable else NULL END)) `Update Cash` from permission p
                            inner join page pa on p.permission_page_id=pa.page_id
                            where pa.page_id_parent=10 and p.position_id=$test
                       GROUP BY pa.page_id_parent");
        ///
        $data['printer']   = $this->Base_model->loadToListJoin("select printer_location_id,printer_location_name from printer_location where printer_location_is_counter=1 ");
      // var_dump($data);
        $this->load->view("welcome/view",$data);
    }
    public function load_table(){
        $getlist = $this->Base_model->loadToListJoin("SELECT layout_id,layout_name,table_status from v_floor_layout_status");
        echo json_encode($getlist);
    }
    public function get_floor_table_layout(){
        //sleep(10);
        $appointment = $this->Base_model->loadToListJoin("select floor_id,floor_name from floor where status=1 and floor_branch_id=".$this->Base_model->branch_id()."");
        $c=  count($appointment);
		$total_floor = $c;
        echo '{' . '"success"' . ':1,' . '"Floor":[{';
        foreach ($appointment as $i) {
			if($total_floor==$c)
				echo '"floor_id"' . ':"' . $i->floor_id . '",' . '"floor_name"' . ':"' . $i->floor_name . '",'. '"default"' . ':"true"' . ',"table_list":';
			else
				echo '"floor_id"' . ':"' . $i->floor_id . '",' . '"floor_name"' . ':"' . $i->floor_name . '",'. '"default"' . ':"false"' . ',"table_list":';
            $detail = $this->Base_model->loadToListJoin("SELECT
                ft.layout_id,
                ft.floor_id,
                ft.layout_name,
                ft.layout_location_x,
                ft.layout_location_y,
                ft.layout_type,
                get_table_status(ft.layout_id) AS `table_status`,
                IFNULL(DATE_FORMAT(TIMEDIFF(now(),sm.sale_master_start_date),'%H:%i'),'') AS duration
            FROM
                floor_table_layout ft
            LEFT JOIN sale_master sm ON sm.sale_master_layout_id = ft.layout_id
            AND sm.sale_master_status = 1 WHERE floor_id=$i->floor_id and status=1");

            echo json_encode($detail);
            $c--;
            if($c>0){
                echo "},{";    
            }
        }
        echo "}]}";
    }
	//SEAR
    public function check_cash(){
        $cash_branch=$this->Base_model->get_value_byQuery("select sale_offline_cash_id from branch where branch_id=".$this->Base_model->branch_id(),"sale_offline_cash_id");
        $cash = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$this->Base_model->user_id(),"cash_status","ACTIVE");
        if($cash != '' && $cash!=$cash_branch){
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "success";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "error";
            echo json_encode($response);
        }
    }
    public function save_cash(){
        $cash_us = $this->input->post("cash_us");
        $cash_kh = $this->input->post("cash_kh");
        $cash_id = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$this->Base_model->user_id(),"cash_status","ACTIVE");
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        $save_data = array(
            'cash_user_id' =>$this->Base_model->user_id(),
            'cash_amount'   =>$cash_us,
            'cash_amount_kh'    =>$cash_kh,
            'cash_branch_id'    =>$this->Base_model->branch_id(),
            'cash_startdate'    =>$date,
            'cash_status'       =>'ACTIVE',
            'cash_note'         =>'',
        );
        $update_data = array(
            'cash_amount'   =>$cash_us,
            'cash_amount_kh'    =>$cash_kh
        );
        if($cash_id ==''){
            $this->Base_model->save("cash_register", $save_data);
        }else{
            $this->Base_model->update_array('cash_register', $update_data, array("cash_id" => $cash_id));
        }
        $cash_branch=$this->Base_model->get_value_byQuery("select sale_offline_cash_id from branch where branch_id=".$this->Base_model->branch_id(),"sale_offline_cash_id");
        $cash = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$this->Base_model->user_id(),"cash_status","ACTIVE");
        if($cash != '' && $cash!=$cash_branch){
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "success";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "error";
            echo json_encode($response);
        }
        
    }
    public function load_cash(){
        $user=$this->Base_model->user_id();
        $cash = $this->Base_model->loadToListJoin("select * from cash_register where cash_user_id =$user and cash_status = 'ACTIVE'");
        $data=array();
        foreach($cash as $c){
            $data = array(
                'cash_id' =>$c->cash_id,
                'cash_amount' =>$c->cash_amount,
                'cash_amount_kh' =>$c->cash_amount_kh
            );
            
        }
        $cash_id = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$this->Base_model->user_id(),"cash_status","ACTIVE");
        $cash_branch=$this->Base_model->get_value_byQuery("select sale_offline_cash_id from branch where branch_id=".$this->Base_model->branch_id(),"sale_offline_cash_id");
        if($cash_id==$cash_branch)
            $data=array();
        echo json_encode($data);
    }
    public function cash_out(){
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        $cash_id = $this->Base_model->get_value_two_cond("cash_register","cash_id","cash_user_id",$this->Base_model->user_id(),"cash_status","ACTIVE");
        $this->session->set_userdata("cash_id",$cash_id);
        $real_us = floatval($this->input->post("real_us"));
        echo($real_us);
        $real_kh = floatval($this->input->post("real_kh"));
        $data = array(
            'cash_enddate' =>$date,
            'cash_status'   =>'FINISH',
            'cash_real_us'=>$real_us,
            'cash_real_kh'=>$real_kh
        );
        $this->Base_model->update_('cash_register', $data, array("cash_id" => $cash_id));
        $response["cash_id"]=$cash_id;
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    public function cash_out_receipt(){
        $this->load->view("cafe/frm_print_cash_out_receipt");
    }
    //Setup Printer Cashier
    public function save_printer_cashier(){
        $id = $this->input->post("id");
        $printer = $this->input->post("printer");
        $print_bill = $this->input->post("print_bill");
        $print_receipt = $this->input->post("print_receipt");
        $bill_num = $this->input->post("bill_num");
        $receipt_num = $this->input->post("receipt_num");
        
        $data = array(
            'printer_location_id'    => $printer,
            'printer_print_bill'    =>$print_bill,
            'printer_print_receipt' =>$print_receipt,
            'printer_print_bill_time'   =>$bill_num,
            'printer_print_receipt_time'    =>$receipt_num,
            'printer_branch_id' =>$this->Base_model->branch_id(),
            'printer_is_counter' =>1
        );
        if($id ==''){
            $this->Base_model->save("printer", $data);
        }else{
            $this->Base_model->update_('printer', $data, array("printer_id" => $id));
        }
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    public function load_printer_cashier(){
        $id = $this->input->post("id");
        $query = '';
        if($id != ''){
            $query = " and printer_id = $id";
        }elsE{
            $query ="";
        }
        $list_printer = $this->Base_model->loadToListJoin("select *,get_printer_location_name(printer_location_id)AS printer_location_name from printer where printer_is_counter = 1 ".$query."");
        echo json_encode($list_printer);  
    }
    public function get_printer_cashier(){
        $id = $this->input->post("id");
        $printer = $this->Base_model->loadToListJoin("select *,get_printer_location_name(printer_location_id)AS printer_location_name from printer where printer_is_counter = 1 and printer_id = ".$id."");
        foreach($printer as $p){
            $arr = array(
                'printer_id' =>$p->printer_id,
                'printer_print_bill' =>$p->printer_print_bill,
                'printer_print_receipt' =>$p->printer_print_receipt,
                'printer_print_bill_time'   =>$p->printer_print_bill_time,
                'printer_print_receipt_time' =>$p->printer_print_receipt_time,
                'printer_location_id'   =>$p->printer_location_id
            );
            echo json_encode($arr);  
        }  
    }
    public function delete_printer_cashier(){
        $id = $this->input->post("id");
        $this->Base_model->delete_by('printer','printer_id',$id);
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    //End Printer Cashier
    
    //Other Printer
    public function save_other_printer(){
        $id = $this->input->post("id");
        $printer = $this->input->post("printer");
        $print_name = $this->input->post("printer_name");
        $print_num = $this->input->post("print_num");
        
        $data = array(
            'printer_location_id'    => $print_name,
            'printer_print_kitchen'    =>$printer,
            'printer_print_kitchen_time' =>$print_num,
            'printer_branch_id' =>$this->Base_model->branch_id(),
            'printer_is_counter' =>0
        );
        if($id ==''){
            $this->Base_model->save("printer", $data);
        }else{
            $this->Base_model->update_('printer', $data, array("printer_id" => $id));
        }
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    public function load_other_printer(){
        $id = $this->input->post("id");
        $query = '';
        if($id != ''){
            $query = " and printer_id = $id";
        }elsE{
            $query ="";
        }
        $list_printer = $this->Base_model->loadToListJoin("select *,get_printer_location_name(printer_location_id)AS printer_location_name from printer where printer_is_counter = 0 ".$query."");
        echo json_encode($list_printer);  
    }
    public function get_other_printer(){
        $id = $this->input->post("id");
        $printer = $this->Base_model->loadToListJoin("select *,get_printer_location_name(printer_location_id)AS printer_location_name from printer where printer_is_counter = 0 and printer_id = ".$id."");
        foreach($printer as $p){
            $arr = array(
                'printer_id' =>$p->printer_id,
                'printer_print_kitchen' =>$p->printer_print_kitchen,
                'printer_print_kitchen_time' =>$p->printer_print_kitchen_time,
                'printer_location_id'   =>$p->printer_location_id
            );
            echo json_encode($arr);  
        }  
    }
    public function delete_other_printer(){
        $id = $this->input->post("id");
        $this->Base_model->delete_by('printer','printer_id',$id);
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    //Setup Item Note
    public function save_item_note(){
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $price = $this->input->post("price");
        $desc = $this->input->post("desc");
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        
        $save_data = array(
            'item_note_name' =>$name,
            'item_note_price'   =>$price,
            'item_note_des' =>$desc,
            'item_note_branch_id'   =>$this->Base_model->branch_id(),
            'item_note_created_by'  =>$this->Base_model->user_id(),
            'item_note_created_date'    =>$date
        );
        $update_data = array(
            'item_note_name' =>$name,
            'item_note_price'   =>$price,
            'item_note_des' =>$desc,
            'item_note_branch_id'   =>$this->Base_model->branch_id(),
            'item_note_modified_by'  =>$this->Base_model->user_id(),
            'item_note_modified_date'    =>$date
        );
        if($id ==''){
            $this->Base_model->save("item_note", $save_data);
        }else{
            $this->Base_model->update('item_note','item_note_id',$id, $update_data);
        }
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    public function load_item_note(){
        $id = $this->input->post("id");
        $query = '';
        if($id != ''){
            $query = " and item_note_id = $id";
        }elsE{
            $query ="";
        }
        $list_item = $this->Base_model->loadToListJoin("select * from item_note where item_note_status=1 and 1=1 ".$query."");
        echo json_encode($list_item);  
    }
    public function get_item_note(){
        $id = $this->input->post("id");
        $item = $this->Base_model->loadToListJoin("select * from item_note where item_note_status=1 and item_note_id = ".$id."");
        foreach($item as $p){
            $arr = array(
                'item_note_id' =>$p->item_note_id,
                'item_note_name' =>$p->item_note_name,
                'item_note_price'   =>$p->item_note_price,
                'item_note_des' =>$p->item_note_des
            );
            echo json_encode($arr);  
        }  
    }
    public function delete_item_note(){
        $id = $this->input->post("id");
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        $this->Base_model->run_query('update item_note set item_note_status=0,item_note_modified_by='.$this->Base_model->user_id().',item_note_modified_date="'.$date.'" where item_note_id='.$id);
        $response["success"] = 1;
        $response["statusCode"] = "E0001";
        $response["message"] = "success";
        echo json_encode($response);
    }
    public function load_sale_data(){
        $query ="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between CURDATE() and CURDATE() and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id()." and `sm`.sale_master_cashier_id=".$this->Base_model->user_id();
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
    public function load_sale_datas(){
        $date_from = $this->input->get("date_from");
        $date_to = $this->input->get("date_to");
        $txt_customer_id = $this->input->get("txt_customer_id");

        $query ="";
        if($date_from!="" && $date_to!=""){
            $query .="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$date_from' and '$date_to'";
        }
        if($txt_customer_id != "")
             $query .= " and `sm`.`sale_master_customer_id`=$txt_customer_id";
        $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id()." and `sm`.sale_master_cashier_id=".$this->Base_model->user_id();
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
    public function searchcustomer(){
        $this->load->view("search/search");
    }
    public function void_invoice(){
        $master_id = $this->input->post("master_id");
        if($master_id !=''){
            $sale_detail = $this->Base_model->loadToListJoin("select sale_detail_id, sale_detail_item_id, sale_detail_qty, sale_detail_status from sale_detail where sale_master_id = $master_id ");
            $stock = $this->Base_model->get_value_sql("select employee_stock_location_id from employee where employee_id in (select sm.sale_master_cashier_id from sale_master sm where sm.sale_master_id=$master_id)","employee_stock_location_id");
            $branch_id = $this->Base_model->get_value_sql("select sm.sale_master_branch_id from sale_master sm where sm.sale_master_id=$master_id","sale_master_branch_id");
            foreach($sale_detail as $s){
                $s->sale_detail_item_id;
                $s->sale_detail_qty; 
                //
                $this->Base_model->return_stock($s->sale_detail_item_id,$branch_id,$stock,$s->sale_detail_qty);
            }
            $update_master = array(
                'sale_master_void_reason' => 'Void After Print Receipt',
                'sale_master_status'    =>-1
            );
            $update_detail = array(
                'sale_detail_status' => -1 
            );
            $this->Base_model->updates('sale_master', array("sale_master_id" => $master_id), $update_master);
            $this->Base_model->updates('sale_detail', array("sale_master_id" => $master_id), $update_detail);
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "success";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "error";
            echo json_encode($response);
        }
    }
    public function edit_invoice(){
       $master_id = $this->input->post("master_id");
       $table_id = $this->Base_model->get_value_two_cond("sale_master","sale_master_layout_id","sale_master",$master_id,"sale_master","PAID");
       $update_master["sale_master_status"] = 'ACTIVE';
       $update_detail["sale_detail_status"] = 'ACTIVE';
       $update_invoice_finished = array(
           'detail_status' => 'ACTIVE',
           'master_status' => 'ACTIVE'
       );
       $this->Base_model->update_('sale_master', $update_master, array("sale_master_id" => $master_id));
       $this->Base_model->update_('sale_detail', $update_detail, array("sale_detail_sale_master_id" => $master_id));
       $this->Base_model->update_('invoice_finished', $update_invoice_finished, array("master_id" => $master_id));
    }
    public function fill_data()
    {
        $master=$this->input->post('master_id');
        $master_id="";
        if($master!=""){
            $master_id=" and sale_master_id=$master";
        }

        $data_master=$this->Base_model->loadToListJoin("select * from sale_master where sale_master_status=1 $master_id");
        $total=count($data_master);
         $i=0;
         $j=0;
         
        echo '{"sale":[';
            foreach ($data_master as $r) {
                $i=$i+1;
                $data_detail=$this->Base_model->loadToListJoin("select * from v_sale_detail where sale_master_id=$r->sale_master_id and sale_detail_status=1");
                $total1=count($data_detail);
                echo ' {"sale_master_id":"'.$r->sale_master_id.'","sale_master_invoice_no":"'.$r->sale_master_invoice_no.'","sale_master_start_date":"'.$r->sale_master_start_date.'","tax":"'.$r->sale_master_tax.'","print":"'.$r->sale_master_print.'","sale_detail": ';
           
                echo '[';
                    foreach($data_detail as $d){
                        $k=0;
                        $data_note=$this->Base_model->loadToListJoin("select * from v_sale_detail_note where sale_note_detail_id=$d->sale_detail_id and sale_note_status=1");
                        $total3=count($data_note);
                        $j=$j+1;
                        echo '{"sale_master_id":"'.$r->sale_master_id.'","sale_detail_id":"'.$d->sale_detail_id.'","item_id":"'.$d->sale_detail_item_id.'","detail_name":"'.$d->item_detail_name.'","qty":"'.$d->sale_detail_qty.'","price":"'.$d->sale_detail_unit_price.'","dis_dollar":"'.$d->sale_detail_dis_us.'","dis_percent":"'.$d->sale_detail_dis_percent.'","sale_note": ';
                        //lavel 3
                            echo '[';
                                //echo '{"total":"'.$total3.'"}';
                                foreach ($data_note as $dt){
                                    $k=$k+1;
                                     echo '{"id":"'.$dt->sale_note_id.'","sale_detail_id":"'.$dt->sale_note_detail_id.'","item_note_id":"'.$dt->sale_note_item_note_id.'","item_note_name":"'.$dt->item_note_name.'","qty":"'.$dt->sale_note_qty.'","price":"'.$dt->sale_note_unit_price.'" }';
                                   
                                    if($k<$total3){echo ',';}
                                }
                            echo ']';
                            //end level 3
                        //cond level 2
                        echo '}';if($j!=$total1 && $j<$total1){echo ',';}
                    }
                echo ']';
                //cond level 1
                    echo '}';if($i!=$total){echo ',';}
            }

        echo ']}';
    }


    public function order_list_cash_out(){

        $cash_id=$this->input->post('cash_id');
        $real_us=$this->input->post("real_us");
        $real_kh=$this->input->post("real_kh");
        $finals=$this->input->post("chkfinal");
        $report=$this->input->post("report");


        $branch_id = $this->Base_model->branch_id();
        $stock_location_id=$this->Base_model->stock_location_id();

        if($report==0){
            $this->Base_model->run_query("update cash_register set cash_real_us=".$real_us.",cash_real_kh=".$real_kh.",cash_status='FINISH',cash_enddate='".$this->Base_model->current_date("Y-m-d H:i:s")."' where cash_id=".$cash_id);
            if($this->input->post("real_us")==""){
                $real_us=0;
            }
            if($this->input->post("real_kh")==""){
                $real_kh=0;
            }
        }
        //Item_Detail
        $Item = $this->Base_model->loadStoreProcedure("call p_cash_out(".$cash_id.")");
        //Invoice
        //$Item = $this->Base_model->loadStoreProcedure("call p_sale_detail('and sm.sale_master_cash_id=".$cash_id."')");
        $Item_void = $this->Base_model->loadStoreProcedure("call p_sale_detail_void('and sm.sale_master_cash_id=".$cash_id."')");
        $Cashier = $this->Base_model->loadStoreProcedure("call p_cash_register(".$cash_id.")");
        $Stock = $this->Base_model->loadStoreProcedure("call p_sale_cut_stock(".$cash_id.",".$branch_id.",".$stock_location_id.")");
        $Summary = $this->Base_model->loadStoreProcedure("call p_sale_summary('and sm.sale_master_cash_id=".$cash_id."')");
        $Summary_Void = $this->Base_model->loadStoreProcedure("call p_sale_summary_void('and sm.sale_master_cash_id=".$cash_id."')");
        $topup=$this->Base_model->loadToListJoin("select c.customer_name,c.customer_card_number,t.transaction_date,t.transaction_amount from transaction t inner join customer c on t.transaction_customer_id=c.customer_id  where transaction_action=1 and cash_id=".$cash_id);
        $acctype=$this->Base_model->loadToListJoin("select acc_type,0.00 as total from account_type");
       $pax = $this->Base_model->loadToListJoin("SELECT Sum(sale_master_pax) as pax
                 from sale_master sm
                 inner join cash_register cr on sm.sale_master_cash_id=cr.cash_id
                 where cr.cash_id='".$cash_id."'");

       $Final = $this->Base_model->loadToListJoin("SELECT
            sm.sale_master_cash_id AS cash_id,
            em.employee_name AS cashier,
                
            cr.cash_startdate AS start_date,
            cr.cash_enddate AS end_date,
            cr.cash_amount as cash_amount_us,
            cr.cash_amount_kh as cash_amount_kh,
            cr.cash_real_us,
            cr.cash_real_kh,
            FORMAT( cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate), 2 ) AS start_amount,
            FORMAT(cr.cash_real_us + cr.cash_real_kh/(select rate_amount from rate),2) AS receive_amount,
            
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ),2) AS sale_amount,
            
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2) AS total_amount,

            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2)*(select rate_amount from rate) AS total_amount_kh,
    (SELECT count(0) 
        FROM sale_master sm
        WHERE ((sm.sale_master_status IN (2, -1))AND (sm.sale_master_cash_id = cr.cash_id))) AS total_invoice,
    (SELECT count(0)
        FROM sale_master sm
        WHERE ((sm.sale_master_status = 2)AND (sm.sale_master_cash_id = cr.cash_id))) AS paid_invoice,
    (SELECT count(0)
        FROM sale_master sm
        WHERE((sm.sale_master_status = -1)AND (sm.sale_master_cash_id = cr.cash_id))) AS void_invoice,
    (SELECT sum(sm.sale_master_pax)
      from sale_master sm
      where sm.sale_master_pax AND sm.sale_master_cash_id=cr.cash_id )  AS pax


            FROM sale_master sm
            JOIN cash_register cr ON sm.sale_master_cash_id =cr.cash_id
            JOIN sale_detail sd ON sm.sale_master_id = sd.sale_master_id
            LEFT JOIN employee em ON em.employee_id = sm.sale_master_cashier_id
            LEFT JOIN item_detail idt ON idt.item_detail_id = sd.sale_detail_item_id
            LEFT JOIN floor_table_layout ftl ON sm.sale_master_layout_id=ftl.layout_id
            LEFT JOIN floor fl ON ftl.floor_id=fl.floor_id
            LEFT JOIN account_type ac ON sm.sale_master_account_type=ac.acc_type_id
            INNER JOIN branch br ON sm.sale_master_branch_id=br.branch_id
            WHERE  1=1 and sm.sale_master_status in (2) AND sd.sale_detail_status in (1) AND cr.cash_status LIKE 'FINISH' AND date_format(cr.cash_enddate,'%Y-%m-%d') =  date_format(now(),'%Y-%m-%d')
            GROUP BY sm.sale_master_cash_id");
        $array1 = array(
            'Item'=>$Item,
            'Cashier'=>$Cashier,
            'Stock'=>$Stock,
            'Item_void'=>$Item_void,
            'Summary'=>$Summary,
            'Summary_Void'=>$Summary_Void,
            'Topup'=>$topup,
            'Account_type'=>$acctype,
            'pax'=>$pax,
            'Final'=>$Final
        );
        echo json_encode($array1);

    }
    public function check_permission(){
        $permission_name=$this->input->post('permission_name');
        $action=$this->input->post('action');
        $position=$this->Base_model->position_id();
        $result=$this->Base_model->get_value_byQuery("select ".$action." as permission from page p inner join permission pe on pe.permission_page_id=p.page_id where p.page_name='".$permission_name."' and pe.position_id=".$position,"permission");
        echo $result;

    }
    public function send_mail(){
        $message=$this->input->post("message");
        $this->load->library("email");
        $this->email->from("support@sop-pos.com","TESTING REPORT SYSTEM");
        $this->email->to(array("paichamreun0697@gmail.com","coffeelab2@gmail.com"));
        $this->email->subject("Daily Close Shift Report");
        $this->email->message($message);
        $this->email->send();

        $bug = $this->email->print_debugger();
        echo json_encode($bug);
    }
}
