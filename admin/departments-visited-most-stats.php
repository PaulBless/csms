<?php include 'includes/conn.php'; ?>
<?php include 'includes/sess.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statistics 
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Statistics</li>
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

     
     

    <!-- Statistics Start here -->
      <div class="row">
        <div class="col-xs-12">
          <h3 style="margin-bottom: 20px;"> 
          <a href="departments-visited-most.php" class="btn btn-info btn-md btn-flat switch-classic"> <i class="fa fa-refresh"></i> Switch To Classic View</a>
          <span class="pull-right" style="margin-bottom: 15px;"><a href="print.php" class="btn btn-warning btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </span>
          </h3>
        </div>
      </div>

      <?php
        $sql = "SELECT * FROM `departments` ORDER BY `did` ASC";
        $query_dept = $conn->query($sql);
        if(!empty($query_dept)){
          while($row_dept = $query_dept->fetch_assoc()){
            // echo "<div class='row'>";
            echo "
              <div class='col-sm-6'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>".$row_dept['dept_name']."</b></h4>
                  </div>
                  <div class='box-body'>
                    <div class='chart'>
                      <canvas id='".($row_dept['dept_name'])."' style='height:200px'></canvas>
                    </div>
                  </div>
                </div>
              </div> 
            ";
          //  echo "</div>";  
          }
        }
        // if($inc == 1) echo "<div class='col-sm-6'></div></div>";
      ?>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<?php
  $sql = "SELECT * FROM `departments` ORDER BY `did` ASC";
  $query = $conn->query($sql);
  if(!empty($query)){
  while($row = $query->fetch_assoc()){
    $sql = "SELECT * FROM `enquiry_type`";
    $cquery = $conn->query($sql);
    $type_array = array();
    $earray = array();
    while($crow = $cquery->fetch_assoc()){
      array_push($type_array, $crow['name']);
      $sql = "SELECT * FROM `enquiries` WHERE `et_id`='".$crow['etid']."' AND `dept_id`='".$row_dept['did']."'";
      $equery = $conn->query($sql);
      array_push($earray, $equery->num_rows);
    }
    $type_array = json_encode($type_array);
    $earray = json_encode($earray);
    ?>
    <script>
    $(function(){
      var rowid = '<?php echo $row['did']; ?>';
      var description = '<?php echo ($row['dept_name']); ?>';
      var barChartCanvas = $('#'+description).get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = {
        labels  : <?php echo $type_array; ?>,
        datasets: [
          {
            label               : 'Enquiries',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : <?php echo $earray; ?>
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
</body>
</html>
