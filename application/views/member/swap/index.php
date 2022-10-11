<?php $this->load->view("./layout/fixsaldo"); ?>
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5">
    <div class="col-md-12">
        <span class="textgreen">ATTENTION!</span><br>
        In order to topup your own wallet or receive money through bank transfer,copy and share the data as below
    </div>
    <form id="frmswap" method="post" action="<?=base_url()?>swap/process">
        <div class="col-md-12 mt-5" style="background:#0D0D0D;height:250px">
            <div class="row">
                <div class="col-md-12 mt-2 textgreen">
                    <div class="input-group">
                        <span class="input-group-text"><?=$currency["symbol"]?></span>
                        <input type="text" class="form-control is_number" id="amount" name="amount" style="border-left: none;" required>
                    </div>
                </div>
                <div class="col-md-12 mt-2 textgreen">
                    <select id="tocurrency" name="tocurrency" class="form-select">
                        <?php foreach($swapto as $dt){?>
                            <option data-symbol='<?=$dt["symbol"]?>' value="<?=$dt["currency"]?>"><?=$dt["name"]?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-12 mt-2 textgreen">
                    <div class="input-group">
                        <span class="input-group-text" id="symbol"><?=$swapto[0]["symbol"]?></span>
                        <input type="text" class="form-control is_number" id="toamount" name="toamount" style="border-left: none;" disabled>
                    </div>
                </div>
                <div class="col-md-12 mt-2 textgreen">
                    Note: Convert amount is approximately, real amount will use the current rate
                </div>
                <div class="col-md-12 mt-2 text-center">
                    <button class="btn btn-lg col-md-4 btnearning">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>
