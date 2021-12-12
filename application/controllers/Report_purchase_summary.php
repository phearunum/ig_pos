<?php
class Report_purchase_summary extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $user_id = $this->session->userdata("user_id");
        if(empty($user_id))
         redirect(site_url(),'logout');
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
        $data['title'] = "Report Purchase Summary ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "report/report_purchase_summary/report_purchase_summary";        
        //START => load data to table when page load 
        $data['record_customer']=$this->Base_model->loadToListJoin("select * from v_purchase_sammary  where purchase_created_date= CURDATE() and  employee_brand_id = '".$this->session->userdata('branch_id')."'");
        $data['text_display'] = 'Today Purchase Summary Report';
        
        $data['date_from']=date('');
        $data['date_until']=date('');
        
         //$data['record_item_detail']=$this->Base_model->get_data("v_item_detail");
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase_sammary");  
        
        $data['recorder']= $this->Base_model->loadToListJoin("select employee_name as recorder,employee_brand_id from v_purchase_detail where  employee_brand_id = '".$this->session->userdata('branch_id')."' GROUP BY employee_name");
        $data['supplier']= $this->Base_model->loadToListJoin("select supplier_name,employee_brand_id  from v_purchase_sammary where  employee_brand_id = '".$this->session->userdata('branch_id')."' group by supplier_name");
        // load view when action above finish
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        if($lang==''){
            $lang='en';
        }
        $data['lbl_title'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_title");
        $data['lbl_po'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_po");
        $data['lbl_sup'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_supplier");
        $data['lbl_total'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_total");
        $data['lbl_status'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_status");
        $data['lbl_recorder'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_recorder");
        $data['lbl_create_date'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_created_date");
        $data['lbl_deposit'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_deposit");
        $data['lbl_grand'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_grand");
        $data['lbl_total_not'] = $this->Base_model->get_value_two_cond("form_translate", "form_translate_label_name_" . $lang, "form_translate_form_name", "report_purchase_summary", "form_translate_label_name", "lbl_total_not_us");

        $this->lang->load('content', $lang == '' ? 'en' : $lang);
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['btn_search']  = $this->lang->line('btn_search');
        $data['lbl_new']  = $this->lang->line('lbl_new');
        $data['lbl_edit']  = $this->lang->line('lbl_edit');
        $data['lbl_from']   =$this->lang->line('lbl_from');
        $data['lbl_to']   =$this->lang->line('lbl_to');
        
        $this->load->view("welcome/view",$data);        
    }
    
    public function response(){
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str=$view_all==1?'':" and employee_brand_id = ".$this->session->userdata('branch_id')." and employee_id=".$this->session->userdata('user_id');
        
        
        $edit = 0;
        $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
        $concate = "";
        if($edit==1){
            $concate=",purchase_no_link as purchase_click ";
        }
        else{
            $concate=",purchase_no as purchase_click ";
        }
        $query = "SELECT *$concate FROM v_purchase_sammary where 1=1 $str limit 50";
            
            
        //end permission data        
        $data['records']=$this->Base_model->loadToListJoin($query);
        
        $this->load->view("report/report_stock/response",$data);
        
    } 
    public function responses(){
        
        $df= $this->input->get("df");
        $dt= $this->input->get("dt");        
        $customer_name= $this->input->get("customer_name");        
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str=$view_all==1?'':" and employee_brand_id = ".$this->session->userdata('branch_id')." and employee_id=".$this->session->userdata('user_id');
        
        //end permission data
        
        $q_name='';
        $date = '';
        if($customer_name != ""){
            $q_name = " and supplier_name like '".$customer_name."'";          
        }
        if($df != '' && $dt != ''){
            $date = " and purchase_created_date between '".$df."' and '".$dt."'";
        }
        
        $edit = 0;
        $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
        $concate = "";
        
        if($edit==1){
            $concate=",purchase_no_link as purchase_click ";
        }
        else{
            $concate=",purchase_no as purchase_click ";
        }
        $query = "SELECT *$concate FROM v_purchase_sammary where 1=1 $str ";
        
        
        $query_str =$query.$str.$date.$q_name;
        $data['records']=$this->Base_model->loadToListJoin($query_str);
        //echo "<script>alert('$query_str')</script>";
        $this->load->view("report/report_stock/response",$data);
    }
    public function view_detail(){
        
        $data['title'] = "PURCHASE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/report_purchase_summary/purchase_invoice";
        $purchase_no=$this->uri->segment(3);        
        $data['brand_id'] = $this->Base_model->loadToListJoin("SELECT * FROM company_profile where company_profile_id =".$this->session->userdata('branch_id') );
      
        //purchase master
        $purchase_detail = $this->Base_model->loadToListJoin("Select * FROM v_purchase_sammary where purchase_no =".$purchase_no); 
        
        $purchase_master_no = '';
        $purchase_created_date = '';
        $created_by = '';
        $supplier_id = '';
        $total_master= 0;
        $deposit= 0;
        
        foreach ($purchase_detail as $pd){
            $purchase_master_no = $pd->purchase_no;
            $purchase_created_date = $pd->purchase_created_date;
            $created_by = $pd->recorder;
            $supplier_id =$pd->supplier_id;
            $total_master = $pd->total;
            $deposit = $pd->purchase_deposit;
        }
        //purchase Detail
        $purchase_detail_view = $this->Base_model->loadToListJoin("Select * FROM v_purchase_detail where purchase_no =".$purchase_no); 
        
        $no = 0;
        $item_name = '';
        $qty = 0;
        $price =0;
        $amount = 0;
        $total_amount = 0;
       
        $ballance = 0;
        
        foreach ($purchase_detail_view as $pdv){
            $item_name = $pdv->item_detail_name;
            $qty = $pdv->purchase_detail_qty;
            $price =$pdv->purchase_detail_unit_cost;
            $amount =$pdv->total;           
                    
            $no++;
        }       
        
        $supplier= $this->Base_model->loadToListJoin("Select * FROM supplier where supplier_id =".$supplier_id); 
        
        $supplier_name = '';
        $suppler_address ='';
        $supplier_phone ='';
        foreach ($supplier as $sp){
            
            $supplier_name = $sp->supplier_name;
            $supplier_phone = $sp->supplier_phone;
            $suppler_address = $sp->supplier_address ;
        }
        
        
        //assign purchase master        
        $data['purchase_master_no'] =$purchase_master_no;
        $data['purchase_created_date'] =$purchase_created_date;
        $data['created_by'] =$created_by;
        $data['supplier_id'] =$supplier_id;
        
        //assign purchase master        
        $data['no'] =$no;
        $data['item_name'] =$item_name;
        $data['qty'] =$qty;
        $data['price'] =$price;        
        $data['amount'] =$amount;
        $data['total_amount'] =$total_amount;
        $data['deposit'] =$deposit;
        $data['ballance'] = $amount -  $deposit;
        
         //assign purchase master        
        $data['supplier_name'] =$supplier_name;
        $data['suppler_address'] =$suppler_address;
        $data['supplier_phone'] =$supplier_phone;
         
        $data['purchase_detail_all'] = $this->Base_model->loadToListJoin("Select * FROM v_purchase_detail where purchase_no =".$purchase_no);      
                
        $this->load->view("welcome/view",$data);
        
    }
     
}
