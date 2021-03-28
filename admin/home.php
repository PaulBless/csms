<?php  include 'includes/sess.php'; ?>
<?php include 'includes/conn.php'; ?>
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
      <?php echo (!empty($app['name'])) ? $app['name'] : 'Client Management System for MMDA`s'; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `clients`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else {echo "<h3>0</h3>";}
              ?>
          
              <p>No. of Clients</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="clients.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `users`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>
             
              <p>Total System Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="userlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $current_year = date('Y');
                $sql = "SELECT * FROM `enquiries` WHERE YEAR(created_on)='$current_year'";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>

              <p><b><?php echo date('Y')?></b> Total Service Requests </p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="current-enquiries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `enquiries`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>

              <p>All-Time Service Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="enquiries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-fuchsia">
            <div class="inner">
              <?php
                $sql = "SELECT distinct(`dept_name`) FROM `departments`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>

              <p>No. of Departments</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="departments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `locations`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else {echo "<h3>0</h3>";}
              ?>
          
              <p>Total Locations</p>
            </div>
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <a href="locations.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `enquiry_type`";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>
             
              <p>Service Types</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="enquiry-types.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 hidden">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <?php
                $current_year = date('Y');
                $sql = "SELECT * FROM `enquiries` WHERE YEAR(created_on)='$current_year'";
                $query = $conn->query($sql);
                if(!empty($query)){
                echo "<h3>".$query->num_rows."</h3>";
                }else{ echo "<h3>0</h3>";}
              ?>

              <p>Enquiries for <?php echo date('Y') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="current-enquiries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


    <!-- Statistics Start here -->
      <div class="row hidden">
        <div class="col-xs-12">
          <h3>Enquiry Statistics 
            <span class="pull-right">
              <a href="print.php" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </span>
          </h3>
        </div>
      </div>

      <?php
        $sql = "SELECT * FROM positions ORDER BY priority ASC";
        $query = $conn->query($sql);
        $inc = 2;
        if(!empty($query)){
          while($row = $query->fetch_assoc()){
            $inc = ($inc == 2) ? 1 : $inc+1; 
            if($inc == 1) echo "<div class='row'>";
            echo "
              <div class='col-sm-6'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>".$row['description']."</b></h4>
                  </div>
                  <div class='box-body'>
                    <div class='chart'>
                      <canvas id='".slugify($row['description'])."' style='height:200px'></canvas>
                    </div>
                  </div>
                </div>
              </div>
            ";
            if($inc == 2) echo "</div>";  
          }
        }
        if($inc == 1) echo "<div class='col-sm-6'></div></div>";
      ?>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Get statistics data -->
<?php include 'includes/scripts.php'; ?>
<?php
  $sql = "SELECT * FROM positions ORDER BY priority ASC";
  $query = $conn->query($sql);
  if(!empty($query)){
  while($row = $query->fetch_assoc()){
    $sql = "SELECT * FROM candidates WHERE position_id = '".$row['id']."'";
    $cquery = $conn->query($sql);
    $carray = array();
    $varray = array();
    while($crow = $cquery->fetch_assoc()){
      array_push($carray, $crow['lastname']);
      $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
      $vquery = $conn->query($sql);
      array_push($varray, $vquery->num_rows);
    }
    $carray = json_encode($carray);
    $varray = json_encode($varray);
    ?>
    <script>
    $(function(){
      var rowid = '<?php echo $row['id']; ?>';
      var description = '<?php echo slugify($row['description']); ?>';
      var barChartCanvas = $('#'+description).get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = {
        labels  : <?php echo $carray; ?>,
        datasets: [
          {
            label               : 'Votes',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : <?php echo $varray; ?>
          }
        ]
      }
      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
      }

      barChartOptions.datasetFill = false
      var myChart = barChart.HorizontalBar(barChartData, barChartOptions)
      //document.getElementById('legend_'+rowid).innerHTML = myChart.generateLegend();
    });
    </script>
    <?php
  }}
?>

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
