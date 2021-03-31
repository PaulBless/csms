<?php include 'includes/conn.php'; ?>
<?php include 'includes/sess.php'; ?>
<?php include '../includes/appsettings.php'; ?>
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
        System Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
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
            <div class="box-header with-border">
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-md btn-flat"><i class="fa fa-plus"></i> Add New User</a> -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered hidden">
                <thead class="bg-blue" style="color: black;">
                  <th>Name of District</th>
                  <th>Location</th>
                  <th>Logo</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `settings`";
                    $query = $conn->query($sql);
                    if(!empty($query)){
                        while($row = $query->fetch_assoc()){
                        $image = (!empty($row['logo'])) ? '../images/'.$row['logo'] : '../images/jecmas.png';
                        echo "
                            <tr>
                            <td>".($row['location'])."</td>
                            <td>".($row['name']) ."</td>
                            <td>
                                <img src='".$image."' width='30px' height='30px' style='border-radius; 20%'>
                                <a href='#edit_logo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-pencil'></span></a>
                            </td>
                            <td>
                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger btn-sm delete btn-flat hidden' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                            </tr>
                        ";
                        }
                    } 
                    echo "<a href='#settings' data-toggle='modal' class='btn btn-primary btn-md btn-flat' style=''>Config Settings </a> <hr>";
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

     

    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/settings_modal.php'; ?>
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



function displayImg(input,_this) {
	if (input.files && input.files[0]) {
	  var reader = new FileReader();
	  reader.onload = function (e) {
	  $('#cimg').attr('src', e.target.result);
	  }

	reader.readAsDataURL(input.files[0]);
  }
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.uid);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('#edit_username').val(response.username);
      $('#edit_usertype').val(response.user_type);
      $('#edit_mobile').val(response.mobileno);
      $('#edit_status').val(response.status);
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

var loadFile = function(event){
  var image = document.getElementById('#');
  image.src= URL.createObjectURL(event.target.files[0]);
};

</script>
</body>
</html>
