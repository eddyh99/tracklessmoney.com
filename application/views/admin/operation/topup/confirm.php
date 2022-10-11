        <?php if (@isset($_SESSION["failed"])){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?=$_SESSION["failed"]?></strong>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <?php if (@isset($_SESSION["success"])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?=@$_SESSION["success"]?></strong>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>

        
        <div class="card card-info m-2">
            <div class="card-header">
                <h3 class="card-title"><?php echo $this->lang->line('mnprocesstopup')?></h3>
            </div>
            <form action="<?=base_url()?>admin/operation/process" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="unik" value="<?=$unik?>">
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtucode')?></label>
                        <label class="col-sm-12 col-form-label"><?=$unik?></label>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="input-group">
                            <div class="col-11 col-sm-11">
                                <input type="radio" name="transfer" value="sepa"> SEPA 
                                <input type="radio" name="transfer" value="international"> <?php echo $this->lang->line('txtintertransfer')?> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtamount')?></label>
                        
                        <div class="input-group">
                            <div class="col-11 col-sm-11">
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="<?php echo $this->lang->line('txtamount')?>" maxlength="15" required>
                                <!--<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" maxlength="15" required onkeypress="return isNumber(event)"!-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtcamount')?></label>
                        
                        <div class="input-group">
                            <div class="col-11 col-sm-11">
                                <input type="text" class="form-control" id="confirmamount" name="confirmamount" placeholder="<?php echo $this->lang->line('txtcamount')?>" maxlength="15" required>
                                <!--<input type="text" class="form-control" id="confirmamount" name="confirmamount" placeholder="Confirm Amount" maxlength="15" required onkeypress="return isNumber(event)">!-->
                            </div>
                            <div class="col-1 col-sm-1 check">
                                <i id="cekcamount" class="fas fa-check-circle"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="<?=base_url()?>operator/topup" class="btn btn-default"><?php echo $this->lang->line('btncancel')?></a>
                    <button type="submit" class="btn btn-piggy"><?php echo $this->lang->line('btnconfirm')?></button>
                </div>
            </form>
        </div>