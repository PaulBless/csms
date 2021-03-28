
<?php
include 'includes/conn.php'; 
include 'includes/session.php';
include 'includes/header.php';

//query to fetch locations
$sql = "SELECT * FROM `locations` ORDER BY `loc_name` ASC";
$rs =mysqli_query($conn, $sql);

//check if userid exists
$userid = "";
if(isset($_SESSION['user']))
  $userid = $_SESSION['user'];

?>



<body class="hold-transition skin-blue sidebar-mini" onload="preload()">
<div id="preloader"></div>
<div class="wrapper">

    <?php include 'nav.php'; ?>
    <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Submissions
      </h1>
      <ol class="breadcrumb">
        <li><a href="homepage.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Submitted Enquiry</li>
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
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New Client</a> -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover" width="100%">
                <thead class="bg-blue" style="color: black;">


                  <th>S/N</th>
                  <th>Type</th>
                  <th>Department</th>
                  <th>Client Name </th>
                  <th>Service ID</th>
                  <th>Service Details / Visit Reason</th>
                  <th>Date Created</th>
                </thead>
                <tbody>
                  <?php
                    $cnt = 1;
                    // $sql = "SELECT * FROM `enquiries` WHERE `user_id`='$userid'";
                    $sql = "SELECT `enquiries`.`eid` AS `eid`, `enquiry_type`.`name` AS `name`, `departments`.`dept_name` AS `dept_name`, CONCAT(`clients`.`firstname`,' ',`clients`.`lastname`) AS `fullname`, 
                    CONCAT(`users`.`firstname`, ' ',`users`.`lastname`) AS `username`, `enquiries`.`enquiryid` AS `service_id`, `enquiries`.`reason` AS `reason`, `enquiries`.`created_on` AS `date`  FROM `enquiries` INNER JOIN enquiry_type ON enquiries.et_id=enquiry_type.etid INNER JOIN departments ON enquiries.dept_id=departments.did INNER JOIN clients ON enquiries.client_id=clients.cid INNER JOIN users ON enquiries.user_id=users.uid WHERE enquiries.user_id=$userid";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$cnt."</td>
                          <td>".$row['name']."</td>
                          <td>".$row['dept_name']."</td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['service_id']."</td>
                          <td>".$row['reason']." </td>
                          <td>".$row['date']."</td>
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
    
  <?php include 'includes/user_modal.php'; ?>
  <?php include 'admin/includes/footer.php'; ?>
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

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
