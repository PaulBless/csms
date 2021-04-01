<?php
	session_start();
	session_destroy();

?>

<?php include('includes/header.php'); ?>


<script type="text/javascript">
	function pageRedirect() {
		window.location.replace("../index.php");
	}      

	setTimeout("pageRedirect()", 1500);
</script>

		<!--  styles-->
<style type="text/css">  
    body{
		background: #fff;
	    color: #24bae4;
	}
	.logout .loader{
	    position: fixed;
	    left: 0px;
	    top: 30%;
	    align-content: center;
	    align-items: center;
	    width: 100%;
	    z-index: 2;
	    background: url('../assets/images/ajax-loader-br.gif') 50% 50% no-repeat;
	    opacity: 0.8;
	}
	.hint{
		display: inline-block;
		margin-top: 110px;
	}
</style>
    
    <body>
        <div class="logout text-center"> 
        <div class="loader"><span class="hint">Updating Password..</span><span style="display: block">Restarting session, please wait...</span></div>
    	</div>
    </body>
</html>

