<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_user extends CI_Model {
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function getby_id($id) {
        $sql="SELECT `id`, `name`, `email`, `passwd`, `role`, `status`, `date_created`, `last_accessed`, `location` FROM `tbl_user` WHERE id=? AND status='active'";
        $query=$this->db->query($sql, $id);
        if ($query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function getby_email($email) {
        $sql="SELECT `id`, `name`, `email`, `passwd`, `role`, `status`, `date_created`, `last_accessed`, `location` FROM `tbl_user` WHERE email=? AND status='active'";
        $query=$this->db->query($sql, $email);
        if ($query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    private function getby_id_nostatus($id) {
        $sql="SELECT `id`, `ucode`, `refcode`, `email`, `status`, `id_referral`, `date_created`, `last_accessed`, `location` FROM `tbl_member` WHERE id=?";
        $query=$this->db->query($sql, $id);
        if ($query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }

    
    
    public function add($data = array()) {
        $data["date_created"] = $today = date("Y-m-d H:i:s"); 
        $this->db->trans_start();
        
        $this->db->insert("tbl_member",$data);
        $id = $this->db->insert_id();
        
        $mdata = array(
            "ucode" => $this->generate_ucode($id),
            "refcode" => $this->generate_refcode($id),
            "token" => $this->generate_token($id),
            );
        $this->db->where('id', $id);
        $this->db->update('tbl_member', $mdata);
        
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
    
    private function generate_ucode($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );
        
        $hashids = new Hashids\Hashids("this is my salt", 8, "abcdefhjkmnpqrtwxyz23478");
        return $hashids->encode($id);
    }
    
    private function generate_refcode($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );
        
        $hashids = new Hashids\Hashids("this is my salt2", 8, "abcdefhjkmnpqrtwxyz23478");
        return $hashids->encode($id);
    }
    
    private function generate_token($id) {
        require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
        require_once(APPPATH. '/third_party/Hashids/Hashids.php' );
        
	    $hashids = new Hashids\Hashids("this is my salt2", 48, "abcdefghijklmnopqrstuvwxyz1234567890");
        return $hashids->encode($id, time());
    }
    
    public function activate($token) {
        $mdata = array(
            "status" => "active",
            "token" => NULL,
            );
        $this->db->where('status', "new");
        $this->db->where('token', $token);
        $this->db->update('tbl_member', $mdata);
        
        if ($this->db->affected_rows() == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function enable($id) {
        $member = $this->getby_id_nostatus($id);
        
        if ($member->token == NULL) {
            $mdata = array(
                "status" => "active",
                );
            $this->db->where('id', $id);
            $this->db->update('tbl_member', $mdata);    
        } else {
            $mdata = array(
                "status" => "new",
                );
            $this->db->where('id', $id);
            $this->db->update('tbl_member', $mdata);    
        }

        if ($this->db->affected_rows() >= 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function disable($id) {
        $mdata = array(
            "status" => "disabled",
            );
        $this->db->where('id', $id);
        $this->db->update('tbl_member', $mdata);
        
        if ($this->db->affected_rows() >= 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function topup2($data = array()) {
        foreach($data as $d) {
            $this->db->insert('tbl_member_topup', $d);
            $r[] = $this->db->error();
        }
        
        return $r;
    }
}