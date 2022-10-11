<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_member extends CI_Model {
    private $server_tz = "Asia/Singapore";
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_all($currency = "USD") {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($currency == "USD") {
            if ($user && !empty($user)) {
                $user_tz = $user["time_location"];
                $sql = "SELECT m1.`id`, m1.`ucode`, m1.`refcode`, m1.`email`, m1.`passwd`, m1.`status`, m1.`token`, m1.`id_referral`, convert_tz(m1.`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(m1.`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, m1.`location`, m1.`activated`, IFNULL(m2.ucode, 'm3rc4n73') AS referral FROM `tbl_member` m1 LEFT JOIN `tbl_member` m2 ON m1.`id_referral`=m2.`id`";
                $query = $this->db->query($sql, array($user_tz, $user_tz));
                if ($query && $query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return array();
                }
            } else {
                $sql = "SELECT m1.`id`, m1.`ucode`, m1.`refcode`, m1.`email`, m1.`passwd`, m1.`status`, m1.`token`, m1.`id_referral`, m1.date_created, m1.last_accessed, m1.`location`, m1.`activated`, IFNULL(m2.ucode, 'm3rc4n73') AS referral FROM `tbl_member` m1 LEFT JOIN `tbl_member` m2 ON m1.`id_referral`=m2.`id`";
                $query = $this->db->query($sql);
                if ($query && $query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return array();
                }
            } 
        } else {
            if ($user && !empty($user)) {
                $user_tz = $user["time_location"];
                $sql = "SELECT m1.`id`, m1.`ucode`, m1.`refcode`, m1.`email`, m1.`passwd`, m1.`status`, m1.`token`, m1.`id_referral`, convert_tz(m1.`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(m1.`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, m1.`location`, m1.`activated`, IFNULL(m2.ucode, 'm3rc4n73') AS referral FROM `tbl_member` m1 LEFT JOIN `tbl_member` m2 ON m1.`id_referral`=m2.`id` INNER JOIN tbl_member_currency c ON m1.id=c.id_member WHERE c.currency=?";
                $query = $this->db->query($sql, array($user_tz, $user_tz, $currency));
                if ($query && $query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return array();
                }
            } else {
                $sql = "SELECT m1.`id`, m1.`ucode`, m1.`refcode`, m1.`email`, m1.`passwd`, m1.`status`, m1.`token`, m1.`id_referral`, m1.date_created, m1.last_accessed, m1.`location`, m1.`activated`, IFNULL(m2.ucode, 'm3rc4n73') AS referral FROM `tbl_member` m1 LEFT JOIN `tbl_member` m2 ON m1.`id_referral`=m2.`id` INNER JOIN tbl_member_currency c ON m1.id=c.id_member WHERE c.currency=?";
                $query = $this->db->query($sql, array($currency));
                if ($query && $query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return array();
                }
            }
        }
		

        if ($query && $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function get_active($currency = "USD") {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($currency == "USD") {
            if ($user && !empty($user)) {
                $user_tz = $user["time_location"];
                $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE status='active'";
                $query = $this->db->query($sql, array($user_tz, $user_tz));
            } else {
                $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE status='active'";
                $query = $this->db->query($sql);
            }
        } else {
            if ($user && !empty($user)) {
                $user_tz = $user["time_location"];
                $sql = "SELECT m.`id`, m.`ucode`, m.`refcode`, m.`email`, m.`passwd`, m.`status`, m.`token`, m.`id_referral`, convert_tz(`m.date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`m.last_accessed`, '".$this->server_tz."', ?) AS last_accessed, m.`location`, m.`activated` FROM `tbl_member` m INNER JOIN `tbl_member_currency` c on m.id=c.id_member WHERE c.currency = ? AND m.status='active'";
                $query = $this->db->query($sql, array($user_tz, $user_tz, $currency));
            } else {
                $sql = "SELECT m.`id`, m.`ucode`, m.`refcode`, m.`email`, m.`passwd`, m.`status`, m.`token`, m.`id_referral`, m.`date_created`, m.`last_accessed`, m.`location`, m.`activated` FROM `tbl_member` m INNER JOIN `tbl_member_currency` c on m.id=c.id_member WHERE c.currency = ? AND m.status='active'";
                $query = $this->db->query($sql, array($currency));
            }
        }
		

        if ($query &&  $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function getby_id($id) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE id=?";
            $query = $this->db->query($sql, array($user_tz, $user_tz, $id));
        } else {
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE id=?";
            $query = $this->db->query($sql, array($id));
        }
		
        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function getby_ucode($ucode) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE `ucode`=?";
		    $query = $this->db->query($sql, array($user_tz, $user_tz, $ucode));
        } else {
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE `ucode`=?";
		    $query = $this->db->query($sql, array($ucode));
        }
        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function getby_refcode($refcode) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE `refcode`=?";
		    $query = $this->db->query($sql, array($user_tz, $user_tz, $refcode));
        } else {
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE `refcode`=?";
		    $query = $this->db->query($sql, array($refcode));
        }
        
        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function getby_email($email) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE `email`=?";
            $query = $this->db->query($sql, array($user_tz, $user_tz, $email));
        } else {
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE `email`=?";
            $query = $this->db->query($sql, array($email));
        }
		

        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function getby_token($token) {
        $user = $this->session->userdata("logged_status");
        $query = NULL;
        if ($user && !empty($user)) {
            $user_tz = $user["time_location"];
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, convert_tz(`date_created`, '".$this->server_tz."', ?) AS date_created, convert_tz(`last_accessed`, '".$this->server_tz."', ?) AS last_accessed, `location`, `activated` FROM `tbl_member` WHERE `token`=?";
            $query = $this->db->query($sql, array($user_tz, $user_tz, $token));
        } else {
            $sql = "SELECT `id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, date_created, last_accessed, `location`, `activated` FROM `tbl_member` WHERE `token`=?";
            $query = $this->db->query($sql, array($token));
        }
		

        if ($query &&  $query->num_rows()>0){
            return $query->row();
        }else{
            return $this->db->last_query();
            return NULL;
        }
    }
    
    public function add($data=array()) {
        $this->db->trans_start();
        
        $this->db->insert("tbl_member",$data);
        $id = $this->db->insert_id();
        
        $mdata = array(
            "ucode" => $this->generate_ucode($id),
            "refcode" => $this->generate_refcode($id),
            "token" => $this->generate_token($id),
            "date_created" => date("Y-m-d H:i:s"),
            );
        $this->db->where("id", $id);
        $this->db->update("tbl_member",$mdata);
        
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();
            return array("token", $mdata["token"]);
        }
    }
    
    private function generate_ucode($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );

        $hashids = new Hashids\Hashids('', 8, 'abcdefhjkmnpqrtwxyz23478'); 
        return $hashids->encode($id, 7, 91);
    }
    
    private function generate_refcode($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );

        $hashids = new Hashids\Hashids('', 8, 'abcdefhjkmnpqrtwxyz23478'); 
        return $hashids->encode($id, 13, 243);
    }
    
    private function generate_token($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );

        $hashids = new Hashids\Hashids('', 48, 'abcdefghijklmnopqrstuvwxyz1234567890'); 
        return $hashids->encode($id, time(), rand()); 
    }
    
    public function activate($ucode) {
        $mdata = array(
            "token" => NULL,
            "status" => "active",
            "activated" => "yes",
            );
        $this->db->where("ucode", $ucode);
        $this->db->where("status", "new");
        $this->db->update("tbl_member",$mdata);
        return $this->db->affected_rows() == 1;
    }
    
    public function change_password($ucode, $new_pass) {
        $mdata = array(
            "passwd" => $new_pass,
            );
        $this->db->where("ucode", $ucode);
        $this->db->update("tbl_member",$mdata);
        return $this->db->affected_rows() == 1;
    }
    
    public function enable_member($ucode) {
        $member = $this->getby_ucode($ucode);
        
        if ($member && !empty($member)) {
            $mdata = array();
            if ($member->activated == "yes") {
                $mdata["status"] = "active";
            } else {
                $mdata["status"] = "new";
            }
            $this->db->where("ucode", $ucode);
            $this->db->where("status", "disabled");
            $this->db->update("tbl_member",$mdata);
            return $this->db->affected_rows() == 1;
        }
        return FALSE;
    }
    
    public function disable_member($ucode) {
        $mdata = array("status" => "disabled");
        $this->db->where("ucode", $ucode);
        $this->db->update("tbl_member",$mdata);
        return $this->db->affected_rows() == 1;
    }
    
    
}