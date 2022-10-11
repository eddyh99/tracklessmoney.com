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
        <h3 class="card-title">MIF Bank Account for <?=$_SESSION["currency"]?></h3>
    </div>
    
            <form action="<?=base_url()?>admin/mifbank/savemif" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="card-body">
                <h4 class="card-title">Circuit Bank Account</h4>
                <div class="row">
                    <label class="col-md-3 col-form-label">Registered Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtusregisname" name="circuit_name" class="form-control" value="<?php echo @$circuit["recipient_name"]; ?>">

                    </div>
                </div>
                <div class="row">
                    <?php 
                        if ($_SESSION['currency'] == 'USD') {
                    ?>
                            <label class="col-md-3 col-form-label">Account Number</label>
                    <?php }else{?>
                            <label class="col-md-3 col-form-label">IBAN</label>
                    <?php } ?>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtusiban" name="circuit_account_number" class="form-control" value="<?php echo @$circuit["account_number"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Routing Number</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtusbic" name="circuit_bic" class="form-control" value="<?php echo @$circuit["bic"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankname" name="circuit_bank_name" class="form-control" value="<?php echo $circuit["bank_name"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Address</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankadd" name="circuit_bank_address" class="form-control" value="<?php echo $circuit["bank_address"] ?>">
                    </div>
                </div>
                
            </div>
            
            <hr>

            <div class="card-body">
                <h4 class="card-title">Outside Circuit</h4>
            
                <div class="row">
                    <label class="col-md-3 col-form-label">Registered Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtregisname" name="outside_name" class="form-control" value="<?php echo @$outside["recipient_name"]; ?>">

                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">IBAN</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtiban" name="outside_account_number" class="form-control" value="<?php echo @$outside["account_number"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">BIC / SWIFT</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbic" name="outside_bic" class="form-control" value="<?php echo @$outside["bic"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankname" name="outside_bank_name" class="form-control" value="<?php echo $outside["bank_name"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Address</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankadd" name="outside_bank_address" class="form-control" value="<?php echo $outside["bank_address"]; ?>">
                    </div>
                </div>
                
            </div>

                <div class="card-footer text-center">
                    <a href="<?=base_url()?>admin/mifbank" class="btn btnlogin">Cancel</a>
                    <button type="submit" class="btn btnregis">Confirm</button>
                </div>
            </form>
        </div>
