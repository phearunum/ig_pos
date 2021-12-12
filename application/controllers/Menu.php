<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author hpt-srieng
 */
class Menu extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "menu/frm_menu";
        
        $data["menu_records"]=$this->Base_model->loadToListJoin("select * from page");
        
        $last_id=$this->Base_model->loadToListJoin("select page_id from page order by page_id desc limit 1");
        $id=0;
        foreach($last_id as $li){
            $id=$li->page_id;
        }
        
        $data['last_id']=$id;
        
        $this->load->view("welcome/view",$data);
    }
    
    
    public function save(){
        $parent_id=$this->input->post("cbo_menu_parent");
        $page_name=$this->input->post("txt_menu_name");
        $page_name_kh=$this->input->post("txt_page_namekh");
        $controller_name=$this->input->post("txt_controller_name");
        $page_class=$this->input->post("txt_page_class");
        
        $page_record=array(
            'page_id_parent'  =>$parent_id,
            'page_name'       =>$page_name,
            'page_name_kh'    =>$page_name_kh,
            'page_controller' =>$controller_name,
            'page_clazz'      =>$page_class,
        );
        
        $this->Base_model->save("page",$page_record);
        redirect("menu");
    }
    
}
