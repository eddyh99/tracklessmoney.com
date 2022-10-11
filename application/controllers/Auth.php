<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("mdl_member", "member");
	   $this->load->model("admin/mdl_user", "user");
    }

	public function index()
	{
        $data=array(
            'title'     =>  'Trackless Money',
            'content'   =>  'login/index',
            'extra'     =>  'login/js/js_index',
        );
	    
		$this->load->view('layout/wrapper',$data);
	}

	public function login()
	{
        $data=array(
            'title'     =>  'Login - Trackless Money',
            'content'   =>  'login/login',
        );
	    
		$this->load->view('layout/wrapper',$data);
	}

    public function auth_login(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p'>");
		    redirect(base_url()."auth/login");
		}

		$uname = $this->security->xss_clean($this->input->post('email'));
        //$pass = $this->security->xss_clean($this->input->post('pass'));
        
        $user = $this->user->getby_email($uname);
        $member = $this->member->getby_email($uname);
        if ($user != NULL) {
            if (sha1($this->input->post('pass')) == $user->passwd) {
                $session_data = array(
    				'user_id'   => $user->id,
    				'role'      => $user->role, //"operator", //admin
    				'ucode'     => "",
    				'referral'  => "",
    				'time_location' => $user->location,
    			);
    			
    			$this->session->set_userdata('logged_status', $session_data);
			   	redirect ("admin/dashboard");
            } else {
                $this->session->set_flashdata('failed', "<p style='color:black'>Invalid username or password</p>");
		        redirect("/auth/login");
            }
        } else if ($member != NULL) {
            if (sha1($this->input->post('pass')) == $member->passwd) {
                $session_data = array(
    				'user_id'   => $member->id,
    				'role'      => "member",
    				'ucode'     => $member->ucode,
    				'referral'  => $member->id_referral,
    				'time_location' => $member->location,
    			);
    			
    			$this->session->set_userdata('logged_status', $session_data);
			   	redirect ("member/dashboard");
            } else {
                print_r(sha1($this->input->post('pass'))); echo "<br>";print_r($member->passwd); echo "<br>";die();
                $this->session->set_flashdata('failed', "<p style='color:black'>Invalid username or password</p>");
		        redirect("/auth/login");
            }
        } else {
            // echo "asuuu<br>";
            // print_r($user); echo "<br>";print_r($member); echo "<br>";die();
            $this->session->set_flashdata('failed', "<p style='color:black'>Invalid username or password</p>");
		    redirect("/auth/login");
        }

    }
    
	public function register()
	{
        $data=array(
            'title'     =>  'Register - Trackless Money',
            'content'   =>  'login/register',
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
    public function checkreferral(){
        $this->form_validation->set_rules('referral', 'Referral Unique Code', 
            array(
                'trim', 'required',
                array(
                    'referal',
                    function($str) {
                        $lostr = strtolower($str);
                        if ($lostr == "m3rc4n73") {
                            return TRUE;
                        }
                        
                        $this->load->model("mdl_member", "member");
                        return ($this->member->getby_refcode($lostr) != NULL);
                    }
                )
                
            ), array(
                'referal' => '{field} is unknown.'
            )
        );
        
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."auth/register");
		}
		
        $input		    = $this->input;
		$time_location	= $this->security->xss_clean($input->post("time_location"));
		$referral	    = $this->security->xss_clean($input->post("referral"));
        
        $data = array(
            'title'         => 'Register - Trackless',
            'time_location' => $time_location,
            'referral'      => $referral,
            'content'       => 'login/nextregis',
            'extra'         => 'login/js/js_register'
		);
		$this->load->view('layout/wrapper', $data);
    }
    
	public function regismember() {
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('confirmemail', 'Confirm Email', 'trim|required|valid_email|matches[email]');
		//$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('pass', 'Password', 
            array(
                'trim', 'required', 'min_length[9]', 'max_length[15]',
                array(
                    'komposisi',
                    function($str) {
                        if (preg_match('/(?=[A-Za-z0-9!@#$%^&*\-_=+]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*(?:[^!@#$%^&*\-_=+]*[!@#$%^&*\-_=+]))(?=.{9,}).*$/', $str)) {
                            return TRUE;
                        }
                        return FALSE;
                    }
                )
                
            ), array(
                'komposisi' => 'Invalid Password. Password should contain 1 Uppercase, 1 lowercase, 1 Numeric and 1 Special Charaters',
            )
        );
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		$this->form_validation->set_rules('referral', 'Referral Unique Code','trim|required');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."auth/register");
		}

        $input		    = $this->input;
		$email		    = $this->security->xss_clean($input->post("email"));
		$pass		    = $this->security->xss_clean($input->post("pass"));
		$referral	    = $this->security->xss_clean($input->post("referral"));
		$time_location  = $this->security->xss_clean($input->post("time_location"));
		if (empty($time_location)){
		    $time_location="Asia/Singapore";
		}

        $result = FALSE;
		/*
		if (!preg_match('/(?=[A-Za-z0-9!@#$%^&*\-_=+]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*(?:[^!@#$%^&*\-_=+]*[!@#$%^&*\-_=+]))(?=.{9,}).*$/', $pass)){
		    $this->session->set_flashdata('failed', "Invalid Password. Password should contain 1 Uppercase, 1 lowercase, 1 Numeric and 1 Special Charaters");
		    redirect(base_url()."auth/register");
    	} else {
    	    $data = array(
    	        "email" => $email,
    	        "passwd" => sha1($pass),
    	        "location" => $time_location
    	        );
        	      
        	
    	    if (strtolower($str) != "m3rc4n73") {
        	    $refmember = $this->member->getby_refcode($referral);
    	        $data["id_referral"] = $refmember->id;

    	    }
    	    
    	    $result = $this->member->add($data); 
    	}
    	*/
    	$data = array(
    	    "email" => $email,
    	    "passwd" => sha1($pass),
    	    "location" => $time_location
    	);
        
        //@todo WDS
        /*Message: Undefined variable: str
        Filename: controllers/Auth.php
        Line Number: 206
        
        --------------------
        
        Message: Trying to access array offset on value of type null
        Filename: models/Mdl_member.php
        Line Number: 94
        
        --------------------
        
        Message: Trying to get property 'id' of non-object
        Filename: controllers/Auth.php
        Line Number: 208
        
        --------------------
        
        Message: Undefined index: token
        Filename: controllers/Auth.php
        Line Number: 219*/
        
        if (strtolower($str) != "m3rc4n73") {
            $refmember = $this->member->getby_refcode($referral);
            $data["id_referral"] = $refmember->id;
        }
        $result = $this->member->add($data); 

		if ($result){
			//kirim email registrasi

			$subject="Trackless Registration";
			$message="Thank you for registering on piggybank<br><br>
			username : ".$email."<br>
			password : (your chosen password)<br><br>
			click this <a href='".base_url("auth/activate?token=").$result['token']."'>link</a> to activate yout account<br><br>
			";

			$this->sendmail($email,$subject, $message); 

		    redirect(base_url()."auth/successregis");

		}else{
		    $this->session->set_flashdata('failed', "<p style='color:black'>Invalid username or password</p>");
		    redirect(base_url()."auth/register");
		}
	
	}
	
	public function activate() {
	    $token = $this->security->xss_clean($this->input->get('token'));
	    $member = $this->member->getby_token($token);
	    $result = false;

	    if ($member) {
	        $result = $this->member->activate($member->ucode);
	    }
	    
	    if ($result){
	        $this->session->set_flashdata('success', "<p style='color:black'>Activation success</p>");
		    redirect(base_url()."auth/login");
            return;
	    } else if ($member && $member->status == 'active') {
	        $this->session->set_flashdata('failed', "<p style='color:black'>Member already active</p>");
		    redirect(base_url()."auth/login");
            return;
	    } else if ($member && $member->status == 'disabled') {
	        $this->session->set_flashdata('failed', "<p style='color:black'>Member is suspended.<br>Please contact administrator</p>");
		    redirect(base_url()."auth/login");
            return;
	    } else {
	        // user sudah aktif/ token salah
	        $this->session->set_flashdata('failed', "<p style='color:black'>activation failed, invalid token.</p>");
		    redirect(base_url()."auth/login");
            return;
	    }		
	}

	public function successregis() {
	    $_SESSION["location"]="/auth/successregis";
        $data = array(
            'title'     => 'Successfully Register',
            'content'   => 'login/sucessregis',
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	public function logout() {
	    $this->session->sess_destroy(); 
		redirect(base_url());
	}
	
	public function sendmail($email,$subject, $message){	
		$mail = $this->phpmailer_lib->load();

		$mail->isSMTP();
        $mail->Host         = 'mail.bankofsatoshi.vip';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'no-reply@bankofsatoshi.vip';
        $mail->Password     = 't)X^m&KTTNmr';
		$mail->SMTPAutoTLS	= false;
		$mail->SMTPSecure	= false;
		$mail->Port			= 587;     

		$mail->setFrom('no-reply@bankofsatoshi.vip', 'Trackless');
		$mail->isHTML(true);

		$mail->ClearAllRecipients();
				 
				
		$mail->Subject = $subject;
		$mail->AddAddress($email);

        $mail->msgHTML($message);
		$mail->send();
	}
	
	public function forgotpass() {
	    // @EHTODO
	    show_404();
	}
	
	public function tes() {
        // Qwerty123!

        $this->load->model("Mdl_currency", "c");
        $this->c->enable("AUD");
	}

}
