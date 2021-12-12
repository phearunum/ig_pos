<?php
class Report_monthly_expense extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
        // if(empty($this->Base_model->user_id()))
        //     redirect ("userlogin");
    }
    public function index(){
        $data['title'] = "Report Profit and Loss";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_expense/frm_expense_monthly_search";
        //START => load data to table when page load 
        // TRANSLATED BY SOPHANITH

        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('expense',$lang=='' ? 'en':$lang);

        //$data['lbl_title']        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_profitandlost", "form_translate_label_name", "lb_title");
        // $data['lbl_revenue']      = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_profitandlost", "form_translate_label_name", "lbl_revenue");
        // $data['lbl_create_date']  = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_create_date");
        // $data['lbl_debit_amount'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_debit_amount");
        // $data['lbl_po']           = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_po");
        // $data['lbl_supplier']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_supplier");
        // $data['lbl_due_date']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_due_date");

      
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_from']   = $this->lang->line('lb_from');
        $data['lbl_to']     = $this->lang->line('lb_to');
        $data['btn_year']   = $this->lang->line('btn_year');
        $data['btn_all']    = $this->lang->line('btn_all');


        $branch="";
       if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        //END TRAN SLATED
        $data['year'] = $this->Base_model->loadToListJoin("SELECT DISTINCT DATE_FORMAT(expense_date,'%Y') as years FROM v_expense");
        $this->load->view("welcome/view",$data);
    }
    //START => function search
    public function search_exp() {

        $m = $this->uri->segment(3);
        $y = $this->uri->segment(4);
        $b = $this->uri->segment(5);
        $branch="";
        if($b!=0){
            $branch=" and expense_branch_id=".$b;
        }
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }
        $view_all = $this->Base_model->get_value("permission", "permission_viewall", "permission_id", $id);
        $str = $view_all == 1 ? '' : ' sale_master_branch_id=' . $this->Base_model->branch_id() . " AND ";
        //permission data

        if ($m != "0") {
            //START => load data to table when page load
            $data['year'] = $m . '/' . $y;
            
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT concat(expense_type_name,'( ',branch_name,' )') as expense_type_name,expense_type_id,sum(expense_amount) as total_amount,branch_name FROM v_expense where extract(month from expense_date)='$m' $branch and extract(year from expense_date)='$y' group by expense_type_id,expense_branch_id order by expense_type_id ");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,expense_amount,expense_type_id,branch_name FROM v_expense where extract(month from expense_date)='$m' and extract(year from expense_date)='$y' $branch");
            // load view when action above finish

            $this->load->view("report/report_expense/report_expense_monthly", $data);
        } else {
            //START => load data to table when page load 

            $data['year'] = $y;
            
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT concat(expense_type_name,'( ',branch_name,' )') as expense_type_name,expense_type_id,sum(expense_amount) as total_amount,branch_name FROM v_expense where extract(year from expense_date)='$y' $branch group by expense_type_id,expense_branch_id order by expense_type_id");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,expense_amount,expense_type_id,branch_name FROM v_expense where extract(year from expense_date)='$y' $branch");
            // load view when action above finish

            $this->load->view("report/report_expense/report_expense_monthly", $data);
        }
    }
    public function search_from_to() {
        //START => load data to table when page load

        $date_f = $this->uri->segment(3);
        $date_t = $this->uri->segment(4);
        $b = $this->uri->segment(5);
        $branch="";
        if($b!=0){
            $branch=" and expense_branch_id=".$b;
        }
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['year'] = $date_f . '-' . $date_t;
        
        $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT concat(expense_type_name,'( ',branch_name,' )') as expense_type_name,expense_type_id,sum(expense_amount) as total_amount,branch_name FROM v_expense where expense_date>='$date_f' and expense_date<='$date_t' $branch group by expense_type_id,expense_branch_id order by expense_type_id");
        $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,expense_amount,expense_type_id,branch_name FROM v_expense where expense_date>='$date_f' and expense_date<='$date_t' $branch");

        // load view when action above finish
        // TRANSLATED BY SOPHANITH
        $lang = $this->input->cookie('language');


        // $data['lbl_title']        = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lb_title");
        // $data['lbl_recorder']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_recorder");
        // $data['lbl_create_date']  = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_create_date");
        // $data['lbl_debit_amount'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_debit_amount");
        // $data['lbl_po']           = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_po");
        // $data['lbl_supplier']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_supplier");
        // $data['lbl_due_date']     = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_due_date");
        
       // $this->lang->load('content', $lang == '' ? 'en' : $lang);

        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('expense',$lang=='' ? 'en':$lang);

        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_from']   = $this->lang->line('lbl_from');
        $data['lbl_to']     = $this->lang->line('lbl_to');
        $data['btn_year']   = $this->lang->line('btn_year');
        $data['btn_all']    = $this->lang->line('btn_all');



        //END TRAN SLATED
        $this->load->view("report/report_expense/report_expense_monthly", $data);
    }
    //END => function search
}
