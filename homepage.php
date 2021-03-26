
<?php include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/appsettings.php'; ?>
<?php include 'includes/header.php'; ?>



<?php 
  //check if userid exists
  $userid = "";
  if(isset($_SESSION['user']))
  $userid = $_SESSION['user'];

?>

<body class="hold-transition skin-blue sidebar-mini" onload="preload()">
<div id="preloader"></div>
<div class="wrapper">

  <?php include 'nav.php'; ?>
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo (!empty($app['name'])) ? $app['name'] : 'Client Management System for MMDA`s'; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
      ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- welcome message -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <div class="text">
                 <h3> Hello!</h3> 
                  <p>
                  Welcome back to CMS
                  </p>
              </div>
              <div class="icon">
              <i class="fa fa-bell"></i>
              </div>
            </div>
              <a href="homepage.php" class="small-box-footer">View Info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>

          <!-- .get user submitted enquiries -->
          <div class="col-lg-3 col-xs-6 ">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM `enquiries` WHERE `user_id`='$userid'";
                $query = $conn->query($sql);

                if(!empty($query)){
                  echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>
             
              <p>My Submissions</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="myenquiry.php" class="small-box-footer">View Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- get alltime enquiries -->
        <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `enquiries`";
                $query = $conn->query($sql);
                if(!empty($query)){
                  echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>
             
              <p>Total Service Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="#view_info" data-toggle="modal" class="small-box-footer">View Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->  
        
         <!-- get enquiries for current year -->
        <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $thisyear = date('Y');
                $sql = "SELECT * FROM `enquiries` WHERE YEAR(`created_on`)='$thisyear'";
                $query = $conn->query($sql);
                if(!empty($query)){
                  echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>
             
              <p> Service Request for <b><?php echo date('Y') ?></b> </p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="#view_info" data-toggle="modal" class="small-box-footer">View Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>

        <!-- View Info Modal -->
        <div class="modal fade" id="view_info">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header" style="color: #3c8dbc">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Access Denied</b></h4>
                  </div>
                  <div class="modal-body">
                    <div class="text-center">
                      
                      <form class="form-horizontal" method="POST" action="">
                          <div class="row">
                              <label for="title" class="text center control-label">Sorry! You are not allowed to view more details, please contact your system admin..</label>
                          </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-flat" > OK</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      <!-- view info end -->

      </section>
      <!-- right col -->
    </div>
  	<?php include 'admin/includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
