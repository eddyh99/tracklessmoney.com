<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tobank extends CI_Controller {

	public function __construct() {
	   parent::__construct();
    }

	public function index()
	{
	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );

        $data=array(
            'title'     =>  'Wallet to Bank - Trackless Money',
            'content'   =>  'member/tobank/index',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
	public function walletbank()
	{
	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );

        $data=array(
            'title'     =>  'Wallet to Bank - Trackless Money',
            'content'   =>  'member/tobank/walletbank',
            'extra'     =>  'member/tobank/js/js_walletbank',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}

    public function confirm() {
        $currency   = $this->input->post('currency');

        $this->form_validation->set_rules('name', 'Recepient Name', 'trim|required');
		$this->form_validation->set_rules('iban', 'IBAN', 'trim|required|alpha_numeric');

        if ($currency == 'USD') {
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('postalcode', 'Postal Code', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('state', 'State', 'trim|required');
        }

		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE){
		    $message=array(
		            "success"   => false,
		            "message"   => validation_errors()
		        );
		    echo json_encode($message);
            return;
		}
		
        $input		= $this->input;
        $amount     = $this->input->post('amount');
        $transfer   = $this->input->post('transfer');

		$name		= $this->security->xss_clean($input->post("name"));
		$iban		= strtoupper($this->security->xss_clean($input->post("iban")));
		$bic		= strtoupper($this->security->xss_clean($input->post("bic")));

		$address	= $this->security->xss_clean($input->post("address"));
		$country	= $this->security->xss_clean($input->post("country"));
		$postal	    = $this->security->xss_clean($input->post("postalcode"));
		$city	    = $this->security->xss_clean($input->post("city"));
		$state	    = $this->security->xss_clean($input->post("state"));
		$account_type= $this->security->xss_clean($input->post("account_type"));
		$causal     = $this->security->xss_clean($input->post("causal"));

 		$deduct=100;
 		$fee=100;
 		$newbalance=$amount-$deduct-$fee;

        $mdata=array(
            'amount'        => $amount,
            'fee'           => $fee,
            'deduct'        => $deduct,
            'newbalance'    => $newbalance,
            'currency'      => $currency,
            'transfer'      => $transfer,

            'name'          => $name,
            'iban'          => $iban,
            'bic'           => $bic,
            'address'       => $address,
            'country'       => $country,
            'postalcode'    => $postal,
            'city'          => $city,
            'state'         => $state,
            'causal'        => $causal,
            'account_type'  => $account_type,
            );
        
        $this->session->set_userdata("walletbank",$mdata);
        $message=array(
	            "success"   => true,
	            "message"   => $mdata
	        );
	    echo json_encode($message);
    }


}
