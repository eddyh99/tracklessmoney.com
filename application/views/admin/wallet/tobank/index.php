<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">Wallet to Wallet History Transaction</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <label class="col-md-2 col-form-label">Date</label>
            <div class="col-md-4">
                <input type="text" id="tgl" name="tgl" class="form-control">
            </div>
            <div class="col-md 4">
                <button id="filter" class="btn btnregis">View</button>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <table id="walletbank" class="display nowrap table-hover" width="100%">
            <thead>
                <tr>
                    <th class="gridcolor">UNIQUE CODE</th>
                    <th class="gridcolor">Receiver</th>
                    <th class="gridcolor">IBAN</th>
                    <th class="gridcolor">BIC/SWIFT</th>
                    <th class="gridcolor">Amount</th>
                    <th class="gridcolor">Cost</th>
                    <th class="gridcolor">Referral Fee</th>
                    <th class="gridcolor">MIF Fee</th>
                    <th class="gridcolor">Action</th>
                </tr>
            </thead>
            <tbody style="color:black">
            </tbody>
        </table>

    </div>
</div>
