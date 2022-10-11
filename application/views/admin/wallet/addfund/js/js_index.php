<style>
div.dataTables_wrapper {
        width: 80vw;
        margin: 0 auto;
    }
.daterangepicker .ranges ul li {
    color: black;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone-with-data.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
moment.tz.setDefault("Asia/Singapore");
$(function() {
  var months = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", 
           "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

  var currentMonth= moment().month();
  var currentYear= moment().year();

  var start = moment().subtract(29, 'days'); // Subtract 29 days from today
  var end = moment(); // Today

  var dateRange = {};
  dateRange["Today"] = [moment(), moment()];
  dateRange["Last 30 Days"] = [moment().subtract(29, 'days'), moment()];

  $('#tgl').daterangepicker({
    startDate: end,
    endDate: end,
    ranges: dateRange,
    maxDate:moment(),
    locale: {
      format: 'YYYY/MM/DD'
    }
  });
})

var table=$('#addfundhistory').DataTable({
            "ordering" : false,
            "bLengthChange": false,
            "scrollX": true,
            "responsive": true,
            "pageLength": 100,
            "ajax": {
                "url": "<?=base_url()?>admin/wallet/historytopup",
                "type": "POST",
                "data": {
                    csrf_piggy: function (){ return $("#token").val();},
                    tgl : function (){ return $("#tgl").val();}
                },
                "dataSrc":function (data){
                    $("#token").val(data["token"]);
                    console.log(data["detail"]);
        			return data["detail"];
        		},
            },
        	"aoColumnDefs": [{
        		"aTargets": [6],
        		"mRender": function (data, type, full, meta){
        		    var button='<a href="<?=base_url()?>admin/wallet/addfunddetail/'+full.id+'" class="btn btn-secondary btn-sm">Detail</a>&nbsp;<a href="<?=base_url()?>admin/wallet/deletetopup/'+full.id+'" class="btn btn-danger btn-sm">Delete</a>';
        			return button;
        		}
        	}],
            "columns": [
                { "data": "tgl" },
                { "data": "ucode" },
                { "data": "amount","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
                { "data": "referral","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
                { "data": "mif_fee","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
                { "data": "user"},
            ]    
    });    

$("#filter").on("click",function(){
    table.ajax.reload();
});
</script>
