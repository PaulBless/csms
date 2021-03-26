<?php include 'includes/conn.php'; ?>
<?php include 'includes/sess.php'; ?>
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
        Service Requests for <span class="text-danger"><?php echo date('Y') ?></span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Service Request</li>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <th>No</th>
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Mobile No</th>
                  <th>Location</th>
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
                        <td>".$row['lastname']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['mobileno']." </td>
                        <td>".$get['loc_name']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat hidden' data-id='".$row['cid']."'><i class='fa fa-eye'></i> View</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['cid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                      $cnt +=1;
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

  <?php include 'includes/client_modal.php'; ?>
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
    url: 'clients_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.cid);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_mobile').val(response.mobileno);
      $('#edit_location').val(response.loc_name);
      $('.fullname').html(response.firstname+' '+response.lastname);
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
