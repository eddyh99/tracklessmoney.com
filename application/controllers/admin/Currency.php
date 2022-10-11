<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("Mdl_currency", "currency");
    }

	public function index() {
	    //list semua currency
        // $available=array(
	       //     array(
	       //         "currency"  => "EUR",
	       //         "symbol"    => "&euro;",
	       //         "name"      => "EURO",
	       //         "is_active" => true
	       //         ),
	       //     array(
	       //         "currency"  => "AUD",
	       //         "symbol"    => "A$",
	       //         "name"      => "Australian Dollar",
	       //         "is_active" => false
	       //         ),
	       //     array(
	       //         "currency"  => "RMB",
	       //         "symbol"    => "元",
	       //         "name"      => "Chinese Yuan",
	       //         "is_active" => false
	       //         )
	       //);
        $curr = $this->currency->get_all();
        $available = array();
        foreach ($curr as $c) {
            $tmp = array(
                "currency"  => $c["currency"],
	            "symbol"    => $c["symbol"],
	            "name"      => $c["name"],
	            "is_active" => ($c["status"] == "active")?TRUE:FALSE
                );
                $available[] = $tmp;
        }
        
        $data=array(
            'title'     =>  'Select Currency - Trackless Money',
            'content'   =>  'admin/currency/currency',
            'extra'     =>  'admin/currency/js/js_currency',
            'currency'  =>  $available,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}

	public function setcurrency(){
	    $this->form_validation->set_rules('currency', 'Currency', 
            array(
                'trim', 'required',
                array(
                    'currency',
                    function($str) {
                        $c = $this->currency->get_single($str);
                        return ($c != NULL);
                    }
                )
                
            ), array(
            'currency' => '{field} is unknown. '
            )
        );
        $this->form_validation->set_rules('status', 'Status',"trim|required");
        
		if ($this->form_validation->run() == FALSE){
		  //  $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		  //  redirect(base_url()."auth/register");
		  //@EHTODO currency ga diketahui
		  print_r(validation_errors()); die();
		}
		
	    //set aktif or not aktif true or false
	    $input		    = $this->input;
 		$currency		= $this->security->xss_clean($input->post("currency"));
 		$status		    = $this->security->xss_clean($input->post("status"));
 		
 		$result = FALSE;
 		if ($status == FALSE) {
 		    // $status itu isinya status SAAT INI.. kudu dibalik kalo mau diproses (KATA EH)
 		    $result = $this->currency->enable($currency);
 		} else if ($status == TRUE) {
 		    $result = $this->currency->disable($currency);
 		}
 		
 		//@EHTODO cek
 		echo json_decode($result);
 		
	}

    public function cekapi(){
        $profile="16555499";
        $url_quote="https://api.sandbox.transferwise.tech/v2/quotes";        
        //$url_quote="https://detik.com";
        //source dan target currency yang sama
        $dataquote=array(
        	"sourceCurrency"    => 'USD',
        	"targetCurrency"    => 'USD',
        	"sourceAmount"      => 10,
        	"targetAmount"      => null,
            "profile"           => $profile,
            "type"              => "BALANCE_PAYOUT",
        );
        
        $postData=json_encode($dataquote);

        //real api
        $token="33b1a034-7c6d-4740-99fa-d60b48ed48b8";
        
        $ch     = curl_init($url_quote);
        $headers    = array(
            'Authorization: Bearer '.$token,
            'Content-Type: application/json'
        );
        
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            print_r("error: ".$error_msg);
        }
        print_r($result);
        curl_close($ch);
        
    }
}
