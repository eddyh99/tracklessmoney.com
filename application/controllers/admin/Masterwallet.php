<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterwallet extends CI_Controller {

	public function __construct() {
	   parent::__construct();
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
            'content'   =>  'admin/mwallet/index',
            'extra'     =>  'admin/mwallet/js/js_wallet',
            'currency'  =>  $mdata,
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
    
    public function historymwallet(){
	    $isi=array(
	        array(
	            "ket"       => "halo",
	            "tanggal"   => "2021-08-16",
	            "amount"    => 10000,
	            "cost"      => 10,
	            "referral"  => 5,
	            "mif_fee"   => 1,
            ),array(
	            "ket"       => "hola",
	            "tanggal"   => "2021-08-16",
	            "amount"    => 10000,
	            "cost"      => 10,
	            "referral"  => 5,
	            "mif_fee"   => 1,
            )
	    );
	   
	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}


    public function addwithdraw(){
	    $_SESSION["currency"]=$cur;
	    //ambil data berdasar currency input
	    $cur="USD";

	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );

        $data = array(
            'title'     => 'Master Wallet Withdraw - Trackless',
            'content'   => 'admin/mwallet/add',
            'extra'     => 'admin/mwallet/js/js_add',
            'menu2'     => 'active',
            'balance'   => $mdata,
		);
		$this->load->view('layout/wrapper',$data);
    }
    
    public function savedata(){
        $costdb = $this->cost->get_single();
        $balance = $this->wallet->get_balance();
        $amount = preg_replace('#(\d),(\d)#','$1$2',$this->input->post('amount'));
        if ($amount<=0){
		    $this->session->set_flashdata('failed', "<p style='color:black'>Amount cannot be negative</p>");
		    redirect(base_url()."admin/masterwallet/addwithdraw");
            return;
        }
        
        $type = $this->input->post('type');
        // if ($type == 'sepa') {
        //     $cost = $costdb->sepa_transfer_pct * $amount + $costdb->sepa_transfer_fxd;
        // } else {
        //     $cost = $costdb->int_transfer_pct * $amount + $costdb->int_transfer_fxd;
        // }
        $cost = 0; // cost withdraw master wallet disuru set 0, karena nanti dibayar cash
        $_POST['newbalance'] = $balance - $amount - $cost;
        
		$this->form_validation->set_rules('amount', 'Amount',array(
		            'trim',
		            'required',
		            array(
		                'validate_money',
		                function ($str){
                            if(preg_match('/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/', $str)){
                                return true;
                            } else {
                                $this->form_validation->set_message('validate_money','Invalid Number');
                                return false;
                            }
		                }
		            ),
		      ),
		      array(
		            'greater_than_equal_to' => '{field} can not negative',
		            'insufficient' => 'Insufficient fund',
		      )
		    );
		$this->form_validation->set_rules('confirmamount', 'Confirm Amount', 'trim|required|matches[amount]');
		$this->form_validation->set_rules('type', 'Transfer Type', array(
		            'trim',
		            'required',
		            array(
                        'undefined',
                        function($str)
                        {
	                        return $str === "sepa" || $str === "international";
                        }
                    )
		        ),
		        array(
		            'undefined' => 'Unknown {field}',
		            )
		    );
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('failed', "<p style='color:black'>".validation_errors()."</p>");
		    redirect(base_url()."admin/masterwallet/addwithdraw");
            return;
		}

        $type = $this->input->post('type');
		
        $mdata = array(
            'amount' => $amount,
            'type'  => $type,
            'cost'  => $cost,
            );
		
		$this->wallet->withdraw($mdata);
		redirect(base_url()."admin/masterwallet/addwithdraw");
    }
    
/*    public function receive(){
        $data = array(
            'title'     => 'Master Wallet Receive - Piggy Bank',
            'content'   => 'admin/mwallet/receive/index',
            'extra'     => 'admin/mwallet/receive/js/js_index',
            'menu2'     => 'active',
            'balance'   => $this->wallet->get_balance(),
//            'mnrv'      => 'active'
		);
		$this->load->view('layoutsignin/wrapper', $data);
    }
*/    
}