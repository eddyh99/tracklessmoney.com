<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">WISE Cost</h3>
    </div>
    <div class="card-body">
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
        <div class="row">
            <label class="col-md-12 col-form-label">Circuit Transfer</label>
            
            <div class="col-md-12">
                <input type="text" id="circuit" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <label class="col-md-12 col-form-label">Outside Circuit Transfer  </label>
            
            <div class="col-md-12">
                <input type="text" id="outside" class="form-control" readonly >
            </div>
        </div>
        <div class="card-footer">
            <a href="<?=base_url()?>admin/mifcost/refreshcost" class="btn btnregis">Refresh All Cost</a>
        </div>
        
</div>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body" id="msgid"></div>
</div>
