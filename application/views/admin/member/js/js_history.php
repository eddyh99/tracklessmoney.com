<script>
$('#lasttransaction').DataTable({
    "ordering" : false,
    "bLengthChange": false,
    "scrollX": true,
    "responsive": true,
    "pageLength": 50,
    "ajax": {
        "url": "<?=base_url()?>admin/member/detailhistory",
        "type": "POST",
        "data": {
            csrf_piggy: function (){ return $("#token").val();},
            unik: function (){ return $("#unik").val();}
        },
        "dataSrc":function (data){
            $("#token").val(data["token"]);
			return data["detail"];
		},
    },
    "columns": [
        { "data": "ket" },
        { "data": "debit","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "kredit","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "fee","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "saldo","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "tanggal" },
    ]    
});    

</script>