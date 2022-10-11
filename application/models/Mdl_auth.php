<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_auth extends CI_Model {
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_single($data = array()){
		$sql = "SELECT nope, level, activate, level, join_date, referral FROM member WHERE nope=? AND password=?";
		$query = $this->db->query($sql,$data);

        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    public function check_referral($ref){
        $sql="SELECT referral FROM member WHERE referral=?";
        $query=$this->db->query($sql,$ref);
        if ($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function check_user($ref){
        $sql="SELECT nope FROM member WHERE nope=?";
        $query=$this->db->query($sql,$ref);
        if ($query->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
    
    public function add($data=array(),$wallet=array(),$mref=array()){
        $this->db->trans_start();
            require_once(APPPATH. '/third_party/Hashids/HashGenerator.php' );
            require_once(APPPATH. '/third_party/Hashids/Hashids.php' );
            
            $hashids = new Hashids\Hashids('HUT5KUuT9EJfjyFz3XYRVLuafhszLnFG', 8);
            $data["referral"]=$hashids->encode(time());
        
            $this->db->insert("member",$data);
            $this->db->insert_batch("wallet",$wallet);
            $this->db->insert("referral",$mref);
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
    

    
}