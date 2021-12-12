<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of security
 *
 * @author hpt-srieng
 */
class security extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
        
    public function backup(){
        
        $data['title'] = "BACKUP DATA";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "security/security";
        
        $this->Base_model->backup();
        $this->load->view('welcome/view');
        
    }
    
    function restore(){
            //hapus dulu database jika proses restore gagal.
            //$this->Edit_model->hapus_db();
            //upload dulu filenya
            $fupload = $_FILES['datafile'];
            $nama = $_FILES['datafile']['name'];
            if(isset($fupload)){
            $lokasi_file = $fupload['tmp_name'];
            $direktori="./uploads/products/$nama";
            move_uploaded_file($lokasi_file,"$direktori");
            }
            //restore database
                $isi_file=file_get_contents($direktori);
                $string_query=rtrim($isi_file, "\n;" );
                $array_query=explode(";", $string_query);
                foreach($array_query as $query){
                $this->db->query($query);
            }
            
            $data['page']='restore';
            $this->load->view('home',$data);
      }
      
}
