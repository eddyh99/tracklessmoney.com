<style>
.fa-times {
  color: red;
}
</style>
<script>
    $("#cekunik").hide();
	$("#unik").on("blur",function(){
        $.get("<?=base_url()?>operator/topup/getUnique/"+$(this).val(), function(data){
            if (data==1){
                $("#cekunik").show();
                $("#cekunik").attr('class','fas fa-check-circle');
            }else{
                $("#cekunik").show();
                $("#cekunik").attr('class','fas fa-times');
            }
        });
	})
</script>