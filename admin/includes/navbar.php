<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>MS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b> Dashboard</span>
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
        <li class="dropdown user user-menu" style="border-left: 1px solid lightgrey">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo (!empty($user['firstname']) ." ". !empty($user['lastname'])) ? $user['firstname']. " ". $user['lastname'] : "Admin"; ?></span>
          </a>
          <ul class="dropdown-menu" style="border: 1px solid #123">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo (!empty($user['firstname']) ." " . !empty($user['lastname'])) ? $user['firstname']. " ". $user['lastname'] : "No Name"; ?>
                <small>Registered on <?php if(!empty($user['created_on'])) echo date('M, Y', strtotime($user['created_on'])); else echo date('M, Y', strtotime('2021-03-03')); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile" style="border: 1px solid black">Update</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-danger btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>