<?php if (@isset($_SESSION["failed"])){?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-md-12 text-center">
                        <small><?php echo @$_SESSION["failed"]?></small>
                    </div>
                </div>
            </div>
        </div>
<?php }?>

<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">Default MIF Fee for <?=$currency?></h3>
    </div>
    <form action="<?=base_url()?>admin/mifee/savefee" method="post">
        <input type="hidden" name="currency" value="<?=$currency?>">
        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="card-body">
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Topup Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="topup_circuit" name="topup_circuit" class="form-control is_number"  value="<?=number_format($miffee["topup_circuit"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Topup Outside Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="topup_outside" name="topup_outside" class="form-control is_number"  value="<?=number_format($miffee["topup_outside"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Wallet to Bank Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="wallet2bank_circuit" name="wallet2bank_circuit" class="form-control is_number"  value="<?=number_format($miffee["wallet2bank_circuit"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Wallet to Bank Outside Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="wallet2bank_outside" name="wallet2bank_outside" class="form-control is_number"  value="<?=number_format($miffee["wallet2bank_outside"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Wallet to Wallet</label>
                <div class="col-md-12">
                    <input type="text" id="wallet2wallet" name="wallet2wallet" class="form-control is_number"  value="<?=number_format($miffee["wallet2wallet"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Swap Currency</label>
                <div class="col-md-12">
                    <input type="text" id="swap" name="swap" class="form-control is_number"  value="<?=number_format($miffee["swap"],2)?>">
                </div>
            </div>        
            <hr>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Referral Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="ref_circuit" name="ref_circuit" class="form-control is_number"  value="<?=number_format($miffee["ref_circuit"],2)?>">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-md-12 col-form-label">Referral Outside Circuit</label>
                <div class="col-md-12">
                    <input type="text" id="ref_outside" name="ref_outside" class="form-control is_number"  value="<?=number_format($miffee["ref_outside"],2)?>">
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="<?=base_url()?>admin/mifee" class="btn btnlogin">Cancel</a>
                <button type="submit" class="btn btnregis">Confirm</button>
            </div>
        </div>
    </form>
</div>
