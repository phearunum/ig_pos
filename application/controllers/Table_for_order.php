<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of table_for_order
 *
 * @author hpt-srieng
 */

class Table_for_order extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title']  = "TABLE FOR ORDER";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "employee/table_for_order/frm_customer_list";
        
        $data['record_employee']=$this->Base_model->loadToListJoin("select employee_id,employee_name from employee");
        
        $this->load->view("welcome/view",$data);
    }
    public function get_floor_table(){
        $emp_id=$this->uri->segment(3);
        
        $emp_name=$this->Base_model->get_value("employee","employee_name","employee_id",$emp_id);
        
        $data['emp_name']=$emp_name;
        
        $data['emp_id']=$emp_id;
        $data['record_floor']=$this->Base_model->loadToListJoin("select floor_id,floor_name from v_floor_table_layout group by floor_id");
        $this->load->view("employee/table_for_order/panel_floor_table",$data);
    }
    public function save_table_order(){
                    $idgroup=$this->input->post("txt_employee_id");
                    
                    $count_data = $this->Base_model->get_data_by("SELECT count(layout_id) as countitem FROM floor_table_layout");
                    $count=0;
                    
                    $ch[]=array();
                    $check[]=array();
                    
                    
                    foreach($count_data as $c){
                        $count=$c->countitem;
                    }
                    
                    
                    $id = $this->Base_model->get_data_by("SELECT layout_id FROM floor_table_layout");
                    
                    foreach($id as $i){
                        $ch[]=$i->layout_id;
                    }
                    
                    for($i=1;$i<=$count;$i++){
                       
                       $check[$i]=$this->input->post("chpage".$ch[$i]);
                       
                       if($check[$i]!=0){
                            
                            $data=array(
                                'layout_manage_by'=>$idgroup
                            );
                           
                            $this->db->where('layout_id',$ch[$i]);
                            $this->db->update('floor_table_layout', $data);
                       }else{
                            $data=array(
                                'layout_manage_by'=>0
                            );
                           
                            $this->db->where('layout_id',$ch[$i]);
                            $this->db->where("layout_manage_by",$idgroup);
                            $this->db->update('floor_table_layout', $data);
                       }
                    }
                    redirect('table_for_order');
                }
}
