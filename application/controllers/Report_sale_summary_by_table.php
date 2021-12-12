<?php

class report_sale_summary_by_table extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "SALE SUMMARY BY TABLE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_summary_by_table";
        $data['date']=date('Y-m-d');

        $data['record_floor']=$this->Base_model->get_data_by("SELECT floor_id,floor_name FROM floor where status=1 AND floor_branch_id=".$this->Base_model->branch_id());
        
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']             =$this->lang->line('sale_summary_by_table_list_name');
             $data['lbl_table']             =$this->lang->line('table');
             $data['lbl_invoice_no']        =$this->lang->line('invoice_no');
             $data['lbl_total']             =$this->lang->line('lb_total');
             $data['lbl_from']              =$this->lang->line('lb_from');
             $data['lbl_to']                =$this->lang->line('lb_to');
             $data['lbl_sub_total']         =$this->lang->line('lb_sub_total');
             $data['lbl_grand_total']       =$this->lang->line('lb_grand_total');
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             $data['lbl_no']          =$this->lang->line('lb_no');
             $data['lbl_floor']      =$this->lang->line('floor');
             $data['lbl_table']          =$this->lang->line('table');
             $data['lbl_allbranch']          =$this->lang->line('allbranch');
             $data['lbl_branch']          =$this->lang->line('branch');
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
             
        $this->load->view("welcome/view",$data);
    }
    public function loadTable(){
        $floorid = $this->input->post("id");
        $data=$this->Base_model->loadToListJoin("select layout_id,layout_name,floor_id from floor_table_layout where floor_id=$floorid");
        echo json_encode($data);
    }
    public function getFloor(){
    $floorid = $this->input->post("id");
    $data=$this->Base_model->loadToListJoin("select * from floor where floor_branch_id=$floorid");
        echo json_encode($data);
  
    }
    public function response(){
        $query ="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between CURDATE() and CURDATE() ";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        //
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
    public function responses(){
        $date_from = $this->input->get("datefrom");
        $date_to = $this->input->get("dateto");
        $cbo_table_name = $this->input->get("cbo_table_name");
        $cbo_floor_name = $this->input->get("cbo_floor");
        $branch = $this->input->get("branch");
        ///
        $query ="";
        if($date_from!="" && $date_to!=""){
            $query .="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$date_from' and '$date_to'";
        }
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        else{
            if($branch!=0)
                $query .=" and `sm`.`sale_master_branch_id`=".$branch;
        }
        if($cbo_table_name!=0)
            $query .=" and sm.sale_master_layout_id=".$cbo_table_name;
        if($cbo_floor_name!=0)
            $query .=" and ftl.floor_id=".$cbo_floor_name;
        ///
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }  
}
