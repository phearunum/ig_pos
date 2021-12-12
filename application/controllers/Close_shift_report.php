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

class Close_shift_report extends CI_Controller{
    
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
        $data['page'] = "report/report_close_shift/frm_report_close_shift";
        $data['record_employee']=$this->Base_model->get_data("employee");
        $data['text_display']=  date('Y-m-d');
        
        $creator=$this->input->post('cbo_creator');
        $seller=$this->input->post('cbo_seller');
        $stock=$this->input->post('cbo_stock');
        $from=$this->input->post("datefrom");
        $to=$this->input->post("dateto");
        $product=$this->input->post("txt_product");
        $check=0;
        $q_creator=' ';
        if ($creator!=0 && $creator!=null && $creator!=''){$q_creator=' and sale_master_created_by='.$creator.' '; $text_display=date('Y-m-d'); $check=1;}
        
        $q_seller=' ';
        if ($seller!=0 && $seller!=null && $seller!=''){$q_seller=' and sale_master_sale_by='.$seller.' '; $text_display=date('Y-m-d'); $check=1;}
        
        $q_stock=' ';
        if ($stock!=0 && $stock!=null && $stock!=''){$q_stock=' and sale_master_stock_location_id='.$stock.' '; $text_display=date('Y-m-d'); $check=1;}
        
        $q_date=' ';
        if ($from!='' && $from!=null && $to!='' && $to!=null){
            $q_date=" and (cast(sale_master_sell_date as date) between cast('".$from."' as date) and cast('".$to."' as date)) ";  $text_display=$from.' to '.$to;
        }
        else{
            if($check==0 && trim($product)==""){
                $q_date=" and cast(sale_master_sell_date as date)=cast(now() as date) ";
            }
        }
        
        $query="select  sale_master_id
                        ,sm.sale_master_sell_date
                        ,sale_master_start_us
                        ,sale_master_start_khmer
                        ,sale_master_end_us
                        ,sale_master_end_khmer
                        ,sl.stock_location_name
                        ,emp.employee_name as sale_master_seller
                        ,u1.employee_name as sale_master_creator
                        ,u2.employee_name as sale_master_modifier
                        ,p.pump_name
                        ,sale_master_created_date
                        ,FLOOR((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1)) as total_us
                        ,Floor((((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1))
                        -FLOOR((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1)))*IFNULL(sale_master_exchange_rate,1)) as total_kh
                        ,sum(if(ifnull(sale_item_id,0)>0,1,0)) as item_count
                from sale_master sm
                    left outer join stock_location sl on sm.sale_master_stock_location_id=sl.stock_location_id
                    left outer join employee emp on sm.sale_master_sale_by=emp.employee_id
                    left outer join `employee` u1 on sm.sale_master_created_by=u1.employee_id
                    left outer join `employee` u2 on sm.sale_master_modified_by=u2.employee_id
                    left outer join pump p on sm.sale_master_pump_id=p.pump_id  
                    left outer join sale_item sd on sm.sale_master_id=sd.sale_item_master_id
                WHERE sale_master_status='FINISH' and sale_master_branch_id='".$this->session->userdata('branch_id')."' ".$q_creator.$q_seller.$q_stock.$q_date." and sale_item_item_detail_id in (select item_detail_id from item_detail where item_detail_name like '%".$product."%') ".
                "group by sale_master_id,sm.sale_master_sell_date,sale_master_start_us,sale_master_start_khmer,sale_master_end_us,sale_master_end_khmer,sl.stock_location_name,emp.employee_name,u1.employee_name,u2.employee_name,p.pump_name,sale_master_created_date
		,FLOOR((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1))
		,Floor((((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1))
		-FLOOR((sale_master_end_us-sale_master_start_us)+(sale_master_end_khmer-sale_master_start_khmer)/IFNULL(sale_master_exchange_rate,1)))*IFNULL(sale_master_exchange_rate,1))";
        
        $query_item="SELECT SI.sale_item_id
                            ,SI.sale_item_master_id
                            ,SI.sale_item_item_detail_id
                            ,ID.item_detail_name
                            ,SI.sale_item_start_qty
                            ,SI.sale_item_end_qty
                            ,SI.sale_item_start_qty-SI.sale_item_end_qty as sale_item_total_qty
                            ,SI.sale_item_created_date
                            ,SI.sale_item_modified_date
                            ,SI.sale_item_modified_by
                            ,SI.sale_item_convert_qty
                            ,SUM(if(ifnull(sale_detail_item_id,0)=0,0,1)) AS item_detail
                    FROM    `sale_item` AS SI
                            LEFT OUTER JOIN sale_detail AS SD ON SI.sale_item_master_id=SD.sale_detail_master_id AND SI.sale_item_item_detail_id=SD.sale_detail_item_id
                            LEFT OUTER JOIN `item_detail` AS ID ON SI.sale_item_item_detail_id=ID.item_detail_id
                    WHERE sale_item_master_id IN (SELECT SALE_MASTER_ID FROM sale_master WHERE sale_master_status='FINISH' and sale_master_branch_id='".$this->session->userdata('branch_id')."' ".$q_creator.$q_seller.$q_stock.$q_date.") and sale_item_item_detail_id in (select item_detail_id from item_detail where item_detail_name like '%".$product."%')
                    GROUP BY SI.sale_item_id,SI.sale_item_master_id,SI.sale_item_item_detail_id,ID.item_detail_name,SI.sale_item_start_qty,SI.sale_item_end_qty
                            ,SI.sale_item_start_qty-SI.sale_item_end_qty,SI.sale_item_created_date,SI.sale_item_modified_date
                            ,SI.sale_item_modified_by,SI.sale_item_convert_qty";
        $query_detail="select   sd.sale_detail_master_id"
                                . " ,sd.sale_detail_item_id"
                                . " ,ct.customer_type_name"
                                . " ,sum(sale_detail_qty) as sale_detail_qty "
                                . " ,sum(sale_detail_qty*sale_detail_unit_price)/sum(sale_detail_qty) as sale_detail_avg_price "
                    . " from sale_detail sd inner join customer c on sd.sale_detail_customer_id=c.customer_id "
                            ." inner join customer_type ct on c.customer_type_id=ct.customer_type_id "
                    . " WHERE sale_detail_master_id IN (SELECT SALE_MASTER_ID FROM sale_master WHERE sale_master_status='FINISH' and sale_master_branch_id='".$this->session->userdata('branch_id')."' ".$q_creator.$q_seller.$q_stock.$q_date.") and sale_detail_item_id in (select item_detail_id from item_detail where item_detail_name like '%".$product."%')"
                    . " group by sd.sale_detail_master_id,sd.sale_detail_item_id,ct.customer_type_name";
        $data['record_sale_master']=$this->Base_model->loadToListJoin($query);
        $data['record_sale_item']=$this->Base_model->loadToListJoin($query_item);
        $data['record_sale_detail']=$this->Base_model->loadToListJoin($query_detail);
        
        $data['recorder']= $this->Base_model->loadToListJoin("select distinct employee_name as recorder,employee_id from employee where  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        $data['stock_location']= $this->Base_model->loadToListJoin("SELECT * from stock_location where stock_location_branch_id = ".$this->session->userdata('branch_id'));
        
        $this->load->view("welcome/view",$data);
    }
    
    public function searchcustomer(){
        $this->load->view("search/search.php");
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
