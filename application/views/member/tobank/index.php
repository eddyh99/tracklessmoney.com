<?php $this->load->view("./layout/fixsaldo"); ?>
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5">
    <div class="col-md-12">
        <span class="textgreen">ATTENTION!</span><br>
        In order to topup your own wallet or receive money through bank transfer,copy and share the data as below
    </div>
    <div class="col-md-12 mt-5 position-relative" style="background:#0D0D0D;height:150px">
        <div class="row w-100 position-absolute start-50 top-50 translate-middle d-flex justify-content-center">
            <div class="col-md-4 me-1">
                <a class="btn btn-lg col-md-12 btnearning" href="<?=base_url()?>member/tobank/walletbank?type=circuit">Circuit</a>
            </div>
            <div class="col-md-4 ms-1">
                <a class="btn btn-lg col-md-12 btnearning" href="<?=base_url()?>member/tobank/walletbank?type=outside">Outside Circuit</a>
            </div>
        </div>
    </div>
</div>
