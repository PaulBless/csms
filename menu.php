<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">

      <div class="pull-left image">
        <img class="img-circle" src="<?php  if(!empty($user['photo'])) echo 'images/'.$user['photo']; else echo 'images/profile.jpg'; ?>">
      </div>
      <div class="pull-left info">
        <p><?php  if(!empty($user['firstname']))  echo $user['firstname']. ' '.$user['lastname'];  else echo "Full name";?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class="" style="font-weight: bold;"><a href="homepage.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
        <li class="" style="font-weight: bold;"><a href="myenquiry.php"><i class="fa fa-th"></i> <span>MY SUBMISSIONS</span></a></li>
        
        <li class="header">ACTION </li>
        <li class="" style="font-weight: bold;"><a href="lodge_service_request.php"><i class="fa fa-black-tie"></i> <span>NEW SERVICE REQUEST </span></a></li> 
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