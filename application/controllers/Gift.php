<?php
class Gift extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
	$this->load->model("Upload");
    $this->Base_model->check_loged_in();
    } 
    public function index() {
        $data['title'] = "GIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "gift/list_gift";  

        //permission data
            $name=$this->uri->segment(1);
            $getid=$this->Base_model->loadToListJoin("SELECT permission_id FROM permission WHERE permission_control='".$name."' AND position_id=".$this->session->userdata('group_id'));
            $id=0;

            foreach($getid as $g){
                $id=$g->permission_id;
            }
            $data['record_permission']=$this->Base_model->loadToListJoin("SELECT * FROM permission WHERE permission_id=".$id);
        //end permission data
            $lang = $this->input->cookie('language');
             $this->lang->load('button',$lang=='' ? 'en':$lang);
             $this->lang->load('validation',$lang=='' ? 'en':$lang);
             $this->lang->load('lable',$lang=='' ? 'en':$lang);

             $this->lang->load('gift',$lang=='' ? 'en':$lang);
             $data['lbl_gift_list_name']=$this->lang->line('gift_list_name');
             $data['lbl_gift_name']=$this->lang->line('gift_name');
             $data['lbl_point']=$this->lang->line('point');
             $data['lbl_no']=$this->lang->line('lb_no');
             $data['lbl_modifier']=$this->lang->line('lb_modifier');
             $data['lbl_modified_date']=$this->lang->line('lb_modified_date');
             $data['lbl_action']=$this->lang->line('lb_action');
             $data['btn_new']=$this->lang->line('lb_new');
             $data['btn_export']=$this->lang->line('btn_export');
        
        $this->load->view('welcome/view', $data);
    }
    public function response() {

        $data['records'] = $this->Base_model->loadToListJoin("select *,get_employee_name(last_modifier)as modifier from gift");
        $this->load->view("report/report_stock/response", $data);
    }
    public function addnew() {

        $data['title'] = "GIFT";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "gift/frm_gift";
       
        
        $this->load->view('welcome/view', $data);
    }
    public function save() {
        $id = $this->input->post("txt_gift_id");
        $name = $this->input->post("txt_gift_name");
        $point = $this->input->post("txt_point");
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $picture ='';
        $old_picture = $this->Base_model->get_value("gift","gift_image","gift_id",$id);
        if(!empty($_FILES['userfile']['name'])){
            $this->Upload->upload_picture('gift','userfile','name');
            $picture = $_FILES['userfile']['name'];
            if($old_picture !=''){
                $path = "location: ../../img/gift/$old_picture";
                try{
                    unlink($path);  
                }catch(Exception $ex){}
            }
        }else{
            if($old_picture !=''){
                $picture = $old_picture; 
            }else{
                $picture = 'NULL';
            }   
        }

        $data = array(
            'gift_name'  =>$name,
            'gift_point' =>$point,
            'gift_image' =>$picture,
            'last_modifier'  =>$this->session->userdata('user_id'),
            'last_modified_date' =>  $date->format('Y-m-d H:i:s')
        );

        $id == "" ? $this->Base_model->save("gift", $data) : $this->Base_model->update_array('gift', $data, array("gift_id" => $id));
    }
    public function delete($id) {

        $this->Base_model->delete_by("gift","gift_id",$id);
        
        $this->response();
    }
    public function load($id) {
        $this->session->set_flashdata('id', $id);
        
        $record = $this->Base_model->select("select *,get_employee_name(last_modifier)as modifier from gift where gift_id=?", array($id));

        foreach ($record as $r) {
            
            $arr = array(
                //TOTAL SALE
                'gift_id'          =>  $r->gift_id,
                'gift_name'        =>  $r->gift_name,
                'gift_point' =>  $r->gift_point, 
                'gift_image' =>$r->gift_image
            );
        }
        echo json_encode($arr);
    }
}
