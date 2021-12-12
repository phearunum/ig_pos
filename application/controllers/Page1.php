<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author srieng
 */
class Page extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
    }
    public function index(){
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "page/list_page";
        
        $this->load->view("welcome/view",$data);
    }
    public function addnew(){
        $data['title']  = "CUSTOMER TYPE";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "page/frm_page";
        
        $data['record_page_parent']     =$this->Base_model->get_data_by("select * from page where page_active=1 and page_url='' group by page_id_parent order by page_id_parent");
        
        $this->load->view("welcome/view",$data);
    }
    public function save(){
        $menu_parent    =$this->input->post("cbo_menu_parent");
        $sub_menu       =$this->input->post("txt_sub_menu");
        $controller     =$this->input->post("txt_controller_name");
        
        $position_id    =$this->Base_model->get_data_by("select position_id,position_name from position");
        $page_ordering  =$this->Base_model->get_value("page","max(page_ordering)","page_id_parent",$menu_parent);
        $n              =$this->Base_model->get_count_value("position","position_id","1","1");
        $page_id        =$this->Base_model->get_value("page","MAX(page_id)","page_active",1);
        #print_r($page_ordering);
        
        $p_id[]         =array();
        $count=1;
        foreach($position_id as $p){ 
            $p_id[$count]=$p->position_id; 
            $count++;
        }
        $data_page     =array(
                'page_name'             =>$sub_menu,
                'page_id_parent'        =>$menu_parent,
                'page_ordering'         =>$page_ordering,
                'page_url'              =>$controller,
                'page_active'           =>1
        );
            $this->Base_model->save("page",$data_page);
        for($i=1;$i<=$n;$i++){
            $data=array(
                'permission_page_id'    =>$page_id,
                'permission_page_id_parent'    =>$menu_parent,
                'position_id'           =>$p_id[$i],
                'permission_ordering'   =>$page_ordering,
                'permission_name'       =>$sub_menu,
                'permission_enable'     =>1,
                'permission_active'     =>1,
                'permission_page_only'  =>0,
                'permission_control'    =>$controller,
                'permission_follow_by'  =>$this->session->userdata("group_id")
            ); 
            $this->Base_model->save("permission",$data);
        }
    }
    public function response(){
        $data['records']=$this->Base_model->loadToListJoin("select * from page");
        $this->load->view("report/report_stock/response",$data);
    }
}
