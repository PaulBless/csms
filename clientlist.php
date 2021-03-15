<?php // include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'nav.php'; ?>
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Clients List
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Client List</li>
        </ol>

        <hr style="border: 1px solid #007bff">
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" data-target="" class="btn btn-primary btn-md btn-flat"> <i class="fa fa-plus"></i> Add New Client</a>
                    </div>  
                    <div class="box-body">
                    <table id="example1" class="table table-bordered">
                <thead>
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Mobile No</th>
                  <th>Location</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    <td>Firstname</td>
                    <td>Lastname</td>
                    <td>Mobile</td>
                    <td>location</td>
                    <td>
                    <button type="button" class="btn btn-success btn-sm btn-flat" data-id=""  > <i class="fa fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm btn-flat" data-id="" > <i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tbody>
              </table>
                    </div>
                </div>
            </div>
        </div>
      
    </section>
      <!-- right col -->
    </div>
  	
    <?php include 'admin/includes/footer.php'; ?>
    <?php include 'includes/client_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
