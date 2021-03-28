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
        Department List
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Departments</li>
      </ol>
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
      <!-- departments -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" data-target="" class="btn btn-primary btn-md btn-flat"><i class="fa fa-plus"></i> Add Department</a>
              <a href="#view-sub" data-toggle="modal" data-target="" class="pull-right btn btn-success btn-md btn-flat "><i class="fa fa-eye"></i> View Sub Units</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered" width="">
                <thead class="bg-blue" style="color: black;">


                  <th class="hidden"></th>
                  <th>Department</th>
                  <th>Description</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT DISTINCT(`dept_name`), did as deptid, `description` FROM `departments`";
                    // $sql = "SELECT *, `departments`.`did` AS deptid FROM `departments` LEFT JOIN `sub_category` ON `sub_category`.`dept_id`=`departments`.`did` ORDER BY `departments`.`dept_name` ASC";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                        while($row = $query->fetch_assoc()){
                        echo "
                            <tr>
                            <td class='hidden'></td>
                            <td>".$row['dept_name']."</td>
                            <td>".$row['description']."</td>
                            </td>
                            <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['deptid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['deptid']."' title='delete this department'><i class='fa fa-trash'></i> Delete</button>
                            <button style='background: #123; color: #fff' class='btn btn-sm btn-flat' data-toggle='modal' data-target='#addsub' title='add new sub-unit to this department'><i class='fa fa-plus'></i> Add Sub Unit</button>
                            </td>
                            </tr>
                        ";
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



  <?php include 'includes/depts_modal.php'; ?>
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

  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view-sub').modal('show');
    var id = $(this).data('id');
    getUnit(id);
  }); 
  
  $(document).on('click', '.deletesub', function(e){
    //  //Save the link in a variable called element
    //   var element = $(this);

    //   //Find the id of the link that was clicked
    //   var del_id = element.attr("id");

    //   //Built a url to send
    //   var info = 'id=' + del_id;
    //   if(confirm("Sure you want to delete this sub unit? There is NO undo!"))
    //   {
    //       $.ajax({
    //         type: "GET",
    //         url: "deletesub.php",
    //         data: info,
    //         success: function(){
            
    //         }
    //       });
    //        $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    //       	.animate({ opacity: "hide" }, "slow");
    //   }

    //   return false;

    //   getUnit(id);
   });


});

// function to get departments list
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'dept_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.did);
      $('#edit_deptname').val(response.dept_name);
      $('#edit_desc').val(response.description);
      $('#edit_desc').html(response.description);
      $('.fullname').html(response.dept_name);
      $('#desc').html(response.description);
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
