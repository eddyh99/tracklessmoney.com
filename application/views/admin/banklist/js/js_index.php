<script>
$(function(){
    $('#banklist').DataTable({
        "ajax": {
            "url": "<?=base_url()?>admin/banklist/get_all",
            "type": "POST",
            "data": {
                csrf_piggy: $("#token").val()
            },
            "dataSrc":function (data){
                 $("#token").val(data["token"]);
				return data["banklist"];
			},
        },
        "aoColumnDefs": [{
			"aTargets": [3],
			"mData": "bic",
			"mRender": function (data, type, full, meta){
			    var button='<a href="" class="btn btn-primary btn-sm">Change Fee</a>';
			    button= button+' <a href="" class="btn btn-danger btn-sm">Delete</a>';
				return button;
			}
		}],
        "columns": [
            { "data": "bic" },
            { "data": "bank_name" },
            { "data": "fee", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        ]        
    });    
})
</script>