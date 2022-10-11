<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_default_cost extends CI_Model {
    
	public function __construct() {
	    parent::__construct();
		$this->load->database();
    }
    
    public function get_all() {
        $sql = "SELECT `currency`, `transfer_cf`, `transfer_ocf`, `min_amount` FROM `tbl_defaultcost`";
        $query = $this->db->query($sql, array($user_tz, $user_tz));
        if ($query && $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function get_single($currency) {
        $sql = "SELECT `currency`, `transfer_cf`, `transfer_ocf`, `min_amount` FROM `tbl_defaultcost` WHERE `currency`=?";
        $query = $this->db->query($sql, array($currency));
        if ($query && $query->num_rows()>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function get_outside_circuit($currency, $amount) {
        //sandbox
/*        $profile="16555499";
        $url_quote="https://api.sandbox.transferwise.tech/v2/quotes";
*/
        $profile="24407990";
        $url_quote="https://api.transferwise.com/v2/quotes";        

        if ($currency == "USD" || $currency == "EUR") {
            $dataquote=array(
            	"sourceCurrency"    => $currency,
            	"targetCurrency"    => $currency,
            	"sourceAmount"      => null,
            	"targetAmount"      => $amount,
                "profile"           => $profile,
                "payOut"            => "SWIFT",
                "preferredPayIn"    => "BALANCE"
            );
            
            $jsonquote=json_encode($dataquote);
            $resultquote=$this->apiwise($url_quote,$jsonquote);

            foreach ($resultquote->paymentOptions as $dt){
                $error=@$resultquote->disabledReason->message;
                if (($dt->payOut=="SWIFT") && ($dt->payIn=="BALANCE")){
                    $error="";
                    $persenfee=@$dt->feePercentage;
                    $min=@$dt->sourceAmount;
                    if ($dt->disabled==true){
                        $error=@$dt->disabledReason->message;
                        $fee=0;
                    }else{
                        $fee=$dt->fee->total;
                    }
                    break;
                }
            }
    
            preg_match_all('/get is ([0-9\.\,]+)/s', $error, $output);
            $min_receive=@preg_replace("/\,/","",$output[1][0]);
    
            if (empty($min_receive)) {
                $min_receive = 0;
            }
    
            if (count($output[0])==0){
                $error="";
            }else{
                $error=$min_receive;
            }
    
            
            return array("currency"=>$currency, "fee"=>$fee,"min_amount"=>$min,"persenfee"=>$persenfee,"error_wise"=>$error);
        } else {
            return FALSE;
        }
    }    
    
    public function get_circuit($currency, $amount) {
        //sandbox
/*        $profile="16555499";
        $url_quote="https://api.sandbox.transferwise.tech/v2/quotes";
*/
        $profile="24407990";
        $url_quote="https://api.transferwise.com/v2/quotes";        
        
        //source dan target currency yang sama
        $dataquote=array(
        	"sourceCurrency"    => $currency,
        	"targetCurrency"    => $currency,
        	"sourceAmount"      => null,
        	"targetAmount"      => $amount,
            "profile"           => $profile,
            "payOut"            => "BANK_TRANSFER",
            "preferredPayIn"    => "BALANCE"
        );
        
        $jsonquote=json_encode($dataquote);
        $resultquote=$this->apiwise($url_quote,$jsonquote);
        
        foreach ($resultquote->paymentOptions as $dt){
            $error=@$resultquote->disabledReason->message;
            if (($dt->payOut=="BANK_TRANSFER") && ($dt->payIn=="BALANCE")){
                $error="";
                $persenfee=@$dt->feePercentage;
                $min=@$dt->sourceAmount;
                if ($dt->disabled==true){
                    $error=@$dt->disabledReason->message;
                    $fee=0;
                }else{
                    $fee=$dt->fee->total;
                }
                break;
            }
        }

        preg_match_all('/get is ([0-9\.\,]+)/s', $error, $output);
        $min_receive=@preg_replace("/\,/","",$output[1][0]);

        if (empty($min_receive)) {
            $min_receive = 0;
        }

        if (count($output[0])==0){
            $error="";
        }else{
            $error=$min_receive;
        }

        
        return array("currency"=>$currency, "fee"=>$fee,"min_amount"=>$min,"persenfee"=>$persenfee,"error_wise"=>$error);
    }
    
    // public function update($data) {
    //     $this->db->replace('tbl_defaultcost', $data);
    //     return $this->db->affected_rows() > 0;
    // }
    
    public function refresh($currency, $amount = 1){
        $result=$this->get_circuit($currency,1);
 
        //print_r($result);
        $mcurrency = strtolower($currency);
        if ($mcurrency == "usd" || $mcurrency == "eur") {
            $transferocf = $this->get_outside_circuit($currency, 1);
            if ($transferocf && !empty($transferocf)) {
                
            } else {
                $transferocf = array("fee"=>0, "min_amount"=>0);
            }
            $mdata = array(
                "currency" => $currency,
                "transfer_cf" => $result["persenfee"] * $result["min_amount"],
                "transfer_ocf" => $transferocf["persenfee"] * $transferocf["min_amount"],
                "min_amount" => $result["min_amount"], // ga kepake
                "last_modified" => date("Y-m-d H:i:s"),
                );
            $this->db->replace('tbl_defaultcost', $mdata);
            $result2 = $this->db->error();
            $result2["cf"] = $result;
            $result2["ocf"] = $transferocf;
            return $result2;
        } else {
            $mdata = array(
                "currency" => $currency,
                "transfer_cf" => $result["persenfee"] * $result["min_amount"],
                "transfer_ocf" => 0,
                "min_amount" => $result["min_amount"], // ga kepake
                "last_modified" => date("Y-m-d H:i:s"),
                );
            $this->db->replace('tbl_defaultcost', $mdata);
            $result2 = $this->db->error();
            $result2["data"] = $mdata;
            return $result2;
        }
        

    }

    public function refreshdummy($currency,$min_amt){
        $respond = $this->get_live($currency, 1);
        $min    = $respond["min"];
        $error  = $respond["error"];
        $persen = $respond["persen"];

        $mdata = array(
            "currency"  => $currency,
            "error"     => $error,
            "min_fee"   => $min,
            "fee_persen"=> $persen,
            );
        $this->db->replace('tbl_defaultcost', $mdata);
        
    }
    
    public function apiwise($url_quote,$postData){
        //sandbox token
        //$token="33b1a034-7c6d-4740-99fa-d60b48ed48b8";
        //real api
        $token="85f29878-629f-4b46-83cc-03f395281ed5";
        
        $ch     = curl_init($url_quote);
        $headers    = array(
            'Authorization: Bearer '.$token,
            'Content-Type: application/json'
        );
        
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        return $result;        
    }
    
    
}