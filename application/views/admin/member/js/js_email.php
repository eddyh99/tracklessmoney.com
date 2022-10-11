<script src="<?=base_url()?>assets/vendor/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url()?>assets/vendor/select2/select2.full.min.js"></script>
<style>
.select2-container .select2-selection--multiple {
    width: 300px !important;
}
.smalldrop {
    width: 300px !important;
}
</style>

<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height:300
    });
});  

$('#tujuan').select2({
    dropdownCssClass : 'smalldrop'
});    

$('#all').on("click",function(){
    if ($(this).is(':checked')) {
        $("#tujuan").prop("disabled", true);
    }else{
        $("#tujuan").prop("disabled", false);
    }
});

</script>