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
                                        <div class="row mt-3">
                                            <div class="col-md-12 mt-5 top-0 text-center textgreen desc" style="font-size:3vw;line-height:4vw">Welcome Back</div>
                                            <div class="col-md-12 top-0 text-center textgreen desc" style="font-size:1vw;line-height:1vw">Don't have an account? Signup Now</div>
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
                                            <form action="<?=base_url()?>Auth/auth_login" method="post">
                                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Account
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-envelope" style="color:white"></i></span>
                                                                <input type="email" class="form-control blackbox" id="email" name="email" maxlength="50" placeholder="Email Account" style="border-left: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Password
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-shield-alt" style="color:white"></i></span>
                                                                <input type="password" class="form-control blackbox"  maxlength="15" name="pass" id="pass" required placeholder="Password" style="border-left:none;" maxlength="15">
                                                                <div class="input-group-addon d-flex align-items-center">
                                                                    <button type="submit" class="btn btnsubmit"><i class="fas fa-angle-right"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 nopadding ourservice">
                                                            <a href="<?=base_url()?>auth/forgotpass" class="btn btn-default" style="color:white;font-size:1vw;line-height:1vw">Forgot Password?</a>
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