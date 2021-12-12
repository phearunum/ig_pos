 <?php

class Report_sale_summary_by_cashier extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "SALE SUMMARY BY CASHIER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_summary_by_cashier";
        
        $data['date']=date('Y-m-d');
        $data['record_cashier']=$this->Base_model->get_data_by("SELECT employee_name,employee_id FROM employee");
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
                
             $data['lbl_summary_title']    =$this->lang->line('report_sale_summary_by_cashier_list_name');
             $data['lbl_summary_cashier']  =$this->lang->line('cashier');
             $data['lbl_summary_inv_no']   =$this->lang->line('invoice_no');
             $data['lbl_summary_subtotal'] =$this->lang->line('lb_sub_total');
             $data['lbl_summary_total_dis']=$this->lang->line('total_discount');
             $data['lbl_summary_grand_total']=$this->lang->line('lb_grand_total');
             $data['lbl_cashier']           =$this->lang->line('cashier');
             $data['lbl_from']        =$this->lang->line('lb_from');
             $data['lbl_to']          =$this->lang->line('lb_to');
             $data['lbl_no']          =$this->lang->line('lb_no');
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             
        //END TRANSLATE
        if($this->Base_model->is_supper_user()==false)
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1 and branch_id=".$this->Base_model->branch_id());
        else
            $data['branch']=$this->Base_model->loadToListJoin("select branch_id,branch_name from branch where branch_status=1");
        
        $this->load->view("welcome/view",$data);
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
        $txt_cashier_id = $this->input->get("txt_cashier_id");
        $branch = $this->input->get("branch");
        $txt_invoice_no = $this->input->get("txt_invoice_no");
        /// search query
        $query ="";
        if($date_from!="" && $date_to!=""){
            $query .="and date_format(sm.sale_master_end_date,'%Y-%m-%d') between '$date_from' and '$date_to'";
        }
        if($txt_cashier_id != "")
            $query .= " and `sm`.`sale_master_cashier_id`=$txt_cashier_id";
        if($this->Base_model->is_supper_user()==false)
            $query .=" and `sm`.`sale_master_branch_id`=".$this->Base_model->branch_id();
        else{
            if($branch!=0)
                $query .=" and `sm`.`sale_master_branch_id`=".$branch;
        }
        if($txt_invoice_no!="")
            $query .=" and LPAD(`sm`.`sale_master_invoice_no`,6,0)='$txt_invoice_no'";
        /// end search query
        $data['records'] = $this->Base_model->loadToListJoin('CALL `p_sale_summary`("'.$query.'")');
        $this->load->view("report/report_stock/response", $data);
    }
}
