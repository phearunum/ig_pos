<?php
class Image_slide extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->load->model("Upload");
        $this->Base_model->check_loged_in();
    }
    public function index(){
        $data['title'] = "Image Slide";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "image_slide/image_slide_list";        


        $name=$this->uri->segment(1);
        $data['record_permission']=$this->Base_model->get_permission($name);
        
        $this->load->view("welcome/view",$data);
    }


    public function response() {
        
        $data['records'] = $this->Base_model->loadToListJoin("SELECT * FROM slide_image");
        $this->load->view("report/report_stock/response", $data);
    }


    public  function  save(){
        $img=$_FILES["userfile"]['name'];
        $new_name="";
        if($img!=""){
            $new_name=$this->Upload->upload_img("userfile","./img/slide","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
        }

           $name=$this->input->post('txt_name');
           $id=$this->input->post('txt_id');
           $desc=$this->input->post('txt_desc');
            if($id==""){
                $data=array(
                    "name"=>$name,
                    "images"=>$new_name,
                    "desc"=>$desc

                 );
                $this->Base_model->save('slide_image',$data);
            }else{
                if($img==""){
                    $data=array(
                        "name"=>$name,
                        "desc"=>$desc
                     );
                    $this->Base_model->update('slide_image','id',$id,$data);
                }else{
                    $old_img=$this->Base_model->get_value_sql("select images from slide_image where id=$id","images");
                    @unlink("./img/slide/".$old_img);

                    $new_name=$this->Upload->upload_img("userfile","./img/slide","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
                     $data=array(
                        "name"=>$name,
                        "images"=>$new_name,
                        "desc"=>$desc
                     );
                    $this->Base_model->update('slide_image','id',$id,$data);

                }           
            }    
           
        redirect('image_slide');

    }


public  function delete(){

    $id=$this->uri->segment(3);
     $old_img=$this->Base_model->get_value_sql("select images from slide_image where id=$id","images");
    @unlink("./img/slide/".$old_img);
    $this->Base_model->delete_by("slide_image","id", $id);
     redirect("image_slide");
}



    public  function  edit_load(){
        $id=$this->input->post('id');
        echo json_encode($this->Base_model->loadToListJoin("SELECT * FROM slide_image where id=$id"));

    }



public  function  edit(){

        $id=$this->input->post('#txt_image_id');
        echo json_encode($this->Base_model->loadToListJoin("SELECT * FROM slide_image WHERE id=".$id));
}


    
}
