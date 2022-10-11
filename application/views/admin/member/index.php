
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row mt-2">
    <div class="col-md-3 mb-3">
        <a href="<?=base_url()?>admin/member/email" class="btn btnlogin">Send Email</a>
    </div>
    <?php if (@isset($_SESSION["failed"])){?>
        <div class="row">
            <div class="alert alert-danger smallalert" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-md-12 text-center">
                        <small><?php echo @$_SESSION["failed"]?></small>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <?php if (@isset($_SESSION["success"])){?>
        <div class="row">
            <div class="alert alert-success smallalert" role="alert">
                <div class="row d-flex align-items-middle justify-content-center">
                    <div class="col-md-12 text-center">
                        <small><?php echo @$_SESSION["success"]?></small>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>    
    <div class="col-md-12 mt-5">
        <table id="member" class="display nowrap" width="100%">
            <thead>
                <tr>
                    <th class="gridcolor">Email</th>
                    <th class="gridcolor">Unique Code</th>
                    <th class="gridcolor">Referral Code</th>
                    <th class="gridcolor">Status</th>
                    <th class="gridcolor">Last Login</th>
                    <th class="gridcolor">Action</th>
                </tr>
            </thead>
            <tbody style="color:black">
            </tbody>
        </table>
    </div>
</div>
