                </div>
            </div>
        </div>
    </div>
    

<!--   Core JS Files   -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script>
$("#btnreferral").on("click",function(){
    var copyText = document.getElementById("txtreferral");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    document.execCommand("copy");
    var tooltip = document.getElementById("tipreferral");
    tooltip.innerHTML = "Copied";
})
</script>

<?php 
if (isset($extra)){
	$this->load->view($extra);
}
?>
</body>
</html>