<?php include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini" onload="preload()">
<div class="wrapper"> <div id="preloader"></div>

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
        <li><a href="homepage.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clients</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              // <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              // <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New Client</a> -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead class="bg-blue" style="color: black;">


                  <th>No</th>
                  <th>Full Name</th>
                  <th>Mobile No</th>
                  <th>Location</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                   $cnt = 1;
                    $sql = "SELECT * FROM `clients`";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                      while($row = $query->fetch_assoc()){  
                         $fetch =mysqli_query($conn, "SELECT `loc_name` FROM `locations` WHERE lid='".$row['location_id']."'");
                         $get = mysqli_fetch_assoc($fetch);
                        echo "
                        <tr>
                        <td>".$cnt."</td>
                        <td>".$row['firstname'].' '.$row['lastname']."</td>
                        <td>".$row['mobileno']." </td>
                        <td>".$get['loc_name']."</td>
                        <td>".$row['created_on']."</td>
                          <td>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['cid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                      
                      $cnt=$cnt+1;
                    } 
                  } 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>

<!-- </div> -->
<!-- delete modal  -->
<div class="modal fade" id="delete-client">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Access Denied</b></h4>
          	</div>
          	<div class="modal-body">
          		Sorry! Your account does not permit you to delete this client record..
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          	</div>
        </div>
    </div>
</div>
<!-- delte modal end  -->

  <?php include 'admin/includes/footer.php'; ?>
</div> 
<?php include 'includes/scripts.php'; ?>

<script>
$(function(){

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete-client').modal('show');
  });


});


</script>
</body>
</html>
