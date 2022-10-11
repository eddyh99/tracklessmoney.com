<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_default_fee extends CI_Model {
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
		$this->load->model("Mdl_currency", "currency");
    }
    
    public function get_single($currency) {
        // $currency = $this->session->userdata("currency");
        
        $this->db->select("*");
        $this->db->from("tbl_defaultfee");
        $this->db->where("currency", $currency);
        $query = $this->db->get();
        
        if ($query && !empty($query)) {
            return $query->row();
        } else {
            return NULL;
        }
    }
    
    public function update($data) {
        $this->db->replace('tbl_defaultfee', $data);
        return $this->db->affected_rows() > 0;
    }
}