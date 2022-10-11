<script>
	$('#cekcamount').hide();
	$('#confirmamount').keyup(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekcamount').show();
            $("#cekcamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekcamount').show();
            $("#cekcamount").attr('class','fas fa-times');
		}
	}).focus(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekcamount').show();
            $("#cekcamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekcamount').show();
            $("#cekcamount").attr('class','fas fa-times');
		}
	}).blur(function() {
		var cmount = $(this).val();
		var amount = $("#amount").val();
		if ((cmount==amount) && cmount.length>0){
			$('#cekcamount').show();
            $("#cekcamount").attr('class','fas fa-check-circle');
		}else{
			$('#cekamount').show();
            $("#cekamount").attr('class','fas fa-times');
		}
	});
	
    $(function(){
        $(".is_number").inputmask({ 
                alias : "currency", 
                prefix: '',
                onKeyDown: function (event) {
                    if (event.keyCode==189){
                        return false;
                    }
                } 
        });  
    })
</script>