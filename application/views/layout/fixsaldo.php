<?php if ($_SESSION["logged_status"]["role"]=="member"){?>
<div class="row">
    <div class="col-12 pb-2" style="background:#0D0D0D">
        <div class="card removecolor">
            <div class="row ms-1 mt-3">
                <div class="col-9 textgreen desc">
                    <div class="row">
                        <div class="col-12">
                            UNIQUE CODE : <?=$_SESSION["logged_status"]["ucode"]?>
                        </div>
                    </div>
                </div>
                <div class="col-3 nopadding text-end">
                    <img src="<?=base_url()?>assets/images/shieldkecil.png" class="img-fluid col-md-6">
                </div>
            </div>
            <div class="row ms-3">
                <div class="col-12 mt-5 text-white nopadding">
                    <?php if ($is_home){?>
                        <a href="<?=base_url()?>member/dashboard/currencyavailable" class="btn btn-lg btnlogin col-8 btnround"><span style="font-size:2.5vh">Active/Disactive Currencies</span></a>
                    <?php
                        }else{
                    ?>
                        Balance<br>
                        <?=$currency["symbol"]." ".number_format($currency["saldo"],2)?>
                    <?php  
                        }
                    ?>
                </div>
            </div>
            <div class="row ms-1 me-1">
                <div class="col-12 mt-5">
                    <span style="font-size:2.5vh">Copy & share your referral link to earn money</span>
                </div>
                <div class="col-12">
                    <div class="input-group input-group-sm">
                        <input type="text" id="txtreferral" class="form-control" readonly value="<?=base_url()?>/auth/register?ref=<?=$_SESSION["logged_status"]["referral"] ?>">
        
                        <span class="input-group-append">
                            <button type="button" id="btnreferral" class="btn btn-secondary btn-flat">
                                <span class="tooltiptext" id="tipreferral">Copy</span>
                                <i class="far fa-copy"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($_SESSION["logged_status"]["role"]=="admin"){?>
<div class="row">
    <div class="col-md-12" style="background:#0D0D0D">
        <div class="card p-3 m-3 removecolor">
            <div class="row">
                <div class="col-md-9 textgreen desc">
                    <div class="row">
                        <div class="col-md-12" style="font-size:2vw">
                            MASTER WALLET M3RC4N73
                        </div>
                        <div class="col-md-12 mt-5 text-white">
                            <?php if (!$is_home){?>
                                Balance<br>
                                <span style="font-size:2vw"><?=$currency["symbol"]." ".number_format($currency["saldo"],2)?></span>
                            <?php  
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 nopadding text-end">
                    <img src="<?=base_url()?>assets/images/shieldkecil.png" class="img-fluid col-md-6">
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>