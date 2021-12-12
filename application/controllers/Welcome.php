<?php
class Welcome extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");

       // require_once(APPPATH . 'libraries/encrypt.php');
        $this->load->library("encrypt");
        $this->load->library('session');
    }

    public function check_user() {
        $user_name = $this->input->post('user');
        $user_password = $this->input->post('pwd');
        $remember = $this->input->post('remember');


       //  $this->load->library('Encryption');
        // $tdes = new TripleDES("12345");
      //   $phpEncrypted = $tdes->encrypt($user_password);

        $user="";
        // $user = $this->Base_model->get_value_two_cond("v_user","employee_id","user_name",$user_name,"user_password",$encryptedPassword);
        $password=$this->Base_model->get_value_sql("SELECT * FROM v_user WHERE user_name='$user_name'","user_password");
        if($this->encrypt->decode($password)==$user_password){
            $user=$this->Base_model->get_value_sql("SELECT * FROM v_user WHERE user_name='$user_name'","employee_id");
        }

        if ($user != "") {
            $session = array(
                'user_id' => $user,
                'user_name' => $user_name,
                'password' => $this->encrypt->encode($user_password),
                'remember' => $remember,
                'loged_in' => true
            );
            $seller=$this->Base_model->get_value_sql("select employee_is_seller from employee where employee_id=$user","employee_is_seller");
            $this->session->set_userdata($session);
            $this->session->mark_as_temp('loged_in', 86400);


            $response['statusCode'] = "S0001";
            $response['is_seller']=$seller;
            $response['user_id'] = $user;
            echo json_encode($response);
        }else{
            $response['statusCode'] = "E0001";
            echo json_encode($response);
        }

    }
    public function set_cookie($user_id, $remember){
        if($remember == '1'){
            $cookie = array(
                'name'   => 'user_id',
                'value'  => $user_id,
                'expire' => '2592000',
                'prefix' => '',
                'secure' => FALSE
            );

            $this->input->set_cookie($cookie);
        }else{
            $cookie_user = array(
                'name'   => 'user_id' ,
                'value'  => $user_id,
                'expire' => '86400',
                'prefix' => '',
                'secure' => FALSE
            );

            $this->input->set_cookie($cookie_user);
        }

        if ($this->input->cookie('language') == "") {
            $lang = "en";
            $cookie = array(
                'name' => 'language',
                'value' => $lang,
                'expire' => '5184000',
                'path' => '/'
            );

            $this->input->set_cookie($cookie);
        }

    }
    public function save_cookie($user, $user_id, $remember){
        $data = array(
            "cookie_user_id" => $user,
            "cookie_user_data" =>$user_id,
            "cookie_status" =>1,
            "cookie_remember" =>$remember
        );
        $this->Base_model->save("cookie", $data);
    }
    public function update_cookie($user_id,$remember){
        $old_user_id = $this->input->cookie('user_id', TRUE);
        $query = 'update cookie set cookie_user_data = "'.$user_id.'" , cookie_remember = '.$remember.' where cookie_user_data = "'.$old_user_id.'"';
        $this->db->query($query);
    }
    public function check_remember(){
        $data = array(
            'user' => "",
            'pwd'  => "",
            'remember'  => "0"
            );
        if(isset($_SESSION['user_id'])){
            if($_SESSION['remember']){
               $data = array(
            'user' => $_SESSION['user_name'],
            'pwd'  => $this->encrypt->decode($_SESSION['password']),
            'remember'  => "1"
            );
           }
        }
        echo json_encode($data);
        // $user_id = $this->Base_model->remember();

        // if($user_id != "" || $user_id >0){
        //     $user_data = $this->Base_model->loadToListJoin("select user_name, user_password from v_user where employee_id = $user_id limit 1");

        //     $this->load->library('Encryption');
        //     $tdes = new TripleDES("12345");

        //     foreach($user_data as $u){
        //         $data = array(
        //             'user' =>$u->user_name,
        //             'pwd' =>$tdes->Decrypt($u->user_password)
        //         );
        //         echo json_encode($data);
        //     }

        // }else{
        //     $this->load->helper('cookie');
        //     $old_user_id = $this->input->cookie('user_id', TRUE);

        //     $data['cookie_status'] = 0;
        //     $this->Base_model->update("cookie","cookie_user_data",$old_user_id,$data);
        //     delete_cookie("user_id");

        //     $response["statusCode"] = "E0001";
        //     echo json_encode($response);
        // }

    }
    public function index(){
        $this->Base_model->check_loged_in();

        $data['title'] = "WELCOME";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "welcome/welcome";

        $data['company_profile']=$this->Base_model->loadToListJoin("select * from company_profile limit 1");

        $this->load->view("welcome/view",$data);
    }

    function checkcard(){
        $card = $this->input->get("card");
        $emp_record = $this->Base_model->select("select employee_id from employee where employee_card=?", array($card));
        $emp_id = 0;
        foreach($emp_record as $emp){
            $emp_id = $emp->employee_id;
        }
        $user_record = $this->Base_model->select("select user_name, user_password from user where employee_id=?",array($emp_id));
        $user = '';
        $en = new encrypt("12345");
        foreach($user_record as $emp){
            $user = $emp->user_name.":".$en->Decrypt($emp->user_password);
        }
        echo $user;
    }
}
class TripleDES {

    private $bPassword = "";
    private $sPassword = "";

    function __construct($Password) {
        $this->bPassword = md5(utf8_encode($Password), TRUE);
        $this->bPassword .= substr($this->bPassword, 0, 8);
        $this->sPassword - $Password;
    }

    function Password($Password = "") {
        if ($Password == "") {
            return $this->sPassword;
        } else {
            $this->bPassword = md5(utf8_encode($Password), TRUE);
            $this->bPassword .= substr($this->bPassword, 0, 8);
            $this->sPassword - $Password;
        }
    }

    function PasswordHash() {
        return $this->bPassword;
    }

    function Encrypt($Message, $Password = "") {
        if ($Password <> "") {
            $this->Password($Password);
        }
        $size = mcrypt_get_block_size('tripledes', 'ecb');
        $padding = $size - ((strlen($Message)) % $size);
        $Message .= str_repeat(chr($padding), $padding);
        $encrypt = mcrypt_encrypt('tripledes', $this->bPassword, $Message, 'ecb');
        return base64_encode($encrypt);
    }

    function Decrypt($message, $Password = "") {
        if ($Password <> "") {
            $this->Password($Password);
        }
        return mcrypt_decrypt('tripledes', $this->bPassword, base64_decode($message), 'ecb');
    }

}
