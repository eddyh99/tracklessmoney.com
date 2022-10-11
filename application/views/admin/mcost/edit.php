<?php if (@isset($_SESSION["failed"])){?>
        <div class="row">
            <div class="alert alert-danger smallalert" role="alert">
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
        <h3 class="card-title">Default MIF Cost</h3>
    </div>
        <form action="<?=base_url()?>admin/mifcost/savecost" method="post">
            <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="card-body">

            <div class="row row">
                <label class="col-md-3 col-form-label">Circuit Receive (%)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="sepa_receive_pct" class="form-control is_number"  value="<?php echo @number_format($cost["sepa_receive_pct"] *100,2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Circuit Receive (Fixed)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="sepa_receive_fxd" class="form-control is_number"  value="<?php echo @number_format($cost["sepa_receive_fxd"],2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Outside Circuit Receive (%)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="int_receive_pct" class="form-control is_number"  value="<?php echo @number_format($cost["int_receive_pct"]*100,2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Outside Circuit Receive (Fixed)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="int_receive_fxd" class="form-control is_number"  value="<?php echo @number_format($cost["int_receive_fxd"],2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-3 col-form-label">Circuit Transfer (%)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="sepa_transfer_pct" class="form-control is_number"  value="<?php echo @number_format($cost["sepa_transfer_pct"] *100,2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Circuit Transfer (Fixed)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="sepa_transfer_fxd" class="form-control is_number"  value="<?php echo @number_format($cost["sepa_transfer_fxd"],2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Outside Circuit Transfer (%)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="int_transfer_pct" class="form-control is_number"  value="<?php echo @number_format($cost["int_transfer_pct"]*100,2); ?>">
                </div>
            </div>
            <div class="row row">
                <label class="col-md-12 col-form-label">Outside Circuit Transfer (Fixed)</label>
                
                <div class="input-group input-group-sm">
                    <input type="text" name="int_transfer_fxd" class="form-control is_number" value="<?php echo @number_format($cost["int_transfer_fxd"],2); ?>">
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="<?=base_url()?>admin/mifcost" class="btn btnlogin">Cancel</a>
                <button type="submit" class="btn btnregis">Confirm</button>
            </div>
        </div>
    </form>
</div>
