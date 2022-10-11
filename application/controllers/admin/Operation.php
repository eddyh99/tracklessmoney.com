<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Operation extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model("Mdl_member", "member");
	   $this->load->model("Mdl_fee", "fee");
	   $this->load->model("Mdl_referral", "referral");
    }

    //to topup
	public function topup() {
        $data = array(
            'title'     => 'Topup Wallet - Trackless',
            'content'   => 'admin/operation/topup/index',
            'extra'     => 'admin/operation/topup/js/js_index',
            'menu5'     => 'active',
            'menu5topup'=> 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}
    

    //to card
	public function tocard() {
        $data = array(
            'title'     => 'Process Card - Trackless',
            'content'   => 'admin/operation/tocard/index',
            'menu5'     => 'active',
            'menu5tocard'=> 'active'
		);
		$this->load->view('layout/wrapper', $data);
	}

    public function import(){
            $file = $_FILES['topup']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['topup']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["topup"]["size"] > 0) {

                    $data = array();
					$i = 0;
					$handle = fopen($file, "r");

					while (($dt = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						// Data yang akan disimpan ke dalam databse
                        if (strtolower(substr($dt[4],0,8))=="received"){
                            $ucode=explode(" ",$dt[5])[1];
                            $temp = array();
                            $temp["id_wise"]=substr($dt[0],-9);
                            $temp["amount"]=$dt[2];
                            $temp["currency"]=$dt[3];
                            $amount = $temp["amount"];
                            
                            $member = $this->member->getby_ucode($ucode);
                            $referral = $this->referral->get($temp["currency"]);
                         
                            if (!empty($member)) {
                                $fee = $this->fee->getby_id($member->id, $temp["currency"]);
                                
                                $temp["id_member"]= $member->id;
                                $temp["type"]= 'circuit';
                                $temp["mif_fee"]= $fee->topup_cf - $referral->referral_cf;
                                $temp["referral_fee"]= $referral->referral_cf;
                                $temp["id_user"]= $this->session->userdata('logged_status')['user_id'];
                                
                                $data[$dt[0]] = $temp;
                            }
                        }
					}
					fclose($handle);
					
					if (!empty($data)) {
					    foreach($data as $key => $d) {
					        print_r($d); echo "<hr>"; 
					    } 
					} die();
				} else {
					echo 'File Format is not valid!';
				}
			}

		if (($result && $result[0]["code"]==0) && ($resultus[0]["code"]==0)) {
		    $this->session->set_flashdata('success', "All Data successfully imported");
		    redirect("/admin/operation/topup");
            return;
		}elseif (($result && $result[0]["code"]==0) && ($resultus[0]["code"]!=0)) {
		    $this->session->set_flashdata('success', "Data EUR successfully imported, Data US Failed Imported");
		    redirect("/admin/operation/topup");
            return;
		}elseif (($result[0]["code"]!=0) && ($resultus[0]["code"]==0)) {
		    $this->session->set_flashdata('failed', "Data EUR failed imported, Data US successfully Imported");
		    redirect("/admin/operation/topup");
            return;
        }else { //(($result[0]["code"]!=0) && ($resultus[0]["code"]!=0)){
		    $this->session->set_flashdata('failed', "Failed Import Data");
		    redirect("/admin/operation/topup");
            return;
		}
    }

}
