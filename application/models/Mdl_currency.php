<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_currency extends CI_Model {
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_all() {
        $sql = "SELECT `currency`, `symbol`, `name`, `status`,min_amt FROM `tbl_currency`";
        $query = $this->db->query($sql);
        if ($query && $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function get_active() {
        $sql = "SELECT `currency`, `symbol`, `name`, `status` FROM `tbl_currency` WHERE status='active'";
        $query = $this->db->query($sql);
        if ($query && $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function get_single($currency) {
        $sql = "SELECT `currency`, `symbol`, `name`, `status` FROM `tbl_currency` WHERE `currency`=?";
        $query = $this->db->query($sql, array($currency));
        if ($query && $query->num_rows()>0){
            return $query->row();
        }else{
            return NULL;
        }
    }
    
    public function enable($currency) {
        $mdata = array("status" => "active");
        $this->db->where("currency", $currency);
        $this->db->update("tbl_currency", $mdata);
        return TRUE;
    }
    
    public function disable($currency) {
        // PENDING
        // $sql = "SELECT `currency`, `symbol`, `name`, `status` FROM `tbl_currency` WHERE `currency`=?";
        // $query = $this->db->query($sql, array($currency));
        // if ($query && $query->num_rows()>0){
        //     return $query->row();
        // }else{
        //     return NULL;
        // }
        
        // $mdata = array("status" => "active");
        // $this->db->where("currency", $currency);
        // $this->db->update("tbl_currency", $mdata);
        // return TRUE;
        $mdata = array("status" => "disabled");
        $this->db->where("currency", $currency);
        $this->db->update("tbl_currency", $mdata);
        return TRUE;
    }
}