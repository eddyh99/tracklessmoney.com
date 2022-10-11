<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">MIF Fee</h3>
    </div>
    <div class="card-body">
        <?php if (@isset($_SESSION["failed"])){?>
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
        <div class="row">
            <div class="col-md-3">
                Currency
            </div>
            <div class="col-md-4">
                <select name="currency" id="choosecurrency" class="form-select">
                    <?php foreach($currency as $dt){?>
                        <option value="<?=$dt["currency"]?>"><?=$dt["name"]?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Topup Circuit</label>
            <div class="col-md-12">
                <input type="text" id="topup_circuit" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Topup Outside Circuit</label>
            <div class="col-md-12">
                <input type="text" id="topup_outside" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Wallet to Bank Circuit</label>
            <div class="col-md-12">
                <input type="text" id="wallet2bank_circuit" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Wallet to Bank Outside Circuit</label>
            <div class="col-md-12">
                <input type="text" id="wallet2bank_outside" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Wallet to Wallet</label>
            <div class="col-md-12">
                <input type="text" id="wallet2wallet" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Swap Currency</label>
            <div class="col-md-12">
                <input type="text" id="swap" class="form-control" readonly>
            </div>
        </div>        
        <hr>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Referral Circuit</label>
            <div class="col-md-12">
                <input type="text" id="ref_circuit" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-2">
            <label class="col-md-12 col-form-label">Referral Outside</label>
            <div class="col-md-12">
                <input type="text" id="ref_outside" class="form-control" readonly>
            </div>
        </div>
        <div class="card-footer text-center">
            <a id="editfee" class="btn btnregis">Edit</a>
        </div>
    </div>
</div>
