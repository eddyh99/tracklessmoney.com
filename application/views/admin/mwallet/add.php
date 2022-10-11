        <div class="card m-2 removecolor" style="border:1px solid white">
            <div class="card-header" style="border:1px solid white">
                <h3 class="card-title">Withdraw Master Wallet</h3>
            </div>
            <form action="<?=base_url()?>admin/masterwallet/savedata" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-4 col-form-label">Balance</label>
                        <label class="col-md-8 col-form-label"><?=$balance["symbol"]." ".number_format($balance["saldo"],2)?></label>
                    </div>
                    <div class="row mt-2">
                        <label class="col-md-12 col-form-label">Amount</label>
                        <div class="col-11 col-sm-11">
                            <input type="text" id="amount" name="amount" placeholder="Amount" class="form-control is_number" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="col-sm-12 col-form-label">Confirm Amount</label>
                        <div class="col-11 col-sm-11">
                            <input type="text" id="confirmamount" name="confirmamount" class="form-control is_number" placeholder="Confirm Amount" required>
                        </div>
                        <div class="col-1 col-sm-1 check">
                            <i id="cekcamount" class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-center">
                    <a href="<?=base_url()?>admin/masterwallet/wallet/<?=$_SESSION["currency"]?>" class="btn btnlogin">Cancel</a>
                    <button type="submit" class="btn btnregis">Confirm</button>
                </div>
            </form>
        </div>
