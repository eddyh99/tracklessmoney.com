<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">Currency List</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                Currency
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch form-switch-xl mt-2">
                  <label class="form-check-label">USD</label>
                  <input class="form-check-input" type="checkbox" role="switch" checked disabled>
                </div>
                <?php
                    foreach($currency as $dt){?>
                    <div class="form-check form-switch form-switch-xl">
                      <label class="form-check-label"><?=$dt["name"]?></label>
                      <input class="form-check-input" type="checkbox" role="switch" id="currency" onclick="setcurrency('<?=$dt["currency"]?>','<?php echo ($dt["is_active"])? 1:0?>')" <?php echo ($dt["is_active"])?"checked":"" ?>>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
