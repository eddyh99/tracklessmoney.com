<script>
    function setcurrency(currency,status){
        console.log(currency);
        $.ajax({
            url: "<?=base_url()?>admin/currency/setcurrency",
            type: "post",
            data: "currency="+currency+'&status='+status,
            success: function (response) {
                console.log(response)
            },
            error: function(response){
            }
        });
    }
</script>