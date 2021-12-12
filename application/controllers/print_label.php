<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_label extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->load->library("pagination");
        $this->load->library("encrypt");
        $this->load->helper("url");
        $this->Base_model->check_loged_in();
    }

    public function load_label(){
        $id = $this->uri->segment(3);
        $data["part_number"]=$this->Base_model->get_value_sql("SELECT * FROM item_detail WHERE item_detail_id=$id","item_detail_part_number");
        $data["item_name"]=$this->Base_model->get_value_sql("SELECT * FROM item_detail WHERE item_detail_id=$id","item_detail_name");
        $data["price"]=$this->Base_model->get_value_sql("SELECT * FROM item_detail WHERE item_detail_id=$id","item_detail_retail_price");

          $this->load->view("print_label/frm_print_label",$data);
    }
}
