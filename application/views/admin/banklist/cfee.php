        <div class="alert alert-warning" role="alert">
            <?=@$_SESSION["message"]?>
        </div>
        <div class="card card-info m-2">
            <div class="card-header">
                <h3 class="card-title">Change Bank Transfer Fee</h3>
            </div>
            <form action="<?=base_url()?>admin/banklist/cfeedata" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="bic" name="bic" value="<?=$bic?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">BIC</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <label class="col-form-label"><?=$bic?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label">Bank Name</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <label class="col-form-label"><?=$bank?></label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label">Password</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" minlength="9" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label">Transfer Fee</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fee" name="fee" placeholder="Transfer Fee" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between mt-2">
                    <a href="<?=base_url()?>admin/banklist" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
