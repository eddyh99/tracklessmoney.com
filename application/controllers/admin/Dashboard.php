<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	   parent::__construct();
    }

	public function index()
	{
	    //semua currency yang ada
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
            'title'     =>  'Dashboard - Trackless Money',
            'content'   =>  'admin/dashboard/index',
            'extra'     =>  'admin/dashboard/js/js_index',
            'currency'  =>  $mdata,
            'is_home'   =>  true
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	

    
    public function number_transaction_perday(){
        // ada berapa banyak transaksi untuk topup, wallet2wallet, wallet2bank

    }
    
    public function amount_fee_perday(){
        // berapa fee dari topup, wallet2wallet, wallet2bank
    }
    
    public function mifnetincome(){
    }
    
    public function lasttransaction(){
    }
    
    public function list() {
        print_r($this->dashboard->get_total_transaction_yearly());
    }

}
