<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mifcost extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("Mdl_currency", "currency");
	   $this->load->model("Mdl_default_cost", "cost");
    }

	public function index() {
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
            'title'     => 'Default Cost - Trackless',
            'content'   => 'admin/mcost/index',
            'currency'  =>  $mdata,
            'menu7'     => 'active',
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	public function getcost(){
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
            print_r(validation_errors());
            return;
		}
		
        $input		    = $this->input;
 		$currency		= $this->security->xss_clean($input->post("currency"));
 		
 		$cost = $this->cost->get_single($currency);
 		if ($cost && !empty($cost)) {
            $mdata  = array(
                "sepa_transfer_fxd" => $cost->transfer_cf,
                "int_transfer_fxd"  => $cost->transfer_ocf,
            );
    
            echo json_encode($mdata);
 		} else {
            header("HTTP/1.0 406 Not Acceptable");
            echo "Failed to get Cost From wise";
 		}
	    
	}

	public function refreshcost(){
	    //call wise api getcost
	    $currencies = $this->currency->get_all();
	    
	    $error = NULL;
	    $error_min = array();
	    
	    foreach($currencies as $c) {
	        $error = $this->cost->refresh($c["currency"]);
	    }
	    
        redirect(base_url()."admin/mifcost");
	}
    
}
