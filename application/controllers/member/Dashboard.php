<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	   parent::__construct();
    }

	public function index()
	{
	    //ada saldo akan muncul semua
	    $mdata=array(
	           array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	           ),
	           array(
	                "currency"  => "EUR",
	                "symbol"    => "&euro;",
                    "saldo"     => 1500	                
	           ),
	        );
        $data=array(
            'title'     =>  'Home - Trackless Money',
            'content'   =>  'member/dashboard/index',
            'extra'     =>  'member/dashboard/js/js_index',
            'currency'  =>  $mdata,
            'is_home'   =>  true
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
	public function wallet($cur){
	    $_SESSION["currency"]=$cur;
	    //ambil data berdasar currency input
	    $cur="USD";

	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );
	        
        $data=array(
            'title'     =>  'Wallet - Trackless Money',
            'content'   =>  'member/dashboard/wallet',
            'extra'     =>  'member/dashboard/js/js_wallet',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
	public function listdata(){
	    $isi=array(
    	        array(
    	            "ket"       => "halo",
    	            "tanggal"   => "2021-08-16",
    	            "debit"     => 10000,
    	            "kredit"    => 10000,
    	            "fee"       => 500,
    	            "saldo"     => 0,
    	       ),
    	        array(
    	            "ket"       => "hola",
    	            "tanggal"   => "2021-08-16",
    	            "debit"     => 10000,
    	            "kredit"    => 10000,
    	            "fee"       => 500,
    	            "saldo"     => 0,
    	       ),
	        );

	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}
	
	public function currencyavailable(){
	    //list semua currency yang sudah aktif dari admin
        $available=array(
	            array(
	                "currency"  => "EUR",
	                "symbol"    => "&euro;",
	                "name"      => "EURO",
	                "is_active" => true
	                ),
	            array(
	                "currency"  => "AUD",
	                "symbol"    => "A$",
	                "name"      => "Australian Dollar",
	                "is_active" => false
	                ),
	            array(
	                "currency"  => "RMB",
	                "symbol"    => "元",
	                "name"      => "Chinese Yuan",
	                "is_active" => false
	                )
	       );
        
        $data=array(
            'title'     =>  'Select Currency - Trackless Money',
            'content'   =>  'member/dashboard/currency',
            'extra'     =>  'member/dashboard/js/js_currency',
            'currency'  =>  $available,
        );
	    
		$this->load->view('layout/wrapper',$data);	    
	}
	
	public function setcurrency(){
	    //set aktif or not aktif true or false
	    $input		          = $this->input;
 		$currency		= $this->security->xss_clean($input->post("currency"));
 		
	}

}
