<?php
class Report_sale_revenue_by_category extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "REPORT SALE REVENUE BY CATEGORY";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_sale/report_sale_revenue_by_category";
        
        $data['date']=date('Y-m-d');
        
        $data['record_revenue']=$this->Base_model->get_data_by("select 
                                
				vd.item_type_name,
				sum(vf.qty) as item_count,
				sum(vf.tax_amount) as tax_amount,
				sum(vf.sub_total) as sub_total,
				sum(vf.discount+vf.discount_dollar+vf.invoice_discount) as total_discount_dollar,
				sum(vf.grand_total) as grand_total,
				vf.end_date,
                                vd.item_type_is_car_wash
				
                                from invoice_finished vf

				inner join v_item_detail vd on vf.item_id=vd.item_detail_id
				where vf.master_status='PAID' and vf.detail_status='PAID'
				group by vd.item_type_id ORDER BY vd.item_type_is_car_wash LIMIT 25");
        
        
        $data['record_cagegory'] = $this->Base_model->get_data_by("SELECT item_type_id,item_type_name FROM item_type");
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);

            $this->lang->load('sale',$lang=='' ? 'en':$lang);
                
             $data['lbl_rev_title']        =$this->lang->line('report_sale_revenue_by_category_list_name');
             $data['lbl_invoice']           =$this->lang->line('invoice_no');
             $data['lbl_rev_qty']          =$this->lang->line('qty');
             $data['lbl_rev_item_type']         =$this->lang->line('item_type');
             $data['lbl_rev_sub_total']        =$this->lang->line('lb_sub_total');
             $data['lbl_rev_total_descount']=$this->lang->line('total_discount');
             $data['lbl_rev_grand_total']   =$this->lang->line('lb_grand_total');
             $data['lbl_rev_cate']   =$this->lang->line('item_type');
             $data['lbl_cashier']           =$this->lang->line('cashier');
             
            
             
             $data['lbl_from']        =$this->lang->line('lb_from');
             $data['lbl_to']          =$this->lang->line('lb_to');
             $data['lbl_no']          =$this->lang->line('lb_no');
             $data['btn_search']      =$this->lang->line('btn_search');
             $data['btn_export']      =$this->lang->line('btn_export');
             
        //END TRANSLATE
        $this->load->view("welcome/view",$data);
        
    }
    
    public function display_table(){
        $data['id']=$this->input->post("id");
        $this->load->view("report/report_sale/response/response_display_table",$data);
    }
    public function response(){
        $data['records'] = $this->Base_model->loadToListJoin("select 

            vd.item_type_name,
            sum(vf.qty) as item_count,
            sum(vf.tax_amount) as tax_amount,
            cast((sum(vf.sub_total))as decimal(18,2)) as sub_total,
            cast((sum(vf.discount+vf.discount_dollar+vf.invoice_discount))as decimal(18,2)) as total_discount_dollar,
            cast((sum(vf.grand_total))as decimal(18,2)) as grand_total,
            vf.end_date,
            vd.item_type_is_car_wash

            from invoice_finished vf

            inner join v_item_detail vd on vf.item_id=vd.item_detail_id
            where vf.master_status='PAID' and vf.detail_status='PAID'
            group by vd.item_type_id ORDER BY vd.item_type_is_car_wash LIMIT 25");
        $this->load->view("report/report_stock/response", $data);
    }
    public function responses(){
        $df = $this->input->get("df");
        $dt = $this->input->get("dt");
        $category = $this->input->get("category");
        
        $q_date = "";
        $q_cate = "";
        
        if($df != "" && $dt != ""){
            $q_date = " and date_format(vf.end_date,'%Y-%m-%d') between '".$df."' and '".$dt."'";
        }
        if($category != 0){
            $q_cate = " and vd.item_type_id = $category";
        }
        $sql = "select 
            vd.item_type_id,
            vd.item_type_name,
            sum(vf.qty) as item_count,
            sum(vf.tax_amount) as tax_amount,
            cast((sum(vf.sub_total))as decimal(18,2)) as sub_total,
            cast((sum(vf.discount+vf.discount_dollar+vf.invoice_discount))as decimal(18,2)) as total_discount_dollar,
            cast((sum(vf.grand_total))as decimal(18,2)) as grand_total,
            vf.end_date,
            vd.item_type_is_car_wash

            from invoice_finished vf

            inner join v_item_detail vd on vf.item_id=vd.item_detail_id
            where vf.master_status='PAID' and vf.detail_status='PAID' $q_date $q_cate
            group by vd.item_type_id ORDER BY vd.item_type_is_car_wash";
        $data['records'] = $this->Base_model->loadToListJoin($sql);
        //echo $sql;
        $this->load->view("report/report_stock/response", $data);
    }
}
