<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_referral extends CI_Model {
    private $server_tz = "Asia/Singapore";
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get($currency, $id=-1) {
        $user = $this->session->userdata("logged_status");
        
            $user_tz = $user["time_location"];
            $sql = "SELECT " .$id. " AS `id_member`, `currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`,  `wallet2bank_ocf`, `swap_cf`, referral_cf, referral_ocf FROM `tbl_defaultfee` WHERE  `currency`=?";
            $query = $this->db->query($sql, array($currency));
        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else {
            return NULL;
        }
    }
    

    
}