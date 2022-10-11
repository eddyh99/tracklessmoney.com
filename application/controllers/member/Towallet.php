<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Towallet extends CI_Controller {

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
            'title'     =>  'Wallet to Wallet - Trackless Money',
            'content'   =>  'member/towallet/index',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
	public function sendwallet(){
	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );

        $data=array(
            'title'     =>  'Wallet to Wallet - Trackless Money',
            'content'   =>  'member/towallet/sendwallet',
            'extra'     =>  'member/towallet/js/js_sendwallet',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
    public function getUnique($str){
        //cek apakah str input benar UCODE???
        $i=1;
        if ($i){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function confirm() {
        $this->form_validation->set_rules('unik', 'Unique Code', 'trim|required');
        $this->form_validation->set_rules('confirmunik', 'Confirm Unique Code', 'trim|required|matches[unik]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('confirmamount', 'Confirm Amount', 'trim|required|matches[amount]');
		
		if ($this->form_validation->run() == FALSE){
		    $message=array(
		            "success"   => false,
		            "message"   => validation_errors()
		        );
		    echo json_encode($message);
            return;
		}

        $input		= $this->input;
 		$ucode		= $this->security->xss_clean($input->post("unik"));
 		$amount		= $this->security->xss_clean($input->post("amount"));
 		
 		$deduct=100;
 		$fee=100;
 		$newbalance=$amount-$deduct-$fee;

        $mdata=array(
            'unik'          => $ucode,
            'amount'        => $amount,
            'fee'           => $fee,
            'deduct'        => $deduct,
            'newbalance'    => $newbalance,
            );

	    $message=array(
	            "success"   => true,
	            "message"   => $mdata
	        );
	    echo json_encode($message);
    }

    public function process() {
        $this->form_validation->set_rules('unik', 'Unique Code', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than_equal_to[0]');

        $ucode = $this->input->post('unik');
        $amount = $this->input->post('amount');
        
        $sukses=true;
        if ($sukses){
    	    $this->session->set_flashdata('success', "<p style='color:black'>Payment is successfully processed</p>");
    	    redirect(base_url()."member/towallet/sendwallet");
        }else{
    	    $this->session->set_flashdata('failed', "<p style='color:black'>failed</p>");
    	    redirect(base_url()."member/towallet/sendwallet");
        }
	

    }


}
