<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

	public function __construct() {
	   parent::__construct();
    }

	public function addfund() {
        $data = array(
            'title'     => 'Add Fund Transaction - Trackless',
            'content'   => 'admin/wallet/addfund/index',
            'extra'     => 'admin/wallet/addfund/js/js_index',
            'menu6'     => 'active',
            'menu6af'   => 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function historytopup(){
        $input		= $this->input;
		$tgl	    = $this->security->xss_clean($input->post("tgl"));
		
		$tgl = explode('-', $tgl);
		$tgl[0] = date_create(trim($tgl[0]));
		$tgl[1] = date_create(trim($tgl[1]));
		
        $date_start = date_format($tgl[0],"Y-m-d");
        $date_stop = date_format($tgl[1],"Y-m-d");
		
        $isi=array(
                array(
                    "id"        => 1,
                    "tgl"       => "2022-07-10",    
                    "ucode"     => "dk8wnx3r",    
                    "amount"    => 20,    
                    "referral"  => 0.05,    
                    "mif_fee"   => 0.10,    
                    "user"      => "prince",    
                ),
            );

	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}
	
	public function deletetopup($id) {
	  
	    $topup = $this->wallet->get_topup_by_id($id);

	    if (!empty($topup)) {
	        
	    }
	}

    public function addfunddetail($id){
        $id	    = $this->security->xss_clean($id);
        $mdata=array(
                "ucode"         => "12345",
                "amount"        => 1000,
                "mif_cost"      => 1,
                "mif_fee"       => 0.15,
                "referral_fee"  => 0.05,
                "operator"      => "kampret"
            );
        $data = array(
            'title'     => 'Topup Detail - Trackless',
            'content'   => 'admin/wallet/addfund/detail',
            'menu6'     => 'active',
            'menu6af'   => 'active',
            'data'      => $mdata,
		);

		$this->load->view('layout/wrapper', $data);
    }


	public function transfer() {
        $data = array(
            'title'     => 'Wallet to Wallet Transaction - Trackless',
            'content'   => 'admin/wallet/transfer/index',
            'extra'     => 'admin/wallet/transfer/js/js_index',
            'menu6'     => 'active',
            'menu6tf'   => 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function historywallet(){
        $input		= $this->input;
		$tgl	    = $this->security->xss_clean($input->post("tgl"));
	   
	    $tgl = explode('-', $tgl);
		$tgl[0] = date_create(trim($tgl[0]));
		$tgl[1] = date_create(trim($tgl[1]));
		
        $date_start = date_format($tgl[0],"Y-m-d");
        $date_stop = date_format($tgl[1],"Y-m-d");
		
        $isi=array(
                array(
                    "id"        => 1,
                    "sender"    => "123455",    
                    "receiver"  => "dk8wnx3r",    
                    "amount"    => 20,
                    "referral_sender"  => 0.05,    
                    "referral_receiver"=> 0.05,    
                    "mif_fee"   => 0.10,    
                    "cost"      => 10,    
                ),
            );
	    
	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}

	public function deletewallet($id) {
	    $wallet = $this->wallet->get_wallet_by_id($id);
	    
	    if (!empty($wallet)) {

	    }
		
	}
	
    public function transferdetail($id){
        $id	    = $this->security->xss_clean($id);
        $mdata=array(
                "ucode"                 => "12345",
                "receiver"              => "92819",
                "amount"                => 1000,
                "mif_fee"               => 0.15,
                "referral_fee_receiver" => 0.05,
                "referral_fee_sender"   => 0.05,
            );
        
        $data = array(
            'title'     => 'Wallet to Wallet Detail - Trackless',
            'content'   => 'admin/wallet/transfer/detail',
            'menu6'     => 'active',
            'menu6tf'   => 'active',
            'data'      => $mdata,
		);
		
		$this->load->view('layout/wrapper', $data);
    }

	public function tobank() {
        $data = array(
            'title'     => 'Wallet to Bank Transaction - Trackless',
            'content'   => 'admin/wallet/tobank/index',
            'extra'     => 'admin/wallet/tobank/js/js_index',
            'menu6'     => 'active',
            'menu6tb'   => 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	public function historybank(){
        $input		= $this->input;
		$tgl	    = $this->security->xss_clean($input->post("tgl"));

	    $tgl = explode('-', $tgl);
		$tgl[0] = date_create(trim($tgl[0]));
		$tgl[1] = date_create(trim($tgl[1]));
		
        $date_start = date_format($tgl[0],"Y-m-d");
        $date_stop = date_format($tgl[1],"Y-m-d");

        $isi=array(
                array(
                    "id"        => 1,
                    "ucode"     => "123455",    
                    "receiver"  => "kampreto    ",    
                    "amount"    => 20,
                    "iban"      => "145001062421",    
                    "bic"       => "BMRIIDJA",
                    "referral"  => 0.05,
                    "mif_fee"   => 0.10,    
                    "cost"      => 10,    
                ),
            );
		

	    $data["detail"]=$isi;
	    $data["token"] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}


    public function tobankdetail($id){
        $id	= $this->security->xss_clean($id);
        $mdata=array(
                "ucode"                 => "12345",
                "name_receiver"         => "92819",
                "iban"                  => "145001062421",
                "bic"                   => "BMRIIDJA",
                "type"                  => "circuit", //circuit / outside circuit
                "amount"                => 1000,
                "mif_fee"               => 0.15,
                "mif_cost"              => 0.05,
                "referral_fee"          => 0.05,
            );
        
        $data = array(
            'title'     => 'Wallet to Bank Detail - Trackless',
            'content'   => 'admin/wallet/tobank/detail',
            'menu6'     => 'active',
            'menu6tb'   => 'active',
            'data'      => $mdata,
		);
		
		$this->load->view('layout/wrapper', $data);
    }
    
	public function deletebank($id) {
	    $bank = $this->wallet->get_wallet2bank_by_id($id);
	    
	    if (!empty($bank)) {
	        
	    }
	}


	public function tocard() {
        $data = array(
            'title'     => 'Wallet to Card Transaction - Trackless',
            'content'   => 'admin/wallet/tocard/index',
            'menu6'     => 'active',
            'menu6tc'   => 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}


}
