<?php

class report_purchase_detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('Base_model');
        $this->load->library("pagination");
        $this->load->helper("url");
        $this->Base_model->check_loged_in();
    }

    public $row_count = 0;
    public $row_per_page = 5;

    public function index() {
        $data['title']  = "Purchase Detail";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']  = "purchase/purchase_new/purchase_detail_list";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        //permission data
        $name = $this->uri->segment(1);
        // $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        // $id = 0;

        // foreach ($getid as $g) {
        //     $id = $g->permission_id;
        // }

        // $data['record_permission'] = $this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=" . $id);
        $data['record_permission']=$this->Base_model->get_permission($name);
        $data['stock']= $this->Base_model->loadToListJoin("select * from v_stock_location");

        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('purchase',$lang=='' ? 'en':$lang);

        $data['lbl_title'] = $this->lang->line('report_purchase_detail_list');
        $data['lbl_po'] = $this->lang->line('po_number');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['lbl_part'] = $this->lang->line('part_number');
        $data['lbl_item'] = $this->lang->line('item_name');
        $data['lbl_measure'] = $this->lang->line('measure');
        $data['lbl_retail_qty'] = $this->lang->line('retail_qty');
        $data['lbl_retail_amount'] = $this->lang->line('retail_amount');
        $data['lbl_unit_price'] = $this->lang->line('unit_price');
        $data['lbl_qty'] = $this->lang->line('qty');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_stock'] = $this->lang->line('stock');
        $data['lbl_status'] = $this->lang->line('status');
        $data['lbl_grand_total'] = $this->lang->line('lb_grand_total');
        $data['lbl_sub_total'] = $this->lang->line('lb_sub_total');
        $data['lbl_p_date'] = $this->lang->line('p_date');


        $data['btn_export'] = $this->lang->line('btn_export');
        $data['btn_search']  = $this->lang->line('btn_search');
        $data['lbl_from']   =$this->lang->line('lb_from');
        $data['lbl_to'] =$this->lang->line('lb_to');
        $data['lbl_no'] =$this->lang->line('lb_no');
        $data['lbl_new'] = $this->lang->line('lb_new');
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_view'] = $this->lang->line('lb_view');
        $data['lbl_recorder'] = $this->lang->line('lb_recorder');
        $data['lbl_branch'] = $this->lang->line('branch');
        $data['lbl_allbranch'] = $this->lang->line('allbranch');
        $data['lbl_allstock'] = $this->lang->line('allstock');


        //BEGIN TRANSLATE


        $this->load->view("welcome/view", $data);

    }

  

    public function report_info() {
        $page_number = $this->session->userdata('page_count');
        echo $page_number;
    }
    public function response(){
        //permission data
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase_detail where 1=1 $branch");

        $this->load->view("report/report_stock/response",$data);
    }
    public function response_search() {
       
        $start_date=$this->input->get('sd');
        $end_date=$this->input->get('ed');
        $sup_id=$this->input->get('sup_id');
        $po_id=$this->input->get('po_id');
        $part=$this->input->get('part');
        $item=$this->input->get('item');
        $stock=$this->input->get('stock');
        
        //$stock_id=$this->input->get('stock_id');
        $dates="";
        $sup="";
        $invoice="";
        $branch_id=$this->input->get('branch_id');
        $branch="";
        $s_branch="";
        $s_part="";
        $s_item="";
        $s_stock="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }

        if($start_date!="" && $end_date!="" && $start_date!=null && $end_date!=null){
            $dates=" and purchase_created_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
        if($sup_id!="" && $sup_id!=null){
            $sup=' and purchase_supplier_id='.$sup_id.' ';
        }
        if($po_id!="" && $po_id!=null){
            $invoice=' and purchase_no='.(int)$po_id.' ';
        }
        if($branch_id!=0){
            $s_branch=" and branch_id=$branch_id";
        }
        if($part!=""){
            $s_part="and item_detail_part_number='".$part."' ";
        }
        if($item!=""){
            $s_item="and purchase_detail_item_detail_id=$item";
        }
        if($stock!=0){
            $s_stock="and stock_location_id=$stock";
        }
        //echo json_encode("select * from v_payment_master where 1=1  $invoice $date $room_id $cust_id $statuss $floor_id $room_type order by id");
        $data['records'] = $this->Base_model->loadToListJoin("select * from v_purchase_detail where 1=1 $dates $sup $invoice $branch $s_branch $s_part $s_item $s_stock");
        $this->load->view("report/report_stock/response",$data);
    }

}
