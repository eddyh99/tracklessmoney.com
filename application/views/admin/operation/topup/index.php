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

<div class="card mt-2 removecolor" style="border:1px solid white">
    <div class="card-header" style="border:1px solid white">
        <h3 class="card-title">Topup Process</h3>
    </div>
    <div class="card-body pb-2">
        <form action="<?=base_url()?>admin/operation/import" method="post" enctype="multipart/form-data">
  			<label class="col-md-5 col-form-label">Import Excel File</label>
      		<div class="col-md-7">
        		<input type="file" name="topup" id="topup" class="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-excel" />
        	</div>
        	<div class="col-md-12 mt-2"><button class="btn btnregis">Import</button></div>
    	</form>
    </div>
</div>

