        <div class="card card-info m-2">
            <div class="card-header">
                <h3 class="card-title"><?php echo $this->lang->line('txtsendmail')?></h3>
            </div>
            <form action="<?=base_url()?>admin/member/send" method="post">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="d-flex justify-content-between">
                            <label class="col-sm-9 col-9 col-md-5 col-form-label"><?php echo $this->lang->line('txtmailto')?></label>
                            <div class="form-check col-sm-3 col-3 col-md-2">
                              <input class="form-check-input" id="all" type="checkbox" value="all" name="all">
                              <label class="form-check-label" for="flexCheckDefault">
                                Select All
                              </label>
                            </div>
                        </div>
                        <div class="col-sm- col-11">
                            <select id="tujuan" name="tujuan[]" multiple data-placeholder="Select an Email" required>
                            <?php foreach($member as $dt){?>
                                <option value="<?=$dt["email"]?>"><?=$dt["email"]?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtmailsubject')?></label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <input type="text" name="subject" id="subject" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-12 col-form-label"><?php echo $this->lang->line('txtmailmessage')?>Message</label>
                        
                        <div class="input-group">
                            <div class="col-sm-12">
                                <textarea name="message" id="message" class="summernote" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between mt-2">
                    <a href="<?=base_url()?>admin/member" class="btn btn-default"><?php echo $this->lang->line('btncancel')?></a>
                    <button type="submit" class="btn btn-piggy"><?php echo $this->lang->line('btnsend')?></button>
                </div>
            </form>
        </div>
