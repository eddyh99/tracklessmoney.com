<?php
    if (@$_SESSION["logged_status"]["role"]=="admin"){
        require_once('header-login.php');
        $public_url=explode("/",$_SERVER['REQUEST_URI'])[3];
        if ($public_url!='currencyavailable'){
            require_once('sidebar.php');
        }
    }elseif(@$_SESSION["logged_status"]["role"]=="member"){
        require_once('header-member.php');
    }else{
        require_once('header.php');
    }
    if (isset($content)){
    	$this->load->view($content);
    }
    if (@$_SESSION["logged_status"]["role"]=="admin"){
        require_once('footer-login.php');
    }elseif(@$_SESSION["logged_status"]["role"]=="member"){
        require_once('footer-member.php');
    }else{
        require_once('footer.php');
    }
?>