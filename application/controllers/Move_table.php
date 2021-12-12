<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of move_table
 *
 * @author Limeng
 */
class move_table extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function get_floor_table_layout(){
        $branch=$this->Base_model->branch_id();
        $floor = $this->Base_model->loadToListJoin("select floor_id,floor_name from floor where floor_branch_id=$branch and status=1");
        $c=  count($floor);
        $total_f = $c;
        echo '{' . '"success"' . ':1,' . '"Floor":[{';
        foreach ($floor as $i) {
            if($total_f==$c)
                echo '"floor_id"' . ':"' . $i->floor_id . '",' . '"floor_name"' . ':"' . $i->floor_name.'",' . '"default"' . ':"true"' . ',"table_list":';
            else
                echo '"floor_id"' . ':"' . $i->floor_id . '",' . '"floor_name"' . ':"' . $i->floor_name.'",' . '"default"' . ':"false"' . ',"table_list":';
            $detail = $this->Base_model->loadToListJoin("select layout_id,floor_id,layout_name,layout_location_x,layout_location_y,layout_type,`get_table_status`(`floor_table_layout`.`layout_id`) AS `table_status` from floor_table_layout where floor_id=$i->floor_id and layout_id not in(select sale_master_layout_id from sale_master where sale_master_status=1)");
            echo json_encode($detail);
            $c--;
            if($c>0){
                echo "},{";    
            }
        }
        echo "}]}";
    }
    public function save(){
        $sale_master_id=$this->input->post("sale_master_id");
        $table_id=$this->input->post("table_id");
        $data=array(
                    'sale_master_layout_id' =>$table_id
                    );
        $this->Base_model->update_array('sale_master', $data, array("sale_master_id" => $sale_master_id));
        $response ='{'.'"success"' . ':1,' . '"master_id":'. $sale_master_id . ',' . '"table_id":' . $table_id . '}';
        echo $response;
    }
}
