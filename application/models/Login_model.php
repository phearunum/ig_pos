<?php

class Login_model extends CI_Model {
    private $_tbl = 'v_user';
    
    public function __construct() {
        parent:: __construct();
        $this->load->library("encrypt");
    }

    public function check_user($usr, $pwd) {
        // $tdes = new TripleDES("12345");
        // $phpEncrypted = $tdes->encrypt($pwd);

        $encryptedPassword= $this->encrypt->encode($pwd);
        $row = array();
        $this->db->select('*');
        $this->db->where('user_name', $usr);
        $this->db->where('user_password', $encryptedPassword);
        $this->db->limit(1);
        $query = $this->db->get($this->_tbl);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($this->input->cookie('language') == "") {
                $lang = "en";
                $data['cookie'] = $lang;
                $cookie = array(
                    'name' => 'language',
                    'value' => $lang,
                    'expire' => '5184000',
                    'path' => '/'
                );

                $this->input->set_cookie($cookie);
            }
        }
        return $row;
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
