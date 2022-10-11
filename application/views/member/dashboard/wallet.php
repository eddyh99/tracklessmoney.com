<?php 
    $this->load->view("./layout/fixsaldo"); 
    $this->load->view("./layout/menumember");
?>
<div class="row bottom-0" style="border-top:1px solid #00E3A5">
    <div class="col-12 mt-2 text-center">
        <a href="<?=base_url()?>auth/logout" class="textgreen"><i class="fas fa-sign-out-alt"></i> Disconnect</a>
    </div>
</div>