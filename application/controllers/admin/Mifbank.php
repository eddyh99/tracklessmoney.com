<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mifbank extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("Mdl_mifbank_account", "mifbank");
    }

	public function index() {
        $data = array(
            'title'     => "MIF's Bank Account - Trackless",
            'content'   => 'admin/mifbank/index',
            'menu8'     => 'active',
		);
		
		$currency = $_SESSION["currency"];
		//ambil bank circuit/outside circuit sesuai dengan currency
		$mifbank = $this->mifbank->get_single($currency);
		
		if ($mifbank && !empty($mifbank)) {
		    $data["circuit"]=array(
                'recipient_name' => $mifbank->c_registered_name,
                'account_number' => $mifbank->c_account_number,
                'bic'            => $mifbank->c_routing_number,
                'bank_name'      => $mifbank->c_bank_name,
                'bank_address'   => $mifbank->c_bank_address,
    		);
    		$data["outside"]=array(
                    'recipient_name' => $mifbank->oc_registered_name,
                    'account_number' => $mifbank->oc_iban,
                    'bic'            => $mifbank->oc_bic,
                    'bank_name'      => $mifbank->oc_bank_name,
                    'bank_address'   => $mifbank->oc_bank_address,
    		);
    
    		$this->load->view('layout/wrapper', $data);
		} else {
		    // MIF bank kosong
		    // @EHTODO
		    $data["circuit"]=array(
                'recipient_name' => "PT MONEY MIF dummy",
                'account_number' => "123456",
                'bic'            => "JNAMNB",
                'bank_name'      => "bank geto",
                'bank_address'   => "101 jancok st, fl, USA",
    		);
    		$data["outside"]=array(
                    'recipient_name' => "PT MONEY MIF dummy",
                    'account_number' => "123456",
                    'bic'            => "JNAMNB",
                    'bank_name'      => "bank geto",
                    'bank_address'   => "101 jancok st, fl, USA",
    		);
    
    		$this->load->view('layout/wrapper', $data);
		}
		
		
	}
	
	public function editmif(){
		$currency = $_SESSION["currency"];
		//ambil bank circuit/outside circuit sesuai dengan currency
		$mifbank = $this->mifbank->get_single($currency);
		
		$data = array(
            'title'     => "Edit MIF's Bank Account - Trackless",
            'content'   => 'admin/mifbank/edit',
            'menu8'     => 'active',
		);
		
		if ($mifbank && !empty($mifbank)) {
		    $data["circuit"]=array(
                'recipient_name' => $mifbank->c_registered_name,
                'account_number' => $mifbank->c_account_number,
                'bic'            => $mifbank->c_routing_number,
                'bank_name'      => $mifbank->c_bank_name,
                'bank_address'   => $mifbank->c_bank_address,
    		);
    		$data["outside"]=array(
                    'recipient_name' => $mifbank->oc_registered_name,
                    'account_number' => $mifbank->oc_iban,
                    'bic'            => $mifbank->oc_bic,
                    'bank_name'      => $mifbank->oc_bank_name,
                    'bank_address'   => $mifbank->oc_bank_address,
    		);
		} else {
		    // MIF bank kosong
		    // @EHTODO
		    $data["circuit"]=array(
                'recipient_name' => "PT MONEY MIF dummy",
                'account_number' => "123456",
                'bic'            => "JNAMNB",
                'bank_name'      => "bank geto",
                'bank_address'   => "101 jancok st, fl, USA",
    		);
    		$data["outside"]=array(
                    'recipient_name' => "PT MONEY MIF dummy",
                    'account_number' => "123456",
                    'bic'            => "JNAMNB",
                    'bank_name'      => "bank geto",
                    'bank_address'   => "101 jancok st, fl, USA",
    		);
		}
		
		

        
// 		$data["circuit"]=array(
//                 'recipient_name' => "PT MONEY MIF",
//                 'account_number' => "123456",
//                 'bic'            => "JNAMNB",
//                 'bank_name'      => "bank geto",
//                 'bank_address'   => "101 jancok st, fl, USA",
// 		);
// 		$data["outside"]=array(
//                 'recipient_name' => "PT MONEY MIF",
//                 'account_number' => "123456",
//                 'bic'            => "JNAMNB",
//                 'bank_name'      => "bank geto",
//                 'bank_address'   => "101 jancok st, fl, USA",
// 		);
		
		$this->load->view('layout/wrapper', $data);
	}
    
    public function savemif(){
        $this->form_validation->set_rules('circuit_name', 'Recepient Name', 'trim|required');
	    $this->form_validation->set_rules('circuit_account_number', 'Account Number', 'trim|required');
	    $this->form_validation->set_rules('circuit_bic', 'BIC/Routing Number', 'trim|required');
	    $this->form_validation->set_rules('circuit_bank_name', 'Bank Name', 'trim|required');
		$this->form_validation->set_rules('circuit_bank_address', 'Bank Address', 'trim|required');
    	$this->form_validation->set_rules('outside_name', 'Outside Recepient Name', 'trim|required');
        $this->form_validation->set_rules('outside_account_number', 'Outside Account Number', 'trim|required');
	    $this->form_validation->set_rules('outside_bic', 'Outside BIC', 'trim|required');
	    $this->form_validation->set_rules('outside_bank_name', 'Outside Bank Name', 'trim');
		$this->form_validation->set_rules('outside_bank_address', 'Outside Bank Address', 'trim');

		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/mifbank/edit");
            return;
		}
		
        $input		            = $this->input;
		$circuit_name		    = $this->security->xss_clean($input->post("circuit_name"));
		$circuit_account_number	= $this->security->xss_clean($input->post("circuit_account_number"));
		$circuit_bic		    = $this->security->xss_clean($input->post("circuit_bic"));
		$circuit_bank_name		= $this->security->xss_clean($input->post("circuit_bank_name"));
		$circuit_bank_address	= $this->security->xss_clean($input->post("circuit_bank_address"));
		$outside_name		    = $this->security->xss_clean($input->post("outside_name"));
		$outside_account_number	= $this->security->xss_clean($input->post("outside_account_number"));
		$outside_bic		    = $this->security->xss_clean($input->post("outside_bic"));
		$outside_bank_name		= $this->security->xss_clean($input->post("outside_bank_name"));
		$outside_bank_address	= $this->security->xss_clean($input->post("outside_bank_address"));
    
        $currency = $_SESSION["currency"];
        $mdata = array(
            "currency"              => $currency,
            "c_registered_name"     => $circuit_name,
            "c_account_number"      => $circuit_account_number,
            "c_routing_number"      => $circuit_bic,
            "oc_registered_name"    => $outside_name,
            "oc_iban"               => $outside_account_number,
            "oc_bic"                => $outside_bic,
            );
            
        if ($circuit_bank_name && !empty($circuit_bank_name)) {
            $mdata["c_bank_name"] = $circuit_bank_name;
        } else {
            $mdata["c_bank_name"] = NULL;
        }
        if ($circuit_bank_address && !empty($circuit_bank_address)) {
            $mdata["c_bank_address"] = $circuit_bank_address;
        } else {
            $mdata["c_bank_address"] = NULL;
        }
        if ($outside_bank_name && !empty($outside_bank_name)) {
            $mdata["oc_bank_name"] = $outside_bank_name;
        } else {
            $mdata["oc_bank_name"] = NULL;
        }
        if ($outside_bank_address && !empty($outside_bank_address)) {
            $mdata["oc_bank_address"] = $outside_bank_address;
        } else {
            $mdata["oc_bank_address"] = NULL;
        }
        
        $result = $this->mifbank->update($mdata);
        redirect(base_url()."admin/mifbank");
    }
    

}
