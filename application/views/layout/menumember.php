<div class="row mt-2 p-2">
    <div class="col-12">
        <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/dashboard"><i class="fas fa-home"></i> Home</a>
    </div>
    <?php
        if (@!$is_home){
    ?>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/dashboard/wallet/<?=$_SESSION["currency"]?>"><i class="fas fa-wallet"></i> My Wallet</a>
            </div>
    <?php }
        $public_url=explode("/",$_SERVER['REQUEST_URI'])[3];
        if($public_url=="wallet"){ ?>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/addfund"><i class="fas fa-coins"></i> Add / Receive Fund</a>
            </div>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/towallet"><i class="fas fa-exchange-alt"></i> Wallet to Wallet</a>
            </div>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/tobank"><i class="fas fa-landmark"></i> Wallet to Bank</a>
            </div>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/swap"><i class="fas fa-sync"></i> Swap</a>
            </div>
            <div class="col-12 mt-3">
                <a class="btn btn-lg col-12 btnearning"><i class="fas fa-credit-card"></i> Card</a>
            </div>
            <div class="col-12 mt-3 mb-3">
                <a class="btn btn-lg col-12 btnearning" href="<?=base_url()?>member/dashboard/history"><i class="fas fa-list-alt"></i> History</a>
            </div>
    <?php }?>
</div>