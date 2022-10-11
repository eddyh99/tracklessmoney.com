<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   
	   if ($this->session->userdata('logged_status') == NULL || $this->session->userdata('logged_status')["role"] != "admin") {
	       redirect(base_url()."auth/signin");
	       die();
	   }

        $this->load->model("usd/Mdl_user_us", "operator_us");
        $this->load->model("eur/Mdl_user", "operator");
        
        if ($_SESSION['site_currency'] == 'USD') {
    	    $this->load->model("usd/Mdl_transaction", "transaction");
    	    
        }elseif ($_SESSION['site_currency'] == 'EUR'){
    	    $this->load->model("eur/Mdl_transaction", "transaction");
    	    
        }
	   
    }

	public function index() {
	    $_SESSION["location"]="/admin/operator";
        $data = array(
            'title'     => 'Operator - Piggy Bank',
            'content'   => 'admin/operator/index',
            'extra'     => 'admin/operator/js/js_index',
            'menu3'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
	}
    
    public function add(){
	    $_SESSION["location"]="/admin/operator/add";
        $data = array(
            'title'     => 'Add Operator - Piggy Bank',
            'content'   => 'admin/operator/add',
            'extra'     => 'admin/operator/js/js_add',
            'menu3'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function get_all(){
	    $data["token"] = $this->security->get_csrf_hash();
	    $data["operator"] = $this->operator->get_all();
        echo json_encode($data);
	}
    
    public function savedata(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/operator/add");
            return;
		}
		
        $input		= $this->input;
		$name		= $this->security->xss_clean($input->post("name"));
		$email		= $this->security->xss_clean($input->post("email"));
		$pass		= $this->security->xss_clean($input->post("pass"));
        
        $mdata = array(
            'name'      => $name,
            'email'     => $email,
            'password'  => sha1($pass),
            );
        $result = $this->operator->add($mdata);
        
        $mdata['id'] = $result->id;
        $result = $this->operator_us->add($mdata);
        
        $this->session->set_flashdata('success', "<p style='color:black'>Operator successfully added</p>");
        redirect(base_url()."admin/operator");
        return;
    }
    
    public function changepass($email,$name){
		$name		= $this->security->xss_clean($name);
		$email		= base64_decode($this->security->xss_clean($email));
        $data = array(
            'title'     => "Change Operator's Password - Piggy Bank",
            'content'   => 'admin/operator/cpass',
            'name'      => $name,
            'email'     => $email,
            'menu3'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function cpassdata(){
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/operator/changepass");
            return;
		}
		
        $input		= $this->input;
		$email		= $this->security->xss_clean($input->post("email"));
		$pass		= $this->security->xss_clean($input->post("pass"));
		
		$mdata = array('password' => sha1($pass));
		$this->operator->update($email, $mdata);
		$this->operator_us->update($email, $mdata);
		
        $this->session->set_flashdata('success', "<p style='color:black'>Change operator's password is successfull</p>");
		redirect(base_url()."admin/operator");
        
    }
    public function enableoperator($email){
		$email		= base64_decode($this->security->xss_clean($email));
        
        $mdata = array('status' => 'active');
		$this->operator->update($email, $mdata);
		$result = $this->operator_us->update($email, $mdata);
		//print_r($result); die();
		
	    $this->session->set_flashdata('success', "<p style='color:black'>Member successfully enabled</p>");
		redirect(base_url()."admin/operator");
    }
    
    public function disableoperator($email){
		$email		= base64_decode($this->security->xss_clean($email));

        $mdata = array('status' => 'disabled');
		$this->operator->update($email, $mdata);
		$result = $this->operator_us->update($email, $mdata);
		//print_r($result); die();

	    $this->session->set_flashdata('success', "<p style='color:black'>Member successfully disabled</p>");
		redirect(base_url()."admin/operator");
    }
    
    public function history($email){
		$email		= base64_decode($this->security->xss_clean($email));

        $data = array(
            'title'     => "Operator's Transaction History",
            'content'   => 'admin/operator/history',
            'extra'     => 'admin/operator/js/js_history',
            'email'     => $email,
            'menu3'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function detailhistory(){
        $input		= $this->input;
		$email	    = $this->security->xss_clean($input->post("email"));
		
		$isi = $this->transaction->get_transaction_history_by_user($email, 0);
		
		$data["token"]  = $this->security->get_csrf_hash();
		$data["result"] = $isi;
        echo json_encode($data);
    }
    
}
