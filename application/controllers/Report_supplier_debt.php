<?php
class report_supplier_debt extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }

    public function index() {
        $data['title']  = "REPORT SUPPLIER DEBT";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "report/report_supplier_debt/report_supplier_debt";
        $data['date_from']=date('');
        $data['date_until']=date('');

        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where branch_status=1 $branch");
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;

        foreach ($getid as $g) {
            $id = $g->permission_id;
        }
        $data['record_permission'] = $this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=" . $id);
        //end permission data
        
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('purchase',$lang=='' ? 'en':$lang);
        $data['lbl_title'] = $this->lang->line('report_supplier_debt_list');
        $data['lbl_po'] = $this->lang->line('po_number');
        $data['lbl_credit'] =$this->lang->line('credit');
    
        //$data['lbl_pv'] =$this->lang->line('');
        $data['lbl_paid_date'] =$this->lang->line('paid_date');
        $data['lbl_paid'] = $this->lang->line('total_paid');
        $data['lbl_update'] =$this->lang->line('lb_update');
        $data['lbl_allbranch'] = $this->lang->line('allbranch');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['lbl_branch'] = $this->lang->line('branch');
       
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['btn_search']  = $this->lang->line('btn_search');
        $data['lbl_from']   =$this->lang->line('lb_from');
        $data['lbl_to'] =$this->lang->line('lb_to');
        $data['lbl_no'] =$this->lang->line('lb_no');
        
        $this->load->view("welcome/view", $data);
    }
    public function response(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and purchase_branch_id =".$this->Base_model->branch_id();
        }         
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase_pay  where purchase_pay_amount <> 0 $branch");
        $this->load->view("report/report_stock/response",$data);
    } 
    public function responses(){
        
        $df= $this->input->get("df");
        $dt= $this->input->get("dt");        
        $supplier_name= $this->input->get("supplier_name");  
        $invoice= $this->input->get("invoice"); 
        $branch_id=$this->input->get('branch_id');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and purchase_branch_id =".$this->Base_model->branch_id()." ";
        }
        
        $query='';
        if($supplier_name != ""){
            $query = " and supplier_name like '%".$supplier_name."%' ";          
        }
        if($invoice!=null){
            $query = " and purchase_no like '%$invoice%' ";
        }
        if($df != "" && $dt != ""){
            $query = " and purchase_pay_date between '".$df."' and '".$dt."' ";
        }
        if($branch_id!=0){
            $query=" and purchase_branch_id=$branch_id";
        }
        $query_str = "select * from v_purchase_pay where purchase_pay_amount<>0 ".$query.$branch;
        $data['records']=$this->Base_model->loadToListJoin($query_str);
        $this->load->view("report/report_stock/response",$data);
    }

}
