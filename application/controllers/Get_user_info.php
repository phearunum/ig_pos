<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author srieng-pc
 */
class Get_user_info extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->Base_model->check_loged_in();
    }
    public function get_user() {
        session_start();
        require_once(APPPATH . 'libraries/Facebook/autoload.php');
        
         $fb = new Facebook\Facebook([
            'app_id' => '1895421674065587',
            'app_secret' => '4664eca1b5cea91dc28b1e92beaf12be',
            'default_graph_version' => 'v2.5',
            
        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        define('APP_URL', 'http://cafe-order.blackfactorycafe.com/get_user_info/get_user/');
        $permissions = ['user_birthday', 'user_location', 'user_email','user_photos']; // optional
	$access_token=$this->input->get("access_token");
        $u_id=$this->input->get("u_id");
	
        if (isset($_GET['access_token'])){
            if (isset($_SESSION['localhost_app_token'])) {
                $fb->setDefaultAccessToken($_SESSION['localhost_app_token']);
            } else {
                // getting short-lived access token
                  $_SESSION['localhost_app_token'] = (string) $access_token;
		//$_SESSION['localhost_app_token'] = (string) $accessToken;
		
                // OAuth 2.0 client handler
                $oAuth2Client = $fb->getOAuth2Client();
		
                // Exchanges a short-lived access token for a long-lived one
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['localhost_app_token']);

                $_SESSION['localhost_app_token'] = (string) $longLivedAccessToken;

                // setting default access token to be used in script
                $fb->setDefaultAccessToken($_SESSION['localhost_app_token']);
            }
	
            //redirect the user back to the same page if it has "code" GET variable

            if (isset($_GET['code'])) {
                header('Location: ./');
            }
	    // validating user access token
            try {
                $user = $fb->get('/me');
                $user = $user->getGraphNode()->asArray();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                // if access token is invalid or expired you can simply redirect to login page using header() function
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            // getting basic info about user
            try {
				$requestPicture = $fb->get('/me/picture?redirect=false&height=300'); //getting user picture
                $profile_request = $fb->get('/me?fields=name,first_name,last_name,birthday,website,location,email');
                $profile = $profile_request->getGraphNode()->asArray();
				$picture = $requestPicture->getGraphUser();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                // redirecting user back to app login page
                header("Location: ./");
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
	    
            // printing $profile array on the screen which holds the basic info about user
//            echo $profile['birthday']->format('d-m-Y');
//            echo $profile['website'];
//            echo $profile['name'];
	    $id=$this->Base_model->get_value("customer","customer_oauth_uid","customer_oauth_uid",$u_id);
            
            $response=array();
            $product = array();
            $success_code=array();
            if($id>0){
                $response["success"] = 1;	
                $response["statusCode"] = "S0001";
                $result=$this->Base_model->loadToListJoin("select * from customer where customer_oauth_uid=$u_id");
                
                foreach($result as $r){
                    $product['profile_name']=$r->customer_name;
                    $product['email']       =$r->customer_email;
                    $product['user_id']     =$r->customer_oauth_uid;
                    $product['dob']         =$r->customer_dob;
                    $product['profile_url'] =$r->customer_profile_url;
                }
                
                $response["userdata"] = array();
                array_push($response["userdata"], $product);
                // echoing JSON response
	        $response["message"] = "Data Read From Database";
                echo json_encode($response);
                
            }else{
		    $response["success"]    =1;	
                    $response["statusCode"] = "S0002";
		    $product['profile_name']=$profile['name'];
                    $product['email']       =$profile['email'];
                    $product['user_id']     =$u_id;
                    $product['dob']         =$profile['birthday']->format('d-m-Y');
                    $product['profile_url'] =$picture['url'];
                    
                  $response["userdata"] = array();
                  array_push($response["userdata"], $product);
                 // echoing JSON response
	          $response["message"] = "Data Read From Facebook";
                  echo json_encode($response);
                  
            }
            
            // Now you can redirect to another page and use the access token from $_SESSION['localhost_app_token']
            
        } else {
            // required field is missing
    		$response["success"] = 0;
                $response["statusCode"] = "E0001";
    		$response["message"] = "Required field(s) is missing";
    	   // echoing JSON response
    		echo json_encode($response);
        }
    }
}
