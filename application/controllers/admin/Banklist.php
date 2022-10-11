<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banklist extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   
	   if ($this->session->userdata('logged_status') == NULL || $this->session->userdata('logged_status')["role"] != "admin") {
	       show_404();
	       die();
	   }
	   
	   $this->load->model("bank/Mbank", "bank");
    }

	public function index() {
        $data = array(
            'title'     => 'List Bank Account - Piggy Bank',
            'content'   => 'admin/banklist/index',
            'extra'     => 'admin/banklist/js/js_index',
            'menu9'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
	}
	
	public function get_all(){
	    $data["token"]=$this->security->get_csrf_hash();
	    $data["banklist"]=$this->bank->get_all();
        echo  json_encode($data);
	}
	
	
    public function add(){
        $data = array(
            'title'     => 'Add Operator - Piggy Bank',
            'content'   => 'admin/banklist/add',
            'extra'     => 'admin/banklist/js/js_add',
            'menu9'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function savedata(){
        $this->form_validation->set_rules('bic', 'BIC', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('fee', 'fee', 'trim|required|numeric|greater_than_equal_to[0]', array('greater_than_equal_to' => '{field} must greate or equals 0'));

		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('message', $this->message->error_msg(validation_errors()));
		    redirect(base_url()."admin/banklist/add");
            return;
		}
		
        $input		= $this->input;
		$bic		= $this->security->xss_clean($input->post("bic"));
		$bank		= $this->security->xss_clean($input->post("bank"));
		$fee		= $this->security->xss_clean($input->post("fee"));
        
        $mdata = array(
            'bic'           => $bic,
            'bank_name'     => $bank,
            'fee'           => $fee,
            );
        $result = $this->bank->add_bank($mdata);
        
        if ($result) {
            redirect(base_url()."admin/banklist");
        } else {
            print_r($result);
        }
    }
    
    public function changefee(){
        $this->form_validation->set_rules('bic', 'BIC', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('fee', 'fee', 'trim|required|numeric|greater_than_equal_to[0]', array('greater_than_equal_to' => '{field} must greate or equals 0'));

		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('message', $this->message->error_msg(validation_errors()));
		    redirect(base_url()."admin/banklist/add");
            return;
		}
		
        $input		= $this->input;
		$bic		= $this->security->xss_clean($input->get("bic"));
		$bank		= $this->security->xss_clean($input->get("bank"));
        $data = array(
            'title'     => "Change Bank's Fee - Piggy Bank",
            'content'   => 'admin/banklist/cfee',
            'bic'       => $bic,
            'bank'      => $bank,
            'menu9'     => 'active',
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
    
    public function cfeedata(){
		$this->form_validation->set_rules('fee', 'fee', 'trim|required|numeric|greater_than_equal_to[0]', array('greater_than_equal_to' => '{field} must greate or equals 0'));
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('message', $this->message->error_msg(validation_errors()));
		    redirect(base_url()."admin/banklist/changefee");
            return;
		}
		
        $input		= $this->input;
		$fee		= $this->security->xss_clean($input->post("fee"));

    }

}
