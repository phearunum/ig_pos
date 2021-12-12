<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userlogin
 *
 * @author srieng-pc
 */
class Userlogin extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();        
    }
    public function index(){
          $data['title'] = "USER LOGIN";
        
//        $data['header'] = "template/header";
//        $data['menu'] = "template/menu";
//        $data['footer'] = "template/footer";
//        $data['page'] = "login/frm_login";

        if(isset($_SESSION['loged_in'])){
        	if($_SESSION['loged_in']){
        		redirect('/welcome');
        	}
        }
        $this->load->view("login/frm_login",$data);
    }
}
