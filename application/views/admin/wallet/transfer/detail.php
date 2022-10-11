    <div class="card mt-2 removecolor" style="border:1px solid white">
        <div class="card-header" style="border:1px solid white">
            <h3 class="card-title">Detail Wallet Transaction for UNIQUE CODE : <?=$data["ucode"]?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-md-5 col-form-label">Receiver</label>
                <label class="col-md-5 col-form-label"><?=$data["receiver"]?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Amount</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["amount"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Referral Sender</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["referral_fee_sender"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Referral Receiver</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["referral_fee_receiver"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">MIF Fee</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["mif_fee"],2)?></label>
            </div>

        </div>
        <div class="card-footer text-center">
            <a href="<?=base_url()?>admin/wallet/transfer" class="btn btnlogin">Cancel</a>
        </div>
    </div>
