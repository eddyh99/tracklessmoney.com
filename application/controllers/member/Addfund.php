<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfund extends CI_Controller {

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
            'title'     =>  'Add/Receive Funds - Trackless Money',
            'content'   =>  'member/addfund/index',
            'extra'     =>  'member/addfund/js/js_index',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
	public function showbank()
	{
	    $type       = $_GET["type"];
	    $currency   = $_SESSION["currency"];
	    
	    
	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );
	        
	    $mifbank=array(
	        "recipient_name"    => 'Agus Budiman',
	        "routing_number"    => '084009519',
	        "account_number"    => '9600001684642699',
	        "bank_name"         => '',
	        "bank_address"      => '16192 Coastal Highway, Lewes, Delaware, 19958',
	    );

	    $mifbank_inter=array(
	        "recipient_name"    => 'Agus Budiman',
	        "IBAN"              => '084009519',
	        "BIC"               => 'CMFGUS33',
	        "bank_name"         => '',
	        "bank_address"      => '16192 Coastal Highway, Lewes, Delaware, 19958',
	    );
        
        $data=array(
            'title'     =>  'Add/Receive Funds - Trackless Money',
            'content'   =>  'member/addfund/showbank',
            'extra'     =>  'member/addfund/js/js_addfund',
            'type'      =>  $type,
            'currency'  =>  $mdata,
            'mifbank'   =>  $mifbank,
            'mifbank_inter'   =>  $mifbank_inter,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}

}
