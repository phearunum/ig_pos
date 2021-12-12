<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wholesale
 *
 * @author hpt-srieng
 */

class Purchase_return extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        
        $data['title'] = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_return/report_purchase_return_list";        
        $data['listrecord']=$this->Base_model->loadToListJoin("SELECT * from v_purchase_return where purchase_return_created_date=CURDATE() and  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        $data['recorder']=$this->Base_model->loadToListJoin("SELECT recorder from v_purchase_return group by recorder");
        
        $data['text_display'] = '';
        $this->load->view("welcome/view",$data);
        
    }
    
    public function addnew(){
        $data['title'] = "PURCHASE RETURN";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_return/frm_purchase_return";
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        
        if($this->Base_model->loadToListJoin("select purchase_return_status from purchase_return where purchase_return_status='ACTIVE' and purchase_return_created_by=".$this->session->userdata('user_id'))){
                $invNo=$this->Base_model->loadToListJoin("select purchase_return_no from purchase_return where purchase_return_status='ACTIVE' and purchase_return_created_by=".$this->session->userdata('user_id')." limit 1");
                
                $invoiceno=0;
                
                foreach($invNo as $inv){
                    $invoiceno=$inv->purchase_return_no;
                }

                $data['invoice_no']=$invoiceno;
        }else{
            $data['invoice_no']=$this->getInvoiceNo();
        }
        //select data inner from tblsale 
        $data['p_return_record']=$this->Base_model->loadToListJoin("select
                                                    item_detail_id,
                                                    measure_id,
                                                    purchase_return_id,
                                                    item_detail_name,
                                                    purchase_return_qty,
                                                    purchase_return_price,
                                                    purchase_return_from_stock,
                                                    purchase_return_qty*purchase_return_price as total

                                            from v_purchase_return where purchase_return_status='ACTIVE'");
                                                    
                                                    
//        $data['grandtotal']=$this->Base_model->loadToListJoin('SELECT TE.id,TE.tax,SUM(TE.discount+(((TE.qty*TE.price)*TE.discount_value)/100)) as discount,TE.qty as qty,TE.price as price,TE.status,TE.discount_value,'
//                                                        . '                                         SUM(TE.qty*TE.price+((TE.qty*TE.price))*(TE.tax+TE.discount)/100) as total'
//                                                        . '                                         FROM tbl_sale'
//                                                        . '              TE INNER JOIN tbl_itemdetail TI ON TE.product_id=TI.ID'
//                                                        . '                                          WHERE status="ACTIVE" and TE.created_by='.$this->session->userdata('user_id').' group by total');
//        
        $data['return_date']=$date->format('Y-m-d');
        $data['refund_date']=$date->format('Y-m-d');
        $data['record_measure']=$this->Base_model->get_data("measure");
        
        $data['record_stock_location'] = $this->Base_model->get_field("stock_location", "stock_location_branch_id", $this->session->userdata('branch_id'));
        
        $this->load->view("welcome/view",$data);
        
    }
    public function purchase_return_edit_load(){
        
        //===================
        $data['title'] = "STOCK WASTE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_return/frm_purchase_return_update";
        //===================
        
        $id=$this->uri->segment(3);
        $product_id=$this->uri->segment(4);
        $qty=$this->uri->segment(5);
        $measure_id=$this->uri->segment(6);
        $stock_location=$this->uri->segment(7);
        
        $getpurchase_return=$this->Base_model->get_field('purchase_return','purchase_return_id',$id);
        $data['stock_record']=$this->Base_model->get_data_by("select * from stock where stock_item_id=".$product_id." and measure_id=".$measure_id." and branch_id=".$this->session->userdata("branch_id")." and stock_location_id=".$stock_location);
        
        $getproductname=$this->Base_model->loadToListJoin("select item_detail_name from item_detail where item_detail_id=".$product_id);
        
        $proname="";
        $return_price="";
        
        foreach($getproductname as $gn){
            $proname=$gn->item_detail_name;
        }
        
        $data['proname']=$proname;
        $data['qty']=$qty;
        $data['id']=$id;
        
        foreach($getpurchase_return as $gr){
            $return_price=$gr->purchase_return_price;
        }
        $data['return_price']=$return_price;
        
        $this->load->view('welcome/view',$data);
    }
    public function update(){
        
        $id=$this->input->post('txt_purchase_id');
      
        $qty=$this->input->post('txt_qty');
        $price=$this->input->post('txt_price');
        $oldqty=$this->input->post("txt_old_qty");
        $stock_id   =$this->input->post("txt_stock_id");
        
        $data=array(
            'purchase_return_qty'      =>$qty,
            'purchase_return_price'    =>$price
        );
        
        $this->Base_model->update('purchase_return','purchase_return_id',$id,$data);
                
        //update stock
            if($this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_id=".$stock_id)){
                
                //update stock qty/////////////////////////////////////////////
                
                $stockqty=0;
                $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock WHERE stock_id=".$stock_id);
                
                foreach($stockvalue as $sv){
                    $stockqty= $sv->stock_qty;
                }
                
                ///////////////////////////////////////////////////////////////
                
                $update_stock=array(
                     'stock_qty'          => ($stockqty+$oldqty)-$qty
                );
                
                //$this->db->where("measure_id",$measure_id);
                $this->Base_model->update('stock','stock_id',$stock_id,$update_stock);
                
            }   
            
        //end update stock
                
        redirect('purchase_return/addnew');
    }
    public function submitsearch(){
        $btn=$this->input->post("btnsubmit");
       
        switch($btn){
            case "New":
                    $this->newpurchasereturn();
                break;
            case"Search":
                    $this->formsearch();
                break;
        }
    }
    
    public function formsearch(){
        
        $data['title'] = "SEARCH PURCHASE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "search/frm_searchpurchasereturn";
        
        $data['employee']=$this->Base_model->loadToListJoin('SELECT employee_id,name FROM tblemployees');
        
        $this->load->view("welcome/view",$data);
    }
    
    public function searchsupplier(){
        $this->load->view("expense/searchsupplier.php");
    }
    
    public function submit(){
        $btn=$this->input->post("btnSave");
        
        switch($btn){
            case"+Add":
                        $this->save();
                break;
            case"Save":
                        $this->pay();
                break;
        }
    }
    
    public function getInvoiceNo(){
        $invNO=0;
        $records=$this->Base_model->loadToListJoin('SELECT max(purchase_return_no) as no FROM purchase_return WHERE purchase_return_status="PAID" OR purchase_return_status="ACTIVE"');
                     
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

        $pro_id=$this->input->post("txtpro_id");
        $qty=$this->input->post("txtQty");
        $price=$this->input->post("txtPrice");
        $measure=$this->input->post("cbo_measure");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $no=$this->input->post("txtno");
        $branch_id=$this->session->userdata('branch_id');
        $stock_location=$this->input->post("cbo_stock_location");
        
        
        //save data to list
        $return_data=array(
            'item_detail_id'                        =>$pro_id,
            'purchase_return_no'                    =>$no,
            'purchase_return_qty'                   =>$qty,
            'purchase_return_price'                 =>$price,
            'purchase_return_created_date'          =>$date->format('Y-m-d'),
            'purchase_return_created_by'            =>$this->session->userdata('user_id'),
            'branch_id'                             =>$branch_id,
            'purchase_return_total'                 =>$price*$qty,
            'measure_id'                            =>$measure,
            'purchase_return_from_stock'            =>$stock_location,
            'purchase_return_status'                =>"ACTIVE"
        );
        
        $this->Base_model->save("purchase_return",$return_data);
        
        $this->update_stock($pro_id,$qty,$measure,$branch_id);
        
        redirect("purchase_return/addnew"); 
    }
    public function pay(){
        
        $returndate=$this->input->post("txtreturndate");
        $refunddate=$this->input->post("txtrefunddate");
        $supplier=$this->input->post("txtsupplier_id");
        $no=$this->input->post("txtno");
        $memo=$this->input->post("txtmemo");
        $pay_records=array(
            'purchase_return_status'        =>"PAID",
            'purchase_return_date'          =>$returndate,
            'purchase_return_refund_date'   =>$refunddate,
            'purchase_return_note'          =>$memo,
            'supplier_id'                   =>$supplier
        );
        
        //update data in table sale
        $this->Base_model->update('purchase_return','purchase_return_no',$no,$pay_records);
        
        redirect("purchase_return/addnew");
    }
    
   public function delete(){
        
        $id=$this->uri->segment(3);
        $itemid=$this->uri->segment(4);
        $qty=$this->uri->segment(5);
        $branch_id=$this->session->userdata('branch_id');
        
        
        $this->Base_model->delete_by('purchase_return','purchase_return_id',$id);
        
        if($this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$itemid." and branch_id=".$branch_id)){
                
                //////////////////////UPDATE STOCK QTY/////////////////////////
                    
                    $stockqty=0;
                    $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$itemid." and branch_id=".$branch_id);
                    
                    foreach($stockvalue as $sv){
                        $stockqty= $sv->stock_qty;
                    }

                    $update_stock=array(
                         'stock_qty'=> $stockqty-$qty 
                    );
                    
                    $this->Base_model->update('stock','stock_item_id',$itemid,$update_stock);
                    
                ///////////////////////////////////////////////////////////////
                
            }       
                    
            redirect('purchase_return/addnew');
                    
    }
           
    public function update_stock($id,$qty,$measure_id,$branch_id){
        if($this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$id." and measure_id=".$measure_id." and branch_id=".$branch_id)){
                
                //update stock qty/////////////////////////////////////////////
                
                $stockqty=0;
                $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$id." and measure_id=".$measure_id." and branch_id=".$branch_id);
                
                foreach($stockvalue as $sv){
                    $stockqty= $sv->stock_qty;
                }
                
                ///////////////////////////////////////////////////////////////
                
                $update_stock=array(
                     'stock_qty'=> $stockqty - $qty  
                );
                
                $this->Base_model->update('stock','stock_item_id',$id,$update_stock);
            }
    }
    
    public function update_edit(){
        
        $id=$this->input->post('txtID');
        $proid=$this->input->post("txtproId");
        $qty=$this->input->post('txtaddqty');
        $price=$this->input->post('txtPrice');
        $oldqty=$this->input->post("txtoldqty");
        
        $data=array(
            'qty'      => $qty,
            'price'    => $price
        );
        
        $this->Base_model->update('`tbl_purchasereturn','id',$id,$data);
        
        //update stock
            if($this->Base_model->get_data_by("SELECT qty FROM tbl_stock WHERE item=".$proid)){
                
                //update stock qty/////////////////////////////////////////////
                
                $stockqty=0;
                $remain_alert=0;
                $stockvalue = $this->Base_model->get_data_by("SELECT qty,remain_alert FROM tbl_stock WHERE item=".$proid);
                
                foreach($stockvalue as $sv){
                    $stockqty= $sv->qty;
                    $remain_alert=$sv->remain_alert;
                }
                
                ///////////////////////////////////////////////////////////////
                
                $update_stock=array(
                     'qty'=> ($stockqty+$oldqty)-$qty  
                );
                
                $this->Base_model->update('tbl_stock','item',$proid,$update_stock);
            }
            
        //end update stock
        
        redirect('purchasereturn');
    }
    public function reportpreview(){
        
        $no=$this->uri->segment(3);
        $data['title']=$this->Base_model->loadToListJoin("select * from v_purchasereturn where no=".$no." limit 1");
        $data['description']=$this->Base_model->loadToListJoin("select * from v_purchasereturn where no=".$no);
        
        $this->load->view("expense/purchasereturn/rpt_purchase_report_preview",$data);
    }
    
    
    //START => function search
    public function search(){
        
        //START => Get Value From Textbox 
        $purchaseno = $this->input->post("purchaseno");  
        $itemname   = $this->input->post("itemname"); 
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");       
        //END => Get Value From Textbox        
        
        $data['title'] = "Purchase Return ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page 
        $data['page'] = "purchase/purchase_return/report_purchase_return_list";
        
        //START => load data to table 
        $data['listrecord']=$this->Base_model->loadToListJoin("SELECT * from v_purchase_return where purchase_return_created_date=CURDATE() and  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        //END =>  load data to table when load page
        
         $data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Query doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        
        // START => search data        
        // Search Empty textbox and combox (Line 1)
        if($purchaseno == "" && $itemname == "" && $from == "" && $to =="" && $recorder == "0"){
            $data['listrecord']=$this->Base_model->loadToListJoin("SELECT * from v_purchase_return where purchase_return_created_date=CURDATE() and  employee_brand_id = '".$this->session->userdata('branch_id')."'");
            $data['text_display'] = 'Today Purchase Detail Report';        
        }
        // Search by Purchase NO (Line 2)
        else if($purchaseno != "" && $itemname == "" && $from == "" && $to =="" && $recorder == "0"){
            $data['listrecord'] = $this->Base_model->loadToListJoin("SELECT * from v_purchase_return where  purchase_return_no='".$purchaseno."'  and  employee_brand_id = '".$this->session->userdata('branch_id')."'  order by purchase_return_no DESC");
            $data['text_display'] = 'Purchase No : '. $purchaseno ;
        }
        // Search by Item Name (Line 3)
        else if($purchaseno == "" && $itemname != "" && $from == "" && $to =="" && $recorder == "0"){
            $data['listrecord'] = $this->Base_model->loadToListJoin("SELECT * from v_purchase_return  where item_detail_name like '".$itemname."%'  and  employee_brand_id = '".$this->session->userdata('branch_id')."'  order by purchase_return_no DESC");
            $data['text_display'] = 'Item Name (start with) : '.$itemname;
        }
        // Search by Date Purchase (Line 4)
        else if($purchaseno == "" && $itemname == "" && $from != "" && $to !="" && $recorder == "0"){
            $data['listrecord'] = $this->Base_model->loadToListJoin("SELECT * from v_purchase_return where purchase_return_created_date BETWEEN  '".$from."' and '".$to."'  and  employee_brand_id = '".$this->session->userdata('branch_id')."'  order by purchase_return_no DESC");
            $data['text_display'] = 'Date : ' .$from .' -> '.$to ;
        }
        // Search by date purchase and recorder (Line 5)
        else if($purchaseno == "" && $itemname == "" && $from != "" && $to !="" && $recorder != "0"){
            $data['listrecord'] = $this->Base_model->loadToListJoin("select * from v_purchase_return  where purchase_return_created_date BETWEEN  '".$from."' and '".$to."' and recorder = '".$recorder."' and  employee_brand_id = '".$this->session->userdata('branch_id')."'  order by purchase_return_no DESC");
            $data['text_display'] = 'Recorder : '.$recorder .'<br/>'.'Date : '.$from .' -> ' .$to;
        }        
        else if($purchaseno == "" && $itemname == "" && $from == "" && $to =="" && $recorder != "0"){
            $data['listrecord'] = $this->Base_model->loadToListJoin("select * from v_purchase_return  where recorder = '".$recorder."'  and  employee_brand_id = '".$this->session->userdata('branch_id')."' order by purchase_return_no DESC");
            $data['text_display'] = 'Recorder : '.$recorder ;
        }
        
        // End Searching datawe
        
         $data['recorder']= $this->Base_model->loadToListJoin("select recorder as recorder,employee_brand_id from v_purchase_return where  employee_brand_id = '".$this->session->userdata('branch_id')."' GROUP BY recorder");
         $data['stock_location']= $this->Base_model->loadToListJoin("SELECT
                                                                    vpd.employee_brand_id,
                                                                    sl.stock_location_name
                                                                    FROM v_purchase_return as vpd
                                                                    INNER JOIN stock_location as sl ON vpd.employee_brand_id = sl.stock_location_branch_id
                                                                    where vpd.employee_brand_id = ".$this->session->userdata('branch_id')." GROUP BY stock_location_name");
        
        $data['recorder']=$this->Base_model->loadToListJoin("SELECT recorder from v_purchase_return group by recorder");
        // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
}
