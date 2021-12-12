<?php

class Expense extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    } 
    
    public function index(){
        $data['title']  = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "expense/list_summary_expense";
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch AND branch_status!=0");
        
        $data['text_display'] = '' ; 
        //permission data
            $name=$this->uri->segment(1);
            // $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            // $id=0;

            // foreach($getid as $g){
            //     $id=$g->permission_id;
            // }
            // $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
            $data['record_permission']=$this->Base_model->get_permission($name);
            
           // $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
           // $str=$view_all==1?'':' expense_created_by='.$this->session->userdata('user_id')." AND ";
        //end permission data
       // $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->session->userdata('branch_id')."' group by expense_no order by expense_id desc");
        //$data['recorder']= $this->Base_model->loadToListJoin("select employee_name as recorder,employee_brand_id from v_purchase_detail where  employee_brand_id = '".$this->session->userdata('branch_id')."' GROUP BY employee_name");
        
        // TRANSLATED BY SOPHANITH
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('expense',$lang=='' ? 'en':$lang);
                
          
                
             $data['lbl_title']              =$this->lang->line('expense_list_name');
             $data['lbl_date_entry']         =$this->lang->line('date_entry');
             $data['lbl_amount']             =$this->lang->line('lb_total');
             $data['lbl_total']              =$this->lang->line('lb_total');
             $data['lbl_grand_total']        =$this->lang->line('lb_grand_total');
             $data['btn_search']            =$this->lang->line('btn_search');
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['lbl_delete']            =$this->lang->line('lb_delete');
             $data['lbl_new']              =$this->lang->line('lb_new');
             $data['lbl_no']                =$this->lang->line('lb_no');
             $data['lbl_recorder']          =$this->lang->line('lb_recorder');
             $data['lbl_from']              =$this->lang->line('lb_from');
             $data['lbl_to']                =$this->lang->line('lb_to');
             $data['lbl_action']                =$this->lang->line('action');
             $data['lbl_expenseno']                =$this->lang->line('expenseno');
             $data['lbl_allbranch']                =$this->lang->line('allbranch');
             $data['lbl_branch']                =$this->lang->line('branch');
             $data['lbl_edit']                =$this->lang->line('edit');
             $data['lbl_delete']                =$this->lang->line('delete');
        //END TRAN SLATED
        $this->load->view("welcome/view",$data);
    }
    public function load_expense_detail($id){
        $result=$this->Base_model->loadToListJoin("select expense_detail_id,expense_detail_name from expense_detail where expense_detail_status=1 and  expense_type_id=$id");
        echo json_encode($result);
    }
    public function response_add_new($id,$branch_id){
        $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense WHERE expense_no=$id and expense_branch_id=$branch_id order by expense_id");
    /*    $data['records']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense WHERE expense_no=$id and expense_branch_id=$branch_id order by expense_id");*/
         $this->load->view("report/report_stock/response", $data);
    }
    public function response(){
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['records']=$this->Base_model->loadToListJoin("SELECT 
            expense_id,expense_no,expense_nos,expense_no_prefix, SUM(expense_amount) AS total,
            recorder,branch_name,expense_branch_id as branch_id,
            expense_created_date
        FROM v_expense WHERE 1=1 $branch
        GROUP BY expense_no,expense_branch_id
        ORDER BY expense_id DESC");
        $this->load->view("report/report_stock/response",$data);
    }
    public function responses(){
        $datefrom = $this->input->get("datefrom");
        $dateto = $this->input->get("dateto");
        $expense_no   =$this->input->get("txt_expense_no");
        $branch_id   =$this->input->get("cbo_branch");

        $between_date="";
        if($datefrom!="" && $dateto!=""){
            $between_date=" AND expense_date BETWEEN '".$datefrom."' AND '".$dateto."'";
        }

        $s_expense_no="";
        if($expense_no!=""){
            $s_expense_no=" AND expense_nos= '".trim($expense_no)."'";
        }

        $s_branh_id="";
        if($branch_id!="0"){
            $s_branh_id=" AND expense_branch_id=$branch_id";
        }



        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and expense_branch_id =".$this->Base_model->branch_id()." ";
        }
        
        $str = "";
        if($datefrom!='' && $dateto!='')
            $str.=" and expense_created_date BETWEEN '$datefrom' and '$dateto'";
        $data['records']=$this->Base_model->loadToListJoin("SELECT 
            expense_id,expense_no,expense_nos,expense_no_prefix, SUM(expense_amount) AS total,
            recorder,branch_name,
            expense_created_date
       
        FROM v_expense WHERE 1=1 $branch $s_branh_id $s_expense_no $between_date
        GROUP BY expense_no,expense_branch_id
        ORDER BY expense_id DESC");
        $this->load->view("report/report_stock/response",$data);
    }
    public function save(){
        $data=$this->input->post('data');
        $branch=$this->input->post('branch');
        $da=json_decode($data);
        $expense_no=$this->get_invoice_no($branch);
        foreach ($da as $d) {
           $data = array(
                'expense_no'                      => $expense_no,
                'expense_type_id'                 => $d->type_id,
                'expense_detail_id'               => $d->id,
                'expense_amount'                  => $d->amount,
                'expense_date'                    => $d->e_date,
                'expense_created_date'            => date('Y-m-d'),
                'expense_created_by'              => $this->Base_model->user_id(),
                'expense_status'                  => 'DONE',
                'expense_des'                     => $d->desc,
                'expense_branch_id'               =>$branch
            );
         $this->Base_model->save('expense',$data);
        }
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been saved!!";
        echo json_encode($response);
    }
    public function save_add(){                  
        $edit=$this->input->post('edit');
        $expense_no=$this->input->post('expense_no');
        $e_date=$this->input->post('e_date');
        $type=$this->input->post('type');
        $detail_id=$this->input->post('detail_id');
        $amount=$this->input->post('amount');
        $desc=$this->input->post('desc');
        $branch_id=$this->input->post('branch_id');
        if($edit==""){
            //add
             $data = array(
                'expense_no'                      => $expense_no,
                'expense_type_id'                 => $type,
                'expense_detail_id'               => $detail_id,
                'expense_amount'                  => $amount,
                'expense_date'                    => $e_date,
                'expense_created_date'            => date('Y-m-d'),
                'expense_created_by'              => $this->Base_model->user_id(),
                'expense_status'                  => 'DONE',
                'expense_des'                     => $desc,
                'expense_branch_id'                 =>$branch_id

            );
        $this->Base_model->save('expense',$data);
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been saved!!";
        }else{
            //update
             $data = array(
                'expense_no'                      => $expense_no,
                'expense_type_id'                 => $type,
                'expense_detail_id'               => $detail_id,
                'expense_amount'                  => $amount,
                'expense_date'                    => $e_date,
                'expense_created_date'            => date('Y-m-d'),
                'expense_created_by'              => $this->Base_model->user_id(),
                'expense_status'                  => 'DONE',
                'expense_des'                     => $desc,
                'expense_branch_id'                 =>$branch_id
            );
            $this->Base_model->update('expense','expense_id',$edit,$data);
            $response["success"] = 1;
            $response["statusCode"] = 'S0001';
            $response["message"] = "Record has been updated!!";
        }
        echo json_encode($response);
    }
    public function del_detail(){                  
        $id=$this->input->post('id'); 
        $this->Base_model->delete_by('expense','expense_id',$id);
        $response["success"] = 1;
        $response["statusCode"] = 'S0001';
        $response["message"] = "Record has been delete!!";
        echo json_encode($response);
    }

    function view_detail(){
        $data['title'] = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/list_expense_view_detail";
        $expense_no=$this->uri->segment(3);
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str=$view_all==1?'':' expense_created_by='.$this->Base_model->user_id()." AND ";
        
        $data['expense_detail_record']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense WHERE ".$str." expense_no=".$expense_no);
        
        
             // TRANSLATED BY SOPHANITH
            $lang = $this->input->cookie('language');
            $this->lang->load('button',$lang=='' ? 'en':$lang);
            $this->lang->load('validation',$lang=='' ? 'en':$lang);
            $this->lang->load('lable',$lang=='' ? 'en':$lang);
            $this->lang->load('expense',$lang=='' ? 'en':$lang);
                
             $data['lbl_title']              =$this->lang->line('view_expense_list_name');
             $data['lbl_date_entry']         =$this->lang->line('date_entry');
             $data['lbl_expense_detail']     =$this->lang->line('expense_detail');
             $data['lbl_amount']             =$this->lang->line('amount');
             $data['lbl_expense_type']       =$this->lang->line('expense_type');
             $data['lbl_description']        =$this->lang->line('lb_desc');
             $data['lbl_total']              =$this->lang->line('lb_total');
             $data['lbl_grand_total']        =$this->lang->line('lb_grand_total');
             $data['lbl_chart_no']           =$this->lang->line('chart');

             $data['btn_search']            =$this->lang->line('btn_search');
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['btn_save']              =$this->lang->line('btn_save');
             $data['lbl_delete']            =$this->lang->line('lb_delete');
             $data['lbl_new']               =$this->lang->line('lb_new');
             $data['lbl_no']                =$this->lang->line('lb_no');
             $data['lbl_edit']              =$this->lang->line('lb_edit');
             $data['lbl_recorder']          =$this->lang->line('lb_recorder');
        //END TRAN SLATED

        $this->load->view("welcome/view",$data);
    }
    public function delete_by_expense_no(){
        $id=$this->uri->segment(3);
        $b=$this->uri->segment(4);
   
        $this->Base_model->run_query("delete from expense where expense_no=$id and expense_branch_id=$b");
        redirect("expense");
    }
    public function delete_by_view_detail(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('expense','expense_id',$id);
        redirect("expense");
    }
    public function delete_from_detail_list(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('expense','expense_id',$id);
        redirect("report_expense");
    }
    public function addnew(){
        $data['title'] = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/frm_expense";
        $data['expense_no']="";
        $data['date_now']=date('Y-m-d');
        $data['record_expense_name']=$this->Base_model->get_data("v_expense_type");
        $data['branch_id']=0;
        $branch="";
        if($this->Base_model->is_supper_user()==false){
            $branch=" and branch_id =".$this->Base_model->branch_id()." ";
        }
        $data['branch']= $this->Base_model->loadToListJoin("SELECT * FROM branch where 1=1 $branch");
        //$data['expense_detail_record']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense WHERE expense_status='ACTIVE'");
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
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
    public function edit_load($id,$branch_id){

        $data['title'] = "EXPENSE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "expense/frm_expense";

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
    
    public function get_invoice_no($branch){
        $invNO=0;
        
        $records=$this->Base_model->loadToListJoin("SELECT max(expense_no) as no FROM expense where expense_branch_id=$branch");
                     
            foreach($records as $inv){
                $iv=$inv->no;
                if($iv>0){
                    $invNO=$iv+1;
                }else{
                    $invNO=1;
                }
                return $invNO;
            }     
    }
    
    
    public function update(){
        $date_time = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $expense_id=$this->input->post("txt_expense_id");
        $expense_no=$this->input->post("txtno");
        $expense_type_id=$this->input->post('cbo_expense_name');
        $expense_name=$this->input->post("cbo_expense_detail");
        $amount=$this->input->post('txt_amount');
        $date_input=$this->input->post("txt_date");
        $desc=$this->input->post('txtDesc');
        $date=$date_input=""?date('Y-m-d'):$date_input;
        $data = array(
                    'expense_type_id'                 => $expense_type_id,
                    'expense_amount'                  => $amount,
                    'expense_detail_id'               => $expense_name,
                    'expense_date'                    => $date,
                    'expense_modified_date'           => $date_time->format('Y-m-d h:i:s'),
                    'expense_modified_by'             => $this->Base_model->user_id(),
                    'expense_des'                     => $desc
                );
            
            $this->Base_model->update('expense','expense_id',$expense_id,$data);
            
            //redirect("expense/view_detail/".$expense_no);
            redirect("expense");
    }
    
    public function pay(){
            $no=$this->input->post("txtno");
            
            //UPDATE PURCHASE DETAIL
            $record_expense_detail=array(
                'expense_status'    => "DONE"
            );
           
            $this->Base_model->update('expense','expense_no',$no,$record_expense_detail);
            //END
            
            redirect('expense');
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->delete_by('expense','expense_id',$id);
        redirect("expense/addnew");
    }
    
    public function checkValidation($field1,$field2,$tblname,$txt1,$txt2){
                    
                    $this->db->select($field1);
                    $this->db->select($field2);
                    $this->db->from($tblname);
                    $this->db->where($field1,$txt1);
                    $this->db->where($field2,$txt2);
                    
                    $query=$this->db->get();
                    if($query->num_rows()>0){
                        //Order information here...
                        $this->index();
                        exit();
                    }
    }
    
    public function getuser(){
     $id['id']=$this->uri->segment(3);
     $this->load->view('expense/getuser',$id);
    }
    
    public function getlist(){
        
        $id=$this->uri->segment(3);
        $record=$this->Base_model->loadToListJoin('SELECT * FROM tbl_itemdetail WHERE NAME="'.$id."'");  
        foreach($record as $item){    
        $this->load->view('expense/getlist');
        
        }
    }    
    //START => function search
    public function search(){
        
        //START => Get Value From Textbox 
        $purchaseno = $this->input->post("purchaseno");        
        $from       = $this->input->post("datefrom");
        $to         = $this->input->post("dateto");
        $recorder   = $this->input->post("recorder");       
        //END => Get Value From Textbox        
        
        $data['title'] = "Report Purchase Summary";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        // load page (report/report_purchase_detail/report_purchase_detail)
        $data['page'] = "expense/list_summary_expense";  
        
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;
            
            foreach($getid as $g){
                $id=$g->permission_id;
            }
        
        $view_all=$this->Base_model->get_value("permission","permission_viewall","permission_id",$id);
        $str=$view_all==1?'':' expense_created_by='.$this->Base_model->user_id()." AND ";
        
        
        //START => load data to table 
        $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' group by expense_no order by expense_id desc limit 100");
        //END =>  load data to table when load page
        
        $data['text_display'] = '<b style=\'color:red; font-size:20px;\'> Your Query doesn\'t much.</b><br/> <i style=\'font-size:18px; font-weight:bold\'>Show Today Report only</i>' ; 
        
        // START => search data  
       
        // Search Empty textbox and combox (Line 1)
        if($purchaseno == ""  && $from == "" && $to =="" && $recorder == "0" ){
            $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' group by expense_no order by expense_id desc limit 100");
            $data['text_display'] = 'Expense List';        
        }
        // Search by Purchase NO (Line 2)
        else if($purchaseno != ""  && $from == "" && $to =="" && $recorder == "0" ){
            $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' and expense_no=".$purchaseno." group by expense_no order by expense_id desc");
            $data['text_display'] = 'Expense No : '. $purchaseno ;
        }
        // Search by Purchase NO (Line 2)
        else if($purchaseno == ""  && $from == "" && $to =="" && $recorder != "0" ){
            $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' AND recorder ='".$recorder."' group by expense_no order by expense_id desc");
            $data['text_display'] = 'Recorder : '. $recorder ;
        }
        else if($purchaseno == ""  && $from != "" && $to !="" && $recorder == "0" ){
            $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' AND  expense_created_date BETWEEN '".$from."' AND '".$to."' group by expense_no order by expense_id desc");
            $data['text_display'] = 'Date : '. $from .' -> ' . $to ;
        }
        else if($purchaseno == ""  && $from != "" && $to !="" && $recorder != "0" ){
            $data['expense_summary_record']=$this->Base_model->loadToListJoin("SELECT expense_id,expense_no,sum(expense_amount)as total,recorder,expense_created_date,employee_brand_id FROM v_expense where ".$str." employee_brand_id='".$this->Base_model->branch_id()."' AND  expense_created_date BETWEEN '".$from."' AND '".$to."' AND recorder ='".$recorder."'  group by expense_no order by expense_id desc");
            $data['text_display'] = 'Date : '. $from .' -> ' . $to .'<br/> Recorder : ' .$recorder ;
        }
       
        // End Searching data
        
        $data['recorder']= $this->Base_model->loadToListJoin("select employee_name as recorder,employee_brand_id from v_purchase_detail where  employee_brand_id = '".$this->Base_model->branch_id()."' GROUP BY employee_name");
         
        $data['supplier']= $this->Base_model->loadToListJoin("select supplier_name,employee_brand_id  from v_purchase_sammary where  employee_brand_id = '".$this->Base_model->branch_id()."' group by supplier_name");
        
        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->Base_model->position_id());
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
        
            $data['display_expense_item']=$this->Base_model->loadToListJoin("SELECT * FROM v_expense_detail WHERE expense_detail_id=".$id);
        // load view when action above finish 
            
             // TRANSLATED BY SOPHANITH
             $lang = $this->input->cookie('language');
                
             $data['lbl_title']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_title");
             $data['lbl_date_entry']         =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_date_entry");
             $data['lbl_expense_detail']     =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_expense_detail");
             $data['lbl_amount']             =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_amount");
             $data['lbl_expense_type']       =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_expense_type");
             $data['lbl_description']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_description");
             $data['lbl_total']              =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_total");
             $data['lbl_grand_total']        =$this->Base_model->get_value_two_cond("form_translate","form_translate_label_name_".$lang,"form_translate_form_name","frm_expense","form_translate_label_name","lbl_grand_total");
           
             $this->lang->load('content',$lang=='' ? 'en':$lang);
             $data['btn_search']            =$this->lang->line('btn_search');
             $data['btn_export']            =$this->lang->line('btn_export');
             $data['btn_save']              =$this->lang->line('btn_save');
             $data['lbl_delete']            =$this->lang->line('lbl_delete');
             $data['lbl_new']              =$this->lang->line('lbl_new');
             $data['lbl_no']                =$this->lang->line('lbl_no');
             $data['lbl_from']              =$this->lang->line('lbl_from');
             $data['lbl_to']                =$this->lang->line('lbl_to');
             $data['lbl_recorder']          =$this->lang->line('lbl_recorder');
            
        //END TRAN SLATED
        $this->load->view("welcome/view",$data);
    }
    //END => function search
}
