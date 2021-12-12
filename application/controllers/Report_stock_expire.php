<?php

class Report_stock_expire extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        //load Model Name
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }    
    public function index(){
        
        $data['title'] = "Report Purchase Detail ";
        //load header
        $data['header'] = "template/header";
        //load menu
        $data['menu'] = "template/menu";
        //load footer
        $data['footer'] = "template/footer";
        //load page 
        $data['page'] = "report/report_stock/frm_report_stock_expire";
        // load view when action above finish
        $this->load->view("welcome/view",$data);        
    }
    public function response(){
        
        $data['records']=$this->Base_model->loadToListJoin("select * from v_purchase_detail where cast(purchase_detail_item_expired_date as date)<cast(DATE_ADD(now(),INTERVAL 7 day) as date) 
                                                            and branch_id=".$this->session->userdata('branch_id')." "
                                                            . " and purchase_detail_id not in (select alert_purchase_id from alert_status where alert_user_id=".$this->session->userdata('user_id')." and alert_expire_date=purchase_detail_item_expired_date and alert_item_id=item_detail_id)");
        
        $this->load->view("report/report_stock/response",$data);
        
    }
    public function clear_all_expire(){
        
        $expire_data=$this->Base_model->loadToListJoin("select stock_id
                                                            ,stock_item_id
                                                            ,stock_expire_date
                                                            ,item_detail_name
                                                            ,concat(stock_qty,' ',measure_name,'(s)') as stock_qty
                                                            ,item_type_name
                                                            ,stock_location_name
                                                            from stock st 
                                                            inner join item_detail id on st.stock_item_id=id.item_detail_id 
                                                            left outer join measure m on st.measure_id=m.measure_id 
                                                            inner join item_type it on id.item_type_id=it.item_type_id 
                                                            inner join stock_location sl on st.stock_location_id=sl.stock_location_id
                                                            where cast(stock_expire_date as date)<cast(DATE_ADD(now(),INTERVAL 7 day) as date) 
                                                            and sl.stock_location_branch_id=".$this->session->userdata('branch_id')." "
                                                            . " and stock_id not in (select alert_stock_id from alert_status where alert_user_id=".$this->session->userdata('user_id')." and alert_expire_date=st.stock_expire_date and alert_item_id=st.stock_item_id)");
        
        foreach($expire_data as $ed){
            $data=array(
                'alert_stock_id'              =>$ed->stock_id,
                'alert_expire_date'           =>$ed->stock_expire_date,
                'alert_user_id'               =>$this->session->userdata('user_id'),
                'alert_item_id'               =>$ed->stock_item_id
                );
            $this->Base_model->save('alert_status',$data);
        }
        
        redirect("report_stock_expire");
    }
    
    public function delete(){
        $id=$this->uri->segment(3);
        if($id!=null){
            $expire_date=date('Y-m-d');
            $item_id=0;
            $stock_data=$this->Base_model->loadToListJoin("select * from purchase_detail where purchase_detail_id=".$id);
            
            foreach($stock_data as $sd){
                $expire_date=$sd->purchase_detail_item_expired_date;
                $item_id=$sd->purchase_detail_item_detail_id;
            }
            
            $data=array(
                'alert_purchase_id'           =>$id,
                'alert_expire_date'           =>$expire_date,
                'alert_user_id'               =>$this->session->userdata('user_id'),
                'alert_item_id'               =>$item_id
                );
            $this->Base_model->save('alert_status',$data);
        }
        $curr_page=$this->session->userdata('curr_page');
        if($curr_page==null){
            $curr_page='report_stock_expire';
        }
        redirect($curr_page);
    }
}
