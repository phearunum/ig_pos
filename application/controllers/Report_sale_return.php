<?php
class Report_sale_return extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
  
        $this->load->model('Base_model');
    }    
    public function index(){
        
        $data['title'] = "Report Purchase Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_return";                
        //$data['record'] = $this->

        $data['branch']=$this->Base_model->loadToListJoin("select * from branch where branch_status=1");


        $this->load->view("welcome/view",$data); 

    }
     public function response(){
         
        $data['records']=$this->Base_model->loadToListJoin("SELECT
                    sr.sale_return_id,
                    sm.sale_master_id,
                    sm.sale_master_invoice_no,
                    sm.sale_master_end_date,
                    sm.sale_master_start_date,
                    sd.sale_detail_item_id,

                    id.item_detail_name,
                    sr.sale_return_qty,
                    sd.sale_detail_unit_price,
                    (sd.sale_detail_unit_price*sr.sale_return_qty) sub_total,
                    sr.sale_return_created_date,
                    em.employee_name,
                    fl.layout_name,
                    sm.sale_master_branch_id,
                    lpad(sm.sale_master_invoice_no,6,0) as invoice_no
                    FROM
                    sale_order_return sr
                    inner join sale_master sm on sm.sale_master_id=sr.sale_return_master_id
                    inner join sale_detail sd on sd.sale_detail_id=sr.sale_return_detail_id
                    inner join item_detail id on id.item_detail_id=sd.sale_detail_item_id 
                    inner join employee em on em.employee_id=sr.sale_return_created_by 
                    inner join floor_table_layout fl on fl.layout_id=sm.sale_master_layout_id");
        $this->load->view("report/report_stock/response",$data);
    } 
    public function responses(){
        
        $df= $this->input->get("txt_date_from");
        $dt= $this->input->get("txt_date_until");        
        $sale_master_id= $this->input->get("sale_master_id");
        $item_name= $this->input->get("item_name"); 
        $brand =$this->input->get("txt_brand");
        $recorder =$this->input->get("cbo_recorder");
        
        $query ="";
        $item = "";
        //$query_expression ="";
        if($df!="" && $dt!=""){
            $query .=" and date_format(sale_return_created_date,'%Y-%m-%d') between '$df' and '$dt'";
             }
        if($sale_master_id!="")
             $query .=" and sale_master_id=".$sale_master_id; 
             
        if($item_name!="") 
             $item .=" and item_detail_name like '%$item_name%'";
             
         if($brand!="") 
             $query .=" and sale_master_branch_id=".$brand;
            
         if($recorder>0)
             $query .=" and employee_id=".$recorder;
          
         //
        // if($status_search == 1)
        //      $query_expression .=" and sale_master_status = 'PAID' and sd.sale_detail_status='PAID'";
        // elseif ($status_search == 2)
        //     $query_expression .=" and sale_master_status = 'CREDIT' and sd.sale_detail_status='CREDIT'";
        // elseif ($status_search == 3)
        //     $query_expression .=" and sale_master_status = 'CANCEL'"; 
        // elseif ($status_search == 4) 
        //     $query_expression .=" and  sm.sale_master_status in ('CREDIT','PAID') and sd.sale_detail_status in ('CREDIT','PAID')";
        // else   
        //     $query_expression .=""; 
        $data['records']=$this->Base_model->loadToListJoin("SELECT
                    sr.sale_return_id,
                    sm.sale_master_id,
                    sm.sale_master_invoice_no,
                    sm.sale_master_end_date,
                    sm.sale_master_start_date,
                    sd.sale_detail_item_id,

                    id.item_detail_name,
                    sr.sale_return_qty,
                    sd.sale_detail_unit_price,
                    (sd.sale_detail_unit_price*sr.sale_return_qty) sub_total,
                    sr.sale_return_created_date,
                    em.employee_name,
                    fl.layout_name,
                    sm.sale_master_branch_id,
                    lpad(sm.sale_master_invoice_no,6,0) as invoice_no
                    FROM
                    sale_order_return sr
                    inner join sale_master sm on sm.sale_master_id=sr.sale_return_master_id
                    inner join sale_detail sd on sd.sale_detail_id=sr.sale_return_detail_id
                    inner join item_detail id on id.item_detail_id=sd.sale_detail_item_id 
                    inner join employee em on em.employee_id=sr.sale_return_created_by 
                    inner join floor_table_layout fl on fl.layout_id=sm.sale_master_layout_id 
                    where 1=1 $query $item ");
        $this->load->view("report/report_stock/response",$data);
    }

    public function export(){
        $this->load->library('excel_one_total');
        $result = $query = $this->db->query("SELECT 1,2,3 from item_detail");
        $head=array('A','B','C');
        $this->excel_one_total->to_excel($result, 'test',$head); 
    }
    public function get_recorder($id){
        $re=$this->Base_model->loadToListJoin("select employee_name,employee_id from employee where employee_brand_id=$id ");
        echo json_encode($re);
    }
}
