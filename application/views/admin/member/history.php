<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-5">
    <label class="col-md-4">UNIQUE CODE</label>
    <div class="col-md-4">
        <input type="text" id="unik" name="unik" value="<?=$uniquecode?>" class="form-control" readonly>
    </div>
    <div class="col-md-12 mt-5">
        <table id="lasttransaction" class="display nowrap table-hover" width="100%">
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