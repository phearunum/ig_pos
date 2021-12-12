<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of purchase
 *
 * @author hpt-srieng
 */
class Close_shift extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "CLOSE SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "close_shift/frm_sale_master";
        $data['record_employee']=$this->Base_model->get_data("employee");
        $data['record_pump']=$this->Base_model->loadToListJoin("select * from pump where pump_branch_id=".$this->session->userdata('branch_id'));
        //load previous shift
        
        $dtRow=$this->Base_model->loadToListJoin("select sale_master_id from sale_master where sale_master_status='ACTIVE' and sale_master_created_by=".$this->session->userdata('user_id')." limit 1");
        $rate=$this->Base_model->get_value_byQuery("select rate_amount from rate order by rate_id desc limit 1",'rate_amount');
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $sale_master_id=0;
            foreach($dtRow as $gn){
                $sale_master_id=$gn->sale_master_id;
            }
        }
        
        $seller;$sellDate;$startUs;$startKh;$endUs;$endKh;$pump_id;
        if ($sale_master_id!=null)
        {
            $dtMaster=$this->Base_model->get_field("sale_master","sale_master_id",$sale_master_id);
            $this->session->set_userdata("sale_master_id", $sale_master_id);
            foreach ($dtMaster as $dtM){
                $seller=$dtM->sale_master_sale_by;
                $sellDate=$dtM->sale_master_sell_date;
                $startUs=$dtM->sale_master_start_us;
                $startKh=$dtM->sale_master_start_khmer;
                $endUs=$dtM->sale_master_end_us;
                $endKh=$dtM->sale_master_end_khmer;
                $rate=$dtM->sale_master_exchange_rate;
                $pump_id=$dtM->sale_master_pump_id;
            }
        }
        else {
            $seller=0;
            $sellDate='';
            $startUs='';
            $startKh='';
            $endUs='';
            $endKh='';
            $pump_id=0;
        }
        $data['seller']=$seller;
        $data['sellDate']=$sellDate;
        $data['startUs']=$startUs;
        $data['startKh']=$startKh;
        $data['endUs']=$endUs;
        $data['endKh']=$endKh;
        $data['rate']=$rate;
        $data['pump_id']=$pump_id;
        //===========
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
        $this->load->view("welcome/view",$data);
    }
    
    public function edit_master(){
        $sale_master_id=$this->uri->segment(3);
        if($sale_master_id!=null){
            $it_over=0;
            $it_over=$this->Base_model->get_value_byQuery("select if(cast(DATE_ADD(sale_master_sell_date,INTERVAL 1 MONTH) as date)<cast(now() as date),0,1) as it_over from sale_master where sale_master_id=".$sale_master_id,"it_over");
            if($it_over==1){
                $this->session->set_userdata('sale_master_id',$sale_master_id);
                $this->session->set_userdata('sale_master_edit',$sale_master_id);
                redirect('close_shift');
            }
        }
        $curr_page=$this->session->userdata('curr_page');
        if($curr_page==null){
            $curr_page='close_shift_report';
        }
        redirect($curr_page);
    }
    
    public function save_master(){
        $btn=$this->input->post("btnSave");
        switch($btn){
            case "Next":
                $this->save_new();
                break;
            case "Save":
                $this->update_old();
                break;
        }
    }
    
    public function save_new(){
        $seller=$this->input->post('cbo_seller');
        $sellDate=$this->input->post('txtDate');
        $startUs=$this->input->post('txtStartUS');
        $startKh=$this->input->post('txtStartKH');
        $endUs=$this->input->post('txtEndUS');
        $endKh=$this->input->post('txtEndKH');
        $pump_id=$this->input->post('cbo_pump');
        $rate=$this->Base_model->get_value_byQuery("select rate_amount from rate order by rate_id desc limit 1",'rate_amount');
        $tax=$this->Base_model->get_value_byQuery("select tax_amount from tax order by tax_id desc limit 1",'tax_amount');
        $brand_id=$this->Base_model->get_value('employee','employee_brand_id','employee_id',$seller);
        $stock_location_id=$this->Base_model->get_value('employee','employee_stock_location_id','employee_id',$seller);
            $data = array(
                'sale_master_created_by'           => $this->session->userdata('user_id'),
                'sale_master_created_date'         => date('Y-m-d'),
                'sale_master_sale_by'              => $seller,
                'sale_master_branch_id'            => $brand_id,
                'sale_master_start_us'             => $startUs,
                'sale_master_start_khmer'          => $startKh,
                'sale_master_end_us'               => $endUs,
                'sale_master_end_khmer'            => $endKh,
                'sale_master_sell_date'            => $sellDate,
                'sale_master_status'               => 'ACTIVE',
                'sale_master_exchange_rate'        => $rate,
                'sale_master_tax'                  => $tax,
                'sale_master_stock_location_id'    => $stock_location_id,
                'sale_master_pump_id'              => $pump_id
                    );
            
            $this->Base_model->save('sale_master',$data);
            $dtRow=$this->Base_model->loadToListJoin("select sale_master_id from sale_master where sale_master_status='ACTIVE' and sale_master_sale_by=".$seller." and sale_master_created_by=".$this->session->userdata('user_id')." limit 1");
            $sale_master_id=0;
            foreach($dtRow as $gn){
                $sale_master_id=$gn->sale_master_id;
            }
            
            $this->session->set_userdata("sale_master_id", $sale_master_id);
            redirect('close_shift/sale_item');
            //$this->sale_item();
    }
    
    public function update_old(){
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $seller=$this->input->post('cbo_seller');
            $sellDate=$this->input->post('txtDate');
            $startUs=$this->input->post('txtStartUS');
            $startKh=$this->input->post('txtStartKH');
            $endUs=$this->input->post('txtEndUS');
            $endKh=$this->input->post('txtEndKH');
            $pump_id=$this->input->post('cbo_pump');
            $data = array(
                'sale_master_modified_by'          => $this->session->userdata('user_id'),
                'sale_master_modified_date'        => date('Y-m-d'),
                'sale_master_sale_by'              => $seller,
                'sale_master_start_us'             => $startUs,
                'sale_master_start_khmer'          => $startKh,
                'sale_master_end_us'               => $endUs,
                'sale_master_end_khmer'            => $endKh,
                'sale_master_sell_date'            => $sellDate,
                'sale_master_status'               => 'ACTIVE',
                'sale_master_pump_id'              => $pump_id
                );
            
            $this->Base_model->update('sale_master','sale_master_id',$sale_master_id,$data);
        }
        else {
            $startUs=$this->input->post('txtStartUS');
            $startKh=$this->input->post('txtStartKH');
            $endUs=$this->input->post('txtEndUS');
            $endKh=$this->input->post('txtEndKH');
            $data = array(
                'sale_master_modified_by'          => $this->session->userdata('user_id'),
                'sale_master_modified_date'        => date('Y-m-d'),
                'sale_master_start_us'             => $startUs,
                'sale_master_start_khmer'          => $startKh,
                'sale_master_end_us'               => $endUs,
                'sale_master_end_khmer'            => $endKh,
                );
            
            $this->Base_model->update('sale_master','sale_master_id',$sale_master_id,$data);
        }
        
        redirect('close_shift/sale_item');
    }
    
    public function void_invoice(){
        $sale_master_id=$this->uri->segment(3);
        if($sale_master_id==null){
            $sale_master_id=$this->session->userdata('sale_master_id');
            $sale_master_edit=$this->session->userdata('sale_master_edit');
            if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
                if ($sale_master_id!=null){
                    $data = array(
                    'sale_master_status'               => 'CANCEL',
                    'sale_master_modified_by'          => $this->session->userdata('user_id'),
                    'sale_master_modified_date'        => date('Y-m-d')
                    );
                    $this->Base_model->update('sale_master','sale_master_id', $sale_master_id, $data);
                    $this->session->unset_userdata('sale_master_id');
                }
                redirect('close_shift');
            }
            else{
                $this->session->unset_userdata('sale_master_edit');
                $this->session->unset_userdata('sale_master_id');
                redirect('close_shift/list_today');
            }
        }
        else {
            
            $it_over=0;
            $it_over=$this->Base_model->get_value_byQuery("select if(cast(DATE_ADD(sale_master_sell_date,INTERVAL 1 MONTH) as date)<cast(now() as date),0,1) as it_over from sale_master where sale_master_id=".$sale_master_id,"it_over");
            if($it_over!=1){
                $curr_page=$this->session->userdata('curr_page');
                if($curr_page==null){
                    $curr_page='close_shift_report';
                }
                redirect($curr_page);
            }
            
            $emp_stock=$this->Base_model->get_value('sale_master','sale_master_stock_location_id','sale_master_id',$sale_master_id);
            if ($emp_stock==null || $emp_stock == ''){ $emp_stock=0; }
                $item_cut_stock=$this->Base_model->loadToListJoin("select sale_item_item_detail_id,sale_item_start_qty,sale_item_end_qty from sale_item where sale_item_master_id='".$sale_master_id."'");
                foreach ($item_cut_stock as $item)
                {
                    $item_id=$item->sale_item_item_detail_id;
                    $start_qty=$item->sale_item_start_qty;
                    $end_qty=$item->sale_item_end_qty;
                    $qty=$start_qty-$end_qty;
                    if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
                        $this->re_update_stock($item_id, $qty, $emp_stock);
                    }
                }
            $data = array(
                'sale_master_status'               => 'CANCEL',
                'sale_master_modified_by'          => $this->session->userdata('user_id'),
                'sale_master_modified_date'        => date('Y-m-d')
                    );
            $this->Base_model->update('sale_master','sale_master_id', $sale_master_id, $data);
            $this->session->unset_userdata('sale_master_edit');
            $this->session->unset_userdata('sale_master_id');
            redirect('close_shift/list_today');
        }
    }


    public function sale_item(){
        $data['title'] = "SALE ITEM";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "close_shift/frm_sale_item";
        
        
        $data['record_measure']=$this->Base_model->get_data("measure_convert");
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        $select_table='v_sale_item_active';
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $data['record_sale_item']=$this->Base_model->loadToListJoin("SELECT * FROM V_SALE_ITEM_ACTIVE WHERE SALE_MASTER_ID=".$sale_master_id);
        }
        else {
            $data['record_sale_item']=$this->Base_model->loadToListJoin("SELECT * FROM V_SALE_ITEM_FINISH WHERE SALE_MASTER_ID=".$sale_master_id);
            $select_table='v_sale_item_finish';
        }
        $seller_name='';
        $dtRow=$this->Base_model->loadToListJoin("select employee_name from employee where employee_id=(select sale_master_sale_by from sale_master where sale_master_id=".$sale_master_id." limit 1) limit 1");
        $sale_item_id=$this->uri->segment(3);
        
        foreach($dtRow as $gn){
            $seller_name=$gn->employee_name;
        }
        
        $data['seller_name']=$seller_name;
        $data['sale_item_id']=$sale_item_id;
        $product_name='';
        $product_id='';
        $start_qty='';
        $end_qty='';
        $convert_qty='';
        
        if($sale_master_id!=null)
        {
            if($sale_item_id!=null){
                $dtItem=$this->Base_model->get_field($select_table,"sale_item_id",$sale_item_id);
                foreach ($dtItem as $dtI){
                    $product_name=$dtI->item_detail_name;
                    $start_qty=$dtI->sale_item_start_qty;
                    $end_qty=$dtI->sale_item_end_qty;
                    $convert_qty=$dtI->sale_item_convert_qty;
                    $product_id=$dtI->sale_item_item_detail_id;
                }
                $this->session->set_userdata('sale_item_id',$sale_item_id);
            }
            $data['product_name']=$product_name;
            $data['start_qty']=$start_qty;
            $data['end_qty']=$end_qty;
            $data['covnert_qty']=$convert_qty;
            $data['product_id']=$product_id;
            $this->load->view("welcome/view",$data);
        }
        else 
        {
            redirect('close_shift');
        }
    }
    
    public function sale_item_save(){
        $btn=$this->input->post("btnSave");
        switch($btn){
            case "+Add":
                    $this->add_new_sale_item();
                break;
            case "Save":
                    $this->update_old_sale_item();
                break;
        }
        
    }
    
    public function add_new_sale_item()
    {
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $pro_id=$this->input->post('txtpro_id');
            $sale_dt=$this->Base_model->loadToListJoin("select sale_item_id from sale_item where sale_item_item_detail_id=".$pro_id." and sale_item_master_id=".$sale_master_id);
            $sale_item_id;
            foreach($sale_dt as $sd)
            {
                $sale_item_id=$sd->sale_item_id;
            }
            if($sale_item_id!=null)
            {
                $this->session->set_userdata('sale_item_id',$sale_item_id);
                $this->update_old_sale_item();
            }
            else
            {
            $convert_qty=$this->input->post('cbo_measure');
            $start_qty=$this->input->post('txtStartQty');
            $end_qty=$this->input->post('txtEndQty');
                $data = array(
                    'sale_item_created_by'             => $this->session->userdata('user_id'),
                    'sale_item_created_date'           => date('Y-m-d'),
                    'sale_item_item_detail_id'         => $pro_id,
                    'sale_item_start_qty'              => $start_qty*$convert_qty,
                    'sale_item_end_qty'                => $end_qty*$convert_qty,
                    'sale_item_master_id'              => $this->session->userdata('sale_master_id'),
                    'sale_item_convert_qty'            => $convert_qty
                    );

                $this->Base_model->save('sale_item',$data);
                redirect('close_shift/sale_item');
            }
        }
        else {
            redirect('close_shift/sale_item');
        }
        
    }
    
    public function update_old_sale_item()
    {
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        $sale_item_id=$this->session->userdata('sale_item_id');
        
        $convert_qty=$this->input->post('cbo_measure');
        $start_qty=$this->input->post('txtStartQty');
        $end_qty=$this->input->post('txtEndQty');
        if($sale_master_id!=null || $sale_master_id!='' || $sale_master_edit!=null || $sale_master_edit!=''){
            $pro_id=0;
            $old_qty=0;
            $new_qty=($start_qty*$convert_qty)-($end_qty*$convert_qty);
            $emp_stock=$this->Base_model->get_value('sale_master','sale_master_stock_location_id','sale_master_id',$sale_master_id);
            if ($emp_stock==null || $emp_stock == ''){ $emp_stock=0; }
            
            $sale_dt=$this->Base_model->loadToListJoin("select * from sale_item where sale_item_id=".$sale_item_id);
            foreach($sale_dt as $sd)
            {
                $pro_id=$sd->sale_item_item_detail_id;
                $old_qty=$sd->sale_item_start_qty-$sd->sale_item_end_qty;
            }
            $this->re_update_stock($pro_id, $old_qty-$new_qty, $emp_stock);
        }
            $data = array(
                'sale_item_modified_by'            => $this->session->userdata('user_id'),
                'sale_item_modified_date'          => date('Y-m-d'),
                'sale_item_start_qty'              => $start_qty*$convert_qty,
                'sale_item_end_qty'                => $end_qty*$convert_qty,
                'sale_item_convert_qty'            => $convert_qty
                );
        $this->Base_model->update('sale_item','sale_item_id',$sale_item_id,$data);
        
        $this->session->unset_userdata('sale_item_id');
        redirect('close_shift/sale_item');
    }
    
    public function delete_sale_item(){
        $id=$this->uri->segment(3);
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $this->Base_model->delete_by('sale_item','sale_item_id',$id);
        }
        redirect('close_shift/sale_item');
    }
    
    public function cancel_item_edit(){
        $this->session->unset_userdata('sale_item_id');
        redirect('close_shift/sale_item');
    }
    
    public function sale_detail(){
        $data['title'] = "SALE ITEM";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "close_shift/frm_sale_detail";
        
        
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        $select_table='v_sale_detail_active';
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $data['record_sale_detail']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_active WHERE sale_detail_master_id=".$sale_master_id);
        }
        else{
            $data['record_sale_detail']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish WHERE sale_detail_master_id=".$sale_master_id);
            $select_table='v_sale_detail_finish';
        }
        
        $seller_name='';
        $dtRow=$this->Base_model->loadToListJoin("select employee_name from employee where employee_id=(select sale_master_sale_by from sale_master where sale_master_id=".$sale_master_id." limit 1) limit 1");
        $sale_detail_id=$this->uri->segment(3);
        
        foreach($dtRow as $gn){
            $seller_name=$gn->employee_name;
        }
        
        $data['seller_name']=$seller_name;
        $data['sale_detail_id']=$sale_detail_id;
        $product_name='';
        $product_id='';
        $qty='';
        $unit_price='';
        $sale_type='';
        $customer_name='';
        $customer_id='';
        $plate_no='';
        $invoice_no='';
        $discount_dollar='';
        $discount_percent='';
        
        if($sale_master_id!=null)
        {
            if($sale_detail_id!=null){
                $dtItem=$this->Base_model->get_field($select_table,"sale_detail_id",$sale_detail_id);
                foreach ($dtItem as $dtI){
                    $product_name=$dtI->item_detail_name;
                    $product_id=$dtI->sale_detail_item_id;
                    $qty=$dtI->sale_detail_qty;
                    $unit_price=$dtI->sale_detail_unit_price;
                    $sale_type=$dtI->sale_detail_type;
                    $customer_name=$dtI->customer_name;
                    $customer_id=$dtI->sale_detail_customer_id;
                    $plate_no=$dtI->sale_detail_plate_no;
                    $invoice_no=$dtI->sale_detail_invoice_no;
                    $discount_dollar=$dtI->sale_detail_discount_dollar;
                    $discount_percent=$dtI->sale_detail_discount_percent;
                }
                $this->session->set_userdata('sale_detail_id',$sale_detail_id);
            }
            
            $sale_type_id=0;
            if($sale_type=='Whole Sale'){$sale_type_id=1;}
            else{$sale_type_id=0;}
            
            $data['product_name']=$product_name;
            $data['product_id']=$product_id;
            $data['qty']=$qty;
            $data['unit_price']=$unit_price;
            $data['sale_type_id']=$sale_type_id;
            $data['customer_name']=$customer_name;
            $data['customer_id']=$customer_id;
            $data['plate_no']=$plate_no;
            $data['invoice_no']=$invoice_no;
            $data['discount_dollar']=$discount_dollar;
            $data['discount_percent']=$discount_percent;
            $this->load->view("welcome/view",$data);
        }
        else 
        {
            redirect('close_shift');
        }
    }
    
    public function searchcustomer(){
        $this->load->view("search/search.php");
    }
    public function sale_detail_save(){
        $btn=$this->input->post("btnSave");
        switch($btn){
            case "+Add":
                $this->add_new_sale_detail();
                break;
            case "Save":
                $this->update_old_sale_detail();
                break;
        }
    }
    
    public function add_new_sale_detail()
    {
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $pro_id=$this->input->post('txtpro_id');
            $cust_id=$this->input->post('txtcust_id');
            $plate_no=$this->input->post('txt_plate_no');
            $invoice_no=$this->input->post('txt_no');
            $discount_dollar=$this->input->post('txtDiscountD');
            $discount_percent=$this->input->post('txtDiscount');
            $qty=$this->input->post('txtQty');
            $price=$this->input->post('txtPrice');
            if ($discount_dollar==null || $discount_dollar==''){$discount_dollar=0;}
            if ($discount_percent==null || $discount_percent==''){$discount_percent=0;}
            //=======get sale_detail_id
            $sale_dt=$this->Base_model->loadToListJoin("select sale_detail_id from sale_detail where sale_detail_item_id=".$pro_id." "
                    . "and sale_detail_customer_id=".$cust_id." and sale_detail_master_id=".$sale_master_id." "
                    . "and sale_detail_plate_no='".$plate_no."' and sale_detail_invoice_no='".$invoice_no."' and sale_detail_discount_dollar=".$discount_dollar." and sale_detail_discount_percent=".$discount_percent." "
                    . "and sale_detail_unit_price=".$price."");
            $sale_detail_id=null;
            foreach($sale_dt as $sd)
            {
                $sale_detail_id=$sd->sale_detail_id;
            }
            //==================

            //========update the old one
            if($sale_detail_id!=null)
            {
                //=======get old qty
                $qty_dt=$this->Base_model->loadToListJoin("select sale_detail_qty from sale_detail where sale_detail_id=".$sale_detail_id);
                $old_qty=0;
                foreach($qty_dt as $sd)
                {
                    $old_qty=$sd->sale_detail_qty;
                }
                //========

                $data = array(
                    'sale_detail_qty'                => $qty+$old_qty,
                    );

                $this->Base_model->update('sale_detail','sale_detail_id',$sale_detail_id,$data);
                redirect('close_shift/sale_detail');
            }
            //==========

            //==========insert new one
            else
            {
                $data = array(
                    'sale_detail_master_id'          => $sale_master_id,
                    'sale_detail_item_id'            => $pro_id,
                    'sale_detail_qty'                => $qty,
                    'sale_detail_unit_price'         => $price,
                    'sale_detail_discount_dollar'    => $discount_dollar,
                    'sale_detail_discount_percent'   => $discount_percent,
                    'sale_detail_created_date'       => date('Y-m-d'),
                    'sale_detail_created_by'         => $this->session->userdata('user_id'),
                    'sale_detail_customer_id'        => $cust_id,
                    'sale_detail_plate_no'           => $plate_no,
                    'sale_detail_invoice_no'         => $invoice_no,
                    );

                $this->Base_model->save('sale_detail',$data);

            }
        }
        
        redirect('close_shift/sale_detail');
        //==========
    }
    
    public function update_old_sale_detail()
    {
        $sale_master_id=$this->session->userdata('sale_master_id');
        $discount_dollar=$this->input->post('txtDiscountD');
        $discount_percent=$this->input->post('txtDiscount');
        $qty=$this->input->post('txtQty');
        $price=$this->input->post('txtPrice');
        $sale_detail_id=$this->session->userdata('sale_detail_id');
        if ($discount_dollar==null || $discount_dollar==''){$discount_dollar=0;}
        if ($discount_percent==null || $discount_percent==''){$discount_percent=0;}
        
        //========update the old one
        if($sale_detail_id!=null)
        {
            //=======get old qty
            
            $data = array(
                'sale_detail_qty'                => $qty,
                'sale_detail_unit_price'         => $price,
                'sale_detail_discount_dollar'    => $discount_dollar,
                'sale_detail_discount_percent'   => $discount_percent
                );
            
            $this->Base_model->update('sale_detail','sale_detail_id',$sale_detail_id,$data);
            $sale_master_edit=$this->session->userdata('sale_master_edit');
            $this->session->unset_userdata('sale_detail_id');
        }
        //==========
        redirect('close_shift/sale_detail');
        //==========
    }
    
    public function delete_sale_detail()
    {
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            $id=$this->uri->segment(3);
            $this->Base_model->delete_by('sale_detail','sale_detail_id',$id);
        }
        redirect('close_shift/sale_detail');
    }
    
    public function cancel_detail_edit(){
        $this->session->unset_userdata('sale_detail_id');
        redirect('close_shift/sale_detail');
    }
    
    public function finish_all(){
        $sale_master_id=$this->session->userdata('sale_master_id');
        $sale_master_edit=$this->session->userdata('sale_master_edit');
        //if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
        if($sale_master_id!=null){
            $emp_stock=$this->Base_model->get_value('sale_master','sale_master_stock_location_id','sale_master_id',$sale_master_id);
            if ($emp_stock==null || $emp_stock == ''){ $emp_stock=0; }
            
            $item_cut_stock=$this->Base_model->loadToListJoin("select sale_item_item_detail_id,sale_item_start_qty,sale_item_end_qty from sale_item where sale_item_master_id='".$sale_master_id."'");
            foreach ($item_cut_stock as $item)
            {
                $item_id=$item->sale_item_item_detail_id;
                $start_qty=$item->sale_item_start_qty;
                $end_qty=$item->sale_item_end_qty;
                $qty=$start_qty-$end_qty;
                if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
                    $this->update_stock($item_id, $qty, $emp_stock);
                }
            }
            $data = array(
                'sale_master_status'             => 'FINISH'
                );
            $this->Base_model->update('sale_master','sale_master_id',$sale_master_id,$data);
        }
        $this->session->unset_userdata('sale_master_id');
        $this->session->unset_userdata('sale_master_edit');
        if($sale_master_id==null || $sale_master_id=='' || $sale_master_edit==null || $sale_master_edit==''){
            redirect('close_shift');
        }
        else{
            redirect('close_shift/list_today');
        }
        
    }
    
    private function update_stock($item_id,$item_qty,$stock){
        $this->Base_model->run_query("update stock set stock_qty=stock_qty-(".$item_qty.") where stock_item_id=".$item_id." and stock_location_id=".$stock);
    }
    
    private function re_update_stock($item_id,$item_qty,$stock){
        $this->Base_model->run_query("update stock set stock_qty=stock_qty+(".$item_qty.") where stock_item_id=".$item_id." and stock_location_id=".$stock);
    }
    
    public function list_today(){
        $data['title'] = "CLOSE SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "close_shift/frm_close_shift_list";
        $data['record_employee']=$this->Base_model->get_data("employee");
        $data['text_display']=  date('Y-m-d');
        $data['record_sale_master']=$this->Base_model->loadToListJoin("SELECT * FROM V_SALE_MASTER WHERE sale_master_status='FINISH' AND cast(sale_master_sell_date as date)=cast(now() as date) and sale_master_branch_id='".$this->session->userdata('branch_id')."'");
        
        $data['recorder']= $this->Base_model->loadToListJoin("select distinct employee_name as recorder,employee_id from employee where  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * from stock_location where stock_location_branch_id = ".$this->session->userdata('branch_id'));
        
        
        $this->load->view("welcome/view",$data);
    }
    
    public function list_search(){
        $data['title'] = "CLOSE SHIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "close_shift/frm_close_shift_list";
        $data['record_employee']=$this->Base_model->get_data("employee");
        $text_display='';
        
        $creator=$this->input->post('cbo_creator');
        $seller=$this->input->post('cbo_seller');
        $stock=$this->input->post('cbo_stock');
        $from=$this->input->post("datefrom");
        $to=$this->input->post("dateto");
        
        $q_creator=' ';
        if ($creator!=0 && $creator!=null && $creator!=''){$q_creator=' and sale_master_created_by='.$creator.' '; $text_display=date('Y-m-d');}
        
        $q_seller=' ';
        if ($seller!=0 && $seller!=null && $seller!=''){$q_seller=' and sale_master_sale_by='.$seller.' '; $text_display=date('Y-m-d');}
        
        $q_stock=' ';
        if ($stock!=0 && $stock!=null && $stock!=''){$q_stock=' and sale_master_stock_location_id='.$stock.' '; $text_display=date('Y-m-d');}
        
        $q_date=' ';
        if ($from!='' && $from!=null && $to!='' && $to!=null){$q_date=" and (cast(sale_master_sell_date as date) between cast('".$from."' as date) and cast('".$to."' as date)) ";  $text_display=$from.' to '.$to;}
        
        $query="SELECT * FROM V_SALE_MASTER WHERE sale_master_status='FINISH' and sale_master_branch_id='".$this->session->userdata('branch_id')."' ".$q_creator.$q_seller.$q_stock.$q_date;
        
        $data['record_sale_master']=$this->Base_model->loadToListJoin($query);
        $data['text_display']=  $text_display;
        $data['recorder']= $this->Base_model->loadToListJoin("select distinct employee_name as recorder,employee_id from employee where  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * from stock_location where stock_location_branch_id = ".$this->session->userdata('branch_id'));
        
        $data['query']=$query;
        
        if (trim($q_creator.$q_seller.$q_stock.$q_date)==''){
            redirect('close_shift/list_today');
        }
        
        $this->load->view("welcome/view",$data);
    }
}
