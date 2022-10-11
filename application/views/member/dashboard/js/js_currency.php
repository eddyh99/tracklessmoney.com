<style>
.card-img-top {
    width: 100%;
    min-height: 100vh;
    object-fit: contain;
    
}

.form-check-input:checked {
    background-color: #00E3A5;
    border-color: white;
}

</style>
<script>
    function setcurrency(currency){
        $.ajax({
            url: "<?=base_url()?>member/dashboard/setcurrency",
            type: "post",
            data: "currency="+currency,
            success: function (response) {
                console.log(response)
            },
            error: function(response){
            }
        });
    }
</script>