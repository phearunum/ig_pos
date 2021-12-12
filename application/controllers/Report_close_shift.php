<?php

class Report_close_shift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
    }

    
    public function index() {
        $data['title'] = "Report Sale Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page']   = "report/report_sale/report_close_shift_list";

        //$data['paginglinks']  = "";
       // $data['sale_summary'] = "";
       // $data['shift_time'] = $this->Base_model->loadToListJoin("SELECT * FROM time_template ORDER BY template_time_id DESC");
        $data['text_display'] = 'Today Report Sale Detail';
    
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
            $data['lbl_title']                   ="Sale by Close Shift";//=$this->lang->line('sale_detail_list_name');
            $data['lbl_from']                   =$this->lang->line('lb_from');
            $data['lbl_to']                     =$this->lang->line('lb_to');
            $data['lbl_customer']               =$this->lang->line('customer');
            $data['btn_search']                 =$this->lang->line('btn_search');
            $data['btn_export']                 =$this->lang->line('btn_export');
            $data['btn_reprint']                 =$this->lang->line('btn_reprint');
            $data['lbl_no']                     =$this->lang->line('lb_no');

            $data['lbl_customer_card']          =$this->lang->line('customer_card');
            $data['lbl_item_name']              =$this->lang->line('item_name');
            $data['lbl_qty']                    =$this->lang->line('qty');
            $data['lbl_price']                  =$this->lang->line('price');
            $data['lbl_current_cost']           =$this->lang->line('current_cost');
            $data['lbl_total']                  =$this->lang->line('lb_total');
            $data['lbl_discount']               =$this->lang->line('discount');
            $data['lbl_vat']                    =$this->lang->line('vat');
            $data['lbl_service_charge']         =$this->lang->line('service_charge');
            $data['lbl_grand_total']            =$this->lang->line('lb_grand_total');
            $data['lbl_sub_total']              =$this->lang->line('lb_sub_total');
            //END TRAN SLATE
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
        $data['record_cashier'] = $this->Base_model->loadToListJoin("select * from employee where employee_id != 37");

        $this->load->view("welcome/view", $data);
    }


    public function ResponeShiftTimes(){
        //c_id:id,fd:from_date,td:to_date
        $datefrom = $this->input->post("fd");
        $dateto = $this->input->post("td");
        $id=$this->input->post("c_id");
        $search_from = '';
        if($datefrom!=''){
            $search_from ='and date_format(cash_startdate,"%Y-%m-%d")>="$datefrom"';
        }
        $search_to = '';
        if($dateto!=''){
            $search_to = "and date_format(cash_enddate,'%Y-%m-%d')<='$dateto' ";
        }

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM cash_register WHERE cash_user_id=$id and cash_status='FINISH' $search_from $search_to");
        echo json_encode($data['records']);
    }
    
    public function response() {
        $query =" AND DATE(sm.sale_master_end_date) BETWEEN CURDATE() AND CURDATE() ";
        if($this->Base_model->is_supper_user()==false)
            $query .=" AND `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        $data['records'] = $this->Base_model->loadToListJoin('CALL p_sale_detail("'.$query.' and `sm`.`sale_master_branch_id`="" '.'")');

        $this->load->view("report/report_stock/response", $data);
    }
    public function responses() {
        $cash_id = $this->input->get("cbo_time_shift");
        
        $query="";

        
            if($cash_id!=0)
                $query .=" AND `sm`.`sale_master_cash_id`=".$cash_id;
        
        $data['records'] = $this->Base_model->loadToListJoin('CALL p_sale_detail("'.$query.'")');
        
        $this->load->view("report/report_stock/response", $data);
    }
    public function get_cashier($id){
        $re=$this->Base_model->loadToListJoin("select * from employee where  employee_brand_id=$id");
        echo json_encode($re);
    }
    
}
