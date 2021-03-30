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
        Reasons for the : <span class="text-danger">Visits</span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
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
            <button type="button" class="btn btn-warning btn-md print pull-right" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
            <div class="box-body" id="printdoc">
            <table id="example1" class="table table-bordered table-hover" width="100%">
                <thead class="bg-blue" style="color: black;">
                  <th>No</th>
                  <th>Service ID</th>
                  <th>Client Name</th>
                  <th>Type</th>
                  <th>Department</th>
                  <th>Visit Reason / Service Details</th>
                  <th>Date Created</th>
                </thead>
                <tbody>
                  <?php
                    $cnt = 1;
                    $sql = "SELECT `enquiries`.`eid` AS `eid`, `enquiry_type`.`name` AS `name`, `departments`.`dept_name` AS `dept_name`, CONCAT(`clients`.`firstname`,' ',`clients`.`lastname`) AS `fullname`, 
                    CONCAT(`users`.`firstname`, ' ',`users`.`lastname`) AS `username`, `enquiries`.`enquiryid` AS `service_id`, `enquiries`.`reason` AS `reason`, `enquiries`.`created_on` AS `date`  FROM `enquiries` INNER JOIN `enquiry_type` ON `enquiries`.`et_id`=`enquiry_type`.`etid` INNER JOIN `departments` ON `enquiries`.`dept_id`=`departments`.`did` INNER JOIN `clients` ON `enquiries`.`client_id`=`clients`.`cid` INNER JOIN `users` ON `enquiries`.`user_id`=`users`.`uid` ORDER BY `dept_name` ASC, `enquiries`.`created_on` DESC";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                        while($row = $query->fetch_assoc()){
                        echo "
                            <tr>
                            <td>".$cnt."</td>
                            <td>".$row['service_id']."</td>
                            <td>".$row['fullname']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['dept_name']."</td>
                            <td>".$row['reason']."</td>
                            <td>".date('d M, Y',strtotime ($row['date']))."</td>
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

 
    <div class="details" style="display:none;">
        <?php include('../includes/appsettings.php') ?>
        <div style="text-align: center; text-transform: uppercase; ">
          <h3><?php if(!empty($app['name'])) echo $app['name']; else echo 'Client Management System' ?></h3>
          <p><b>Reports of Visitation Reasons</b></p>
        </div>
     
    </div>
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


	})
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

<script>
  $('#print').click(function(){
    start_load();
    var ns = $('.details').clone()
    var content = $('#example1').clone()
    ns.append(content)

    var new_window = window.open('', '', 'height=700, width=900')
    new_window.document.write(ns.html())
    new_window.document.close()
    new_window.print()
    setTimeout(function(){
      new_window.close()
      end_load()
    }, 500)
  })
</script>

</body>
</html>
