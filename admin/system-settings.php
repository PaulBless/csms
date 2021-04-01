<?php  include 'includes/sess.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini" onload="loading()">
  <div id="preloader"></div>

<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        System Configuration
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['success']."
              </div>
              ";
              unset($_SESSION['success']);
        }   
        if(isset($_SESSION['info'])){
          echo "
            <div class='alert alert-info alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['info']."
              </div>
              ";
              unset($_SESSION['info']);
        }
        ?>

 
    <!-- settings here -->
    
    <div class="row ">
        <div class="col-xs-12">

          <div class='col-sm-6'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>Settings</b></h4>
                  </div>
                  
                  <div class='box-body' style="height: 350px">
                    
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="save-settings.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" >
          		    <?php require_once('../includes/appsettings.php') ?>
                        <input type="text" name="id" id="id" class="form-control hidden" value="<?php if(!empty($app['id'])) echo $app['id']; ?>">
                        <input type="text" name="curr-logo" id="curr-logo" class="form-control hidden" value="<?php if(!empty($app['logo'])) echo $app['logo']; ?>">

                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name of District:</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control" id="dist_name" name="dist_name" placeholder="enter district name" value="<?php if(!empty($app['name'])) echo $app['name']; ?>" required>
                                </div>
                            </div>  
                            
                            <div class="form-group">
                                <label for="location" class="col-sm-3 control-label">Location:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="dist_location" name="dist_location" placeholder="enter district location or town" value="<?php if(!empty($app['location'])) echo $app['location']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">Select Logo:</label>
                                <div class="col-sm-7"> 
                                <input type="file" class="logo form-control" id="logo" name="logo" accept=".jpg, .png, .jpeg, .bmp, |image/*" onchange="displayImg(this,$(this))" value="<?php if(!empty($app['logo'])) echo $app['logo']; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <div class="col-sm-10"> 
                                    <img src="<?php echo (!empty($app['logo'])) ? '../images/'.$app['logo'] : '../images/jecmas.png'; ?>" class="" id="output" alt="" height="90" width="90" style="border-radius: 50px; border: 1px solid #123;">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="form-group text-center" style="margin-top: 25px;">
                                <div class="col-sm-12"> 
                                  <button type="submit" class="btn btn-primary btn-md btn-flat save-settings" style="margin-right: 5px;" name="save-update">Save Settings</button>
                                  <button type="button" onclick="location.href='home.php'" class="btn btn-danger btn-md btn-flat save-settings" >Cancel</button>
                                </div>
                            </div>

                </form>
                    
                  </div>
                </div>
              </div>
        </div>
      </div>

    
      </section>
      <!-- right col -->
    </div>
  	
      <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Get statistics data -->
<?php include 'includes/scripts.php'; ?>

<script>
function loading(){
  $('#preloader').show();
    setTimeout(function(){
      $('#preloader').fadeToggle('fast');
  }, 1500);
}

function displayImg(input,_this) {
	if (input.files && input.files[0]) {
	  var reader = new FileReader();
	  reader.onload = function (e) {
	  $('#output').attr('src', e.target.result);
	  }

	reader.readAsDataURL(input.files[0]);
  }
}

</script>

<script>
// change selected images 
var loadFile = function(event){
  var image = document.getElementById('#output');
  image.src= URL.createObjectURL(event.target.files[0]);
};

</script>
</body>
</html>
