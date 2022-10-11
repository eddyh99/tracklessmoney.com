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
                                    <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
                                        <?php if (isset($_SESSION["failed"])){?>
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
                                            <form action="<?=base_url()?>Auth/checkreferral" method="post">
                                                <input type="hidden" name="time_location" id="time_location">
                                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ourservice" style="font-size:1vw;line-height:1vw">
                                                            Referral Code
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text changeprepend"><i class="fas fa-retweet" style="color:white"></i></span>
                                                                <input type="text" class="form-control blackbox"  maxlength="15" name="referral" id="referral" required placeholder="Referral Code" value="<?=@$_SESSION["referralcode"]?>" maxlength="8" style="border-left: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12" style="font-size:1vw;line-height:1vw">
                                                            <button type="submit" class="btn btnsubmit col-md-12">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 nopadding" style="color:white;font-size:0.8vw;line-height:1vw">
                                                            <span class="ms-3">Have an account?<a href="<?=base_url()?>auth/login" class="btn btn-default" style="color:white;font-size:0.8vw;line-height:1vw">Login</a></span>
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