<?php
class Report_supplier_credit extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        
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
        $data['page'] = "report/report_supplier_credit/report_supplier_credit";        
        //START => load data to table when page load 
        
        $data['sale_summary']=$this->Base_model->loadToListJoin("SELECT	purchase_no,supplier_name,stock_location_name,employee_name AS recorder,sum(total)AS total,purchase_created_date,employee_brand_id  FROM v_purchase_detail WHERE STATUS = 'credit' and  employee_brand_id =".$this->Base_model->branch_id()." GROUP BY supplier_name,stock_location_name,employee_name,purchase_no ");
        
       
        //$data['sale_detail']=$this->Base_model->loadToListJoin("SELECT * FROM v_sale_detail_finish where branch_id=".$this->Base_model->branch_id());
        
        $data['text_display'] = 'Today Report Supplier Credit';
        
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()." group by recorder");
        
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by seller");
        
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by item_type_name");
        $data['supplier']= $this->Base_model->loadToListJoin("SELECT supplier_name,stock_location_name,employee_brand_id  FROM v_purchase_detail WHERE STATUS = 'credit' and  employee_brand_id =".$this->Base_model->branch_id()." GROUP BY supplier_name ");
        
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    
    //START => function search
    public function search(){
        
        //START => Get Value From Textbox 
        $invoiceno  = $this->input->post("invoiceno");  
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");
        $seller     = $this->input->post("Seller");
        $saletypes  = $this->input->post("saletype");
        $customernames   = $this->input->post("customername");
        //END => Get Value From Textbox        
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_supplier_credit/report_supplier_credit";
        // START => search data       
      
        $q_invoiceno =' ' ;
        $q_date =' ';
        $q_seller =' ' ;
        $q_recorder ='' ;
        $q_catogry =' ' ;
        $q_saletype= ' ';
        $q_customre_name= ' ';
        
        if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" && $customernames =="" ){$q_invoiceno =''.$q_date =''.$q_seller =''.$q_recorder =''.$q_catogry ='';$data['text_display'] = 'Today Report Customer Credit';}
        else if($invoiceno != "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" && $customernames =="" ){ $q_invoiceno =' and purchase_no='.$invoiceno ;$data['text_display'] = 'Purchase No : '. $invoiceno;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" && $customernames =="" ){ $q_date =' and purchase_created_date between "'.$from.'" and "'.$to.'"' ;$data['text_display'] = 'Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller !="0" && $recorder =="0" &&  $saletypes =="0" && $customernames =="" ){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_seller =' and sale_by="'.$seller.'"' ;$data['text_display'] = 'Seller : '.$seller.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder !="0" &&  $saletypes =="0" && $customernames ==""){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder !="0" &&  $saletypes =="0" && $customernames ==""){ $q_recorder =' and recorder= "'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller !="0" && $recorder =="0" &&  $saletypes =="0" && $customernames =="" ){ $q_seller =' and supplier_name="'.$seller.'"' ;$data['text_display'] = 'Supplier  : '.$seller;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes !="0" && $customernames =="" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes;}
        else if($invoiceno == "" && $from !="" && $to !="" && $seller =="0" && $recorder =="0" &&  $saletypes !="0" && $customernames =="" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"' .$q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes .'<br/> Date : '.$from.'->'.$to;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder !="0" &&  $saletypes !="0" && $customernames =="" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"'.$q_recorder =' and recorder="'.$recorder.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes.'<br /> Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to =="" && $seller !="0" && $recorder =="0" &&  $saletypes !="0" && $customernames =="" ){ $q_saletype =' and sale_master_type="'.$saletypes.'"'. $q_seller =' and sale_by="'.$seller.'"' ; $data['text_display'] = 'Sale Type : '.$saletypes.'<br/> Seller : '.$seller;}
        //else if($invoiceno == "" && $from =="" && $to =="" && $seller =="0" && $recorder =="0" &&  $saletypes =="0" && $customernames !="" ){ $q_customre_name =' and customer_name like "%'.$customernames.'%"' ;$data['text_display'] = 'Customer Name (start with) : '.$customernames;}
        
        else{$data['text_display'] = '<p style="font-size:16px; color:red;"> Your Query is not match!!</p>';}        
        
        $query = "SELECT purchase_no,supplier_name,stock_location_name,employee_name AS recorder,sum(total) AS total,purchase_created_date,employee_brand_id  FROM v_purchase_detail WHERE STATUS = 'credit' and  employee_brand_id =".$this->Base_model->branch_id().$q_invoiceno.$q_date.$q_seller." GROUP BY supplier_name,stock_location_name,employee_name,purchase_no" ;
        
        $data['sale_summary']=$this->Base_model->loadToListJoin($query);
        
        //$data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Search doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        //$data['text_display'] = '';
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()." group by recorder");
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by seller");
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by item_type_name");
        $data['supplier']= $this->Base_model->loadToListJoin("SELECT supplier_name,stock_location_name,employee_brand_id  FROM v_purchase_detail WHERE STATUS = 'credit' and  employee_brand_id =".$this->Base_model->branch_id()." GROUP BY supplier_name ");
         // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
    
    public function credit_detail(){        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_customer_credit/report_customer_credit_detail";        
        //START => load data to table when page load         
       
        $data['text_display'] = 'Today Report Customer Credit Detail';
        
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()." group by recorder");
        
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by seller");
        
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by item_type_name");
        
        // load view when action above finish
        $this->load->view("welcome/view",$data);      
    }
    public function search_detail(){
        
        //START => Get Value From Textbox 
        $invoiceno  = $this->input->post("invoiceno");  
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");
        $seller     = $this->input->post("Seller");
        $saletypes  = $this->input->post("saletype");
        $customernames   = $this->input->post("customername");
        //END => Get Value From Textbox        
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_customer_credit/report_customer_credit_detail";
        // START => search data       
      
        $q_invoiceno =' ' ;
        $q_date =' ';
        $q_seller =' ' ;
        $q_recorder ='' ;
        $q_catogry =' ' ;
        $q_customre_name= ' ';
        
        if($invoiceno == "" && $from =="" && $to =="" && $recorder =="0" && $customernames == "" ){$q_invoiceno =''.$q_date =''.$q_seller =''.$q_recorder =''.$q_catogry ='' .$q_customre_name = '' . ' and customer_credit_pay_date = CURDATE()';$data['text_display'] = 'Today Report Customer Credit Detail';}
        else if($invoiceno != "" && $from =="" && $to ==""  && $recorder =="0" && $customernames == ""){ $q_invoiceno =' and customer_credit_invoice_no='.$invoiceno ;$data['text_display'] = 'Invoice No : '. $invoiceno;}
        else if($invoiceno == "" && $from !="" && $to !=""  && $recorder =="0" && $customernames == ""){ $q_date =' and customer_credit_pay_date between "'.$from.'" and "'.$to.'"' ;$data['text_display'] = 'Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from !="" && $to !=""  && $recorder !="0" && $customernames == ""){ $q_date =' and sale_master_sell_date between "'.$from.'" and "'.$to.'"' .$q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder.'<br />Date : ' .$from. ' -> '. $to;}
        else if($invoiceno == "" && $from =="" && $to ==""  && $recorder !="0" && $customernames == ""){ $q_recorder =' and recorder="'.$recorder.'"' ;$data['text_display'] = 'Recorder : '.$recorder;}
        else if($invoiceno == "" && $from =="" && $to ==""  && $recorder =="0" && $customernames != ""){ $q_customre_name =' and customer_name="'.$customernames.'"' ;$data['text_display'] = 'Customer Name (Start with): '.$customernames;}
         
        else{$data['text_display'] = '<p style="font-size:16px; color:red;"> Your Query is not match!!</p>';}        
        
        $query = "SELECT * FROM `v_customer_credit` WHERE customer_credit_total > 0  and branch_id = ".$this->Base_model->branch_id();
        
        $data['sale_summary']=$this->Base_model->loadToListJoin($query);
        
        //$data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Search doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        //$data['text_display'] = '';
        $data['recorder']= $this->Base_model->loadToListJoin("SELECT recorder,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()." group by recorder");
        $data['seller']= $this->Base_model->loadToListJoin("SELECT seller,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by seller");
        $data['type_name']= $this->Base_model->loadToListJoin("SELECT item_type_name,sale_detail_branch_id FROM v_sale_price_and_cost where sale_detail_branch_id=".$this->Base_model->branch_id()."  group by item_type_name");
        
         // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
    
}
