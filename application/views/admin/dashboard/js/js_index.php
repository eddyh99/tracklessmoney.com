<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
<script>
/*$('#lasttransaction').DataTable({
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
    "columns": [
        { "data": "ket" },
        { "data": "amount","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "cost","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "referral","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "mif_fee","className": "dt-body-right", "render":$.fn.dataTable.render.number( ',', '.', 2, '' ) },
        { "data": "tanggal" },
    ]    
});    
*/
$(function(){
    var transactionpoint = [];
    var transaction = new CanvasJS.Chart("transaction", {
    	animationEnabled: true,
    	title: {
    		text: "Daily Transactions"
    	},
    	data: [{
    		type: "pie",
    		startAngle: 240,
    		yValueFormatString: "##0.00\"%\"",
    		indexLabel: "{label} {y}",
    		dataPoints: transactionpoint,
    	}]
    });
    
    $.getJSON("<?=base_url()?>admin/dashboard/number_transaction_perday", function(data) {  
        $.each(data, function(key, value){
            transactionpoint.push({y: value[0], label: value[1]});
        });
        transaction.render();
    });
    
    var monthpoint=[];
    var monthchart = new CanvasJS.Chart("monthchart", {
    	animationEnabled: true,
    	title: {
    		text: "Daily Fees"
    	},
    	data: [{
    		type: "pie",
    		startAngle: 240,
    		yValueFormatString: "##0.00\"%\"",
    		indexLabel: "{label} {y}",
    		dataPoints: monthpoint,
    	}]
    });

    $.getJSON("<?=base_url()?>admin/dashboard/amount_fee_perday", function(data) {  
        $.each(data, function(key, value){
            monthpoint.push({y: value[0], label: value[1]});
        });
        monthchart.render();
    });

    
    var incomepoint =[];
    var netincome = new CanvasJS.Chart("netincome",{
      title:{
          text: "MIF Net Income"
      },
      data: [{
        type: "line",
        dataPoints: incomepoint,
      }]
    });
    
    $.getJSON("<?=base_url()?>admin/dashboard/mifnetincome", function(data) {  
        $.each(data, function(key, value){
            incomepoint.push({y: value[1], label: value[0]});
        });
        console.log(incomepoint);
        netincome.render();
    });


    var chartpoint =[];
    var last = new CanvasJS.Chart("lastchart",{
      title:{
    		text: "Last 12 Month Transactions"
	  },
	  axisY: {
		    title: "Total Transaction"
	  },
      data: [{
        type: "line",
        dataPoints: chartpoint,
      }]
    });
    
    $.getJSON("<?=base_url()?>admin/dashboard/lasttransaction", function(data) {  
        $.each(data, function(key, value){
            chartpoint.push({y: value[1], label: value[0]});
        });
        last.render();
    });


})


</script>
