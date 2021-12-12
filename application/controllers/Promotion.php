<?php

class Promotion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "Promotion";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "promotion/index";
        $data['list_promotion_type']=$this->Base_model->LoadToListJoin("SELECT promotion_id,promotion_name,from_date,until_date,description FROM promotion;");
        $this->load->view("welcome/view", $data);
    }
    public function deletePromo()
    {
        $id=$this->input->get('promo_id');
        $this->Base_model->run_query("DELETE FROM promotion WHERE promotion_id=$id;");
        $this->Base_model->run_query("DELETE FROM promotion_detail WHERE promotion_id=$id;");
         redirect('/Promotion');
    }
    public function delete_discount_item()
    {
        $id=$this->input->post('pro_id');
        $this->Base_model->run_query("DELETE FROM promotion_detail WHERE item_detail_id=$id;");
    }

    public function response_list()
    {
        $promo_id=$this->input->get('promo_id');
        $data['list_promotion']=$this->Base_model->LoadToListJoin("SELECT pd.item_detail_id,pro.item_detail_part_number,pro.item_detail_name,pd.p_discount,pd.d_discount FROM promotion p INNER JOIN  promotion_detail pd ON p.promotion_id=pd.promotion_id INNER JOIN item_detail pro ON pro.item_detail_id=pd.item_detail_id WHERE pd.promotion_id=$promo_id");
        echo json_encode($data['list_promotion']);
    }
    public function create()
    {
        $id=$this->input->get('promo_id');
        $data['title']  = "Promotion";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "promotion/create";
        if ($id=='') {
            $data['status']="1";
        }else{
            $data['promotion_data']=$this->Base_model->LoadToListJoin("SELECT p.promotion_id,p.promotion_name,p.from_date,p.until_date,p.from_time,p.until_time,p.description,pro.item_detail_part_number,pro.item_detail_id,pro.item_detail_name,pd.p_discount,pd.d_discount FROM promotion p INNER JOIN  promotion_detail pd ON p.promotion_id=pd.promotion_id INNER JOIN item_detail pro ON pro.item_detail_id=pd.item_detail_id WHERE pd.promotion_id=$id");
            $data['status']="0";
        }
        $this->load->view("welcome/view", $data);
    }
    public function save_promotion_master()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $promotion_id=$this->input->post('promo_id');
        $promot_name=$this->input->post('promo_name');
        $desc=$this->input->post('txtDesc');
        $from_date=$this->input->post('from_date');
        $from_time=$this->input->post('from_time');
        $to_date=$this->input->post('to_date');
        $to_time=$this->input->post('to_time');
        if($promotion_id==''){
            $data_promo=array(
                "promotion_name"=>$promot_name,
                "description"=>$desc,
                "from_date"=>$from_date,
                "until_date"=>$to_date,
                "from_time"=>$from_time,
                "until_time"=>$to_time,
                "created_date"=>$date->format('Y-m-d H:i:s'),
                "created_by"=>$this->Base_model->user_id()
            );
            $this->Base_model->save('promotion', $data_promo);
            $insert_id = $this->db->insert_id();
            echo $insert_id;
        }else{
            $this->Base_model->run_query("UPDATE promotion SET promotion_name='$promot_name',description='$desc',from_date='$from_date',until_date='$to_date',from_time='$from_time',until_time='$to_time' WHERE promotion_id=$promotion_id;"); 
        }
        

    }
    public function save_list_promotion()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok')); 
        $promotion_id=$this->input->post('promo_id');
        $item_id=$this->input->post('pro_id');
        $p_discount=$this->input->post('txt_discount_percen');
        $d_discount=$this->input->post('txt_discount_dollar');
        $ifExist=$this->Base_model->select_value("SELECT COUNT(*) AS result FROM promotion_detail WHERE item_detail_id=? AND promotion_id=$promotion_id",array($item_id),"result");

        if($ifExist==0){
            $pro_list_data=array(
                "promotion_id"=>$promotion_id,
                "item_detail_id"=>$item_id,
                "p_discount"=>$p_discount,
                "d_discount"=>$d_discount,
                "modified_date"=>$date->format('Y-m-d H:i:s'),
                "modified_by"=>$this->Base_model->user_id()
            );
            $this->Base_model->save('promotion_detail', $pro_list_data);
            echo '1';
        }else{
            $this->Base_model->run_query("UPDATE promotion_detail SET p_discount=$p_discount,d_discount=$d_discount WHERE item_detail_id=$item_id AND promotion_id=$promotion_id");
            echo $ifExist; 
        }

        
    }


}
