<?php
class Report_cash_register extends CI_Controller{

    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "Report Purchase Detail ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_cash_register";
        $data['data_cashier'] = $this->Base_model->loadToListJoin("
                 SELECT
                `sm`.sale_master_cash_id AS `cash_id`,
                br.branch_name,
                em.employee_id,
                em.employee_name AS cashier,
                FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ),2) AS sale_amount,
            cr.cash_startdate AS start_date,
            cr.cash_enddate AS end_date,
            FORMAT( cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate), 2 ) AS start_amount,
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2) AS total_amount,
          FORMAT(cr.cash_real_us + cr.cash_real_kh/(select rate_amount from rate),2) AS real_cash

            FROM `sale_master` `sm`
            JOIN cash_register cr ON `sm`.sale_master_cash_id =cr.cash_id
            JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
            LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
            LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
            LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
            LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
            LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
            INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
            WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) AND cr.cash_status LIKE 'FINISH'
            GROUP BY `sm`.sale_master_cash_id");
        $this->load->view("welcome/view",$data);
    }

     public function response(){
        $data['records']=$this->Base_model->loadToListJoin("SELECT
        		`sm`.sale_master_cash_id AS `cash_id`,
        		br.branch_name,
        		em.employee_name AS cashier,
        		FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ),2) AS sale_amount,
        	cr.cash_startdate AS start_date,
        	cr.cash_enddate AS end_date,
        	FORMAT( cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate), 2 ) AS start_amount,
        	FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2) AS total_amount,
          FORMAT(cr.cash_real_us + cr.cash_real_kh/(select rate_amount from rate),2) AS real_cash

        	FROM `sale_master` `sm`
        	JOIN cash_register cr ON `sm`.sale_master_cash_id =cr.cash_id
        	JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
        	LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
        	LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
        	LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
        	LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
        	LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
        	INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
        	WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) AND cr.cash_status LIKE 'FINISH'
        	GROUP BY `sm`.sale_master_cash_id");
            $this->load->view("report/report_stock/response",$data);
     }


     public function responses_search(){
       $cashier_name = $this->input->get("cbo_recorder");
       $date_from    = $this->input->get("txt_date_from");
       $date_to      = $this->input->get("txt_date_until"); 
       $cashier='';
       $query='';

       if($cashier_name !=''){
          $cashier = "and em.employee_id=".$cashier_name;
       }

       if($date_from !='' && $date_to!=""){
           $query = "and DATE_FORMAT(cr.cash_enddate,'%Y-%m-%d') between '$date_from' and '$date_to' ";
       }

       if($date_to!=""){
           $query = "and DATE_FORMAT(cr.cash_enddate,'%Y-%m-%d') ='$date_to' ";
       }

       $data['records'] = $this->Base_model->loadToListJoin("
                SELECT
                `sm`.sale_master_cash_id AS `cash_id`,
                br.branch_name,
                em.employee_id,
                em.employee_name AS cashier,
                FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ),2) AS sale_amount,
            cr.cash_startdate AS start_date,
            cr.cash_enddate AS end_date,
            FORMAT( cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate), 2 ) AS start_amount,
            FORMAT( cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) ) + cr.cash_amount + cr.cash_amount_kh/(select rate_amount from rate) , 2) AS total_amount,
            FORMAT(cr.cash_real_us + cr.cash_real_kh/(select rate_amount from rate),2) AS real_cash

            FROM `sale_master` `sm`
            JOIN cash_register cr ON `sm`.sale_master_cash_id =cr.cash_id
            JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
            LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
            LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
            LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
            LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
            LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
            INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
            WHERE  1=1 and `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) AND cr.cash_status LIKE 'FINISH' $cashier $query
            GROUP BY `sm`.sale_master_cash_id");
            
            $this->load->view("report/report_stock/response", $data);
     }

}
