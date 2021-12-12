<?php
class Report_stock_in_out extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $user_id = $this->session->userdata("user_id");
        if(empty($user_id))
         redirect(site_url(),'logout');
        $this->load->model('Base_model');
    }    
    public function index(){
        
        $data['title'] = "Report Stock Price Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_stock_detail/report_stock_in_out";                
        $data['date_from']='';
        $data['date_until']='';
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * FROM stock_location");
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }

        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch ");
        // load view when action above finish
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('report_stock',$lang=='' ? 'en':$lang);

        $data['lbl_title'] =$this->lang->line('stock_in_out_list_name');
        $data['lbl_type'] = $this->lang->line('item_type');
        $data['lbl_name'] = $this->lang->line('item_name');
        $data['lbl_part'] = $this->lang->line('part_number');
        $data['lbl_sold'] = $this->lang->line('sold');
        $data['lbl_lost'] = $this->lang->line('lost');
        $data['lbl_transfer'] = $this->lang->line('transfer');
        $data['lbl_sku'] = $this->lang->line('sku');
        $data['lbl_stock'] = $this->lang->line('stock_location');
        $data['lbl_measure'] = $this->lang->line('measure_name');
        $data['lbl_increase'] = $this->lang->line('increase');
        $data['lbl_branch']  = $this->lang->line('branch');
      
        $data['btn_export'] =$this->lang->line('btn_export');
        $data['btn_search'] =$this->lang->line('btn_search');
        
        $this->load->view("welcome/view",$data);        
    }
     public function response(){

        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
         
         //permission data
            // $name=$this->uri->segment(1);
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            // $id=0;
            
            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
        
        //$view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
       // $str='';//$view_all==1?'':' and employee_brand_id='.$this->session->userdata('branch_id');
        
        //end permission data
                
        $data['records']=$this->Base_model->loadToListJoin("select * from v_stock_in_out where 1=1 $branch");
        $this->load->view("report/report_stock/response",$data);
    } 

    public function responses(){
        
        $df= $this->input->get("txt_date_from");
        $dt= $this->input->get("txt_date_to");        
        $txtitem_id= $this->input->get("txtitem_id");  
        $part_number = $this->input->get("txtpartnumber");
        $item_name = $this->input->get("item_name"); 
        $stock_location=$this->input->get("stock_location");
        $branch_id   =$this->input->get("branch_id");

        // echo  $stock_location.''.$branch_id.$item_name;die();
        //$query_sale ="";
        $query_waste ="";
        $query_adjust ="";
        $query_transffer ="";
        $query_condition="";
        $item_name ="";
        $q_stock="";
        $s_branch_id="";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch="and branch_id =".$this->Base_model->branch_id()." ";
        }
        if($item_name !=''){
           $query_condition =" and item_detail_name like '%$item_name%'"; 
        }

       if($branch_id>0){
            $s_branch_id=" and branch_id =".$branch_id;
        }

        if($stock_location>0){
            $q_stock  =" AND stock_location_id =".$stock_location;
        }
         if($df!='' && $dt!=''){
        //     $query_sale =" and date_format(sale_stock_date,'%Y-%m-%d') between '$df' and '$dt'";
        //     $query_waste =" and date_format(stock_waste_created_date,'%Y-%m-%d') between '$df' and '$dt'";
            $query_adjust =" and date_format(stock_adjust_created_date,'%Y-%m-%d') between '$df' and '$dt'";
        //     $query_transffer ="and date_format(stock_transffer_created_date,'%Y-%m-%d') between '$df' and '$dt'";
       }
        if($txtitem_id!='' && $part_number!='')
            $query_condition =" and (stock_item_id=$txtitem_id or item_detail_part_number='$part_number')";
        
        elseif($part_number!='')
            $query_condition =" and item_detail_part_number='".$part_number."'";
        
        elseif($txtitem_id!='')
             $query_condition =" and stock_item_id=$txtitem_id";
             
        $sql="SELECT * FROM v_stock_in_out WHERE 1=1 $branch $query_condition $s_branch_id $q_stock $query_adjust $query_condition $query_condition ";
        $data['records']=$this->Base_model->loadToListJoin($sql);

        $this->load->view("report/report_stock/response",$data);
    }
     public function get_stock($id){
        $re=$this->Base_model->loadToListJoin("SELECT stock_location_name,stock_location_id FROM stock_location WHERE stock_location_branch_id=$id");
            echo json_encode($re);
        }
}
