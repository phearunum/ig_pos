<?php

class Report_profitandlost extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }

    public function index(){
        $data['title'] = "Report Profit and Loss";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_profit_lost/report_profit_and_lost";
        //START => load data to table when page load 
        $branch="";
            if($this->Base_model->is_supper_user()==false){
                $branch=" and branch_id =".$this->Base_model->branch_id()." ";
            }
        $data['branch'] = $this->Base_model->loadToListJoin("select * from branch where branch_status=1 $branch");

        $data['year'] = $this->Base_model->loadToListJoin("select distinct a.years 
                                                        from 
                                                        (
                                                         select distinct extract(year from s.sale_master_start_date) as years 
                                                                        from sale_master s where s.sale_master_status in('CREDIT','PAID') 
                                                        union all 
                                                         select distinct extract(year from p.purchase_created_date) as years 
                                                                        from purchase p where p.status in('CREDIT','PAID')
                                                        ) as a order by years desc");

        // load view when action above finish
        // TRANSLATED BY SOPHANITH

        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('expense',$lang=='' ? 'en':$lang);

        // $data['lbl_title'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_profitandlost", "form_translate_label_name", "lb_title");
        // $data['lbl_revenue'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_profitandlost", "form_translate_label_name", "lbl_revenue");
        // $data['lbl_create_date'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_create_date");
        // $data['lbl_debit_amount'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_debit_amount");
        // $data['lbl_po'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_po");
        // $data['lbl_supplier'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_supplier");
        // $data['lbl_due_date'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_payto_supplier", "form_translate_label_name", "lbl_due_date");

        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_from'] = $this->lang->line('lb_from');
        $data['lbl_to'] = $this->lang->line('lb_to');
        $data['btn_year'] = $this->lang->line('btn_year');
        $data['btn_all'] = $this->lang->line('btn_all');

        //END TRAN SLATED

        $this->load->view("welcome/view", $data);
    }

    public function get_month() {
        $data['year'] = $this->uri->segment(3);
        $this->load->view("report/report_profit_lost/frm_get_month", $data);
    }

    //START => function search
    public function search_pnl() {

        $m = $this->uri->segment(3);
        $y = $this->uri->segment(4);
        $b = $this->uri->segment(5);
        $branch=" sale_master_branch_id=$b and";

        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }
        $view_all = $this->Base_model->get_value("permission", "permission_viewall", "permission_id", $id);
        $str = $view_all == 1 ? '' : ' sale_master_branch_id=' . $this->session->userdata('branch_id') . " AND ";
        //permission data

        if ($y != "") {
            //START => load data to table when page load 
            $data['year'] = $m . '/' . $y;
            //$data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_summary where extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(SubTotal) total from v_sale_summary  where $branch extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['total_discount'] = $this->Base_model->get_value_byQuery("select sum(discount) total from v_sale_summary where $branch extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['vat_total'] = $this->Base_model->get_value_byQuery("select sum(tax) total from v_sale_summary where $branch extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['charge_total'] = 0;
            $data['pay_total'] = 0;//$this->Base_model->get_value_byQuery("select sum(pay) total from v_sale_summary where extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['credit_paid'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_recieve_amount) as total from customer_credit where extract(month from customer_credit_pay_date)='$m' and extract(year from customer_credit_pay_date)='$y'", 'total');
            $data['credit_discount'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_discount) as total from customer_credit where extract(month from customer_credit_pay_date)='$m' and extract(year from customer_credit_pay_date)='$y'", 'total');
            $data['sale_return'] = 0;//$this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_return_detail where extract(month from return_date)='$m' and extract(year from return_date)='$y'", 'total');
            $data['cogs'] = $this->Base_model->get_value_byQuery("select sum(costing) as total from v_sale_summary where $branch extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            //$data['cogs']=0;
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT expense_type_name,expense_type_id,sum(expense_amount) as total_amount FROM v_expense where expense_branch_id=$b and extract(month from expense_date)='$m' and extract(year from expense_date)='$y' group by expense_type_id");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,sum(expense_amount) as expense_amount,expense_type_id FROM v_expense where expense_branch_id=$b and extract(month from expense_date)='$m' and extract(year from expense_date)='$y' group by expense_detail_name");
            // load view when action above finish

            $this->load->view("report/report_profit_lost/frm_get_pnl", $data);
        } else {
            //START => load data to table when page load 

            $data['year'] = $m;
//            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(SubTotal) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['total_discount'] = $this->Base_model->get_value_byQuery("select sum(discount) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['vat_total'] = $this->Base_model->get_value_byQuery("select sum(tax) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['charge_total'] = 0;
            $data['pay_total'] = 0;//$this->Base_model->get_value_byQuery("select sum(pay) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['credit_paid'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_recieve_amount) as total from customer_credit where extract(year from customer_credit_pay_date)='$m'", 'total');
            $data['credit_discount'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_discount) as total from customer_credit where extract(year from customer_credit_pay_date)='$m'", 'total');
            $data['sale_return'] = 0;//$this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_return_detail where extract(year from return_date)='$m'", 'total');
            $data['cogs'] = $this->Base_model->get_value_byQuery("select sum(costing) as total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            //$data['cogs']=0;
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT expense_type_name,expense_type_id,sum(expense_amount) as total_amount FROM v_expense where extract(year from expense_date)='$m' group by expense_type_id");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,sum(expense_amount) as expense_amount,expense_type_id FROM v_expense where extract(year from expense_date)='$m' group by expense_detail_name");
            // load view when action above finish

            $this->load->view("report/report_profit_lost/frm_get_pnl", $data);
        }
    }

    public function search_pnl_all() {

        $y = $this->uri->segment(3);
        $b = $this->uri->segment(4);
        $branch=" sale_master_branch_id=$b and";
       
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }
        $view_all = $this->Base_model->get_value("permission", "permission_viewall", "permission_id", $id);
        $str = $view_all == 1 ? '' : ' sale_master_branch_id=' . $this->session->userdata('branch_id') . " AND ";
        //permission data

        if ($y != "") {
            //START => load data to table when page load 
            $data['year'] = $y;
            //$data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_summary where extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(SubTotal) total from v_sale_summary  where $branch extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['total_discount'] = $this->Base_model->get_value_byQuery("select sum(discount) total from v_sale_summary where $branch extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['vat_total'] = $this->Base_model->get_value_byQuery("select sum(tax) total from v_sale_summary where $branch extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['charge_total'] = 0;
            $data['pay_total'] = 0;//$this->Base_model->get_value_byQuery("select sum(pay) total from v_sale_summary where extract(month from date_format(checkout_date,'%Y-%m-%d'))='$m' and extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            $data['credit_paid'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_recieve_amount) as total from customer_credit where extract(month from customer_credit_pay_date)='$m' and extract(year from customer_credit_pay_date)='$y'", 'total');
            $data['credit_discount'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_discount) as total from customer_credit where extract(month from customer_credit_pay_date)='$m' and extract(year from customer_credit_pay_date)='$y'", 'total');
            $data['sale_return'] = 0;//$this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_return_detail where extract(month from return_date)='$m' and extract(year from return_date)='$y'", 'total');
            $data['cogs'] = $this->Base_model->get_value_byQuery("select sum(costing) as total from v_sale_summary where $branch extract(year from date_format(checkout_date,'%Y-%m-%d'))='$y'", 'total');
            //$data['cogs']=0;
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT expense_type_name,expense_type_id,sum(expense_amount) as total_amount FROM v_expense where expense_branch_id=$b and extract(year from expense_date)='$y' group by expense_type_id");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,sum(expense_amount) as expense_amount,expense_type_id FROM v_expense where expense_branch_id=$b and extract(year from expense_date)='$y' group by expense_detail_name");
            // load view when action above finish

            $this->load->view("report/report_profit_lost/frm_get_pnl", $data);
        } else {
            //START => load data to table when page load 

            $data['year'] = $m;
//            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(SubTotal) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['total_discount'] = $this->Base_model->get_value_byQuery("select sum(discount) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['vat_total'] = $this->Base_model->get_value_byQuery("select sum(tax) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['charge_total'] = 0;
            $data['pay_total'] = 0;//$this->Base_model->get_value_byQuery("select sum(pay) total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            $data['credit_paid'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_recieve_amount) as total from customer_credit where extract(year from customer_credit_pay_date)='$m'", 'total');
            $data['credit_discount'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_discount) as total from customer_credit where extract(year from customer_credit_pay_date)='$m'", 'total');
            $data['sale_return'] = 0;//$this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_return_detail where extract(year from return_date)='$m'", 'total');
            $data['cogs'] = $this->Base_model->get_value_byQuery("select sum(costing) as total from v_sale_summary where extract(year from date_format(checkout_date,'%Y-%m-%d'))='$m'", 'total');
            //$data['cogs']=0;
            $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT expense_type_name,expense_type_id,sum(expense_amount) as total_amount FROM v_expense where extract(year from expense_date)='$m' group by expense_type_id");
            $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,sum(expense_amount) as expense_amount,expense_type_id FROM v_expense where extract(year from expense_date)='$m' group by expense_detail_name");
            // load view when action above finish

            $this->load->view("report/report_profit_lost/frm_get_pnl", $data);
        }
    }


    //END => function search 

    public function search_from_to() {
        //START => load data to table when page load

        $date_f = $this->uri->segment(3);
        $date_t = $this->uri->segment(4);
        $b = $this->uri->segment(5);
        $branch=" sale_master_branch_id=$b and";

        $data['year'] = $date_f . '-' . $date_t;
//        $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_summary where date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        $data['sale_total'] = $this->Base_model->get_value_byQuery("select sum(SubTotal) total from v_sale_summary where $branch date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        $data['total_discount'] = $this->Base_model->get_value_byQuery("select sum(discount) total from v_sale_summary where $branch date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        $data['vat_total'] = $this->Base_model->get_value_byQuery("select sum(tax) total from v_sale_summary where $branch date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        $data['charge_total'] = 0;
        $data['pay_total'] = 0;//$this->Base_model->get_value_byQuery("select sum(pay) total from v_sale_summary where date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        $data['credit_paid'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_recieve_amount) as total from customer_credit where customer_credit_pay_date>='$date_f' and customer_credit_pay_date<='$date_t'", 'total');
        $data['credit_discount'] = 0;//$this->Base_model->get_value_byQuery("select sum(customer_credit_discount) as total from customer_credit where customer_credit_pay_date>='$date_f' and customer_credit_pay_date<='$date_t'", 'total');
        $data['sale_return'] = 0;//$this->Base_model->get_value_byQuery("select sum(grand_total) total from v_sale_return_detail where return_date>='$date_f' and return_date<='$date_t'", 'total');
        $data['cogs'] = $this->Base_model->get_value_byQuery("select sum(costing) as total from v_sale_summary where $branch date_format(checkout_date,'%Y-%m-%d')>='$date_f' and date_format(checkout_date,'%Y-%m-%d')<='$date_t'", 'total');
        //$data['cogs']=0;
        $data['record_expense'] = $this->Base_model->loadToListJoin("SELECT expense_type_name,expense_type_id,sum(expense_amount) as total_amount FROM v_expense where expense_branch_id=$b and expense_date>='$date_f' and expense_date<='$date_t' group by expense_type_id");
        $data['record_expense_detail'] = $this->Base_model->loadToListJoin("SELECT expense_detail_name,expense_chart_number,expense_amount,expense_type_id FROM v_expense where expense_branch_id=$b and expense_date>='$date_f' and expense_date<='$date_t'");

        // load view when action above finish  
        // TRANSLATED BY SOPHANITH
        $lang = $this->input->cookie('language');


        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['btn_search'] = $this->lang->line('btn_search');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['lbl_from'] = $this->lang->line('lbl_from');
        $data['lbl_to'] = $this->lang->line('lbl_to');
        $data['btn_year'] = $this->lang->line('btn_year');
        $data['btn_all'] = $this->lang->line('btn_all');
        //END TRAN SLATED
        $this->load->view("report/report_profit_lost/frm_get_pnl", $data);
    }

}
