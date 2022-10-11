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
    readfee();
    function readfee(){
        var readcurrency=$("#choosecurrency").val();
        $.ajax({
            url: "<?=base_url()?>admin/mcost/getcost",
            type: "post",
            data: "currency="+readcurrency,
            success: function (response) {
                var data = JSON.parse(response);
                $("#circuit").val(data.sepa_transfer_fxd)
                $("#outside").val(data.int_transfer_fxd)
            },
            error: function(response){
                $("#msgid").html(response);
                $(".toast").toast({
                    delay:1000
                }).toast('show');
            }
        })        
    }

    $("#choosecurrency").on("change",function(){
        readfee();
    })
</script>