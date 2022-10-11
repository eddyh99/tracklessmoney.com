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
    <?php if (@isset($_SESSION["success"])){?>
        <div class="row">
            <div class="alert alert-success smallalert" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-md-12 text-center">
                        <small><?php echo @$_SESSION["success"]?></small>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>    
        <div class="card mt-2 removecolor" style="border:1px solid white">
            <div class="card-header" style="border:1px solid white">
                <h3 class="card-title">Change Member's Fee</h3>
            </div>
            <form action="<?=base_url()?>admin/member/changefee" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="email" name="email" value="<?=$email?>">
                <input type="hidden" id="unik" name="unik" value="<?=$uniquecode?>">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-4 col-form-label">E-Mail</label>
                        <label class="col-md-8 col-form-label"><?=$email?></label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 col-form-label">Unique Code</label>
                        <label class="col-md-8 col-form-label"><?=$uniquecode?></label>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-3 col-form-label">Topup Circuit (%)</label>
                        <div class="col-md-12">
                            <input type="text" name="topup_sepa_pct" class="form-control is_number"  value="<?php echo @$miffee["topup_sepa_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Topup Circuit (Fixed)</label>
                        <div class="col-md-12">
                            <input type="text" name="topup_sepa_fxd" class="form-control is_number"  value="<?php echo @$miffee["topup_sepa_fxd"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Topup Outside Circuit (%)</label>
                       <div class="col-md-12">
                            <input type="text" name="topup_int_pct" class="form-control is_number"  value="<?php echo @$miffee["topup_int_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Topup Outside Circuit (Fixed)</label>
                       <div class="col-md-12">
                            <input type="text" name="topup_int_fxd" class="form-control is_number"  value="<?php echo @$miffee["topup_int_fxd"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-sm-3 col-form-label">Wallet to Bank Circuit (%)</label>
                       <div class="col-md-12">
                            <input type="text" name="walet2bank_sepa_pct" class="form-control is_number"  value="<?php echo @$miffee["wallet2bank_sepa_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Wallet to Bank Circuit (Fixed)</label>
                       <div class="col-md-12">
                            <input type="text" name="walet2bank_sepa_fxd" class="form-control is_number"  value="<?php echo @$miffee["wallet2bank_sepa_fxd"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Wallet to Bank Outside Circuit (%)</label>
                       <div class="col-md-12">
                            <input type="text" name="walet2bank_int_pct" class="form-control is_number"  value="<?php echo @$miffee["wallet2bank_int_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Wallet to Bank Outside Circuit (Fixed)</label>
                        
                       <div class="col-md-12">
                            <input type="text" name="walet2bank_int_fxd" class="form-control is_number"  value="<?php echo @$miffee["wallet2bank_int_fxd"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Wallet to Wallet (%)</label>
                        
                        <div class="col-md-12">
                            <input type="text" name="wallet2wallet_pct" class="form-control is_number"  value="<?php echo @$miffee["wallet2wallet_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Wallet to Wallet (fixed)</label>
                        
                        <div class="col-md-12">
                            <input type="text" name="wallet2wallet_fxd" class="form-control is_number"  value="<?php echo @$miffee["wallet2wallet_fxd"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">SWAP (%)</label>
                        
                        <div class="col-md-12">
                            <input type="text" name="swap_pct" class="form-control is_number"  value="<?php echo @$miffee["swap_pct"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">SWAP (fixed)</label>
                        
                        <div class="col-md-12">
                            <input type="text" name="swap_fxd" class="form-control is_number"  value="<?php echo @$miffee["swap_fxd"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="<?=base_url()?>admin/member" class="btn btnlogin">Cancel</a>
                    <button type="submit" class="btn btnregis">Confirm</button>
                </div>
            </form>
        </div>
