<?php
class Payment_type extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        $data['title'] = "CARD ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['page'] = "payment_type/payment_type";
        $data['footer'] = "template/footer";

        $lang = $this->input->cookie('language');
        $this->lang->load('payment',$lang=='' ? 'en':$lang);
        $data['lbl_title']              =$this->lang->line('title');
        
        $data['lbl_payment_name']         =$this->lang->line('payment_name');
        $data['lbl_description']          =$this->lang->line('description');          
        $data['lbl_createdate']           =$this->lang->line('createdate');       
        $data['lbl_modifieddate']         =$this->lang->line('modifiedate');          
        $data['lbl_action']               =$this->lang->line('action');       
        $data['lb_new']                   =$this->lang->line('new'); 
        $data['btn_create']               =$this->lang->line('create');
        $data['btn_cancel']               =$this->lang->line('cancel');   
         $data['btn_update']               =$this->lang->line('update');
         $data['lbl_no']               =$this->lang->line('no');
   
   
    

        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
       
            

        
        $this->load->view("welcome/view",$data);
    }


        public function edit_load(){
     
        $id=$this->uri->segment(3);
        

        $data['title'] = "CARD ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "Payment_type/frm_payment_type";

         $lang = $this->input->cookie('language');
        $this->lang->load('payment',$lang=='' ? 'en':$lang);
        $data['lbl_title']              =$this->lang->line('title');
        $data["lb_no"]="No";
        $data['lbl_payment_name']         =$this->lang->line('payment_name');
        $data['lbl_description']          =$this->lang->line('description');          
        $data['lbl_createdate']           =$this->lang->line('createdate');       
        $data['lbl_modifieddate']         =$this->lang->line('modifiedate');          
        $data['lbl_action']               =$this->lang->line('action');       
        $data['lb_new']                   =$this->lang->line('new'); 
        $data['btn_create']               =$this->lang->line('create');
        $data['btn_cancel']               =$this->lang->line('cancel');
        $data['btn_update']               =$this->lang->line('update');



        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);

        $temp = $this->Base_model->loadToListJoin("SELECT * FROM account_type WHERE acc_type_id = $id");

        foreach ($temp as $key => $value) {
            $data['acc_type_id'] = $value->acc_type_id;
            $data['acc_type_name'] = $value->acc_type;
            $data['Created_date']=$value->create_date;
            $data['modified_date']=$value->modified_date;
            $data['description']=$value->description;
        }
        
        $this->load->view("welcome/view",$data);

}



   public function save(){
            $name     =$this->input->post("acc_type");
            $Description= $this->input->post("txt_desc");
            $data=array(
                "acc_type"=>$name,
                "acc_status"=> 1,
                "create_by"=>$this->Base_model->user_id(),
                "create_date"=>date('Y-m-d'),
                "modified_by"=>$this->Base_model->user_id(),
                "modified_date"=>date('Y-m-d'),
                "description"=>$Description,

            );
            $this->Base_model->save('account_type',$data);
            redirect('payment_type');
    }


public function add_loads(){
        $data['title'] = "CARD ";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "Payment_type/frm_add_payment";

         $lang = $this->input->cookie('language');
        $this->lang->load('payment',$lang=='' ? 'en':$lang);
        $data['lbl_title']              =$this->lang->line('title');
        $data["lb_no"]="No";
        $data['lbl_payment_name']         =$this->lang->line('payment_name');
        $data['lbl_description']          =$this->lang->line('description');          
        $data['lbl_createdate']           =$this->lang->line('createdate');       
        $data['lbl_modifieddate']         =$this->lang->line('modifiedate');          
        $data['lbl_action']               =$this->lang->line('action');       
        $data['lb_new']                   =$this->lang->line('new'); 
        $data['btn_create']               =$this->lang->line('create');
        $data['btn_cancel']               =$this->lang->line('cancel');
        $data['btn_update']               =$this->lang->line('update');



        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        
      $this->load->view("welcome/view",$data);
}

    
    public function response() {
        
        $data['records'] = $this->Base_model->loadToListJoin("select * from account_type where acc_status=1");
        $this->load->view("report/report_stock/response", $data);
    }

    public function contactus(){
        $data['title'] = "CARD TYPE";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "about_us/frm_contact_us";
        
        $this->load->view("welcome/view",$data);
    }



        public function delete(){
        $id=$this->uri->segment(3);
        $this->Base_model->update('account_type','acc_type_id',$id,array('acc_status'=>0));
        redirect('Payment_type');
    }




 public function update(){
        
            $id       =$this->input->post('acc_type_id');
            $name     =$this->input->post("acc_type_name");
            $Description= $this->input->post("txt_desc");            
            
            $data=array(
                'acc_type_id' =>$id,
                'acc_type'  =>$name,                
                'modified_date' =>date('Y-m-d'),
                 "description"=>$Description,
            );


        
        $this->Base_model->update('account_type','acc_type_id',$id,$data);
        redirect('payment_type');


    }

}
