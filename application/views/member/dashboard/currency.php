<div class="row">
    <div class="col-12" style="background:black">
        <img src="<?=base_url()?>assets/images/logo.png" class="img-fluid col-md-4">        
    </div>
</div>
<div class="row position-relative">
    <div class="mt-2 col-md-1 position-absolute top-0 end-0">
        <a href="<?=base_url()?>member/dashboard"><i class="fas fa-times btncircle"></i></a>
    </div>
</div>
<div class="row mt-5">
    <div class="ms-5 col-md-12 desc">
        <div class="form-check form-switch form-switch-xl mt-2">
          <label class="form-check-label">USD</label>
          <input class="form-check-input" type="checkbox" role="switch" checked disabled>
        </div>
        <?php foreach($currency as $dt){?>
            <div class="form-check form-switch form-switch-xl">
              <label class="form-check-label"><?=$dt["name"]?></label>
              <input class="form-check-input" type="checkbox" role="switch" id="currency" onclick="setcurrency('<?=$dt["$currency"]?>')" <?php echo ($dt["is_active"])?"checked":"" ?>>
            </div>
        <?php }?>
    </div>
</div>
