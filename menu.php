<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <?php 
      // require_once('includes/conn.php');
      // $sql = "SELECT * FROM `users` WHERE `uid`='".$_SESSION['user']."'";
      // $q = $conn->query($sql);
      // $user = $q ->fetch_assoc();
    ?>

      <div class="pull-left image">
        <!-- <img src="<?php  //echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image"> -->
        <img src="<?php  if(!empty($_SESSION['user_photo'])) echo 'images/'.$_SESSION['user_photo']; else echo 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <!-- <p><?php  //echo $user['firstname'].' '.$user['lastname']; ?></p> -->
        <p><?php  if(!empty($_SESSION['user_fullname']))  echo $_SESSION['user_fullname'];  else echo "Full name";?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class="" style="font-weight: bold;"><a href="homepage.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
        <li class="" style="font-weight: bold;"><a href="myenquiry.php"><i class="fa fa-th"></i> <span>MY SUBMITTED ENQUIRIES</span></a></li>
        
        <li class="header">SERVICE REQUEST </li>
        <li class="" style="font-weight: bold;"><a href="lodgeinquiry.php"><i class="fa fa-black-tie"></i> <span>LODGE ENQUIRY</span></a></li> 
        <li class="" style="font-weight: bold;"><a href="clients.php"><i class="fa fa-users"></i> <span>CLIENTS</span></a></li>

      <li class="header">ACCOUNT SETTINGS</li>
      <li class="" style="font-weight: bold;"><a href="#resetpass" data-toggle="modal"><i class="fa fa-lock"></i> <span>CHANGE PASSWORD</span></a></li>
      <li class="" style="font-weight: bold;"><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out"></i> <span>LOGOUT</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php  include 'resetpass_modal.php'; ?>
<?php include 'logout_modal.php'; ?>