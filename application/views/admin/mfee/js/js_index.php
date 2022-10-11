<style>
.form-check-input:checked {
    background-color: #00E3A5;
    border-color: white;
}

.form-check-input {
  clear: left;
}

.form-switch.form-switch-xl {
  margin-bottom: 2rem; /* JUST FOR STYLING PURPOSE */
}

.form-switch.form-switch-xl .form-check-input {
  height: 2.5rem;
  width: calc(4rem + 0.75rem);
  border-radius: 5rem;
}

.form-check-label::before, 
.form-check-label::after {
  width: 2.25rem !important;
  height: 2.25rem !important;
}
.form-check-label{
  margin: 0.75rem 2rem;
}
</style>
<script>
    readfee();
    function readfee(){
        var readcurrency=$("#choosecurrency").val();
        $("#editfee").prop("href","<?=base_url()?>admin/mifee/editfee/"+readcurrency)

        $.ajax({
            url: "<?=base_url()?>admin/mifee/getfee",
            type: "post",
            data: "currency="+readcurrency,
            success: function (response) {
                var data = JSON.parse(response);
                $("#topup_circuit").val(data.fee.topup_circuit)
                $("#topup_outside").val(data.fee.topup_outside)
                $("#wallet2bank_circuit").val(data.fee.wallet2bank_circuit)
                $("#wallet2bank_outside").val(data.fee.wallet2bank_outside)
                $("#wallet2wallet").val(data.fee.wallet2wallet)
                $("#swap").val(data.fee.swap)
                $("#ref_circuit").val(data.fee.ref_circuit)
                $("#ref_outside").val(data.fee.ref_outside)
            },
            error: function(response){
                alert(response);
            }
        })        
    }

    $("#choosecurrency").on("change",function(){
        readfee();
    })
</script>