<?php
class Language extends CI_Controller{
    
    public function changeLanguage($lang=''){
            $data['cookie']=$lang;
            $cookie = array(
            'name'   => 'language',
            'value'  => $lang,
            'expire' => '5184000',
            'path'   => '/'
        );
        
        $this->input->set_cookie($cookie);
        //redirect("logout");
    }
    
}
