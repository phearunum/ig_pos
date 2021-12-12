<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //$this->Upload->upload_img("userfile","./img/admin/social_media","5048000","2048","2048","gif|jpg|png|jpeg|pdf");
    public function upload_img($file_name, $path, $max_size, $max_height, $max_width, $type) {
//        echo $_FILES["prodfile"]["name"];
//        die();
        if ($_FILES[$file_name]["name"] != "") {
            $photo = time() . date('Ymd_His') . $_FILES[$file_name]["name"];

            $final = str_replace(' ', '_', $photo);
            $config = array(
                'upload_path' => $path,
                //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'allowed_types' => $type,
                'overwrite' => TRUE,
                'max_size' => $max_size, // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => $max_height,
                'max_width' => $max_width,
                'file_name' => $final,
            );

            $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if ($this->upload->do_upload($file_name)) {

                // $data = array('upload_data' => $this->upload->data());
//                    $response["success"] = 1;
//                    $response["statusCode"] = 'S0001';
//                    $response["message"] = "File has been uploaded!";
            } else {
                $final="";
                $error = array('error' => $this->upload->display_errors());
//                    $response["success"] = 0;
//                    $response["statusCode"] = 'E0001';
//                    $response["message"] = "File is not upload!";
            }
            //echo json_encode($response);
            return $final;
        } else {
            return "";
        }
    }
    
     public function upload_img_no_rename($file_name, $path, $max_size, $max_height, $max_width, $type,$prefix=null) {
        if ($_FILES[$file_name]["name"] != "") {
            
            if($prefix==null){
                $photo =$_FILES[$file_name]["name"];
            }  else {
                $photo =$prefix.' '.$_FILES[$file_name]["name"];
            }
            $final = str_replace(' ', '_', $photo);
            $config = array(
                'upload_path' => $path,
                //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'allowed_types' => $type,
                'overwrite' => TRUE,
                'max_size' => $max_size, // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => $max_height,
                'max_width' => $max_width,
                'file_name' => $final,
            );

            $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if ($this->upload->do_upload($file_name)) {
                // $data = array('upload_data' => $this->upload->data());
//                    $response["success"] = 1;
//                    $response["statusCode"] = 'S0001';
//                    $response["message"] = "File has been uploaded!";
            } else {
                $error = array('error' => $this->upload->display_errors());
//                    $response["success"] = 0;
//                    $response["statusCode"] = 'E0001';
//                    $response["message"] = "File is not upload!";
            }
            //echo json_encode($response);
            return $final;
        } else {
            return "";
        }
    }
    //$identify is focuse on no doublicate data (not duplicate data) 1,2,3,4...
    //$this->Upload->upload_img("userfile","./img/admin/social_media","5048000","2048","2048","gif|jpg|png|jpeg|pdf","1");
    public function upload_img_gal($file_name, $path, $max_size, $max_height, $max_width, $type,$indentify) {
        if ($_FILES[$file_name]["name"] != "") {
            $photo = time() . date('Ymd_His').$indentify. $_FILES[$file_name]["name"];

            $final = str_replace(' ', '_', $photo);
            $config = array(
                'upload_path' => $path,
                //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'allowed_types' => $type,
                'overwrite' => TRUE,
                'max_size' => $max_size, // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => $max_height,
                'max_width' => $max_width,
                'file_name' => $final,
            );

            $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if ($this->upload->do_upload($file_name)) {
                // $data = array('upload_data' => $this->upload->data());
//                    $response["success"] = 1;
//                    $response["statusCode"] = 'S0001';
//                    $response["message"] = "File has been uploaded!";
            } else {
                $error = array('error' => $this->upload->display_errors());
//                    $response["success"] = 0;
//                    $response["statusCode"] = 'E0001';
//                    $response["message"] = "File is not upload!";
            }
            //echo json_encode($response);
            return $final;
        } else {
            return "";
        }
    }
    
    public function upload_picture($path,$photo,$name){
        
        if(!empty($_FILES[$photo][$name])){
            $config = array(
                'upload_path' => 'img/'.$path.'/',
                'allowed_types' => 'jpg|jpeg|png|gif',
                'file_name' => $_FILES[$photo][$name],
                'max_size'        => "2048000",  // Can be set to particular file size
                'max_height'      => "5292",
                'max_width'       => "5292",
                'overwrite'         =>TRUE,
                'remove_spaces'     =>TRUE
            );
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload($photo)){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }    
        }
    }
}

?>