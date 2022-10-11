<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row m-2" style="height:50px">
    <div class="col-sm-3">
        <a href="<?=base_url()?>admin/banklist/add" class="btn btn-success">
            <?php echo $this->lang->line('txtaddbank')?>
        </a>
    </div>
    <div class="col-sm-12 mt-5">
        <table id="banklist" class="display nowrap table-hover" width="100%">
            <thead>
                <tr>
                    <th>BIC</th>
                    <th><?php echo $this->lang->line('txtbname')?></th>
                    <th><?php echo $this->lang->line('txtadminfee')?></th>
                    <th><?php echo $this->lang->line('txtadminaction')?></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
