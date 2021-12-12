<?php
class Report_customer_credit extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
         $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_customer_credit/report_customer_credit";        
        //START => load data to table when page load 
        
        $data['sale_summary']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_summary WHERE sale_master_sell_date = CURDATE() and sale_master_status= 'CREDIT' and sale_master_branch_id=".$this->session->userdata("branch_id"));
        
        //$data['sale_detail']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish where branch_id=".$this->session->userdata('branch_id'));
        
        $data['text_display'] = 'Today Report Customer Credit';
        
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')." group by recorder");
        
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')."  group by seller");
        
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')."  group by item_type_name");
        
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    
    //START => function search
    public function search(){
        
        //START => Get Value From Textbox 
        $invoiceno = $this->input->post("invoiceno");  
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");
        $seller   = $this->input->post("Seller");
        $saletypes   = $this->input->post("saletype");
        //END => Get Value From Textbox        
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_customer_credit/report_customer_credit";
        // START => search data       
      
        $q_invoiceno =' ' ;
        $q_date =' ';
        $q_seller =' ' ;
        $q_recorder ='' ;
        $q_catogry =' ' ;
        $q_saletype= ' ';
        
        if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" ){$q_invoiceno =''.$q_date =''.$q_seller =''.$q_recorder =''.$q_catogry ='' .' and sale_master_sell_date= CURDATE()';$data['text_display'] = 'Today Report Customer Credit';}
        else if($invoiceno != "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" ){ $q_invoiceno =' and sale_master_invoice_no='.$invoiceno ;$data['text_display'] = 'Invoice No : '. $invoiceno;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' ;$data['text_display'] = 'Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller !="0" && $recorder =="0" &&  $saletypes =="0" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_seller =' and sale_by="'.$seller.'"' ;$data['text_display'] = 'Seller : '.$seller.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder !="0" &&  $saletypes =="0"){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder !="0" &&  $saletypes =="0"){ $q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller !="0" && $recorder =="0" &&  $saletypes =="0" ){ $q_seller =' and sale_by="'.$seller.'"' ;$data['text_display'] = 'Seller : '.$seller;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes !="0" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder =="0" &&  $saletypes !="0" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"' .$q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes .'<br/> Date : '.$from.'->'.$to;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder !="0" &&  $saletypes !="0" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"'.$q_recorder =' and recorder="'.$recorder.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes.'<br /> Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller !="0" && $recorder =="0" &&  $saletypes !="0" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"'. $q_seller =' and sale_by="'.$seller.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes.'<br/> Seller : '.$seller;}
         
        else{$data['text_display'] = '<p style="font-size:16px; color:red;"> Your Query is not match!!</p>';}        
        
        $query = "SELECT * FROM v_sale_summary WHERE sale_master_status= 'CREDIT' and sale_master_branch_id=".$this->session->userdata("branch_id").$q_invoiceno.$q_date.$q_seller.$q_recorder.$q_saletype;
        
        $data['sale_summary']=$this->Base_model->loadToListJoin($query);
        
        //$data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Search doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        //$data['text_display'] = '';
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')." group by recorder");
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')."  group by seller");
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->session->userdata('branch_id')."  group by item_type_name");
        
         // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
}
