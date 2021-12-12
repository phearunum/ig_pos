<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of whole_sale
 *
 * @author hpt-srieng
 */
class Whole_sale extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    
    public function index(){
        $data['title'] = "WHOLE SALE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "whole_sale/list_whole_sale";
        
        $data['record_sale_summary']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary WHERE sale_master_type='W' and sale_master_branch_id=".$this->session->userdata("branch_id"));
        $data['text_display'] = '';
        $this->load->view("welcome/view",$data);
    }
    
    public function addnew(){
        
        $data['title'] = "WHOLE SALE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "whole_sale/frm_whole_sale";
        
        $data['exchange']=$this->Base_model->loadToListJoin('SELECT rate_amount FROM rate');
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        
       //get invoice no
        if($this->Base_model->loadToListJoin("select sale_detail_status from sale_detail where  sale_detail_status='ACTIVE' and sale_detail_created_by=".$this->session->userdata('user_id'))){
                $invNo=$this->Base_model->loadToListJoin("select max(sale_detail_invoice_no) as invoice_no from sale_detail where sale_detail_created_by=".$this->session->userdata('user_id')." and sale_detail_status='ACTIVE' order by sale_detail_id desc limit 1");
                
                $invoiceno=0;
                
                foreach($invNo as $inv){
                    $invoiceno=$inv->invoice_no;
                }
                $data['invNo']=$invoiceno;
        }else{
                $data['invNo']=$this->getInvoiceNo();
        }
        
        //select data inner from tblsale
        
        $data['getlist']=$this->Base_model->loadToListJoin('SELECT sale_detail_id,'
                        . '                                         sale_detail_item_id,'
                        . '                                         item_detail_name,'                                         
                        . '                                         sale_detail_qty,'
                        . '                                         sale_detail_discount_percent,'
                        . '                                         sale_detail_discount_dollar,'
                        . '                                         sale_detail_unit_price,'
                        . '                                         measure_id,'
                        . '                                         total_with_discount,'
                        . '                                         sale_detail_total'
                        . '                                         FROM v_sale_detail_active where sale_detail_created_by='.$this->session->userdata('user_id')." AND sale_detail_type='W'");
        
        
        
        
        
//        $data['grandtotal']=$this->Base_model->loadToListJoin('SELECT TE.id,TE.tax,SUM(TE.discount+(((TE.qty*TE.price)*TE.discount_value)/100)) as discount,TE.qty as qty,TE.price as price,TE.status,TE.discount_value,'
//                                                        . '                                         SUM(TE.qty*TE.price+((TE.qty*TE.price))*(TE.tax+TE.discount)/100) as total'
//                                                        . '                                         FROM tbl_sale'
//                                                        . '              TE INNER JOIN tbl_itemdetail TI ON TE.product_id=TI.ID'
//                                                        . '                                          WHERE status="ACTIVE" and TE.created_by='.$this->session->userdata('user_id').' and TE.saletype="R" group by total');
//        
        
        $data['employee']=$this->Base_model->loadToListJoin('SELECT employee_id,employee_name FROM employee WHERE employee_is_seller=1');
        $data['record_stock_location']=$this->Base_model->loadToListJoin('SELECT employee_stock_location_id FROM employee WHERE employee_id='.$this->session->userdata('user_id'));
    //end select data from tblsale
    //permission data     
    //        $name=$this->uri->segment(1);
    //            
    //        $getid=$this->Base_model->loadToListJoin("SELECT id FROM tblpermission WHERE control='".$name."' AND id_group=".$this->session->userdata('group_id'));
    //        $id=0;
    //        
    //        foreach($getid as $g){
    //            $id=$g->id;
    //        }
    //        
    //        $this->session->set_userdata("page_id",$id);
    //        $data['permission']=$this->Base_model->loadToListJoin("SELECT * FROM tblpermission WHERE id=".$id);
    //        
    //end permission data
        $data['record_measure']=$this->Base_model->get_data("measure");
        $data['record_vat']    =$this->Base_model->get_data("tax");
        $data['sell_date']=$date->format('Y-m-d');
        $data['pay_date']=$date->format('Y-m-d');
        $this->load->view("welcome/view",$data);
    }
    public function load_sale_detail_list(){
        $data['title'] = "WHOLE SALE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "whole_sale/list_whole_sale_detail";
        
        $invoice_no=$this->uri->segment(3);
        
        $data['getlist']=$this->Base_model->loadToListJoin("SELECT  sale_detail_id,"
                        . "                                         sale_detail_item_id,"
                        . "                                         item_detail_name,"                                         
                        . "                                         sale_detail_qty,"
                        . "                                         sale_detail_discount_percent,"
                        . "                                         sale_detail_discount_dollar,"
                        . "                                         sale_detail_unit_price,"
                        . "                                         measure_id,"
                        . "                                         sale_detail_total"
                        . "                                         FROM v_sale_detail_finish where sale_detail_type='W' and sale_detail_invoice_no=".$invoice_no);
        
        $this->load->view("welcome/view",$data);
    }
    
    public function getInvoiceNo(){
        $invNO=0;
        
        $records=$this->Base_model->loadToListJoin('SELECT max(sale_detail_invoice_no) as invoice_no FROM sale_detail WHERE sale_detail_status<>"ACTIVE" order by sale_detail_id desc');
                     
            foreach($records as $inv){
                $iv=$inv->invoice_no;
            if($iv>0){
                $invNO=$iv+1;
            }else{
                $invNO=1;
            }
                return $invNO;
            }
    }
    
    public function searchcustomer(){
        $this->load->view("search/search.php");
    }
    
    public function submit(){
        $btn=$this->input->post("btnsubmit");
        
        switch($btn){
            case"+Add":
                        $this->save();
                break;
            case"Save":
                        $this->pay();
                break;
            default :
                    redirect("whole_sale");
                break;
        }
    }
        
    public function save(){    
        $measure_id=$this->input->post("cbo_measure");
        $invoice_no=$this->input->post("txtinvoice_no");
        $pro_id=$this->input->post("txtpro_id");
        $qty=$this->input->post("txtQty");
        $price=$this->input->post("txtPrice");
        $discount_one_by_one=$this->input->post("txtDiscount");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $stock_location_id=$this->input->post("txt_stock_location");
        $branch_id=$this->session->userdata('branch_id');
        
        //save data to list
        $retailsalerecord=array(
            
            'sale_detail_type'                  =>"W",
            'sale_detail_invoice_no'            =>$invoice_no,
            'sale_detail_item_id'               =>$pro_id,
            'sale_detail_qty'                   =>$qty,
            'sale_detail_unit_price'            =>$price,
            'sale_detail_discount_percent'      =>$discount_one_by_one,
            'sale_detail_status'                =>'ACTIVE',
            'sale_detail_time'                  =>$date->format('H:i:s'),
            'sale_detail_created_by'            =>$this->session->userdata('user_id'),
            'sale_detail_created_date'          =>$date->format('Y-m-d H:i:s'),
            'sale_detail_measure_id'            =>$measure_id,
            'sale_detail_branch_id'             =>$branch_id
                
        );
        
        $this->Base_model->save("sale_detail",$retailsalerecord);
        
        $this->update_stock($pro_id,$qty,$measure_id,$branch_id,$stock_location_id);
        redirect("whole_sale/addnew");
        //end save data
    }
    
    public function update_stock($id,$qty,$measure_id,$branch_id,$stock_location){
        if($this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$id." and measure_id=".$measure_id." and branch_id=".$branch_id." and stock_location_id=".$stock_location)){
                
                //update stock qty/////////////////////////////////////////////
                
                $stockqty=0;
                $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$id." and measure_id=".$measure_id." and branch_id=".$branch_id. " and stock_location_id=".$stock_location);
                
                foreach($stockvalue as $sv){
                    $stockqty= $sv->stock_qty;
                }
                
                ///////////////////////////////////////////////////////////////
                
                $update_stock=array(
                     'stock_qty'=> $stockqty - $qty  
                );
                $this->db->where("branch_id",$this->session->userdata("branch_id"));
                $this->db->where("stock_location_id",$this->session->userdata("stock_location_id"));
                $this->db->where("measure_id",$measure_id);
                $this->Base_model->update('stock','stock_item_id',$id,$update_stock);
            }
    }
    public function pay(){
        
        $customer_id=$this->input->post("txtcustomer_id");
        $rate=$this->input->post("txtrate");
        $totaldollar=$this->input->post("txtamountneed");
        $totalriel=$this->input->post("txtamountneed");
        $discountpercent=$this->input->post("txtdispercent");
        $discountdollar=$this->input->post("txtdisdollar");
        $receive_riel=$totalriel*$rate;
        $stock_location_id=$this->session->userdata("stock_location_id");
        $invoice_no=$this->input->post("txtinvoice_no");
        $pay=$this->input->post("txtbook");
        $iscredit=$this->input->post("chPaid");
        $sale_by=$this->input->post("txtemployee");
        $datepay=$this->input->post("txtpaydate");
        $datesell=$this->input->post("txtselldate");
        $vat=$this->input->post("txt_vat");
        $is_print=$this->input->post("ch_print");
        
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        
        $status="PAID";
        
        if($iscredit==1){
            $status="CREDIT";
            $total_credit = $totaldollar-$pay;
            $totaldollarcredit =  $totaldollar = '0';
        }else{
            $total_credit = '0';
            $totaldollarcredit = $totaldollar;
        }
        
        if($sale_by==0){
            $sale_by=$this->session->userdata('user_id');
        }
        
        //check validation
        if($customer_id==""){
             $this->session->set_flashdata('error','<div style="color:#D71A21;font-size:16px;"></span> Please input customer!</div>');
             redirect("whole_sale/addnew");
        }
        
        if($sale_by==0){
            $this->session->set_flashdata('error','<div style="color:#D71A21;font-size:16px;"></span> Please select sale_by!</div>');
            redirect("whole_sale/addnew");
        }
        
        if($datesell==""){
            $this->session->set_flashdata('error','<div style="color:#D71A21;font-size:16px;"></span> Please select sell date!</div>');
            redirect("whole_sale/addnew");
        }
        
        if($datepay==0){
            $this->session->set_flashdata('error','<div style="color:#D71A21;font-size:16px;"></span> Please select pay date!</div>');
            redirect("whole_sale/addnew");
        }
        
        //end check validation
        
        if($this->Base_model->get_data_by("select sale_detail_discount_percent from v_sale_detail_active where sale_detail_discount_percent<>0")){
                $sale_detail_data=array(
                    'sale_detail_customer_id'       =>  $customer_id,
                    'sale_detail_status'            =>  $status
                );
                
                 //update data in table sale
                    $this->db->where('sale_detail_type', 'W');
                    $this->db->where('sale_detail_status', 'ACTIVE');
                    $this->Base_model->update('sale_detail','sale_detail_invoice_no',$invoice_no,$sale_detail_data);
                //save data to invoice master
        }else{
                $sale_detail_data=array(
                'sale_detail_customer_id'       =>  $customer_id,
                'sale_detail_discount_dollar'   =>  $discountdollar,
                'sale_detail_discount_percent'  =>  $discountpercent,
                'sale_detail_status'            =>  $status
            );   
                 //update data in table sale
                    $this->db->where('sale_detail_type', 'W');
                    $this->db->where('sale_detail_status', 'ACTIVE');
                    $this->Base_model->update('sale_detail','sale_detail_invoice_no',$invoice_no,$sale_detail_data);
                //save data to invoice master
        }
        //save data to invoice master
        
        $sale_master_data=array(
            'sale_master_type'              =>  'W',
            'sale_master_status'            =>  $status,
            'sale_master_invoice_no'        =>  $invoice_no,
            'sale_master_branch_id'         =>  $this->session->userdata('branch_id'),
            'sale_master_sale_by'           =>  $sale_by,
            'sale_master_sell_date'         =>  $datesell,
            'sale_master_exchange_rate'     =>  $rate,
            'sale_master_stock_location_id' =>  $stock_location_id,
            'sale_master_time'              =>  $date->format('H:i:s'),
            'sale_master_created_by'        =>  $this->session->userdata('user_id'),
            'sale_master_tax'               =>  $vat
        );  
        
        $this->Base_model->save("sale_master",$sale_master_data);
        //end save data to invoice master
        
        //save data to customer credit
        $savedata=array(
                            'customer_id'                               =>$customer_id,
                            'customer_credit_invoice_no'                =>$invoice_no,
                            'customer_credit_recieve_amount'            =>$totaldollarcredit,
                            'customer_credit_total'                     =>$totaldollar,
                            'credit_credit_sale_type'                   =>"W",
                            'customer_credit_amount_credit'             =>$total_credit,
                            'customer_credit_pay_date'                  =>$datesell,
                            'customer_credit_created_by'                =>$this->session->userdata('user_id'),
                            'branch_id'                                 =>$this->session->userdata('branch_id')
                       );
        
        //sale data to table credit customer        
        $this->Base_model->save("customer_credit",$savedata);
        //end save data to customer credit
        if($is_print==1){
            $this->session->set_userdata('invoice_no',$invoice_no);
            redirect("print_receipt");
        }else{
            redirect("whole_sale/addnew");
        }
   }
   public function edit_load(){
       
        $data['title'] = "WHOLE SALE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "whole_sale/frm_whole_sale_u";
        
        $id=$this->uri->segment(3);
        $product_id=$this->uri->segment(4);
        $measure_id=$this->uri->segment(5);
        $status=$this->uri->segment(6);
        
        $data['stock_record']=$this->Base_model->get_data_by("select * from stock where stock_item_id=".$product_id." and measure_id=".$measure_id." and branch_id=".$this->session->userdata('branch_id')." and stock_location_id=".$this->session->userdata("stock_location_id"));
        
        $get_sale_record=$this->Base_model->loadToListJoin("select item_detail_name,sale_detail_unit_price from v_sale_detail_".$status." where sale_detail_id=".$id);
        
        $proname="";
        $unit_price=0;
        $qty=0;
        
        foreach($get_sale_record as $gr){
            
            $proname=$gr->item_detail_name;
            $unit_price=$gr->sale_detail_unit_price;
            $qty=$gr->sale_detail_unit_price;
            
        }
        
        $data['proname']=$proname;
        $data['unit_price']=$unit_price;
        $data['qty']=$qty;
        $data['id']=$id;
        
        $this->load->view("welcome/view",$data);
   }
        
   public function delete(){
        
        $id=$this->uri->segment(3);
        $itemid=$this->uri->segment(4);
        $qty=$this->uri->segment(5);
        $measure_id=$this->uri->segment(6);
        $branch_id=$this->session->userdata("branch_id");
        $stock_location_id=$this->session->userdata("stock_location_id");
        $this->Base_model->delete_by('sale_detail','sale_detail_id',$id);
        
        if($this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$itemid." and measure_id=".$measure_id." and branch_id=".$branch_id." and stock_location_id=".$stock_location_id)){
                    
                //////////////////////UPDATE STOCK QTY/////////////////////////
                    
                    $stockqty=0;
                    $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock where stock_item_id=".$itemid." and measure_id=".$measure_id." and branch_id=".$branch_id." and stock_location_id=".$stock_location_id);

                    foreach($stockvalue as $sv){
                        $stockqty= $sv->stock_qty;
                    }

                    $update_stock=array(
                         'stock_qty'=> $stockqty+$qty 
                    );

                    $this->Base_model->update('stock','stock_item_id',$itemid,$update_stock);
                
                ///////////////////////////////////////////////////////////////
                
            }
            
            redirect('whole_sale/addnew');
            
    }
    
    public function update(){
        $id=$this->input->post('txt_sale_id');
        $qty=$this->input->post('txt_qty');
        $price=$this->input->post("txt_unit_price");
        $oldqty=$this->input->post("txt_old_qty");
        $stock_location_id =$this->session->userdata("stock_location_id");
        $stock_id   =$this->input->post("txt_stock_id");
        
        $sale_detail_data=array(
            'sale_detail_qty'           =>$qty,
            'sale_detail_unit_price'    =>$price
        );
        
        $this->Base_model->update('sale_detail','sale_detail_id',$id,$sale_detail_data);
                //update stock qty/////////////////////////////////////////////
                
                $stockqty=0;
                $stockvalue = $this->Base_model->get_data_by("SELECT stock_qty FROM stock WHERE stock_id=".$stock_id);
                
                foreach($stockvalue as $sv){
                    $stockqty= $sv->stock_qty;
                }
                
                ///////////////////////////////////////////////////////////////
                
                $update_stock=array(
                     'stock_qty'          => ($stockqty+$oldqty)-$qty,
                     'stock_location_id'  => $stock_location_id
                );
                
                //$this->db->where("measure_id",$measure_id);
                $this->Base_model->update('stock','stock_id',$stock_id,$update_stock);
                
                //end update stock
                redirect('whole_sale/addnew');
                
    }
    
    //START => function search
    public function search(){
        
        //START => Get Value From Textbox 
        $invoiceno = $this->input->post("invoiceno");  
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");
        $sale_by   = $this->input->post("Seller");
        $Customer   = $this->input->post("customer");
        //END => Get Value From Textbox        
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "whole_sale/list_whole_sale";
        // START => search data       
      
        $q_invoiceno =' ' ;
        $q_date =' ';
        $q_sale_by =' ' ;
        $q_recorder ='' ;
        $q_customer =' ' ;
        
             if($invoiceno == "" && $from =="" && $to =="" && $sale_by =="0" && $recorder =="0" ){$q_invoiceno =''.$q_date =''.$q_sale_by =''.$q_recorder =''.$q_customer ='' .' and sale_master_sell_date= CURDATE()';$data['text_display'] = 'Today Whole Sale Report';}
        else if($invoiceno != "" && $from =="" && $to =="" && $sale_by =="0" && $recorder =="0" ){ $q_invoiceno =' and sale_master_invoice_no = '.$invoiceno ;$data['text_display'] = 'Invoice No : '. $invoiceno;}
        else if($invoiceno == "" && $from !="" && $to !="" && $sale_by =="0" && $recorder =="0" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' ;$data['text_display'] = 'Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $sale_by !="0" && $recorder =="0" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_sale_by =' and sale_by="'.$sale_by.'"' ;$data['text_display'] = 'Seller : '.$sale_by.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $sale_by =="0" && $recorder !="0" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $sale_by =="0" && $recorder =="0"){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' . $q_customer =' and item_type_name="'.$Customer.'"' ;$data['text_display'] = 'Category : '.$Customer.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from =="" && $to =="" && $sale_by =="0" && $recorder !="0" ){ $q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to =="" && $sale_by !="0" && $recorder =="0" ){ $q_sale_by =' and sale_by="'.$sale_by.'"' ;$data['text_display'] = 'Seller : '.$sale_by;}
        
        else{$data['text_display'] = '<p style="font-size:16px; color:red;"> Your Query is not match!!</p>';}        
        
        $query = "SELECT * FROM v_sale_summary WHERE sale_master_branch_id=".$this->session->userdata('branch_id')." and sale_master_type = 'W'" .$q_invoiceno.$q_date.$q_recorder.$q_sale_by;
        
        $data['record_sale_summary']=$this->Base_model->loadToListJoin($query);
        
        //$data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Search doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        //$data['text_display'] = '';
        //
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_master_branch_id FROM v_sale_summary WHERE sale_master_branch_id=".$this->session->userdata("branch_id") .' Group by recorder');
        $data['sale_by']= $this->Base_model->loadToListJoin("SELECT sale_by,sale_master_branch_id FROM v_sale_summary WHERE sale_master_branch_id=".$this->session->userdata("branch_id") .' Group by sale_by');
       // $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')."  group by item_type_name");
        
         // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
    public function print_receipt($invoice_no){
        
        $data['company']=$this->Base_model->loadToListJoin("select * from company_profile where company_profile_branch_id=".$this->session->userdata("branch_id"));
        
        $data['record_info']=$this->Base_model->loadToListJoin("select sale_master_invoice_no,"
                . "sale_by,sale_master_sell_date,sale_master_time,recorder,customer_name from v_sale_summary where sale_master_invoice_no=".$invoice_no);
        
        $data['getlist']=$this->Base_model->loadToListJoin('SELECT sale_detail_id,'
                    . '                                         item_detail_name,'
                    . '                                         sale_detail_discount_dollar,'
                    . '                                         sale_detail_discount_percent,'
                    . '                                         sale_detail_qty,'
                    . '                                         sale_detail_unit_price,'
                    . '                                         sale_detail_qty*sale_detail_unit_price as total'
                    . '                                         FROM v_sale_detail_finish'
                    . '                                         WHERE sale_detail_invoice_no='.$invoice_no);
        
        
        $data['total']=$this->Base_model->loadToListJoin('SELECT     sale_master_id,'
                    . '                                              sale_master_tax,SUM(sale_detail_discount_dollar) as discount_dollar,'
                    . '                                              subtotal*sale_detail_discount_percent/100 as discount_percent,'
                    . '                                              subtotal,'
                    . '                                              grand_total as grandtotal from v_sale_summary'
                    . '                                          WHERE sale_master_invoice_no='.$invoice_no);
        
        $this->load->view("whole_sale/whole_sale_receipt",$data);
    }
    
}
