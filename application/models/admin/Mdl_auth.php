 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_auth extends CI_Model {
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_single($data = array()){
		$sql = "SELECT username FROM pengguna WHERE username=? AND password=?";
		$query = $this->db->query($sql,$data);
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_sitename(){
		$sql = "SELECT content FROM setting WHERE deskripsi='site_name'";
		$query = $this->db->query($sql);

        if ($query->num_rows()>0){
            return $query->row()->content;
        }else{
            return false;
        }
    }
   

    
}