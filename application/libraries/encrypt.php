<?php
error_reporting(E_ALL ^ E_DEPRECATED);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of encrypt
 *
 * @author srieng
 */

class encrypt {

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
