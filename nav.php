<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>MS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>User </b>Dashboard </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php  echo (!empty($_SESSION['user_photo'])) ? 'images/'.$_SESSION['user_photo'] : 'images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php if(!empty($_SESSION['user_fullname'])) echo $_SESSION['user_fullname']; else echo "Full name"; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($_SESSION['user_photo'])) ? 'images/'.$_SESSION['user_photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php //echo $user['firstname'].' '.$user['lastname']; ?>
                <?php if(!empty($_SESSION['user_fullname'])) echo $_SESSION['user_fullname']; else echo "Full name"; ?>
                <small>Registered on <?php if(!empty($_SESSION['user_regdate'])) echo date('M, Y', strtotime($_SESSION['user_regdate']));  else echo date('M, Y', strtotime('2021-03-03'));?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-primary btn-flat" id="user_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="#logout" data-toggle="modal" class="btn btn-danger btn-flat">Log out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php 
include 'includes/userprofile_modal.php'; 
include 'logout_modal.php'; 
?>