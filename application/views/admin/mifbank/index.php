<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">MIF's Bank Account</h3>
    </div>
    <div class="card-body">
            
            <div class="card-body">
                <h4 class="card-title">Circuit Bank Account</h4>
                <div class="row">
                    <label class="col-md-3 col-form-label">Registered Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtusregisname" class="form-control" readonly value="<?php echo @$circuit["recipient_name"]; ?>">

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
                        <input type="text" id="txtusiban" class="form-control" readonly value="<?php echo @$circuit["account_number"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Routing Number</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtusbic" class="form-control" readonly value="<?php echo @$circuit["bic"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankname" class="form-control" readonly value="<?php echo $circuit["bank_name"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Address</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankadd" class="form-control" readonly value="<?php echo $circuit["bank_address"] ?>">
                    </div>
                </div>
                
            </div>
            
            <hr>

            <div class="card-body">
                <h4 class="card-title">Outside Circuit</h4>
            
                <div class="row">
                    <label class="col-md-3 col-form-label">Registered Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtregisname" class="form-control" readonly value="<?php echo @$outside["recipient_name"]; ?>">

                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">IBAN</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtiban" class="form-control" readonly value="<?php echo @$outside["account_number"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">BIC / SWIFT</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbic" class="form-control" readonly value="<?php echo @$outside["bic"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Name</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankname" class="form-control" readonly value="<?php echo $outside["bank_name"]; ?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="col-md-3 col-form-label">Bank Address</label>
                    
                    <div class="col-md-12">
                        <input type="text" id="txtbankadd" class="form-control" readonly value="<?php echo $outside["bank_address"]; ?>">
                    </div>
                </div>
                
            </div>

        <div class="card-footer text-center">
            <a href="<?=base_url()?>admin/mifbank/editmif" class="btn btnregis">Edit</a>
        </div>
</div>
