<?php
  	//session_start();
  	//get system settings
	//require_once('includes/appsettings.php');	
	
	// if(isset($_SESSION['admin'])){
    // 	header('location: admin/home.php');
  	// }

    // if(isset($_SESSION['user'])){
    //   header('location: homepage.php');
    // }

	//if user sesion invalid, return login screen
	// if(!isset($_SESSION['user'])){
    //   header('location: index.php');
    // }



?>
<?php include 'includes/appsettings.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box" >
  	<div class="login-logo" style="margin-bottom: 6px;">
		  <div class="row">
			  <div class="col-lg-12">
				<!-- <img src="images/uwada.jpg" height="75" width="75" alt="" style="border-radius: 20%;"><br> -->
				<img src="<?php echo (!empty($app['logo'])) ? '../images/'.$app['logo'] : './images/jecmas.png'; ?>" height="75" width="75" alt="" style="border-radius: 20%;"><br>
				 	<b class="text-uppercase text-success" style="font-size: 20px;"><?php echo (!empty($app['name'])) ? $app['name'] : 'jecmas technologies, ghana'; ?> </b>
			  		<p style="font-size: 18px; font-weight: bold">Client Management System - Login</p>
				</div>
		  </div>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Enter your login credentials to continue..</p>

    	<form action="processLogin.php" method="POST" role="" name="login-form" id="login-form">
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
			  <div class="row text-center" style="padding: 5px;">
					<a href="" class="forget">Forgot Password</a>
			  </div>
    	</form>
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