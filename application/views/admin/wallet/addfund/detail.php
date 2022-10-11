    <div class="card mt-2 removecolor" style="border:1px solid white">
        <div class="card-header" style="border:1px solid white">
            <h3 class="card-title">Detail Topup Transaction for UNIQUE CODE : <?=$data["ucode"]?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-md-5 col-form-label">Amount</label>
                <label class="col-md-5 col-form-label"><?=$data["amount"]?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Cost</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["mif_cost"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Referral Fee</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["referral_fee"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">MIF Fee</label>
                <label class="col-md-5 col-form-label"><?=number_format($data["mif_fee"],2)?></label>
            </div>
            <div class="row">
                <label class="col-md-5 col-form-label">Operator's Name</label>
                <label class="col-md-5 col-form-label"><?=$data["operator"]?></label>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="<?=base_url()?>admin/wallet/addfund" class="btn btnlogin">Cancel</a>
        </div>
    </div>
