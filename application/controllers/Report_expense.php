<?php

class Report_expense extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
       
        $data['title'] = "REPORT EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_expense/report_expense";   
        //
        $name=$this->uri->segment(1);

        $data['record_permission']=$this->Base_model->get_permission($name);
        //START => load data to table when page load 
        
        
        
        // load view when action above finish
        
        //BEGIN TRANSLATE
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('expense',$lang=='' ? 'en':$lang);

            $branch="";
            if($this->Base_model->is_supper_user()==false){
                $branch=" and branch_id =".$this->Base_model->branch_id()." ";
            }
             $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");

             $data['lbl_title_expense']  =$this->lang->line('expense_detail_list_name');
            
             $data['lbl_from']              =$this->lang->line('lb_from');
             $data['lbl_to']                =$this->lang->line('lb_to');
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['btn_search']            =$this->lang->line('btn_search');
             $data['btn_new']               =$this->lang->line('lb_new');
             $data['lbl_edit']              =$this->lang->line('lb_edit');
             $data['lbl_action']            =$this->lang->line('lb_action');
             $data['lbl_branch']            =$this->lang->line('lb_branch');
             $data['lbl_chart']             =$this->lang->line('chart');
             $data['lbl_expense_type']      =$this->lang->line('expense_type');
             $data['lbl_expense_name']      =$this->lang->line('expense_name');
             $data['lbl_amount']            =$this->lang->line('amount');
             $data['lbl_recorder']          =$this->lang->line('lb_recorder');
             $data['lbl_expense_date']      =$this->lang->line('expense_date');
             $data['lbl_create_date']       =$this->lang->line('lb_create_date');
             $data['lbl_modified_date']     =$this->lang->line('lb_modified_date');
             $data['lbl_modifier']           =$this->lang->line('lb_modifier');
             $data['lbl_grand_total']       =$this->lang->line('lb_grand_total');
             $data['lbl_expense_branch']       =$this->lang->line('expense_branch');

             $data['lb_expensetype']              =$this->lang->line('expensetype');
             $data['lb_expensename']                =$this->lang->line('expensename');
//end translate
        
        $this->load->view("welcome/view",$data);        
    }

      public function delete_from_detail_list(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('expense','expense_id',$id);
        redirect("report_expense");
    }
    
    //START => function search
    
    public function response(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }

        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM v_expense   WHERE 1=1 $branch");
        $this->load->view("report/report_stock/response", $data);
    }
    
    public function responses(){
        $df =$this->input->get("datefrom");
        $dt =$this->input->get("dateto");
        $expense_name =$this->input->get("txt_expense_name");
        $expense_type =$this->input->get("txt_expense_type");
        $branch_id =$this->input->get("cbo_branch");

        $s_expense_name="";
        if($expense_name!=""){
            $s_expense_name=" AND expense_detail_name='".trim($expense_name)."'";
        }

        $s_expense_type="";
        if($expense_type!=""){
            $s_expense_type=" AND expense_type_name='".trim($expense_type)."'";
        }

        $s_branh_id="";
        if($branch_id!="0"){
            $s_branh_id=" AND expense_branch_id=$branch_id";
        }

        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }

        $str = '';
        if($df !='' && $dt !='')
            $str = " AND DATE_FORMAT(expense_date,'%Y-%m-%d') BETWEEN '$df' and '$dt'";
        $data['records'] = $this->Base_model->loadToListJoin("select * from v_expense where 1=1 $branch $s_branh_id $str $s_expense_name $s_expense_type");
        $this->load->view("report/report_stock/response", $data);
    }


     public function edit_load($id,$branch_id){

        $data['title'] = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report_expense/report_expense_update";

        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch");   


        $data['expense_no']=$id;
        $data['date_now']=date('Y-m-d');
        $data['record_expense_name']=$this->Base_model->get_data("v_expense_type");
        
        $data['branch_id']=$branch_id;
       
       
        //$data['expense_detail_record']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense WHERE expense_status='ACTIVE'");
        //permission data
            $name=$this->uri->segment(1);

             $data['record_permission']=$this->Base_model->get_permission($name);
        //end permission data
        
            // TRANSLATED BY SOPHANITH
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);
        $this->lang->load('expense',$lang=='' ? 'en':$lang);
            
         $data['lbl_title']              =$this->lang->line('expense_addnew_title');
         $data['lbl_date_entry']         =$this->lang->line('date_entry');
         $data['lbl_expense_detail']     =$this->lang->line('expense_detail');
         $data['lbl_amount']             =$this->lang->line('amount');
         $data['lbl_expense_type']       =$this->lang->line('expense_type');
         $data['lbl_description']        =$this->lang->line('lb_desc');
         
         
         $data['lbl_clear']         =$this->lang->line('btn_clear');   
         $data['btn_cancel']            =$this->lang->line('btn_cancel');
         $data['btn_add']               =$this->lang->line('btn_add');
         $data['btn_save']              =$this->lang->line('btn_save');
         $data['lbl_delete']            =$this->lang->line('lb_delete');
         $data['lbl_note_for_form']     =$this->lang->line('val_mess_require');
         $data['lbl_no']                =$this->lang->line('lb_no');
         $data['lbl_create']    =$this->lang->line('lb_create');
        //END TRAN SLATED
        $this->load->view("welcome/view",$data);
    }

    public function response_add_new($id,$branch_id){
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense branch_id ORDER BY expense_id");

         $this->load->view("report/report_stock/response", $data);
    }

    public function search(){
        
        //START => Get Value From Textbox 
        $expense    = $this->input->post("purchaseno");  
        $typename   = $this->input->post("itemname"); 
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        //END => Get Value From Textbox 
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page 
        $data['page'] = "report/report_expense/report_expense";  
        
        //START => load data to table 
        $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense  where expense_created_date = CURDATE() order by expense_id DESC");       
        //END =>  load data to table when load page
        
        
        //BEGIN TRANSLATE
             $lang = $this->input->cookie('language');
             
             $data['lbl_title_expense']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_title_expense");
             $data['lbl_from_date']                 =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_expense_from_date");
             $data['lbl_on_date']                   =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_expense_on_date");
             $data['lbl_search']                    =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_search");
             $data['lbl_close']                     =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_close");
             $data['lbl_report_expense_NO']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","txt_expense_no");
             $data['lbl_report_expense_name']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","txt_expense");
             $data['lbl_report_expense_search_no']  =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","lbl_search_expense_No");
             $data['lbl_report_expense_search_name']=$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","lbl_search_expense_name");
             $data['lbl_report_expense_amount']     =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","txt_amount");
             $data['lbl_report_expense_date']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","txt_date");
             $data['lbl_report_expense_total']      =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","report_expense","form_translate_label_name","txt_total");
             $data['lbl_search']                    =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_search");
             $data['lbl_report_title']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_title_expense");
             $data['lbl_report_daily']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_daily_report");
             
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $data['btn_export']         =$this->lang->line('btn_export');
//end translate
        
        
        //translate
        $lang = $this->input->cookie('language');
         $data['lbl_title_expense']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_title_expense");
         $data['lbl_from_date']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_search","form_translate_label_name","lbl_expense_from_date");
        //end translate
        
        //START => search data 
        if($expense == "" && $typename == "" && $from == "" && $to ==""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense  where employee_brand_id =".$this->Base_model->branch_id()." AND expense_created_date = CURDATE() order by expense_id DESC");
              $data['text_display']="Today Expense Report";
        }else if($expense != "" && $typename == "" && $from == "" && $to ==""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense  where employee_brand_id =".$this->Base_model->branch_id()." AND expense_no='".$expense."'");
              $data['text_display']= 'Expense No : ' . $expense;
        }else if($expense != "" && $typename != "" && $from == "" && $to ==""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense  where employee_brand_id =".$this->Base_model->branch_id()." AND expense_no='".$expense."' and expense_type_name like '".$typename."%' order by expense_no DESC");
            $data['text_display']= 'Expense No : ' . $expense .'<br/>'. 'Type Name : ' . $typename ;
        }
        else if($expense == "" && $typename != "" && $from == "" && $to ==""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense  where employee_brand_id =".$this->Base_model->branch_id()." AND expense_type_name like '".$typename."%'");
             $data['text_display']= 'Type Name : ' . $typename ;
        }
        else if($expense == "" && $typename == "" && $from != "" && $to !=""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense where employee_brand_id =".$this->Base_model->branch_id()." AND expense_created_date BETWEEN '".$from."' and '".$to."' order by expense_no DESC");
             $data['text_display']= 'Date : ' .$from .' -> '.$to;
        }else if($expense == "" && $typename != "" && $from != "" && $to !=""){
            $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense where employee_brand_id =".$this->Base_model->branch_id()." AND expense_created_date BETWEEN '".$from."' and '".$to."' and expense_type_name like '".$typename."%' order by expense_no DESC");
            $data['text_display']= 'Type Name : ' . $typename .'<br/>'.'Date From : ' .$from .' -> '.$to;
        }
        else{
             $data['record_customer'] = $this->Base_model->loadToListJoin("select * from v_expense where employee_brand_id =".$this->Base_model->branch_id()." AND expense_created_date BETWEEN '".$from."' and '".$to."' and expense_type_name like '".$typename."%' and expense_no='".$expense."' order by expense_no DESC");
             $data['text_display']= 'Expense No : ' . $expense .'<br/>'.'Type Name : ' . $typename .'<br/>'.'Date From : ' .$from .' -> '.$to;
        }        
        // END => search Data
        
        // load view when action above finish 
        $this->load->view("welcome/view",$data);
    }
    //END => function search
}
