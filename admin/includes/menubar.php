<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php if(!empty($user['firstname'])) echo $user['firstname'].' '.$user['lastname']; else echo "Administrator"; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"> MAIN MENU</li>
      <li class="" style="font-weight: bold;"> <a href="home.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>

      <li class="header">SETTINGS</li>
      <li class="" style="font-weight: bold;"><a href="departments.php" ><i class="fa fa-tags"></i> <span>Departments</span></a></li>
      <li class="" style="font-weight: bold;"><a href="enquiry-types.php" ><i class="fa fa-cog"></i> <span>Service Types</span></a></li>
      <li class="" style="font-weight: bold"><a href="locations.php"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
      <li class="" style="font-weight: bold"><a href="userlist.php"><i class="fa fa-user"></i> <span>Users</span></a></li>
   
      <li class="header">MANAGE</li>
      <li class="" style="font-weight: bold;"><a href="clients.php"><i class="fa fa-users"></i> <span>Clients</span></a></li>
      <li class="" style="font-weight: bold;"><a href="enquiries.php"><i class="fa fa-folder-open"></i> <span>Service Request List</span></a></li>
      
      <li class="header">REPORTS</li>
      <li class="" style="font-weight: bold;"><a href="complaints.php"><span class="glyphicon glyphicon-bookmark"></span> <span>Complaints Types</span></a></li>
      <li class="" style="font-weight: bold;"><a href="statistics.php"><span class="fa fa-bar-chart"></span> <span>Enquiry Statistics </span></a></li>
      <li class="" style="font-weight: bold;"><a href="departmentsvisited.php"><span class="glyphicon glyphicon-tag"></span> <span>Most Visited Departments </span></a></li>
      <li class="" style="font-weight: bold;"><a href="reasonsforvisit.php"><span class="glyphicon glyphicon-folder-open"></span> <span>Reasons for Visits </span></a></li>
    </ul>
      
  </section>
  <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>