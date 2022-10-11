<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_fee extends CI_Model {
    private $server_tz = "Asia/Singapore";
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function getby_id($id, $currency) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id_member`, `currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`,  `wallet2bank_ocf`, `swap_cf`, convert_tz(`last_modified`, '".$this->server_tz."', ?) AS last_modified FROM `tbl_fee` WHERE `id_member`=? AND `currency`=?";
            $query = $this->db->query($sql, array($user_tz, $id, $currency));
        } else {
            $sql = "SELECT `id_member`, `currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`,  `wallet2bank_ocf`, `swap_cf`, `last_modified` FROM `tbl_fee` WHERE `id_member`=? AND `currency`=?";
            $query = $this->db->query($sql, array($id, $currency));
        }
		
        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT " .$id. " AS `id_member`, `currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`,  `wallet2bank_ocf`, `swap_cf`, convert_tz(`last_modified`, '".$this->server_tz."', ?) AS last_modified FROM `tbl_defaultfee` WHERE  `currency`=?";
            $query = $this->db->query($sql, array($user_tz, $currency));
            
            if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else {
            return NULL;
        }
        } else {
            $sql = "SELECT " .$id. " AS `id_member`, `currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`,  `wallet2bank_ocf`, `swap_cf`, `last_modified` FROM `tbl_fee` WHERE `currency`=?";
            $query = $this->db->query($sql, array($currency));
            if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else {
            return NULL;
        }
    }}
    
    public function update($data) {
        $data["last_modified"] = date("Y-m-d H:i:s");
        $this->db->replace('tbl_fee', $data);
        return $this->db->affected_rows() > 0;
    }
    
}