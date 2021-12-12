<?php  


class Pay extends CI_Controller
{
	
  public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    


     public function index(){


     	 $data['title'] = "Information of Student ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['page'] = "p/payy";
        $data['footer'] = "template/footer";
         


       $data['lbl_id']="Id";
       $data['lbl_no']="No";

       $data['lbl_name']="Payment Name";
       $data['lbl_description']="Description";

       $data['lbl_createdate']="Create Date";
       $data['lbl_modifiddate']="Modified Date";

       $data['lbl_action']="Áction";

       $data['btn_add']="Add New";
   




        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);

        $this->load->view("welcome/view" ,$data);


        

     }


     public function add_loads(){

	    $data['title'] = "Information of Student ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['page'] = "p/add_load";
        $data['footer'] = "template/footer";


         $data['lbl_name']="Payment Name";
         $data['lbl_description']="Description";

         $data['lbl_createdate']="Create Date";
         $data['lbl_modifiddate']="Modified Date";

         $data['btn_create']="Create";
         $data['btn_cancel']="Cancel";


         $this->load->view("welcome/view", $data);

     }
}

 ?>