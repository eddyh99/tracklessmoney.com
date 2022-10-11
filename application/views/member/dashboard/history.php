<?php $this->load->view("./layout/fixsaldo"); ?>
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5">
    <div class="col-md-12">
        <table id="lasttransaction" class="display nowrap" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th class="gridcolor">Description</th>
                    <th class="gridcolor">Debit</th>
                    <th class="gridcolor">Credit</th>
                    <th class="gridcolor">Fee</th>
                    <th class="gridcolor">Balance</th>
                    <th class="gridcolor">Date</th>
                </tr>
            </thead>
            <tbody style="color:black">
            </tbody>
        </table>
    </div>
</div>
