<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author srieng-pc
 */
class Logout extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        // unset($_SESSION['loged_in']);
        // $this->load->view("login/frm_login");
        $this->session->sess_destroy();
        $this->load->view("login/frm_login");
    }
}
