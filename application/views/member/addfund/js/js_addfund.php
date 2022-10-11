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

</script>