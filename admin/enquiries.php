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
        Enquiries / Service Requests List
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Enquiries</li>
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
        if(isset($_SESSION['update'])){
          echo "
            <div class='alert alert-info alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['update']."
            </div>
          ";
          unset($_SESSION['update']);
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
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" data-target="" class=" btn btn-primary btn-md btn-flat pull-right"><i class="fa fa-plus"></i> Add Service Request</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <th>No</th>
                  <th class="hidden">ID</th>
                  <th>Type</th>
                  <th>Department</th>
                  <th>Client Name</th>
                  <th>Entered By</th>
                  <th>Visit Reason/Details</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    // $sql = "SELECT * FROM `enquiries` ";
                    $cnt = 1;
                    $sql = "SELECT `enquiries`.`eid` AS `eid`, `enquiry_type`.`name` AS `name`, `departments`.`dept_name` AS `dept_name`, CONCAT(`clients`.`firstname`,' ',`clients`.`lastname`) AS `fullname`, 
                    CONCAT(`users`.`firstname`, ' ',`users`.`lastname`) AS `username`, `enquiries`.`reason` AS `reason`, `enquiries`.`created_on` AS `date`  FROM `enquiries` INNER JOIN enquiry_type ON enquiries.et_id=enquiry_type.etid INNER JOIN departments ON enquiries.dept_id=departments.did INNER JOIN clients ON enquiries.client_id=clients.cid INNER JOIN users ON enquiries.user_id=users.uid";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                        while($row = $query->fetch_assoc()){
                        echo "
                            <tr>
                            <td>".$cnt."</td>
                            <td class='hidden'>".$row['eid']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['dept_name']."</td>
                            <td>".$row['fullname']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['reason']."</td>
                            <td>".date('d M, Y',strtotime ($row['date']))."</td>
                            <td>
                                <button class='btn btn-success btn-sm edit btn-flat hidden' data-id='".$row['eid']."'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['eid']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                            </tr>
                        ";
                        $cnt += 1;
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

  <?php include 'includes/enquiry_modal.php'; ?>
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
    url: 'enquiries_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.etid);
      $('#edit_enqname').val(response.name);
      $('#edit_desc').val(response.comment);
      $('#edit_desc').html(response.comment);
      $('.fullname').html(response.name);
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
