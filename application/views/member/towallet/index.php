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
    <div class="col-12 mt-5" style="background:#0D0D0D;height:250px">
        <div class="row">
            <div class="col-12 mt-2 textgreen">
                Transfer Wallet to Wallet
            </div>
            <div class="col-12 mt-2 text-center">
                <a class="btn btn-lg col-8 btnearning" href="<?=base_url()?>member/towallet/sendwallet">Send</a>
            </div>
            <div class="col-12 mt-2 text-center">
                <a class="btn btn-lg col-8 btnearning" href="<?=base_url()?>member/addfund/receivewallet">Receive</a>
            </div>
            <div class="col-12 mt-2 text-center">
                <a class="btn btn-lg col-8 btnearning" href="<?=base_url()?>member/addfund/requestwallet">Request</a>
            </div>
        </div>
    </div>
</div>
<div class="row bottom-0" style="border-top:1px solid #00E3A5">
    <div class="col-12 mt-2 text-center">
        <a href="<?=base_url()?>auth/logout" class="textgreen"><i class="fas fa-sign-out-alt"></i> Disconnect</a>
    </div>
</div>