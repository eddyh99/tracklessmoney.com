<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swap extends CI_Controller {

	public function __construct() {
	    parent::__construct();
        
        if ($this->config->item('staging')){
            $profile    = $this->config->item('profile_staging');
            $token      = $this->config->item('api_staging');
            $url        = $this->config->item('sandbox');
        }else{
            $profile    = $this->config->item('profile_production');
            $token      = $this->config->item('api_production');
            $url        = $this->config->item('production');
        }
    }

	public function index()
	{
	    $mdata=array(
	                "currency"  => "USD",
	                "symbol"    => "$",
                    "saldo"     => 1500	                
	        );
        
        //aktif currency selain yang $_SESSION[currency]
	    $available=array(
	            array(
	                "currency"  => "EUR",
	                "symbol"    => "&euro;",
	                "name"      => "EURO"
	                ),
	            array(
	                "currency"  => "AUD",
	                "symbol"    => "A$",
	                "name"      => "Australian Dollar",
	                ),
	            array(
	                "currency"  => "RMB",
	                "symbol"    => "元",
	                "name"      => "Chinese Yuan",
	                )	       
	           );
        
        $data=array(
            'title'     =>  'Swap Currency - Trackless Money',
            'content'   =>  'member/swap/index',
            'extra'     =>  'member/swap/js/js_index',
            'currency'  =>  $mdata,
            'swapto'    =>  $available
        );
	    
		$this->load->view('layout/wrapper',$data);
	}
	
    public function confirm() {
        $amount = $this->input->post('amount');
        $miffee = 0.15;
        $amount_swap = $amount - $miffee;
	    if ($amount<=0){
	        $message=array(
		            "success"   => false,
		            "message"   => "Add Funds to Wallet"
		        );
		    echo json_encode($message);
        } else if ($amount> $balance){
	        $message=array(
		            "success"   => false,
		            "message"   => "Insufficient Fund"
		        );
		    echo json_encode($message);
        }
        
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('tocurrency', 'Target Swap', 'trim|required');

		if ($this->form_validation->run() == FALSE){
	        $message=array(
		            "success"   => false,
		            "message"   => validation_errors()
		        );
		    echo json_encode($message);
		}

        $target = $this->input->post('tocurrency');

        $url_quote  = $url["url-quote"];

        $fee=0;
        $dataquote=array(
            	"sourceCurrency"    => $_SESSION["currency"],
            	"targetCurrency"    => $target,
            	"sourceAmount"      => $amount_swap,
            	"targetAmount"      => null,
                "profile"           => $profile,
                "payOut"            => "BALANCE"
            );
        $jsonquote=json_encode($dataquote);
        $resultquote=$this->apiwise($url_quote,$jsonquote);

        if (!empty($resultquote->error)){
             $message=array(
		            "success"   => false,
		            "message"   => "Something wrong, please contact the administrator!"
		        );
		    echo json_encode($message);
        }

        $amountget=0;
        foreach ($resultquote->paymentOptions as $dt){
            if ($dt->payIn=="BALANCE"){
                $amountget=$dt->targetAmount;
                break;
            }    
        }
        
        $message=array(
		            "success"   => true,
		            "message"   => $amountget
		        );
		echo json_encode($message);
    }
    
    public function apiwise($url_quote,$postData){
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

    public function process() {
        $amount = $this->input->post('amount');
        $miffee = 0.15;
        $amount_swap = $amount - $miffee;
	    if ($amount<=0){
	        $message=array(
		            "success"   => false,
		            "message"   => "Add Funds to Wallet"
		        );
		    echo json_encode($message);
        } else if ($amount> $balance){
	        $message=array(
		            "success"   => false,
		            "message"   => "Insufficient Fund"
		        );
		    echo json_encode($message);
        }
        
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('tocurrency', 'Target Swap', 'trim|required');

		if ($this->form_validation->run() == FALSE){
	        $message=array(
		            "success"   => false,
		            "message"   => validation_errors()
		        );
		    echo json_encode($message);
		}

        $target = $this->input->post('tocurrency');

        $url_quote  = $url["url-quote"];

        $fee=0;
        $dataquote=array(
            	"sourceCurrency"    => $_SESSION["currency"],
            	"targetCurrency"    => $target,
            	"sourceAmount"      => $amount_swap,
            	"targetAmount"      => null,
                "profile"           => $profile,
                "payOut"            => "BALANCE"
            );
        $jsonquote=json_encode($dataquote);
        $resultquote=$this->apiwise($url_quote,$jsonquote);

        if (!empty($resultquote->error)){
             $message=array(
		            "success"   => false,
		            "message"   => "Something wrong, please contact the administrator!"
		        );
		    echo json_encode($message);
        }

        $amountget=0;
        foreach ($resultquote->paymentOptions as $dt){
            if ($dt->payIn=="BALANCE"){
                $amountget=$dt->targetAmount;
                break;
            }    
        }
        
        $dataswap=array(
                "quoteid"=>$resultquote->id
            );
        $jsonswap=json_encode($dataswap);
        
        $ch     = curl_init($url_swap);
        $headers    = array(
            'Authorization: Bearer '.$token,
            'Content-Type: application/json',
            'X-idempotence-uuid:'.$resultquote->id
        );
        
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonswap); 
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        
        redirect(base_url()."member/swap/swapsuccess");
    }
    
    public function swapsuccess(){
        $data=array(
            'title'     =>  'Swap Currency - Trackless Money',
            'content'   =>  'member/swap/swapsuccess',
        );
	    
		$this->load->view('layout/wrapper',$data);
    }

}
