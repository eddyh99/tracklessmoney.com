<style>
.fa-times {
  color: red;
}

.toast {
    color:white;
    background:rgba(0,0,0,0.8);
    top:50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 9999;
}
</style>
<script>
$("#tocurrency").on('change',function(){
    $("#symbol").text($("#tocurrency option:selected").attr("data-symbol"));
})

$("#amount").on("blur",function(e){
    e.preventDefault();

    $.ajax({
        url:"<?=base_url()?>member/swap/confirm",
        type:"POST",
        cache: false,
        data:$("#frmcircuit").serialize(),
        success:function(response) {
            console.log(response);
            var result=JSON.parse(response);
            if (result.success){
                $("#toamount").val(response.message);
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

</script>