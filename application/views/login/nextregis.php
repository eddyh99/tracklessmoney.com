<div class="container-fluid nopadding">
    <div class="card nopadding removecolor">
        <img src="<?=base_url()?>assets/images/login.png" class="card-img img-fluid col-md-12" style="height:99vh">
        <div class="card-img-overlay">
            <div class="col-md-12 position-relative h-100">
                <div class="row">
                    <div class="col-md-1 position-absolute top-0 end-0">
                        <a href="<?=base_url()?>"><i class="fas fa-times btncircle"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-6 position-absolute top-50 start-50 translate-middle">
                        <div class="card nopadding removecolor">
                            <img src="<?=base_url()?>assets/images/shieldlogin.png" class="card-img img-fluid col-md-12">
                            <div class="card-img-overlay">
                                <div class="row">
                                    <div class="col-md-6 position-absolute start-50 translate-middle-x">
                                        <div class="row mt-5">
                                            <div class="col-md-12 mt-3 top-0 text-center textgreen desc" style="font-size:2vw;line-height:3vw">Create an Account</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
                                        <?php if (isset($_SESSION["failed"])){?>
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
                                        <?php if (isset($_SESSION["success"])){?>
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


                                        <div class="card loginbox">
                                            <form action="<?=base_url()?>auth/regismember" method="post">
                                                <input type="hidden" name="time_location" id="time_location" value="<?=$time_location?>">
                                                <input type="hidden" name="referral" id="referral" value="<?=$referral?>">
                                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Account
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-envelope" style="color:white"></i></span>
                                                                <input type="email" class="form-control blackbox" id="email" name="email" placeholder="Email Address" maxlength="50" required style="border-left:none;">
                                                                <div class="input-group-addon d-flex align-items-center check">
                                                                    <i id="cekemail" class="fas fa-check-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Confirm Account
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-envelope" style="color:white"></i></span>
                                                                <input type="email" class="form-control blackbox" id="confirmemail" name="confirmemail" placeholder="Email Address" maxlength="50" required style="border-left:none;">
                                                                <div class="input-group-addon d-flex align-items-center check">
                                                                    <i id="cekcemail" class="fas fa-check-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Password
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-shield-alt" style="color:white"></i></span>
                                                                <input type="password" class="form-control blackbox"  maxlength="15" name="pass" id="pass" required placeholder="Password" style="border-left:none;" maxlength="15">
                                                                <div class="input-group-addon d-flex align-items-center check">
                                                                    <i  id="cekpass" class="fas fa-check-circle"></i>
                                                                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer;margin-left:5px"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Confirm Password
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-shield-alt" style="color:white"></i></span>
                                                                <input type="password" class="form-control blackbox"  maxlength="15" name="confirmpass" id="confirmpass" required placeholder="Password" style="border-left:none;" maxlength="15">
                                                                <div class="input-group-addon d-flex align-items-center check">
                                                                    <i  id="cekcpass" class="fas fa-check-circle"></i>
                                                                    <i class="far fa-eye" id="toggleCPassword" style="cursor: pointer;margin-left:5px"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 nopadding ourservice">
                                                            <button type="submit" class="btn btnsubmit col-md-12">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>