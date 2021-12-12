<?php

class Report_stock extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        
        $data['title']  = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu']   = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page']   = "report/report_stock/report_stock";
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * FROM stock_location");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             
      
             $data['lbl_group']        =$this->lang->line('group');
             $data['lbl_cost']      =$this->lang->line('cost');
             $data['lbl_expire']          =$this->lang->line('expire');
             $data['lbl_alert']        =$this->lang->line('alert');
             $data['lbl_date']          =$this->lang->line('date');
             $data['lbl_branch']        =$this->lang->line('branch');
             $data['lbl_stockdate']        =$this->lang->line('stockdate');
             $data['lb_approve']             =$this->lang->line('approve');
             $data['lbl_title']             =$this->lang->line('report_stock_list_name');
             $data['lbl_part']              =$this->lang->line('part_number');
             $data['lbl_item_name']         =$this->lang->line('item_name');
             $data['lbl_item_type']         =$this->lang->line('item_type');
             $data['lbl_stock_location']    =$this->lang->line('stock_location');
            
             $data['lbl_qty']               =$this->lang->line('sku');
             $data['lbl_measure']           =$this->lang->line('measure_name');
             $data['lbl_current_cost']     =$this->lang->line('current_cost');
             $data['lbl_total_current_cost']     =$this->lang->line('total_current_cost');
             $data['lbl_create_by']         =$this->lang->line('lb_create_by');

             $data['btn_export']        =$this->lang->line('btn_export');
             $data['btn_previous']      =$this->lang->line('btn_previous');
             $data['btn_next']          =$this->lang->line('btn_next');
             $data['btn_search'] =$this->lang->line('btn_search');

             $data['lbl_allbranch'] =$this->lang->line('allbranch');
             $data['lbl_allstock'] =$this->lang->line('allstock');
             $data['lbl_total_cost'] =$this->lang->line('total_cost');
             $data['lbl_branch'] =$this->lang->line('branch');
        // load view when action above finish
        $this->load->view("welcome/view",$data);  
        
    }
    public function stock_alert(){
        
        $data['title']  = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu']   = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page']   = "report/report_stock/report_stock_alert";
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * FROM stock_location");

       /* $branch="";
       if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['rd_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");*/
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
             
      
             $data['lbl_title']             =$this->lang->line('report_stock_list_name');
             $data['lbl_branch']              =$this->lang->line('branch');
             $data['lbl_part']              =$this->lang->line('part_number');
             $data['lbl_item_name']         =$this->lang->line('item_name');
             $data['lbl_item_type']         =$this->lang->line('item_type');
             $data['lbl_stock_location']    =$this->lang->line('stock_location');
            
             $data['lbl_qty']               =$this->lang->line('sku');
             $data['lbl_measure']           =$this->lang->line('measure_name');
             $data['lbl_current_cost']     =$this->lang->line('current_cost');
             $data['lbl_total_current_cost']     =$this->lang->line('total_current_cost');
             $data['lbl_create_by']         =$this->lang->line('lb_create_by');
            
        
             
             
             $data['btn_export']        =$this->lang->line('btn_export');
             $data['btn_previous']      =$this->lang->line('btn_previous');
             $data['btn_next']          =$this->lang->line('btn_next');
             $data['btn_search']        =$this->lang->line('btn_search');
        // load view when action above finish
        $this->load->view("welcome/view",$data);  
        
    }
    public function response_alert(){
        $branch ="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id();
        }
        $data['records']=$this->Base_model->loadToListJoin("select *from (select 
                                    s.stock_item_id,
                                    id.item_detail_name,
                                    id.item_detail_remain_alert,
                                    s.branch_id,
                                    b.branch_name,
                                    sl.stock_location_name stock_name,
                                    sum(s.stock_qty) qty,
                                    id.item_detail_part_number as part_number 
                                    from stock s 
                                    inner join item_detail id on id.item_detail_id=s.stock_item_id 
                                    inner join branch b on b.branch_id=s.branch_id
                                    inner join stock_location sl on sl.stock_location_id=s.stock_location_id
                                    group by s.branch_id,s.stock_item_id,s.stock_location_id) tmp where qty<=item_detail_remain_alert $branch");
        $this->load->view("report/report_stock/response",$data);
    }
    public function product_expire(){
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "report/report_stock/product_expire";

       /* $branch="";
       if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['rd_branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");*/
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);
         
  
         $data['lbl_title']             =$this->lang->line('report_stock_list_name');
         $data['lbl_branch']              =$this->lang->line('branch');
         $data['lbl_part']              =$this->lang->line('part_number');
         $data['lbl_item_name']         =$this->lang->line('item_name');
         $data['lbl_item_type']         =$this->lang->line('item_type');
         $data['lbl_stock_location']    =$this->lang->line('stock_location');
        
         $data['lbl_qty']               =$this->lang->line('sku');
         $data['lbl_measure']           =$this->lang->line('measure_name');
         $data['lbl_current_cost']     =$this->lang->line('current_cost');
         $data['lbl_total_current_cost']     =$this->lang->line('total_current_cost');
         $data['lbl_create_by']         =$this->lang->line('lb_create_by');
        
    
         
         
         $data['btn_export']        =$this->lang->line('btn_export');
         $data['btn_previous']      =$this->lang->line('btn_previous');
         $data['btn_next']          =$this->lang->line('btn_next');
         $data['btn_search']        =$this->lang->line('btn_search');
        $this->load->view("welcome/view",$data);  
        
    }
    public function response_expire(){
        $branch ="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id();
        }
        $data['records']=$this->Base_model->loadToListJoin("select * from v_stock where curdate()-stock_alert_date>=0 and stock_alert_date!='0000-00-00' $branch");
        $this->load->view("report/report_stock/response",$data);
    }
    public function response(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_stock WHERE 1=1 $branch and stock_qty>0");
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses(){
        $item_name     =$this->input->get("item_name");
        $item_type_name=$this->input->get("item_type");
        $stock_location=$this->input->get("stock_location");
        $part_number   =$this->input->get("partnumber");
        $branch_id   =$this->input->get("branch_id");
        
        $q_item_name ='';
        $q_item_type ='';
        $q_stock     ='';
        $q_partnumber='';
        $branch="";
        $s_branch_id="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        
        if($item_name!=""){
            $q_item_name=" AND stock_item_id=$item_name";
        }
        if($item_type_name!=""){
            $q_item_type=" AND item_type_id=$item_type_name";
        }
        if($stock_location>0){
            $q_stock  =" AND stock_location_id=$stock_location";
        }
        if($part_number!=""){
            $q_partnumber=" AND item_detail_part_number='$part_number'";
        }
        if($branch_id>0){
            $s_branch_id=" and branch_id=$branch_id";
        }
        
     
            $data['records']=$this->Base_model->loadToListJoin("select * from v_stock where 1=1 and stock_qty>0 $s_branch_id $branch ".$q_item_name.$q_item_type.$q_partnumber.$q_stock);
        
        
        $this->load->view("report/report_stock/response",$data);
    }
}