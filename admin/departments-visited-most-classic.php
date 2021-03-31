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
       Reports : Departments Visited - <span class="text-danger">Classic View</span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Statistics</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     

    <!-- Statistics Start here -->
      <div class="row">
        <div class="col-xs-12">
          <h3> 
          <a href="departments-visited-most.php" class="btn btn-info btn-md btn-flat original-view"> <i class="fa fa-refresh"></i> Switch To Original View</a>
          <span class="pull-right" style="margin-bottom: 15px;">
              <a href="print.php" class="btn btn-warning btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </span>
          </h3>
        </div>
      </div>

      <?php
        $sql = "SELECT * FROM `enquiry_type` ORDER BY `etid` ASC";
        $query = $conn->query($sql);
        if(!empty($query)){
          while($row = $query->fetch_assoc()){
            echo "<div class='row'>";
            echo "
              <div class='col-sm-12'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>".$row['name']."</b></h4>
                  </div>
                  <div class='box-body'>
                    <div class='chart'>
                      <canvas id='".($row['name'])."' style='height:250px'></canvas>
                    </div>
                  </div>
                </div>
              </div>
            ";
            echo "</div>";  
          }
        }
      ?>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
function loading(){
  $('#preloader').show();
    setTimeout(function(){
      $('#preloader').fadeToggle('fast');
  }, 1500);
}
</script>

<?php
  $sql = "SELECT * FROM `enquiry_type` ORDER BY `etid` ASC";
  $query = $conn->query($sql);
  if(!empty($query)){
  while($row = $query->fetch_assoc()){
    $sql = "SELECT * FROM `departments`";
    $cquery = $conn->query($sql);
    $darray = array();
    $earray = array();
    while($crow = $cquery->fetch_assoc()){
      array_push($darray, $crow['dept_name']);
      $curr_year = date('Y');
      $sql = "SELECT * FROM `enquiries` WHERE dept_id = '".$crow['did']."' AND et_id='".$row['etid']."' AND Year(created_on)='".$curr_year."'";
      $equery = $conn->query($sql);
      array_push($earray, $equery->num_rows);
    }
    $darray = json_encode($darray);
    $earray = json_encode($earray);
    ?>
    <script>
    $(function(){
      var rowid = '<?php echo $row['etid']; ?>';
      var description = '<?php echo ($row['name']); ?>';
      var barChartCanvas = $('#'+description).get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = {
        labels  : <?php echo $darray; ?>,
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
