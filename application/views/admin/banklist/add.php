        <div class="alert alert-warning" role="alert">
            <?=@$_SESSION["message"]?>
        </div>
        <div class="card card-info m-2">
            <div class="card-header">
                <h3 class="card-title"><?php echo $this->lang->line('txtaddbankacc');?></h3>
            </div>
            <form action="<?=base_url()?>admin/banklist/savedata" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">BIC</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="bic" name="bic" placeholder="BIC" maxlength="25" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtbname');?></label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank Name" maxlength="25" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txttfee');?></label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fee" name="fee" placeholder="Transfer Fee" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between mt-2">
                    <a href="<?=base_url()?>admin/banklist" class="btn btn-default"><?php echo $this->lang->line('btncancel');?></a>
                    <button type="submit" class="btn btn-success"><?php echo $this->lang->line('btnconfirm');?></button>
                </div>
            </form>
        </div>
