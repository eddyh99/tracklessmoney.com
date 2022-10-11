<div class="row p-2">
    <div class="col-12 textgreen">
        <h3>Add/Receive Fund - <?=ucwords($_GET["type"])?></h3>
    </div>
</div>
<div id="circuit" class="row mt-5 p-2">
    <div class="card removecolor" style="border:1px solid #00E3A5">
        <div class="card-body">
            <div class="col-md-12">
                Registered Name
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-sm">
                    <input type="text" id="txtregisname" class="form-control " readonly value="<?php echo @$mifbank["recipient_name"]; ?>">
                    <span class="input-group-append">
                        <button type="button" id="btnregisname" class="btn btn-secondary btn-flat">
                            <span class="tooltiptext" id="tipregisname">Copy</span>
                            <i class="far fa-copy"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-md-12 mt-1">
                Routing Number
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-sm">
                    <input type="text" id="txtbic" class="form-control " readonly value="<?php echo @$mifbank["routing_number"]; ?>">
                    <span class="input-group-append">
                        <button type="button" id="btnbic" class="btn btn-secondary btn-flat">
                            <span class="tooltiptext" id="tipsbic">Copy</span>
                            <i class="far fa-copy"></i>
                        </button>
                    </span>
                </div>
            </div>        
            <div class="col-md-12 mt-1">
                Account Number/IBAN
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-sm">
                    <input type="text" id="txtiban" class="form-control " readonly value="<?php echo @$mifbank["account_number"]; ?>">
                    <span class="input-group-append">
                        <button type="button" id="btniban" class="btn btn-secondary btn-flat">
                            <span class="tooltiptext" id="tipsiban">Copy</span>
                            <i class="far fa-copy"></i>
                        </button>
                    </span>
                </div>
            </div>        
            <div class="col-md-12 mt-1">
                Causal
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-sm">
                    <input type="text" id="txtrefcode" class="form-control " readonly value="Topup <?php echo $this->session->userdata('logged_status')['ucode']; ?>">
                    <span class="input-group-append">
                        <button type="button" id="btnrefcode" class="btn btn-secondary btn-flat">
                            <span class="tooltiptext" id="tiprefcode">Copy</span>
                            <i class="far fa-copy"></i>
                        </button>
                    </span>
                </div>
            </div>        
            <div class="col-md-12 mt-1">
                Company Address
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-sm">
                    <input type="text" id="txtbankadd" class="form-control " readonly value="<?php echo empty($mifbank["bank_address"])?'':$mifbank["bank_address"]; ?>">
                    <span class="input-group-append">
                        <button type="button" id="btnbankadd" class="btn btn-secondary btn-flat">
                            <span class="tooltiptext" id="tipbankadd">Copy</span>
                            <i class="far fa-copy"></i>
                        </button>
                    </span>
                </div>
            </div>        
        </div>
    </div>
</div>
<div id="outside" class="row mt-3">
    <div class="col-md-12">
        Registered Name
    </div>
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input type="text" id="txtregisnameinter" class="form-control " readonly value="<?php echo @$mifbank_inter["recipient_name"]; ?>">
            <span class="input-group-append">
                <button type="button" id="btnregisnameinter" class="btn btn-secondary btn-flat">
                    <span class="tooltiptext" id="tipregisnameinter">Copy</span>
                    <i class="far fa-copy"></i>
                </button>
            </span>
        </div>
    </div>
    <div class="col-md-12 mt-1">
        Swift
    </div>
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input type="text" id="txtbicinter" class="form-control " readonly value="<?php echo @$mifbank_inter["BIC"]; ?>">
            <span class="input-group-append">
                <button type="button" id="btnbicinter" class="btn btn-secondary btn-flat">
                    <span class="tooltiptext" id="tipsbicinter">Copy</span>
                    <i class="far fa-copy"></i>
                </button>
            </span>
        </div>
    </div>        
    <div class="col-md-12 mt-1">
        Account Number
    </div>
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input type="text" id="txtibaninter" class="form-control " readonly value="<?php echo @$mifbank_inter["IBAN"]; ?>">
            <span class="input-group-append">
                <button type="button" id="btnibaninter" class="btn btn-secondary btn-flat">
                    <span class="tooltiptext" id="tipsibaninter">Copy</span>
                    <i class="far fa-copy"></i>
                </button>
            </span>
        </div>
    </div>        
    <div class="col-md-12 mt-1">
        Causal
    </div>
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input type="text" id="txtrefcodeinter" class="form-control " readonly value="Topup <?php echo $this->session->userdata('logged_status')['ucode']; ?>">
            <span class="input-group-append">
                <button type="button" id="btnrefcodeinter" class="btn btn-secondary btn-flat">
                    <span class="tooltiptext" id="tiprefcodeinter">Copy</span>
                    <i class="far fa-copy"></i>
                </button>
            </span>
        </div>
    </div>        
    <div class="col-md-12 mt-1">
        Company Address
    </div>
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input type="text" id="txtbankaddinter" class="form-control " readonly value="<?php echo empty($mifbank_inter["bank_address"])?'':$mifbank_inter["bank_address"]; ?>">
            <span class="input-group-append">
                <button type="button" id="btnbankaddinter" class="btn btn-secondary btn-flat">
                    <span class="tooltiptext" id="tipbankaddinter">Copy</span>
                    <i class="far fa-copy"></i>
                </button>
            </span>
        </div>
    </div>        
</div>
<div class="row">
    <div class="pb-2 col-12 bottom-0 position-absolute d-flex align-items-center" style="border-top:1px solid #00E3A5">
        <a href="<?=base_url()?>member/addfund" class="mt-2 textgreen"><i class="fas fa-arrow-left"></i> </a>
    </div>
</div>

