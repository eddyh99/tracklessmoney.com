<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone-with-data.js"></script>

<script>
$("#time_location").val(moment.tz.guess());
$(function() {
    $("#btnlogin").hide();
    $("#btnregister").hide();
    
	$('#cekemail').hide();
	$('#cekcemail').hide();
	$('#cekpass').hide();
    $("#cekcpass").hide();
    $("#alert-piggy").hide();
    
    $("#togglePassword").on("click",function(){
        var tipe=$("#pass").attr("type");
        if (tipe=='password'){
            $("#pass").attr('type', "text");
            $(this).attr("class",'far fa-eye-slash');
        }else{
            $("#pass").attr('type', "password");
            $(this).attr("class",'far fa-eye');
        }
    })

    $("#toggleCPassword").on("click",function(){
        var tipe=$("#confirmpass").attr("type");
        if (tipe=='password'){
            $("#confirmpass").attr('type', "text");
            $(this).attr("class",'far fa-eye-slash');
        }else{
            $("#confirmpass").attr('type', "password");
            $(this).attr("class",'far fa-eye');
        }
    })
    
	$('#confirmemail').keyup(function() {
		var cemail = $(this).val();
		var email = $("#email").val();
		if ((cemail==email) && cemail.length>0){
			$('#cekcemail').show();
		}else{
			$('#cekcemail').hide();
		}
	}).focus(function() {
		var cemail = $(this).val();
		var email = $("#email").val();
		if ((cemail==email) && cemail.length>0){
			$('#cekcemail').show();
		}else{
			$('#cekcemail').hide();
		}
	}).blur(function() {
		var cemail = $(this).val();
		var email = $("#email").val();
		if ((cemail==email) && cemail.length>0){
			$('#cekcemail').show();
		}else{
			$('#cekcemail').hide();
		}
	});

	$('#pass').keyup(function() {
		var pswd = $(this).val();
		var c1=0;
		var c2=0;
		var c3=0;
		var c4=0;
		var c5=0;

		//validate the length
		if ( pswd.length<9 ) {
			$('#length').removeClass('valid').addClass('invalid');
			c1=0;
		} else {
			$('#length').removeClass('invalid').addClass('valid');
			c1=1;
		}
			
		//validate letter
		if ( pswd.match(/[a-z]/) ) {
			$('#letter').removeClass('invalid').addClass('valid');
			c2=1;
		} else {
			$('#letter').removeClass('valid').addClass('invalid');
			c2=0;
		}
			
		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			$('#capital').removeClass('invalid').addClass('valid');
			c3=1;
		} else {
			$('#capital').removeClass('valid').addClass('invalid');
			c3=0;
		}
			
		//validate number
		if ( pswd.match(/\d/) ) {
			$('#number').removeClass('invalid').addClass('valid');
			c4=1;
		} else {
			$('#number').removeClass('valid').addClass('invalid');
			c4=0;
		}

		if (pswd.match(/(?:[^!@#$%^&*\-_=+]*[!@#$%^&*\-_=+])/))
		{
			$('#special').removeClass('invalid').addClass('valid');
			c5=1;
		}else{
			$('#special').removeClass('valid').addClass('invalid');
			c5=0;		
		}

		if(c1 && c2 && c3 && c4 && c5){
			$('#cekpass').show();
		}else{
			$('#cekpass').hide();
		}

	}).focus(function() {
		$('#pswd_info').show();
	}).blur(function() {
		$('#pswd_info').hide();
	});

	$('#confirmpass').keyup(function() {
		var cpswd = $(this).val();
		var pswd = $("#pass").val();
		
		if ((cpswd==pswd) && cpswd.length>0){
			$('#cekcpass').show();
		}else{
			$('#cekcpass').hide();
		}
	}).focus(function() {
		var cpswd = $(this).val();
		var pswd = $("#pass").val();
		if ((cpswd==pswd) && cpswd.length>0){
			$('#cekcpass').show();
		}else{
			$('#cekcpass').hide();
		}
	}).blur(function() {
		var cpswd = $(this).val();
		var pswd = $("#pass").val();
		if ((cpswd==pswd) && cpswd.length>0){
			$('#cekcpass').show();
		}else{
			$('#cekcpass').hide();
		}
	});
});
</script>
