<?php $this->load->view("./layout/fixsaldo"); ?>
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5">
    <div class="col-md-3">
        <a href="<?=base_url()?>admin/masterwallet/addwithdraw" class="btn btnearning">Withdraw</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12">
        <table id="lasttransaction" class="display nowrap" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th class="gridcolor">Description</th>
                    <th class="gridcolor">Amount</th>
                    <th class="gridcolor">Cost</th>
                    <th class="gridcolor">Comission</th>
                    <th class="gridcolor">Fee (Net)</th>
                    <th class="gridcolor">Date</th>
                </tr>
            </thead>
            <tbody style="color:black">
            </tbody>
        </table>
    </div>
</div>
