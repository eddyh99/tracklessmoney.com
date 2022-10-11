<style>
.fa-times {
  color: red;
}

.toast {
    color:white;
    background:rgba(0,0,0,1);
    top:50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 9999;
}
</style>
<script>
    $("#cekunik").hide();
    $("#cekcunik").hide();
	$('#cekamount').hide();
	$("#unik").on("blur",function(){
        $.get("<?=base_url()?>member/towallet/getUnique/"+$(this).val(), function(data){
            if (data==1){
                $("#cekunik").show();
                $("#cekunik").attr('class','fas fa-check-circle');
            }else{
                $("#cekunik").show();
                $("#cekunik").attr('class','fas fa-times');
            }
        });
	})
	
	$('#confirmunik').keyup(function() {
		var cunik = $(this).val();
		var unik = $("#unik").val();
		if ((cunik==unik) && cunik.length>0){
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-check-circle');
		}else{
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-times');
		}
	}).focus(function() {
		var cunik = $(this).val();
		var unik = $("#unik").val();
		if ((cunik==unik) && cunik.length>0){
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-check-circle');
		}else{
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-times');
		}
	}).blur(function() {
		var cunik = $(this).val();
		var unik = $("#unik").val();
		if ((cunik==unik) && cunik.length>0){
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-check-circle');
		}else{
			$('#cekcunik').show();
            $("#cekcunik").attr('class','fas fa-times');
		}
	});

	$('#confirmamount').keyup(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-times');
		}
	}).focus(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-times');
		}
	}).blur(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-times');
		}
	});
	
    $(function(){
        $("#amount").inputmask({ 
                alias : "currency", 
                prefix: '',
                onKeyDown: function (event) {
                    if (event.keyCode==189){
                        return false;
                    }
                } 
        });    
        $("#confirmamount").inputmask({ 
                alias : "currency", 
                prefix: '',
                onKeyDown: function (event) {
                    if (event.keyCode==189){
                        return false;
                    }
                } 
        });    
    })
    
    $("#send").on("click",function(e){
        e.preventDefault();
        $.ajax({
            url:"<?=base_url()?>member/towallet/confirm",
            type:"POST",
            data:$("#frmwallet").serialize(),
            success:function(response) {
                console.log(response);
                var result=JSON.parse(response);
                if (result.success){
                    $("#hdunik").text(result.message.unik)
                    $("#hdamount").text(result.message.amount)
                    $("#runik").text(result.message.unik)
                    $("#ramount").text(result.message.amount)
                    $("#rfee").text(result.message.fee)
                    $("#rdeduct").text(result.message.deduct)
                    $("#rnewbalance").text(result.message.newbalance)
                    $("#review").modal("show");
                }else{
                    $("#msgid").html(result.message);
                    $(".toast").toast({
                        delay:2000
                    }).toast('show');
                }
            },
            error:function(){
                $("#msgid").html("Error");
                $(".toast").toast({
                    delay:2000
                }).toast('show');
            }
        });
    })
    
    $("#btncancel").on("click",function(){
        $("#review").modal("hide");
    })
</script>