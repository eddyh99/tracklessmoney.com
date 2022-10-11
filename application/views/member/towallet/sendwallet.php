<?php 
    $this->load->view("./layout/fixsaldo"); 
    $this->load->view("./layout/menumember");
?>
<form id="frmwallet" action="<?=base_url()?>member/towallet/confirm" method="post">
    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php if (isset($_SESSION["failed"])){?>
        <div class="row mt-5 mb-5">
            <div class="alert alert-danger" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-12 text-center">
                        <small><?php echo @$_SESSION["failed"]?></small>
                    </div>
                </div>
            </div>
        </div
    <?php }?>
    <?php if (isset($_SESSION["success"])){?>
        <div class="row mt-5 mb-5">
            <div class="alert alert-success smallalert" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-12 text-center">
                        <small><?php echo @$_SESSION["success"]?></small>
                    </div>
                </div>
            </div>
        </div
    <?php }?>

    <div class="row p-2">
        <div class="col-12 mt-5" style="background:#0D0D0D;">
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    Recipient's UNIQUE CODE
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="col-11">
                            <input type="text" class="form-control" id="unik" name="unik" placeholder="Recipient's UNIQUE CODE" maxlength="15" required>
                        </div>
                        <div class="col-1 check">
                            <i id="cekunik" class="fas fa-check-circle"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12">
                    Confirm Recipient's UNIQUE CODE
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="col-11 col-sm-11">
                            <input type="text" class="form-control" id="confirmunik" name="confirmunik" placeholder="Confirm Recipient's UNIQUE CODE" maxlength="15" required>
                        </div>
                        <div class="col-1 col-sm-1 check">
                            <i id="cekcunik" class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    Amount
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="col-11 col-sm-11">
                            <input type="text" class="form-control is_number" id="amount" name="amount" placeholder="Amount" maxlength="15">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    Confirm Amount
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="col-11 col-sm-11">
                            <input type="text" class="form-control is_number" id="confirmamount" name="confirmamount" placeholder="Confirm Amount" maxlength="15" required>
                            <!--<input type="text" class="form-control" id="confirmamount" name="confirmamount" placeholder="Confirm Amount" maxlength="15" required onkeypress="return isNumber(event)">!-->
                        </div>
                        <div class="col-1 col-sm-1 check">
                            <i id="cekamount" class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12 text-end">
                    <button type="button" id="send" class="btn col-4 btnearning">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="review">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content removecolor" style="border:none">
            <div class="modal-body">
                <div class="row" style="background:#363636;border-radius:30px">
                    <div class="col-12 p-2 roundedbar">
                        <span class="ms-2">Transfer Wallet to Wallet</span>
                    </div>
                    <form id="frmwltconfirm" action="<?=base_url()?>member/towallet/process" method="post">
                        <div class="col-12 textgreen m-2">
                            <input type="hidden" id="hdunik" name="unik">
                            <input type="hidden" id="hdamount" name="amount">
                            <div class="row">
                                <div class="col-12">
                                    Receipient UNIQUE CODE
                                </div>
                                <div class="col-12">
                                    <span id="runik"></span>
                                </div>
                                <div class="col-12 mt-2">
                                    Amount
                                </div>
                                <div class="col-12">
                                    <span id="ramount"></span>
                                </div>
                                <div class="col-12 mt-2">
                                    Fee
                                </div>
                                <div class="col-12">
                                    <span id="rfee"></span>
                                </div>
                                <div class="col-12 mt-2">
                                    Total Deducted
                                </div>
                                <div class="col-12">
                                    <span id="rdeduct"></span>
                                </div>
                                <div class="col-12 mt-2">
                                    New Balance
                                </div>
                                <div class="col-12">
                                    <span id="rnewbalance"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 roundedbar text-center">
                            <button id="btncancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default btnreverse">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="pb-2 col-12 bottom-0 position-absolute d-flex align-items-center" style="border-top:1px solid #00E3A5">
        <a href="<?=base_url()?>member/addfund" class="mt-2 textgreen"><i class="fas fa-arrow-left"></i> </a>
    </div>
</div>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body" id="msgid"></div>
</div>
