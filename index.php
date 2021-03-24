<?php
  
  session_start();

  // check if user loggedin session exist
    if(isset($_SESSION['user'])){
		require_once('includes/conn.php');
		$sql = "SELECT * FROM `users` WHERE `uid` = '".$_SESSION['user']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
		$role = $user['user_type'];
		if($role == 'Admin'){
			header('location: admin/home.php');
		}else{
			header('location: homepage.php');
		}
    }
	

?>

<?php include 'includes/appsettings.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box" >
  	<div class="login-logo" style="margin-bottom: 6px;">
		  <div class="row">
			  <div class="col-lg-12">
				<!-- <img src="images/uwada.jpg" height="75" width="75" alt="" style="border-radius: 20%;"><br> -->
				<img src="<?php echo (!empty($app['logo'])) ? '../images/'.$app['logo'] : './images/jecmas.png'; ?>" height="65" width="65" alt="" style="border-radius: 50%; "><br>
				 	<b class="text-uppercase text-success" style="font-size: 20px;"><?php echo (!empty($app['name'])) ? $app['name'] : 'jecmas technologies, ghana'; ?> </b>
			  		<p style="font-size: 18px; font-weight: bold">Client Management System - Login</p>
				</div>
		  </div>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Enter your login credentials to continue..</p>

    	<form action="login.php" method="POST" role="" name="login-form" id="login-form">
      		<div class="form-group has-feedback">
				  <input type="text" class="form-control" name="userid" placeholder="Username" required>
				  <span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
			  <input type="password" class="form-control" name="password" placeholder="Password" required>
			  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row ">
    			<div class="col-xs-12">
          			<button type="submit" class="btn btn-success btn-block btn-flat text-uppercase" style="font-weight: 700;" name="login"><i class="fa fa-sign-in" style="margin-right: 5px;"></i>  Log In</button>
        		</div>
      		</div>
			  <div class="row text-center" style="padding-top: 8px; ">
					<a href="" data-toggle="modal" data-target="#forgetpwd" class="forget">Forgot Password</a>
			  </div>
    	</form>
  	</div>

	  <!-- forget password modal  -->
	  <div class="modal fade" id="forgetpwd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Reset Your Password</b></h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
                
                <form class="form-horizontal" method="POST" action="resetpassword.php">
                    <div class="row">

                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-danger btn-flat" name="reset"><i class="fa fa-check"></i> Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>


  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>