<?php include 'includes/conn.php'; ?>
<?php include 'includes/sess.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini" onload="loading()">
<div class="wrapper">
<div id="preloader"></div>

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Location List
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Locations</li>
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
        if(isset($_SESSION['warning'])){
          echo "
            <div class='alert alert-warning alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['warning']."
            </div>
          ";
          unset($_SESSION['warning']);
        } 
        if(isset($_SESSION['update'])){
          echo "
            <div class='alert alert-info alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['update']."
            </div>
          ";
          unset($_SESSION['update']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border" style="margin-bottom: 15px;">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-md btn-flat"><i class="fa fa-plus"></i> Add New Location</a>
            </div>
            <div class="box-body" >
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th class="hidden">ID</th>
                  <th>Location Name</th>
                  <th>Date Added</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                  $counter = 1;
                    $sql = "SELECT * FROM `locations`";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                      while($row = $query->fetch_assoc()){  
                        //  $fetch =mysqli_query($conn, "SELECT `loc_name` FROM `locations` WHERE lid='".$row['location_id']."'");
                         $fetch =mysqli_query($conn, "SELECT * FROM `locations`");
                         $get = mysqli_fetch_assoc($fetch);
                        echo "
                        <tr>
                        <td class=''>".$counter."</td>
                        <td class='hidden'>".$row['lid']."</td>
                        <td>".$row['loc_name']." </td>
                        <td>". date ('d M, Y', strtotime($row['created_on'])) ."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['lid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['lid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                      $counter +=1;
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

  <?php include 'includes/location_modal.php'; ?>
  <?php include 'includes/footer.php'; ?>
</div> 
<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'location_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.lid);
      $('#edit_location').val(response.loc_name);
      $('#edit_location').html(response.loc_name);
      $('.fullname').html(response.loc_name);
    }
  });
}
</script>

<script>
function loading(){
  $('#preloader').show();
    setTimeout(function(){
      $('#preloader').fadeToggle('fast');
  }, 1500);
}
</script>
</body>
</html>
