
<?php 

include 'includes/conn.php'; 
include 'includes/header.php'; 
include 'includes/session.php'; 

?>

<?php 
  if(empty($_SESSION['user'])){
   header('location: index.php');
   } 
?>

<?php
// get user session id
$userid = "";
if(isset($_SESSION['user']))
    $userid = $_SESSION['user'];

// process form data

if(isset($_POST['save_enquiryy']))
  {
    session_start();
    require_once('includes/conn.php');

    // variable for form inputs
    $client_fname = ($_POST['firstname']);
    $client_lname = ($_POST['lastname']);
    $client_mobile = ($_POST['mobileno']);
    $client_location = ($_POST['location_id']);
    $enquiry_type = ($_POST['enquirytype_id']);
    $enquiry_detail = ($_POST['enq_reason']);
    $dept_id = ($_POST['department_id']);
    $sub_dept = ($_POST['subcategory_id']);

    // first save client detail
    $add_client = "INSERT INTO `clients` (`firstname`, `lastname`, `mobileno`, `location_id`, `created_on`) VALUES('$client_fname', '$client_lname', '$client_mobile', '$client_location', 'CURRENT_TIMESTAMP')";
    if($conn->query($add_client) == TRUE)
    {
      //get inserted record id
      $client_id = $conn->insert_id;
      // now save enquiry details
      $sql = "INSERT INTO `enquiries` (`et_id`, `dept_id`, `client_id`, `user_id`, `reason`, `created_on`) VALUES ('$enquiry_type', '$dept_id', '$client_id', '$userid', '$enquiry_detail', 'CURRENT_TIMESTAMP')";
      if($conn->query($sql)){
        $_SESSION['success'] = 'Client request added successfully';
      }
      else{
        $_SESSION['error'] = $conn->error;
      }
     // show success message
      $_SESSION['success'] = 'Service request added successfully';

    }else{
      $_SESSION['error'] = $conn->error;
    }


  }

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'nav.php'; ?>
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Service Request
      </h1>
        <ol class="breadcrumb">
            <li><a href="homepage.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <form class="form-horizontal" id="add_enquiry" action="add-service.php" method="POST">
            <div class="col-lg-12 " >
           
                <div class="col-lg-6 " >
                    <input type="hidden" class="id" name="clientid">
                    <h4 class="text-center text-warning" style="margin-bottom: 15px;">Client Info Details</h4>
                    
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Joe">
                        <!-- <span>enter firstname of client</span> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Smith">
                        <!-- <span>Enter lasstname of client</span> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mobile No.</label>
                        <div class="col-sm-7">
                        <input placeholder="0201234567" type="tel" class="form-control" pattern="[0][0-9]{9}" maxlength="10" id="mobile" name="mobileno"><span>(Optional, if any)</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-sm-3 control-label">Town / Location <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <select name="location_id" id="location" class="col-sm-9 form-control" required>
                            <?php 
                                $q =  "SELECT * FROM `locations` ORDER BY `loc_name` ASC";
                                $get = $conn->query($q);
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($town = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $town['lid'].'">' .$town['loc_name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div>              
                </div>

                <div class="col-lg-6">
                    <h4 class="text-center text-warning " style="margin-bottom: 15px;">Service Info Details</h4>

                    <div class="form-group">
                        <label for="enquiry_type" class="col-sm-3 control-label">Service Type <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                        <select name="enquirytype_id" id="enquiry_type" class="col-sm-9 form-control" required>
                            <?php 
                                $q =  "SELECT * FROM `enquiry_type` ORDER BY `name` ASC";
                                $get = ($conn->query($q));
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($data = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $data['etid'].'">' .$data['name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_lastname" class="col-sm-3 control-label">Service Request Details <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          <textarea name="enq_reason" id="enq_reason" class="form-control" cols="9" rows="2" required placeholder="Apply for business operating permit"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="department" class="col-sm-3 control-label">Department <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <select name="department_id" id="department" class="col-sm-9 department form-control" onChange="" required>
                            <?php 
                                $q =  "SELECT * FROM `departments` ORDER BY `dept_name` ASC";
                                $get = ($conn->query($q) );
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($data = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $data['did'].'">' .$data['dept_name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="subcategory" class="col-sm-3 control-label">Sub Unit</label>
                        <div class="col-sm-6">
                          <select name="subcategory_id" id="subcategory" class="col-sm-9 form-control">
                            <?php 
                                $q =  "SELECT * FROM `sub_category` ORDER BY `sub_dept_name` ASC";
                                $get = ($conn->query($q));
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($data = mysqli_fetch_array($get))
                                {
                                 echo '<option value="'. $data['scid'].'">' .$data['sub_dept_name'].'</option>';      
                                }
                              }else{ echo '<option value="N/A">N/A</option>';}
                            ?>
                          </select>
                        <span class="text-danger">(if any)</span>
                        </div>
                    </div>                  
                </div>

                <div class="form-group hidden">
                        <label for="test-dept" class="col-sm-3 control-label">Country <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <select name="country" id="country" class="col-sm-9 country form-control" required>
                              <option value="">Select here</option>
                              <option value="usa">United States</option>
                              <option value="india">India</option>
                              <option value="uk">United Kingdom</option>
                              <option value="ghana">Ghana</option>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group hidden">
                        <label for="state" class="col-sm-3 control-label">State <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <select name="state" id="state" class="col-sm-9 state form-control"  required> 
                                <option value="">Select State</option>
                            </select>
                        </div>
                    </div> 
              
                <!-- button group -->
                <div class="row action-buttons text-center" >
                    <button type="submit" name="save_enquiry" id="btnsave" class="btn btn-primary btn-md btn-flat submit" style="margin-right: 10px; margin-top: 5px; width: 100px; font-weight: bold">Submit</button>
                    <button type="button" class="btn btn-danger btn-md btn-flat cancel" style="width: 80px; font-weight: bold; margin-top: 5px;">Cancel</button>
                </div>
            <!-- </div> -->
            </form>

              
            
        </div>
    </div>

      
    </section>
      <!-- right col -->
    </div>
  	
    <?php include 'admin/includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
  $(document).ready(function(){
    // $("#department").change(function(){
    //     var selectedDept = $(".department option:selected").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "fetch_units.php",
    //         data: { department : selectedDept } 
    //     })
    //     .done(function(data){
    //         $("#subcategory").html(data);
    //     });
    // });

  });

</script>

<script>
  $(document).ready(function(){
    // validate input
    $('#add_enquiry').submit(function (){
      
      
    });
    
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "process-request.php",
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#state").html(data);
        });
    });

  });
</script>



<script type="text/javascript">
  function getUnit(val) {
    var department_id = val.options[val.selectedIndex].value;
    $.ajax({
      type: "POST",
      url: "fetch-subunits.php",
      data: 'dept_id='+val,
      beforeSend: function() {
        $("#subcategory").addClass("loader");
      },
      success: function(data){
        $("#subcategory").html(data);
      }
    });
  }

  function showCategory(sel) {
      var dept_id = sel.options[sel.selectedIndex].value;
      $("#subcategory").html("");
        if (dept_id.length > 0) {
            $.ajax({
              type: "POST",
              url: "fetch_subunits.php",
              data: "dept_id=" + dept_id,
              cache: false,
              beforeSend: function() {
                $('#subcategory').html('<img src="images/loader.gif" alt="" width="24" height="24">');
             },
             success: function(html) {
              $("#subcategory").html(html);
            }
            });
          }
    }
</script>

</body>
</html>
