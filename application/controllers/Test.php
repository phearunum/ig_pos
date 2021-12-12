<?php
class Test extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $this->load->helper('language');
        $this->load->helper('cookie');
        $this->load->model("Base_model");
    }
	
    
    public function Index(){
   		$this->lang->load('content','en');
   		echo $this->lang->line('btn_save');

        $lang = $this->input->cookie('language');
        echo '<br>';
        echo $lang;

    }
    public function set_cook($data){
    	
    	delete_cookie('language');
    	$cookie = array(
            'name'   => 'language',
            'value'  => $data,
            'expire' => '5184000',
            'path'   => '/'
        );
        
        $this->input->set_cookie($cookie);
        $lang = $this->input->cookie('language');
        echo $lang;
    }

    public function cash_out($id){
        $sale_master=$this->Base_model->loadToListJoin("select * from sale_master where sale_master_cash_id=$id and sale_master_status=1");
        var_dump($sale_master);
    }
    
}