<?php

class Report_sale_by_category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }

    public function index() {

        $data['title'] = "Report Purchase Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_by_category";
        //START => load data to table when page load 
        // load view when action above finish
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('sale',$lang=='' ? 'en':$lang);

        $data['lbl_title'] = $this->lang->line('sale_summary_by_category_list_name');
        $data['lbl_product_name'] = $this->lang->line('item_name');
        $data['lbl_part_number'] = $this->lang->line('part_number');
        $data['lbl_qty'] = $this->lang->line('qty');
        $data['lbl_unit_price'] = $this->lang->line('unit_price');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_discount'] = $this->lang->line('discount');
        $data['lbl_grand_total'] =$this->lang->line('lb_grand_total'); 
        $data['lbl_category'] = $this->lang->line('category');  
        $data['lbl_service'] = $this->lang->line('service_charge');
        $data['lbl_tax'] = $this->lang->line('vat');
        $data['lbl_from'] = $this->lang->line('lb_from');
        $data['lbl_to'] = $this->lang->line('lb_to');
        $data['lbl_no'] = $this->lang->line('lb_no');
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_sub_total'] = $this->lang->line('lb_sub_total');

        //END TRANSLATE
        $data['record_cagegory'] = $this->Base_model->get_data_by("SELECT item_type_id,item_type_name FROM item_type");
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where  branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
        //
        $this->load->view("welcome/view", $data);
    }

    public function response() {
        $query ="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between CURDATE() and CURDATE() ";
        if($this->Base_model->is_supper_user()==false){
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        }
        //
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_category`("'.$query.'")');

        $this->load->view("report/report_stock/response", $data);
    }
    public function responses() {
        //sleep(5000);
        $date_from = $this->input->get("datefrom");
        $date_to = $this->input->get("dateto");
        $category_name = $this->input->get("cbo_category");
        $branch = $this->input->get("branch");
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
        if($category_name!=0)
            $query .=" and `idt`.item_type_id=".$category_name;
        //
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_category`("'.$query.'")');
        
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response", $data);
    }

}
