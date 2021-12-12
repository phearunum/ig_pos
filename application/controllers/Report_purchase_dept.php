<?php
class Report_purchase_dept extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index() {
        $data['title']  = "Supplier Debit";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
         $data['page']   = "purchase/purchase_new/purchase_debit_list";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");
        //permission data
        $name = $this->uri->segment(1);
        $getid = $this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='" . $name . "' AND position_id=" . $this->Base_model->position_id());
        $id = 0;
        
        foreach ($getid as $g) {
            $id = $g->permission_id;
        }

        $data['record_permission'] = $this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=" . $id);
        //BEGIN TRANSLATE
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('purchase',$lang=='' ? 'en':$lang);
        $data['lbl_title'] = $this->lang->line('report_purchase_dept_list');
        $data['lbl_po'] = $this->lang->line('po_number');
        $data['lbl_po_date'] = $this->lang->line('po_date');
        $data['lbl_sup_phone'] = $this->lang->line('supplier_phone');
        $data['lbl_credit'] = $this->lang->line('credit');
        $data['lbl_due_date'] = $this->lang->line('due_date');
        $data['lbl_status'] = $this->lang->line('status');
        $data['lbl_total'] = $this->lang->line('lb_total');
        $data['lbl_grand_total'] = $this->lang->line('lb_grand_total');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['btn_export'] = $this->lang->line('btn_export');
        $data['btn_search']  = $this->lang->line('btn_search');
        $data['lbl_from']   =$this->lang->line('lb_from');
        $data['lbl_to'] =$this->lang->line('lb_to');
        $data['lbl_no'] =$this->lang->line('lb_no');
        $data['lbl_new'] = $this->lang->line('lb_new');
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_view'] = $this->lang->line('lb_view');
        $data['lbl_branch'] = $this->lang->line('branch');
        $data['lbl_allbranch'] = $this->lang->line('allbranch');
        $data['lbl_recorder'] = $this->lang->line('lb_recorder');
        $this->load->view("welcome/view", $data);
    }
    public function response(){        
        //permission data
            $branch=$this->Base_model->branch_id();
           $name=$this->uri->segment(1);
           $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
           $id=0;          
           foreach($getid as $g){
               $id=$g->permission_id;
           }
           
            $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
            $str=$view_all==1?'':' and employee_brand_id  ='.$this->Base_model->branch_id();
            
            $edit = 0;
            $edit=$this->Base_model->get_value("permission","permission_edit","permission_id",$id);
            
        //end permission data
         $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and purchase_branch_id =".$this->Base_model->branch_id()." ";
        }  
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase where status=1 $branch");
        
        $this->load->view("report/report_stock/response",$data);
    }

    public function responses() {    
        $branch=$this->Base_model->branch_id();    
     
        $start_date= $this->input->get("df");
        $end_date= $this->input->get("dt");        
        $sup_id=$this->input->get('sup_id');
        $po_id=$this->input->get('invoice');
        $branch_id=$this->input->get('branch_id');
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and purchase_branch_id =".$this->Base_model->branch_id()." ";
        }

        $dates="";
        $sup="";
        $po="";
        $s_branch="";
        
        if($start_date!="" && $end_date!="" && $start_date!=null && $end_date!=null){
            $dates=" and purchase_created_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
        
        if($sup_id!="" && $sup_id!=null){
            $sup=' and purchase_supplier_id='.$sup_id.' ';
        }
        if($po_id!=""&&$po_id!=null){
            $po=' and purchase_no='.$po_id.' ';
        }
        if($branch_id!=0){
            $s_branch=" and purchase_branch_id=$branch_id";
        }
       
        $data['records'] = $this->Base_model->loadToListJoin("select * from v_purchase where status=1 $dates $sup $po $branch $s_branch");
        $this->load->view("report/report_stock/response",$data);
    }

    public function addnew_pay($id){
       
        $data['title'] = "Purchase Pay";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "purchase/purchase_new/frm_pay_purchase";
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $data['date_now']=$date->format('Y-m-d');
        $data['id']=$id;
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);
        $this->lang->load('validation',$lang=='' ? 'en':$lang);
        $this->lang->load('lable',$lang=='' ? 'en':$lang);

        $this->lang->load('purchase',$lang=='' ? 'en':$lang);
        $data['lbl_title'] = $this->lang->line('report_purchase_dept_addnew_list');
        $data['lbl_sup'] = $this->lang->line('supplier');
        $data['lbl_total_credit_amount'] = $this->lang->line('total_credit_amount');
        $data['lbl_pay_date'] = $this->lang->line('po_pay_pay_date');
        $data['lbl_amount'] = $this->lang->line('amount');
        $data['lbl_desc'] = $this->lang->line('lb_desc');
        $data['lbl_amount_paid'] = $this->lang->line('amount_paid');
        $data['lbl_grand_total'] = $this->lang->line('lb_grand_total');       
      
        $data['lbl_edit'] = $this->lang->line('lb_edit');
        $data['lbl_delete'] = $this->lang->line('lb_delete');
        $data['lbl_recorder'] = $this->lang->line('lb_recorder');
        $data['btn_save'] = $this->lang->line('btn_save');
        $data['btn_cancel'] = $this->lang->line('btn_cancel');
        $data['lbl_no'] = $this->lang->line('lb_no');
        $data['lbl_create_date'] = $this->lang->line('lb_create_date');
  
        
        $this->load->view("welcome/view",$data);
    }

    public function load_master($id) {
       $supplier=$this->Base_model->get_value_sql("select supplier_name from v_purchase where purchase_no=$id","supplier_name");
       $total_pay=$this->Base_model->get_value_sql("select sum(purchase_pay_amount) as total from purchase_pay where purchase_no=$id","total");
       $total_master=$this->Base_model->get_value_sql("select ifnull(purchase_total_amount,0) as total from purchase where purchase_no=$id","total");
       $total_deposit=$this->Base_model->get_value_sql("select ifnull(purchase_deposit,0) as total from purchase where purchase_no=$id","total");
       $total_discount=$this->Base_model->get_value_sql("select ifnull(purchase_discount,0) as total from purchase where purchase_no=$id","total");
       $total_return=$this->Base_model->get_value_sql("select ifnull(purchase_return_total_amount,0) as total from purchase_return where purchase_no=$id","total");
       //$total_discount=$this->Base_model->get_value_sql("select purchase_discount as total from purchase where purchase_no=$id","total");
       $total_discount=number_format(($total_discount/100)*$total_master, 5, '.', '');
       $total_pay=number_format($total_pay, 5, '.', '');
       $total_master=number_format($total_master, 5, '.', '');
       $total_deposit=number_format($total_deposit, 5, '.', '');
       if($total_return!="" && $total_return!=null){
            $total_return=number_format($total_return, 5, '.', '');
       }else{
            $total_return=0;
       }
       
      
       $total_pay=number_format($total_pay, 5, '.', '');     
                $arr=array(
                    'supplier'=>$supplier,
                    'credit'=>($total_master+$total_return)-($total_pay+$total_deposit+$total_discount),
                    'total_pay'=>$total_pay,
                  
                 
                );
            
             echo json_encode($arr);            //echo json_encode($result);
         

    }
    public function load_all($id) {
       // $id = $this->input->post("item_id");
        $result = $this->Base_model->get_data_by("select * from v_purchase_pay where purchase_no=" . $id . " ");
        if ($result != "") {


            echo json_encode($result);
        } else {
            $response["success"] = 0;
            $response["statusCode"] = 'E0001';
            $response["message"] = "Data null!";
            echo json_encode($response);
        }
    }

    public function save(){
        $po=$this->input->post('po');
        $dates=$this->input->post('dates');
        $pay=$this->input->post('pay');
        $desc=$this->input->post('desc');
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $user=$this->Base_model->user_id();
        //$pay_id=$this->input->post('pay_id');

        $data=array(
            'purchase_no'=>$po,
            'purchase_pay_date'=>$dates,
            'purchase_pay_amount'=>$pay,
            'purchase_pay_note'=>$desc,
            'purchase_pay_created_by'=>$user,
            'purchase_pay_created_date'=>$date->format('Y-m-d H:i:s')
        );

        $this->Base_model->save('purchase_pay',$data);
        $this->update_credit($po);
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been inserted!!";
        echo json_encode($response);
        
    }

    public function delete(){
        $po_pay_id=$this->input->post('po_pay_id');
        $po_id=$this->input->post('po_id');
       
     
        $this->Base_model->delete_by('purchase_pay', 'purchase_pay_id', $po_pay_id);
        $this->update_credit($po_id);
     

        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been deleted!!";
        echo json_encode($response);
    }

    private function update_credit($id){
        $total_pay=$this->Base_model->get_value_sql("select sum(purchase_pay_amount) as total from purchase_pay where purchase_no=$id","total");
        $total_master=$this->Base_model->get_value_sql("select purchase_total_amount as total from purchase where purchase_no=$id","total");
        $total_deposit=$this->Base_model->get_value_sql("select purchase_deposit as total from purchase where purchase_no=$id","total");
        $total_discount=$this->Base_model->get_value_sql("select purchase_discount as total from purchase where purchase_no=$id","total");
        $total_return=$this->Base_model->get_value_sql("select purchase_return_total_amount as total from purchase_return where purchase_no=$id","total");
        
        $total_discount=number_format(($total_discount/100)*$total_master, 5, '.', '');
        $total_pay=number_format($total_pay, 5, '.', '');
        $total_deposit=number_format($total_deposit, 5, '.', '');
       
        $total_master=number_format($total_master, 5, '.', '');
        if($total_return!="" && $total_return!=null){
            $total_return=number_format($total_return, 5, '.', '');
       }else{
            $total_return=0;
       }
        //update status paid or credit in po master
        if(($total_pay+$total_deposit+$total_discount)==($total_master+$total_return)){
             $this->Base_model->updates('purchase',array('purchase_no'=>$id),array('status'=>0));
        }else{
            $this->Base_model->updates('purchase',array('purchase_no'=>$id),array('status'=>1));
        }
    }



}
