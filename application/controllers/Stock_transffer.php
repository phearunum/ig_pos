<?php
class Stock_transffer extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");        
    }

    public function index() {
        $this->Base_model->check_loged_in();
        $data['title'] = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock/stock_transffer/list_stock_transfer";

        $data['date_from']  = date('Y-m-d');
        $data['date_until'] = date('Y-m-d');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");

        $data['record_transfer_alert'] = $this->Base_model->loadToListJoin("select * from v_stock_transfered where stock_transffer_branch_id_from=" . $this->Base_model->branch_id() . " AND stock_transffer_status<>'CANCEL' limit 50");
        
        //permission data
            $name =$this->uri->segment(1);
            //$name2=$this->uri->segment(2);
           
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            // $id=0;

            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
           
            // $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
            $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        
        //BEGIN TRANSLATE
        
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);

        $data['lbl_qty']         = $this->lang->line('qty');
        $data['lbl_title']      = $this->lang->line('stock_transfer_list_name');
        $data['lbl_part']              =$this->lang->line('part_number');
        $data['lbl_item_name']       = $this->lang->line('item_name');
        $data['lbl_qty']        = $this->lang->line('qty');
        $data['lbl_measure']    = $this->lang->line('measure_name');
        $data['lbl_tran_from']  = $this->lang->line('transfer_from');
        $data['lbl_tran_to']    = $this->lang->line('transfer_to');
        $data['lbl_stock']      = $this->lang->line('stock_location');
        $data['lbl_tran_by']    = $this->lang->line('lb_recorder');
        $data['lbl_tran_date']  = $this->lang->line('lb_create_date');
        $data['lbl_tran_time']  = $this->lang->line('lb_create_time');
        $data['lbl_status']     = $this->lang->line('cancel');
        $data['lbl_from']  = $this->lang->line('lbl_from');
        $data['lbl_to']     = $this->lang->line('lbl_to');
        $data['lbl_delete']    =$this->lang->line('lb_delete');
        $data['lbl_no']    =$this->lang->line('lb_no');
        $data['lb_from']   =$this->lang->line('lb_from');
        $data['lb_to']     =$this->lang->line('lb_to');
        $data['btn_search'] =$this->lang->line('btn_search');
        $data['lbl_new']    =$this->lang->line('lb_new');
        $data['btn_export']    =$this->lang->line('btn_export');    
        $data['lb_status']     = $this->lang->line('status');
        $data['lb_approve']     = $this->lang->line('approve');
        $data['lb_cancel']     = $this->lang->line('cancel');
        
        $this->load->view("welcome/view", $data);
    }
    public function response() {
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and stock_transffer_branch_id_from =".$this->Base_model->branch_id()." ";
        }
        $data['records'] = $this->Base_model->loadToListJoin("select * from v_stock_transfered where stock_transffer_status !=-1 $branch");
        $this->load->view("report/report_stock/response", $data);
        //$this->Base_model->record_count("v_customer_detail");
    }

    public function search() {
        $datefrom = $this->input->get('txt_date_from');
        $dateto  = $this->input->get('txt_date_until');
        $part=$this->input->get('txtpartnumber');
        $item_id=$this->input->get('txt_item_id');
        $branch_from=$this->input->get('cbo_branch_from');
        $stock_from=$this->input->get('cbo_stock_location_from');
        $branch_to=$this->input->get('cbo_branch_to');
        $stock_to=$this->input->get('cbo_stock_location_to');
        $status=$this->input->get('cbo_status');

        $s_date ='';
        $s_part='';
        $s_item_id='';
        $s_branch_from='';
        $s_stock_from='';
        $s_branch_to='';
        $s_stock_to='';
        $s_status='';

        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and stock_transffer_branch_id_from =".$this->Base_model->branch_id()." ";
        }
        if($part!=""){
            $s_part="and item_detail_part_number='".$part."'";
        }
        if($item_id!=""){
            $s_item_id="and stock_transffer_item_detail_id=$item_id";
        }
        if($branch_from!=0){
            $s_branch_from="and stock_transffer_branch_id_from=$branch_from";
        }
        if($stock_from!=0){
            $s_stock_from="and stock_transffer_location_from=$stock_from";
        }
        if($branch_to!=0){
            $s_branch_to="and stock_transffer_branch_id_to=$branch_to";
        }
        if($stock_to!=0){
            $s_stock_to="and stock_transffer_location_to=$stock_to";
        }
        if ($datefrom != '' && $dateto !='') {
            $s_date=" and date_format(stock_transffer_created_date,'%Y-%m-%d') between '$datefrom' and '$dateto'";
        }
        if($status!=""){
            $s_status="and stock_transffer_status=$status";
        }
        $data['records'] = $this->Base_model->loadToListJoin("select * from v_stock_transfered where stock_transffer_status !=-1  $s_date $s_part $s_item_id $s_branch_from $s_stock_from $s_branch_to $s_stock_to $branch $s_status");
        $this->load->view("report/report_stock/response", $data);
    }

    public function addnew() {
        $this->Base_model->check_loged_in();
        $data['title']  = "STOCK ADJUST";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "stock/stock_transffer/frm_stock_transffer";
        ///
        $data['measure']=$this->Base_model->get_data("measure");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']=$this->Base_model->loadToListJoin("select * from branch where 1=1 $branch AND branch_status!=0");
        $data['record_measure']           = $this->Base_model->get_data("measure");
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);

        $data['lbl_title']       = $this->lang->line('stock_tranfer_addnew_list_name');
        $data['lbl_part']        = $this->lang->line('part_number');
        $data['lbl_name']        = $this->lang->line('item_name');
        $data['lbl_qty']         = $this->lang->line('qty');
        $data['lbl_tran_from_branch']   = $this->lang->line('transfer_from_branch');
        $data['lbl_tran_to_branch']   = $this->lang->line('transfer_to_branch');
        $data['lbl_tran_from_stock'] = $this->lang->line('transfer_from_stock');
        $data['lbl_tran_to_stock']  = $this->lang->line('transfer_to_stock');
        $data['lbl_desc']        = $this->lang->line('lb_desc');

        $data['lbl_measure']    =$this->lang->line('measure');
        $data['lbl_new']    =$this->lang->line('lb_new');
        $data['lbl_note']   =$this->lang->line('val_mess_require');
        $data['btn_create'] =$this->lang->line('btn_create');
        $data['btn_cancel'] =$this->lang->line('btn_cancel');  
        
        $this->load->view("welcome/view", $data);
    }

    public function alert() {        
        $user_id = $this->Base_model->user_id();
        if(empty($user_id)||!isset($_SESSION['loged_in'])){
            echo 0;
            exit();
        }
        $this->load->view("stock/stock_transffer/alert");
    }

    public function getlist() {
        $this->load->view("stock/stock_transffer/list_transfer_alert");
    }

    public function display_alert(){
        
        $data['title'] = "DISPLAY ALERT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock/stock_transffer/rpt_alert_transfer";
        
        $stock_transfer_id=$this->uri->segment(3);
        $data['record_transfer_alert']=$this->Base_model->loadToListJoin("select * from v_stock_transfer_active where stock_transffer_id=".$stock_transfer_id);
        
        $this->load->view("welcome/view",$data);
    }
    public function display_all_alert(){
        
        $data['title'] = "DISPLAY ALL ALERT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "stock/stock_transffer/rpt_alert_transfer";
        
       
        $data['record_transfer_alert']=$this->Base_model->loadToListJoin("select * from v_stock_transfer_active where stock_transffer_status='TRANSFER'");
        
        $this->load->view("welcome/view",$data);
    }

    public function approve_to_stock() {
        $stock_transfer_id =$this->input->post('id');
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $user=$this->Base_model->user_id();
        $get_data = $this->Base_model->loadToListJoin("SELECT * from stock_transfer where stock_transffer_id=$stock_transfer_id");

        $stock_transfer_id;
        $stock_location_from;
        $stock_location_to;
        $stock_transfer_branch_id_from;
        $stock_location_branch_id_to;
        $stock_transfer_item_id;
        $stock_transfer_item_qty;
        $stock_transfer_measure_id;
        $stock_transfer_measure_qty;

        foreach ($get_data as $gd) {
            $stock_transfer_branch_id_from=$gd->stock_transffer_branch_id_from;
            $stock_location_from=$gd->stock_transffer_location_from;
            $stock_transffer_id = $gd->stock_transffer_id;
            $stock_location_to = $gd->stock_transffer_location_to;
            $stock_location_branch_id_to = $gd->stock_transffer_branch_id_to;
            $stock_transfer_item_id = $gd->stock_transffer_item_detail_id;
            $stock_transfer_item_qty = $gd->stock_transffer_qty;
            $stock_transfer_measure_id = $gd->stock_transffer_measure_id;
            $stock_transfer_measure_qty=$gd->stock_transffer_measure_qty;
        }
        //cut stock from
        //echo $stock_transfer_item_id.' '.$stock_location_branch_id_to.' '.$stock_location_to;
        //die();
        $qtys=$stock_transfer_item_qty*$stock_transfer_measure_qty;
       //echo $qtys;die();
        $total_in_stock=$this->Base_model->get_value_byQuery("SELECT sum(stock_qty) total from stock where stock_item_id=$stock_transfer_item_id and branch_id=$stock_transfer_branch_id_from and stock_location_id=$stock_location_from order by stock_created_date desc","total");
        if($total_in_stock<$qtys){
            $response['status']='E001';
            $response['message']='You cannot transfer Item !! Item in stock less than qty!!';
        }else{
            if($this->Base_model->check_exists("stock_id","stock",array('stock_item_id'=>$stock_transfer_item_id,'branch_id'=>$stock_location_branch_id_to,'stock_location_id'=>$stock_location_to))){
            //exist in stock
               
                $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$stock_transfer_item_id and branch_id=$stock_transfer_branch_id_from and stock_location_id=$stock_location_from order by stock_created_date desc");
                
                for($i=0;$i<count($rd_stock);$i++){
                    if($qtys<=$rd_stock[$i]->stock_qty){
                        $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>$rd_stock[$i]->stock_qty-$qtys));
                        
                        $i=$i+count($rd_stock);
                    }else{
                        if(($rd_stock[$i]->stock_qty)>0){
                            $qtys=$qtys-$rd_stock[$i]->stock_qty;
                            $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>0));
                        }   
                    }
                }
                //
                $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$stock_transfer_item_id and branch_id=$stock_location_branch_id_to and stock_location_id=$stock_location_to order by stock_created_date desc limit 1");
                foreach($rd_stock as $rds){
                    $update_stock=array(
                         'stock_qty'           => $rds->stock_qty+($stock_transfer_item_qty*$stock_transfer_measure_qty)
                    );
                    $this->Base_model->update('stock','stock_id',$rds->stock_id,$update_stock);
                }
                    $update_transfered = array(
                        'stock_transffer_status' => 1,
                        'stock_transffer_modified_by'=>$this->Base_model->user_id(),
                        'stock_transffer_modified_date'=>$date->format('Y-m-d H:i:s')
                    );
                    $this->Base_model->update('stock_transfer', 'stock_transffer_id', $stock_transffer_id, $update_transfered);

                $response['status']='S001';
                $response['message']='Data has been saved!!';
            }else{
                $qtys=$stock_transfer_item_qty*$stock_transfer_measure_qty;
                $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$stock_transfer_item_id and branch_id=$stock_transfer_branch_id_from and stock_location_id=$stock_location_from order by stock_created_date desc");
                for($i=0;$i<count($rd_stock);$i++){
                    if($qtys<=$rd_stock[$i]->stock_qty){

                        $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>$rd_stock[$i]->stock_qty-$qtys));
                        //insert to new stock
                        $data_stock=array(
                            'branch_id'=>$stock_location_branch_id_to,
                            'stock_qty'=>$qtys,
                            'stock_item_id'=>$stock_transfer_item_id,
                            'stock_created_date'=>$date->format('Y-m-d H:i:s'),
                            'stock_created_by'=>$user,
                            'stock_location_id'=>$stock_location_to,
                            'stock_costing'=>$rd_stock[$i]->stock_costing,
                            'stock_expire_date'=>$rd_stock[$i]->stock_expire_date,
                            'stock_alert_date'=>$rd_stock[$i]->stock_alert_date,
                            'po_detail_id'=>$rd_stock[$i]->po_detail_id
                         );
                        $this->Base_model->save('stock',$data_stock);

                       $i=$i+count($rd_stock);
                         
                    }else{
                        if(($rd_stock[$i]->stock_qty)>0){
                            $qtys=$qtys-$rd_stock[$i]->stock_qty;
                            $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>0));
                            $data_stock=array(
                                'branch_id'=>$stock_location_branch_id_to,
                                'stock_qty'=>$rd_stock[$i]->stock_qty,
                                'stock_item_id'=>$stock_transfer_item_id,
                                'stock_created_date'=>$date->format('Y-m-d H:i:s'),
                                'stock_created_by'=>$user,
                                'stock_location_id'=>$stock_location_to,
                                'stock_costing'=>$rd_stock[$i]->stock_costing,
                                'stock_expire_date'=>$rd_stock[$i]->stock_expire_date,
                                'stock_alert_date'=>$rd_stock[$i]->stock_alert_date,
                                'po_detail_id'=>$rd_stock[$i]->po_detail_id
                             );
                        $this->Base_model->save('stock',$data_stock);
                        }  
                        
                    }
                 
                    $update_transfered = array(
                        'stock_transffer_status' => 1,
                        'stock_transffer_modified_by'=>$this->Base_model->user_id(),
                        'stock_transffer_modified_date'=>$date->format('Y-m-d H:i:s')
                    );
                    $this->Base_model->update('stock_transfer', 'stock_transffer_id', $stock_transffer_id, $update_transfered);
                    $response['status']='S001';
                    $response['message']='Data has been saved!!';     
                }
               
                
            }   
        }
        echo json_encode($response);
    }
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

    public function save() {

        $item_id = $this->input->post("txtpro_id");
        $transfer_qty = $this->input->post("txt_qty");
        $transfer_from = $this->input->post("cbo_stock_location_from");
        $transfer_to = $this->input->post("cbo_stock_location_to");
        $transfer_note = $this->input->post("txt_description");
        $branch_from = $this->input->post("cbo_from_branch");
        $branch_to = $this->input->post("cbo_to_branch");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $measure=$this->input->post('cbo_measure');
        $measure_qty=$this->Base_model->get_value_sql("select measure_qty qty from measure where measure_id=$measure","qty");
        //-1:cancel,0:padding,1:transfered
        if($this->Base_model->check_exists("stock_id","stock",array('stock_item_id'=>$item_id,'branch_id'=>$branch_from,'stock_location_id'=>$transfer_from))){
            $total_in_stock=$this->Base_model->get_value_byQuery("select sum(stock_qty) total from stock where stock_item_id=$item_id and branch_id=$branch_from and stock_location_id=$transfer_from order by stock_created_date desc","total");
            if(($transfer_qty*$measure_qty)>$total_in_stock){
                $response['status']='E001';
                $response['message']='Item in stock is not enough. Current stock is '.$total_in_stock.' !!';
            }else{
                $transfer_data = array(
                    'stock_transffer_location_from' => $transfer_from,
                    'stock_transffer_location_to' => $transfer_to,
                    'stock_transffer_branch_id_from' => $branch_from,
                    'stock_transffer_branch_id_to' => $branch_to,
                    'stock_transffer_item_detail_id' => $item_id,
                    'stock_transffer_measure_id'    =>$measure,
                    'stock_transffer_measure_qty'   =>$measure_qty,
                    'stock_transffer_qty' => $transfer_qty,
                    'stock_transffer_status' => 0,
                    'stock_transffer_created_by' => $this->Base_model->user_id(),
                    'stock_transffer_created_date' => $date->format('Y-m-d H:i:s'),
                    'stock_transffer_modified_by'=>$this->Base_model->user_id(),
                    'stock_transffer_modified_date'=> $date->format('Y-m-d H:i:s'),
                    'stock_transffer_note' => $transfer_note
                );
                $this->Base_model->save('stock_transfer', $transfer_data);
                $response['status']='S001';
                $response['message']='Data has been saved!!';
            }
            
        }else{
            $response['status']='E001';
            $response['message']='Item not exist in stock !!';
        }
        
        echo json_encode($response);
    }
    public function cancel_transffer($transffer_id){
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $data=array(
            'stock_transffer_status'    =>'-1',
            'stock_transffer_modified_by'=>$this->Base_model->user_id(),
            'stock_transffer_modified_date'=>$date->format('Y-m-d H:i:s')
        );
        $this->Base_model->update("stock_transfer",'stock_transffer_id',$transffer_id,$data);
        redirect("stock_transffer");
    }
    public function display_stock() {
        $users = $this->session->userdata("user_id");
        //if (empty($users)) {
        $data['id'] = $this->input->post("id");
        echo $this->load->view("stock/stock_transffer/frm_display_stock", $data);
        //}
    }
}
