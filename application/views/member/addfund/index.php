<?php 
    $this->load->view("./layout/fixsaldo"); 
    $this->load->view("./layout/menumember");
?>
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5 p-2">
    <div class="col-12">
        <span class="textgreen">ATTENTION!</span><br>
        In order to topup your own wallet or receive money through bank transfer,copy and share the data as below
    </div>
    <div class="col-12 mt-5 position-relative" style="background:#0D0D0D;height:150px">
        <div class="row w-100 position-absolute start-50 top-50 translate-middle d-flex justify-content-center">
            <?php 
                if (($_SESSION["currency"]=="EUR")||
                    ($_SESSION["currency"]=="AUD")||
                    ($_SESSION["currency"]=="USD")||
                    ($_SESSION["currency"]=="NZD")||
                    ($_SESSION["currency"]=="CAD")||
                    ($_SESSION["currency"]=="HUF")||
                    ($_SESSION["currency"]=="SGD")||
                    ($_SESSION["currency"]=="TRY")){?>
                    <div class="col-8">
                        <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/addfund/showbank?type=circuit">Circuit</a>
                    </div>
            <?php }else{ ?>
                    <div class="col-8">
                        <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/swap">Circuit</a>
                    </div>
            <?php }
            
                if ($_SESSION["currency"]=="EUR"){?>
                    <div class="col-8 mt-2">
                        <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/addfund/showbank?type=outside">Outside Circuit</a>
                    </div>
            <?php }else{?>
                    <div class="col-8 mt-2">
                        <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/swap">Outside Circuit</a>
                    </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="row bottom-0" style="border-top:1px solid #00E3A5">
    <div class="col-12 mt-2 text-center">
        <a href="<?=base_url()?>auth/logout" class="textgreen"><i class="fas fa-sign-out-alt"></i> Disconnect</a>
    </div>
</div>
