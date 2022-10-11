<style>
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
$("#btnsignin").on("click",function(e){
    e.preventDefault();
    $.ajax({
        url:"<?=base_url()?>pages/signin",
        type:"POST",
        data:$("#frmsignin").serialize(),
        success:function(response) {
            console.log(response);
            var result=JSON.parse(response);
            if (result.success){
                location.replace("<?=base_url()?>pages/home");
            }else{
                $("#msgid").html(result.message);
                $(".toast").toast({
                    delay:1000
                }).toast('show');
            }
        },
        error:function(){
            $("#msgid").html("Error");
            $(".toast").toast({
                delay:1000
            }).toast('show');
        }
    });
});

$("#btnsignup").on("click",function(e){
    e.preventDefault();
    location.replace("<?=base_url()?>pages/register");
})
</script>