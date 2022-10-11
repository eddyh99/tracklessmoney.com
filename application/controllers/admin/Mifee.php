<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mifee extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("Mdl_currency", "currency");
	   $this->load->model("Mdl_default_fee", "fee");
    }

	public function index() {
	    //all currency
        // $mdata=array(
        //   array(
        //         "currency"  => "USD",
        //         "symbol"    => "$",
        //         "name"      => "US. Dollar"	                
        //   ),
        //   array(
        //         "currency"  => "EUR",
        //         "symbol"    => "&euro;",
        //         "name"      => "EURO"
        //   ),
        // );
        
        $mdata = array();
        $currencies = $this->currency->get_active();
        foreach ($currencies as $c) {
            $tmp = array(
                "currency"  => $c["currency"],
                "symbol"    => $c["symbol"],
                "name"      => $c["name"]
                );
            $mdata[] = $tmp;
        }

        $data = array(
            'title'     => 'Default Fee - Trackless',
            'content'   => 'admin/mfee/index',
            'extra'     => 'admin/mfee/js/js_index',
            'currency'  => $mdata,
            'menu9'     => 'active',
		);
		
		$this->load->view('layout/wrapper', $data);
	}

	public function getfee(){
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
        
        if ($this->form_validation->run() == FALSE){
            header("HTTP/1.0 406 Not Acceptable");
		    print_r(validation_errors()); die();
		}
		
        $input		    = $this->input;
 		$currency		= $this->security->xss_clean($input->post("currency"));
        
        $mfee = $this->fee->get_single($currency);
        $mdata = array();
        if ($mfee && !empty($mfee)) {
     		$mdata["fee"]=array(
     		        "topup_circuit"         => number_format($mfee->topup_cf, 2,".",","),
     		        "topup_outside"         => number_format($mfee->topup_ocf, 2,".",","),
     		        "wallet2bank_circuit"   => number_format($mfee->wallet2bank_cf, 2,".",","),
     		        "wallet2bank_outside"   => number_format($mfee->wallet2bank_ocf, 2,".",","),
     		        "wallet2wallet"         => number_format($mfee->wallet2wallet_cf, 2,".",","),
     		        "ref_circuit"           => number_format($mfee->referral_cf, 2,".",","),
     		        "ref_outside"           => number_format($mfee->referral_ocf, 2,".",","),
     		        "swap"                  => number_format($mfee->swap_cf, 2,".",","),
     		    );
        } else {
            $mdata["fee"]=array(
     		        "topup_circuit"         => number_format(0, 2,".",","),
     		        "topup_outside"         => number_format(0, 2,".",","),
     		        "wallet2bank_circuit"   => number_format(0, 2,".",","),
     		        "wallet2bank_outside"   => number_format(0, 2,".",","),
     		        "wallet2wallet"         => number_format(0, 2,".",","),
     		        "ref_circuit"           => number_format(0, 2,".",","),
     		        "ref_outside"           => number_format(0, 2,".",","),
     		        "swap"                  => number_format(0, 2,".",","),
     		    );
        }
        echo json_encode($mdata);
	    
	}
	
	
	public function editfee($currency){
	    $currency		= $this->security->xss_clean($currency);

        $mfee = $this->fee->get_single($currency);
        $mdata = array();
        if ($mfee && !empty($mfee)) {
     		$mdata=array(
     		        "topup_circuit"         => number_format($mfee->topup_cf, 2,".",","),
     		        "topup_outside"         => number_format($mfee->topup_ocf, 2,".",","),
     		        "wallet2bank_circuit"   => number_format($mfee->wallet2bank_cf, 2,".",","),
     		        "wallet2bank_outside"   => number_format($mfee->wallet2bank_ocf, 2,".",","),
     		        "wallet2wallet"         => number_format($mfee->wallet2wallet_cf, 2,".",","),
     		        "ref_circuit"           => number_format($mfee->referral_cf, 2,".",","),
     		        "ref_outside"           => number_format($mfee->referral_ocf, 2,".",","),
     		        "swap"                  => number_format($mfee->swap_cf, 2,".",","),
     		    );
        } else {
            $mdata=array(
     		        "topup_circuit"         => number_format(0, 2,".",","),
     		        "topup_outside"         => number_format(0, 2,".",","),
     		        "wallet2bank_circuit"   => number_format(0, 2,".",","),
     		        "wallet2bank_outside"   => number_format(0, 2,".",","),
     		        "wallet2wallet"         => number_format(0, 2,".",","),
     		        "ref_circuit"           => number_format(0, 2,".",","),
     		        "ref_outside"           => number_format(0, 2,".",","),
     		        "swap"                  => number_format(0, 2,".",","),
     		    );
        }

        $data = array(
            'title'     => "Edit Default Fee - Trackless",
            'content'   => 'admin/mfee/edit',
            'extra'     => 'admin/mfee/js/js_edit',
            'miffee'    =>  $mdata,
            'currency'  =>  $currency,
            'menu9'     => 'active',
		);
		
		$this->load->view('layout/wrapper', $data);
	}
    
    public function savefee(){
        $input		    = $this->input;
		$currency	    = $this->security->xss_clean($input->post("currency"));

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
		$this->form_validation->set_rules('topup_circuit', 'Circuit Receive','trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('topup_outside', 'Outside Circuit Receive', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet2bank_circuit', 'Circuit Transfer', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet2bank_outside', 'Outside Circuit Transfer', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet2wallet', 'Wallet to Wallet', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('ref_circuit', 'Referral Circuit', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('ref_outside', 'Referral Outside Circuit', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('swap', 'Swap', 'trim|required|numeric|greater_than_equal_to[0]');

		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/mifee/editfee/".$currency);
            return;
		}
		$topup_circuit	      = $this->security->xss_clean($input->post("topup_circuit"));
		$topup_outside	      = $this->security->xss_clean($input->post("topup_outside"));
		$wallet2bank_circuit  = $this->security->xss_clean($input->post("wallet2bank_circuit"));
		$wallet2bank_outside  = $this->security->xss_clean($input->post("wallet2bank_outside"));
		$wallet2wallet  	  = $this->security->xss_clean($input->post("wallet2wallet"));
        $ref_circuit	      = $this->security->xss_clean($input->post("ref_circuit"));
		$ref_outside          = $this->security->xss_clean($input->post("ref_outside"));
		$swap	              = $this->security->xss_clean($input->post("swap"));
		
		$mfee = $this->fee->get_single($currency);
        $mdata = array();
        if ($mfee && !empty($mfee)) {
     		$mdata=array(
     		        "currency"              => $currency,
     		        "topup_cf"              => $topup_circuit,
     		        "topup_ocf"             => $topup_outside,
     		        "wallet2bank_cf"        => $wallet2bank_circuit,
     		        "wallet2bank_ocf"       => $wallet2bank_outside,
     		        "wallet2wallet_cf"      => $wallet2wallet,
     		        "referral_cf"           => $ref_circuit,
     		        "referral_ocf"          => $ref_outside,
     		        "swap_cf"               => $swap,
     		    );
        }

        $this->fee->update($mdata);
        redirect(base_url()."admin/mifee");
    }

}
