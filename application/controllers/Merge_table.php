<?php
class merge_table extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function get_table_layout(){
        $detail = $this->Base_model->loadToListJoin("SELECT sale_master_id, sale_master_id AS invoice_no,sale_master_layout_id as table_id, get_table_name (sale_master_layout_id) as table_name FROM sale_master WHERE sale_master_status = '1'");
        echo json_encode($detail);
            
    }
    public function fill_select_invoice(){
        $sale_master_id=$this->input->post("master_id");
        $detail = $this->Base_model->loadToListJoin("select master_id,detail_id, item_name as `item_name`,ifnull(item_note,'') as `note`,cast(unit_price as decimal(18,2)) as price,cast(sum(qty) as decimal(18,0)) as qty, cast(avg(discount_p) as decimal(18,2)) as `dis_percent`,cast(sum(discount_dollar) as decimal(18,2)) as `dis_dollar`,cast(sum(sub_total) as decimal(18,2)) as total from v_invoice where master_id in(" . $sale_master_id . ") group by item_name,item_note,unit_price");
        echo json_encode($detail);
            
    }
    public function fill_select_table(){
        $sale_master_id=$this->input->post("master_id");
        $detail = $this->Base_model->loadToListJoin("select layout_id,layout_name from floor_table_layout where layout_id in(select sale_master_layout_id from sale_master where sale_master_id in(" . $sale_master_id . "))");
        echo json_encode($detail);
            
    }
    public function save(){
       $marge_to=$this->input->post("sale_master_id");
       $data=$this->input->post("data");
       $da = json_decode($data);
       $user=$this->Base_model->user_id();
       $date=$this->Base_model->current_date('Y-m-d H:i:s');
       foreach ($da as $d){
            if($d->ch_status!=$marge_to){
                $this->Base_model->delete_by('sale_master','sale_master_id', $d->ch_status);
                $data_detail=array(
                    'sale_master_id'=>$marge_to,
                );
                $this->Base_model->updates("sale_detail",array('sale_detail_status'=>1,'sale_master_id'=>$d->ch_status), $data_detail);                     
            }
       }
    }
    

}
