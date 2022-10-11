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
                <h3 class="card-title">Change Password</h3>
            </div>
            <form action="<?=base_url()?>admin/member/cpassdata" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="uniquecode" name="uniquecode" value="<?=$uniquecode?>">
                <div class="card-body">
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Password</label>
                        
                        <div class="input-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" minlength="9" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Confirm Password</label>
                        
                        <div class="input-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Confirm Password" minlength="9" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center mt-2">
                    <a href="<?=base_url()?>admin/member" class="btn btnlogin">Cancel</a>
                    <button type="submit" class="btn btnregis">Confirm</button>
                </div>
            </form>
        </div>
