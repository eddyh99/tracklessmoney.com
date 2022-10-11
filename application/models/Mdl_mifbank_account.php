<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_mifbank_account extends CI_Model {
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_single($currency) {
        // $currency = $this->session->userdata("currency");
        
        $this->db->select("*");
        $this->db->from("tbl_mifbank");
        $this->db->where("currency", $currency);
        $query = $this->db->get();
        
        if ($query && !empty($query)) {
            return $query->row();
        } else {
            return NULL;
        }
    }
    
    public function update($data) {
        $this->db->replace('tbl_mifbank', $data);

        return $this->db->affected_rows() > 0;
    }
}