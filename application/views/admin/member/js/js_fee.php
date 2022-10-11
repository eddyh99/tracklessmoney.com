<script>
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