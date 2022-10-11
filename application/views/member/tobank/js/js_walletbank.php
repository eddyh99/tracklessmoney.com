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
var url=new URL(window.location.href);
var type = url.searchParams.get("type");

if (type=='circuit'){
    $("#outside").hide();
    $("#circuit").show();
}else{
    $("#circuit").hide();
    $("#outside").show();
}

$("#transfer1").on("click",function(){
    $("#outside").hide();
    $("#circuit").show();
});
$("#transfer2").on("click",function(){
    $("#circuit").hide();
    $("#outside").show();
});
$("#btnregisname").on("click",function(){
    var copyText = document.getElementById("txtregisname");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipregisname");
    tooltip.innerHTML = "Copied";
})

$("#btniban").on("click",function(){
    var copyText = document.getElementById("txtiban");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipsiban");
    tooltip.innerHTML = "Copied";
})


$("#btnbic").on("click",function(){
    var copyText = document.getElementById("txtbic");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipsbic");
    tooltip.innerHTML = "Copied";
})

$("#btnrefcode").on("click",function(){
    var copyText = document.getElementById("txtrefcode");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tiprefcode");
    tooltip.innerHTML = "Copied";
})

$("#btnbankname").on("click",function(){
    var copyText = document.getElementById("txtbankname");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipbankname");
    tooltip.innerHTML = "Copied";
})

$("#btnbankadd").on("click",function(){
    var copyText = document.getElementById("txtbankadd");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipbankadd");
    tooltip.innerHTML = "Copied";
})

/*------------Inter--------------*/
$("#btnregisnameinter").on("click",function(){
    var copyText = document.getElementById("txtregisnameinter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipregisnameinter");
    tooltip.innerHTML = "Copied";
})

$("#btnibaninter").on("click",function(){
    var copyText = document.getElementById("txtibaninter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipsibaninter");
    tooltip.innerHTML = "Copied";
})


$("#btnbicinter").on("click",function(){
    var copyText = document.getElementById("txtbicinter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipsbicinter");
    tooltip.innerHTML = "Copied";
})

$("#btnrefcodeinter").on("click",function(){
    var copyText = document.getElementById("txtrefcodeinter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tiprefcodeinter");
    tooltip.innerHTML = "Copied";
})

$("#btnbanknameinter").on("click",function(){
    var copyText = document.getElementById("txtbanknameinter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipbanknameinter");
    tooltip.innerHTML = "Copied";
})

$("#btnbankaddinter").on("click",function(){
    var copyText = document.getElementById("txtbankaddinter");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipbankaddinter");
    tooltip.innerHTML = "Copied";
})

$("#sendcircuit").on("click",function(e){
    e.preventDefault();
    $.ajax({
        url:"<?=base_url()?>member/tobank/confirm",
        type:"POST",
        cache: false,
        data:$("#frmcircuit").serialize(),
        success:function(response) {
            console.log(response);
            var result=JSON.parse(response);
            if (result.success){
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

$("#cancel").on("click",function(){
    $("#review").modal("hide");
})

</script>