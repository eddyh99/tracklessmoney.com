<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
	    parent::__construct();
        $this->load->model("mdl_member", "member");
        $this->load->model("Mdl_default_fee", "default_fee");
        $this->load->model("Mdl_fee", "fee");
    }

	public function index() {
        $data = array(
            'title'     => 'Member - Trackless',
            'content'   => 'admin/member/index',
            'extra'     => 'admin/member/js/js_index',
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	public function get_all(){
	    
	   // $mdata=array(
	   //     array(
	   //         "email"     =>  "3a3aj4g4@gmail.com",
	   //         "ucode"     =>  "rq3zqk8y",
	   //         "referral"  =>  "pr1nc3xx",
	   //         "status"    =>  "active",
	   //         "last_login"=>  "2022-05-29 23:57:18"
	   //    ),array(
	   //         "email"     =>  "kampret@gmail.com",
	   //         "ucode"     =>  "rq3zqk8x",
	   //         "referral"  =>  "pr1nc3xx",
	   //         "status"    =>  "disabled",
	   //         "last_login"=>  "2022-05-29 23:57:18"
	   //    )
	        
	   // );
	   $currency = $this->session->userdata("currency");
	   $all = $this->member->get_all($currency);
	   
	   $mdata = array();
	   foreach($all as $member) {
	       $m = array(
	           "email"     =>  $member["email"],
	           "ucode"     =>  $member["ucode"],
	           "referral"  =>  $member["referral"],
	           "status"    =>  $member["status"],
	           "last_login"=>  $member["last_accessed"]==NULL?"-":$member["last_accessed"],
	           );
	       $mdata[] = $m;
	   }

	    $data["token"] = $this->security->get_csrf_hash();
	    $data["member"] = $mdata;
        echo json_encode($data);
	}
    
    public function changepass($uniquecode){
		$uniquecode	= $this->security->xss_clean($uniquecode);
        $data = array(
            'title'     => 'Change Password - Trackless',
            'content'   => 'admin/member/cpass',
            'uniquecode'=> $uniquecode,
            'menu4'     => 'active',
		);
		$this->load->view('layout/wrapper', $data);
        
    }

    public function cpassdata(){
        //$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
        $this->form_validation->set_rules('uniquecode', 'Unique Code', 
            array(
                'trim', 'required', 
                array(
                    'ucode',
                    function($str) {
                        $member = $this->member->getby_ucode($str);
                        return $member && !empty($member);
                    }
                )
                
            ), array(
                'ucode' => '{field} is unknown}',
            )
        );
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
        
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/member/changepass");
            return;
		}
        
        $input		= $this->input;
		$uniquecode	= $this->security->xss_clean($input->post("uniquecode"));
		$password	= $this->security->xss_clean($input->post("pass"));
        
        //$mdata = array("ucode"=> $uniquecode, 'password' => sha1($password));
        $this->member->change_password($uniquecode, sha1($password));

	    $this->session->set_flashdata('success', "<p style='color:black'>Password successfully updated</p>");
	    redirect(base_url()."admin/member");
        return;
    }
    
    public function enablemember($uniquecode){
		$uniquecode	= $this->security->xss_clean($uniquecode);
		
		//$mdata = array('status' => 'active');
		$this->member->enable_member($uniquecode);

	    $this->session->set_flashdata('success', "<p style='color:black'>Member successfully enabled</p>");
	    redirect(base_url()."admin/member");
    }

    public function disablemember($uniquecode){
		$uniquecode	= $this->security->xss_clean($uniquecode);
		
// 		$mdata = array('status' => 'disabled');
        $this->member->disable_member($uniquecode);

	    $this->session->set_flashdata('success', "<p style='color:black'>Member successfully disabled</p>");
	    redirect(base_url()."admin/member");
    }

    public function activate($uniquecode){
		$uniquecode	= $this->security->xss_clean($uniquecode);
		
		//$mdata = array('status' => 'active', 'token'=>null, "activated");
		$this->member->activate($uniquecode);

	    $this->session->set_flashdata('success', "<p style='color:black'>Member successfully activated</p>");
	    redirect(base_url()."admin/member");
    }
    
    public function memberfee($uniquecode,$email){
        $currency = $_SESSION["currency"];
		$uniquecode	= $this->security->xss_clean($uniquecode);
		$email		= base64_decode($this->security->xss_clean($email));
        
        $member = $this->member->getby_ucode($uniquecode);
        // print_r($member); echo "<hr>";
        if ($member && !empty($member)) {
            $mfee = $this->fee->getby_id($member->id, $currency);
            // print_r($fee); echo "<hr>";
            if ($mfee && !empty($mfee)) {
                // do nothing
            } else {
                $mfee = $this->default_fee->get_single($currency);
                // print_r($fee); echo "<hr>";
            }
            print_r($fee); echo "<hr>";

            $mdata = array();
            if ($mfee && !empty($mfee)) {
                $mdata  = array(
                    "topup_sepa_pct"        => number_format($mfee->topup_cp * 100, 2,".",","),
         		    "topup_sepa_fxd"        => number_format($mfee->topup_cf, 2,".",","),
         	        "topup_int_pct"         => number_format($mfee->topup_ocp * 100, 2,".",","),
         	        "topup_int_fxd"         => number_format($mfee->topup_ocf, 2,".",","),
         	        "wallet2bank_sepa_pct"  => number_format($mfee->wallet2bank_cp * 100, 2,".",","),
         	        "wallet2bank_sepa_fxd"  => number_format($mfee->wallet2bank_cf, 2,".",","),
         	        "wallet2bank_int_pct"   => number_format($mfee->wallet2bank_ocp * 100, 2,".",","),
         	        "wallet2bank_int_fxd"   => number_format($mfee->wallet2bank_ocf, 2,".",","),
         	        "wallet2wallet_pct"     => number_format($mfee->wallet2wallet_cp * 100, 2,".",","),
         	        "wallet2wallet_fxd"     => number_format($mfee->wallet2wallet_cf, 2,".",","),
         	        "swap_pct"              => number_format($mfee->swap_cp * 100, 2,".",","),
         	        "swap_fxd"              => number_format($mfee->referral_cf, 2,".",","),
                    );
            } else {
                $mdata  = array(
                    "topup_sepa_pct"        => number_format(0, 2,".",","),
                    "topup_sepa_fxd"        => number_format(0, 2,".",","),
                    "topup_int_pct"         => number_format(0, 2,".",","),
                    "topup_int_fxd"         => number_format(0, 2,".",","),
                    "wallet2bank_sepa_pct"  => number_format(0, 2,".",","),
                    "wallet2bank_sepa_fxd"  => number_format(0, 2,".",","),
                    "wallet2bank_int_pct"   => number_format(0, 2,".",","),
                    "wallet2bank_int_fxd"   => number_format(0, 2,".",","),
                    "wallet2wallet_pct"     => number_format(0, 2,".",","),
                    "wallet2wallet_fxd"     => number_format(0, 2,".",","),
                    "swap_pct"              => number_format(0, 2,".",","),
                    "swap_fxd"              => number_format(0, 2,".",","),
                    );
            }
            
            
            $data = array(
                'title'     => 'Change Fee - Trackless',
                'content'   => 'admin/member/fee',
                'extra'     => 'admin/member/js/js_fee',
                'email'     => $email,
                'uniquecode'=> $uniquecode,
                'miffee'    => $mdata,
                'menu4'     => 'active',
    		);
   
    		$this->load->view('layout/wrapper', $data);
        } else {
            //@EHTODO unique code ga terdefinisi
        }
    }
    
    public function changefee(){
        // $this->form_validation->set_rules('unik', 'Unique Code', 'trim|required');
        $this->form_validation->set_rules('unik', 'Unique Code', 
            array(
                'trim', 'required', 
                array(
                    'ucode',
                    function($str) {
                        $member = $this->member->getby_ucode($str);
                        return $member && !empty($member);
                    }
                )
                
            ), array(
                'ucode' => '{field} is unknown}',
            )
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('topup_sepa_pct', 'Topup Circuit %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('topup_sepa_fxd', 'Topup Circuit (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('topup_int_pct', 'Topup Outside Circuit %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('topup_int_fxd', 'Topup Outside Circuit (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('walet2bank_sepa_pct', 'Wallet to Bank Circuit %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('walet2bank_sepa_fxd', 'Wallet to Bank Circuit (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('walet2bank_int_pct', 'Wallet to Bank Outside Circuit %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('walet2bank_int_fxd', 'Wallet to Bank Outside Circuit (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('wallet2wallet_pct', 'Wallet to Wallet %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('wallet2wallet_fxd', 'Wallet to Wallet (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('swap_pct', 'Swap %', 'trim|required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('swap_fxd', 'Swap (Fixed)', 'trim|required|numeric|greater_than_equal_to[0]');
        
        if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    //redirect(base_url()."admin/member/memberfee/".$unik."/".base64_encode($email));
		    print_r(validation_errors()); die();
            return;
		}
		
        $input		= $this->input;
		$unik		= $this->security->xss_clean($input->post("unik"));
		$email		= $this->security->xss_clean($input->post("email"));
		$member = $this->member->getby_ucode($unik);
        $id_member = $member->id;
		$topup_sepa_pct		 = $this->security->xss_clean($input->post("topup_sepa_pct"));
		$topup_sepa_fxd		 = $this->security->xss_clean($input->post("topup_sepa_fxd"));
		$topup_int_pct		 = $this->security->xss_clean($input->post("topup_int_pct"));
		$topup_int_fxd		 = $this->security->xss_clean($input->post("topup_int_fxd"));
		$wallet2bank_sepa_pct = $this->security->xss_clean($input->post("walet2bank_sepa_pct"));
		$wallet2bank_sepa_fxd = $this->security->xss_clean($input->post("walet2bank_sepa_fxd"));
		$wallet2bank_int_pct  = $this->security->xss_clean($input->post("walet2bank_int_pct"));
		$wallet2bank_int_fxd  = $this->security->xss_clean($input->post("walet2bank_int_fxd"));
		$wallet2wallet_pct   = $this->security->xss_clean($input->post("wallet2wallet_pct"));
		$wallet2wallet_fxd   = $this->security->xss_clean($input->post("wallet2wallet_fxd"));
		$swap_pct   = $this->security->xss_clean($input->post("swap_pct"));
		$swap_fxd   = $this->security->xss_clean($input->post("swap_fxd"));
		$currency = $this->session->userdata("currency");
		
		$mdata=array(
		    "id_member"             => $id_member,
		    "currency"              => $currency,
		    "topup_cp"              => $topup_sepa_pct/100,
		    "topup_cf"              => $topup_sepa_fxd,
		    "topup_ocp"             => $topup_int_pct/100,
		    "topup_ocf"             => $topup_int_fxd,
		    "wallet2bank_cp"        => $wallet2bank_sepa_pct/100,
		    "wallet2bank_cf"        => $wallet2bank_sepa_fxd,
		    "wallet2bank_ocp"       => $wallet2bank_int_pct/100,
		    "wallet2bank_ocf"       => $wallet2bank_int_fxd,
		    "wallet2wallet_cp"      => $wallet2wallet_pct/100,
		    "wallet2wallet_cf"      => $wallet2wallet_fxd,
		    "swap_cp"               => $swap_pct/100,
		    "swap_cf"               => $swap_fxd,
     	);
       
        $result = $this->fee->update($mdata);
		$this->session->set_flashdata('success', "<p style='color:black'>Member's Fee Successfully updated</p>");
		redirect(base_url()."admin/member");
    }
    
    public function history($uniquecode){
		$uniquecode	= $this->security->xss_clean($uniquecode);
        $data = array(
            'title'     => 'Transaction History - Trackless',
            'content'   => 'admin/member/history',
            'extra'     => 'admin/member/js/js_history',
            'uniquecode'=> $uniquecode,
            'menu4'     => 'active',
		);
		$this->load->view('layout/wrapper', $data);
    }
    
	public function detailhistory(){
        $input		= $this->input;
		$uniquecode = $this->security->xss_clean($input->post("unik"));
		
		$isi=array(
		        array(
		            "ket"       => "transfer yo",
		            "debit"     => 1000,
		            "kredit"    => 0,
		            "fee"       => 15,
		            "saldo"     => 1,
		            "tanggal"   => "2022-07-30",
		        ),
		        array(
		            "ket"       => "terima yo",
		            "debit"     => 0,
		            "kredit"    => 1000,
		            "fee"       => 15,
		            "saldo"     => 1000,
		            "tanggal"   => "2022-07-30",
		        )
		    );
	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}
	
	
    public function email(){
        $member=$this->member->get_all();
        $data = array(
            'title'     => 'Email - Piggy Bank',
            'content'   => 'admin/member/email',
            'extra'     => 'admin/member/js/js_email',
            'member'    => $member,
            'menu4'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function send(){
        $input		= $this->input;
		$email	    = $this->security->xss_clean($input->post("tujuan"));
		$all	    = $this->security->xss_clean($input->post("all"));
		$message	= $this->security->xss_clean($input->post("message"));
		$subject	= $this->security->xss_clean($input->post("subject"));
		
        if (!isset($all)){
            $member=$this->member->get_all();
            foreach ($member as $dt){
                $this->sendmail($dt["email"],$subject,$message);
            }
        }else{
            foreach ($email as $dt){
                $this->sendmail($dt,$subject,$message);
            }
        }
	    $this->session->set_flashdata('success', "<p style='color:black'>Email is successfully schedule to send</p>");
	    redirect(base_url()."admin/member");
        return;
    }   
    
    public function sendmail($email,$subject, $message){	
		$mail = $this->phpmailer_lib->load();
				   
		$mail->isSMTP();
        $mail->Host = 'mail.piggybankservice.vip';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@piggybankservice.vip';
        $mail->Password = 't)X^m&KTTNmr';
		$mail->SMTPAutoTLS	= false;
		$mail->SMTPSecure	= false;
		$mail->Port			= 587;           

		$mail->setFrom('no-reply@piggybankservice.vip', 'PiggyBank');
		$mail->isHTML(true);

		$mail->ClearAllRecipients();
				 
				
		$mail->Subject = $subject;
		$mail->AddAddress($email);

        $mail->msgHTML($message);
		$mail->send();
	}
	
/*	public function list($uniquecode) {
	    $member = $this->member->get_single_by_ucode($uniquecode);
	    $isi = $this->transaction->get_transaction($member->id);
	    print_r($isi);
	}

*/
}
