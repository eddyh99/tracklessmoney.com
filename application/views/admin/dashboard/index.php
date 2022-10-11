<?php $this->load->view("./layout/fixsaldo"); ?>
<div class="row mt-5 textgreen">
    <div class="col-md-6">
        Currency
    </div>
    <div class="col-md-6 text-end">
        Balance
    </div>
</div>
<div class="row">
<?php 
foreach ($currency as $dt){?>
    <a href="<?=base_url()?>admin/masterwallet/wallet/<?=$dt["currency"]?>" class="navmember">
        <div class="col-md-12 mb-3" style="background:#0D0D0D">
            <div class="card p-3 m-3 removecolor">
                <div class="row">
                    <div class="col-md-6 desc">
                        <?=$dt["currency"]?>
                    </div>
                    <div class="col-md-6 desc text-end">
                        <?=$dt["symbol"]." ".number_format($dt["saldo"],2)?>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php
}
?>
</div>
