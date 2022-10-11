<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone-with-data.js"></script>

<script>
moment.tz.setDefault("Asia/Singapore");
$('#lasttransaction').DataTable({
    "ordering" : false,
    "bLengthChange": false,
    "scrollX": true,
    "responsive": true,
    "pageLength": 50,
    "ajax": {
        "url": "<?=base_url()?>admin/masterwallet/historymwallet",
        "type": "POST",
        "data": {
            csrf_piggy: function (){ return $("#token").val();}
        },
        "dataSrc":function (data){
            $("#token").val(data["token"]);
			return data["detail"];
		},
    },
    "aoColumnDefs": [{
	    "aTargets" :[5],
	    "mRender" : function (data){
            return moment(data).tz("<?php echo $_SESSION["logged_status"]["time_location"]?>").format('YYYY-MM-DD HH:mm:ss');
	    }
	}],
    "columns": [
        { "data": "ket" },
        { "data": "amount","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "cost","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "referral","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "mif_fee","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "tanggal" },
    ]    
});    

</script>
