    </div>
    

<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>


<?php 
if (isset($extra)){
	$this->load->view($extra);
}
?>
</body>
</html>