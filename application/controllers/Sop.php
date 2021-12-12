<?php

class Sop extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        require_once(APPPATH . 'libraries/encrypt.php');
        $this->load->library("encrypt");
        $this->load->library('session');
    }

    public function check()
    {
      $pk=trim($this->encrypt->decode($this->input->post("pk")));
      $nk=trim($this->encrypt->decode($this->input->post("nk")));
      $result=$this->Base_model->get_value_sql("SELECT ifnull(TO_DAYS('$nk')-TO_DAYS(now()),0) AS result","result");
      echo json_encode($result);
    }

}
