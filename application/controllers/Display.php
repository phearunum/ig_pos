<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        
    }  
	public function index()
	{
		//system('cmd /c C:\Users\HP-PC\Desktop\node.bat'); 
		//exec('C:\Users\HP-PC\Desktop\node.bat');
		$data['slide']=$this->Base_model->loadToListJoin("select * from slide_image");
		$data['name_image']=$this->Base_model->loadToListJoin("select name from slide_image");
		$this->load->view('display/index',$data);
		
	}
}
