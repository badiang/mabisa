
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../actions/logout.php'); }
    require_once '../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    $id = $_SESSION['id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../lib/top.php' ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
                        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    <!-- </div> -->
                    <div class="text-center mt-4">
                        <h1>WELCOME TO MABISA</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row mt-4">

                        <div class="col-xl-4 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card bg-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total of In Progress Barangay</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-right">
                                            <div class="h5 mb-0 font-weight-bold text-black-50">
                                                <?php 
                                                    $query1 = $dbconn->prepare("SELECT count(*) as count_progress FROM assessment as a inner join account as acc on a.id=acc.id where status='0' ");
                                                    $query1->execute();
                                                    $row1 = $query1->fetch(PDO::FETCH_ASSOC); 
                                                    echo $row1['count_progress'];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card shadow h-100 py-2" style="background-color: #1DD1A1;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total of Completed Barangay</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-right">
                                            <div class="h5 mb-0 font-weight-bold text-black-50">
                                                <?php 
                                                    $query2 = $dbconn->prepare("SELECT count(*) as count_completed FROM assessment as a inner join account as acc on a.id=acc.id where status='1' ");
                                                    $query2->execute();
                                                    $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                                                    echo $row2['count_completed'];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card bg-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Number Registered Barangay</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-right">
                                            <div class="h5 mb-0 font-weight-bold text-black-50">
                                                <?php 
                                                    $query3 = $dbconn->prepare("SELECT count(*) as count_account FROM account where id!='$id' ");
                                                    $query3->execute();
                                                    $row3 = $query3->fetch(PDO::FETCH_ASSOC); 
                                                    echo $row3['count_account'];
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Barangays With the Highest Performance</h6>
                                    <div class="dropdown no-arrow">
                                        <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="topBarangayChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                            <div class="text-center">
                                                <h5>Key Areas</h5>
                                            </div>
                                        <table class="table table-md table-bordered" style="width:100%">
                                            <tbody>
                                                <tr>
                                                   <td>01 Financial administration and Sustainability</td>
                                                    <td style="width: 20%;"></td> 
                                                </tr>
                                                <tr>
                                                   <td>02 Disaster Preparedness</td>
                                                    <td></td> 
                                                </tr>
                                                <tr>
                                                   <td>03 Safety, Peace and Order</td>
                                                    <td></td> 
                                                </tr>
                                                <tr>
                                                   <td>04 Social Protection and Sensitivity</td>
                                                    <td></td> 
                                                </tr>
                                                <tr>
                                                   <td>05 Business -Friendliness and Competitive</td>
                                                    <td></td> 
                                                </tr>
                                                <tr>
                                                   <td>06 Social Protection and Sensitivity</td>
                                                    <td></td> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../lib/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<?php include '../lib/bot.php' ?>

</body>

</html>
<?php 
    $points = array();
    $brgy = array();

    $query2 = $dbconn->prepare("SELECT a.keyctr, a.id, a.year, f.barangay_name, SUM(area_points) AS points 
                               FROM assessment AS a 
                               INNER JOIN barangay AS f ON a.barangay_code = f.barangay_code 
                               INNER JOIN area_assessment_points AS b ON a.id = b.user_id 
                               inner join account as acc on a.id=acc.id
                               GROUP BY f.barangay_name
                               HAVING points IS NOT NULL
                               ORDER BY points DESC
                               LIMIT 3");

    $query2->execute();

    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
        $points[] = $row2['points'];
        $brgy[] = $row2['barangay_name'];
    }
    $maxPoints = max($points);
    $maxPointsIndex = array_search($maxPoints, $points);
    $maxPointsRounded = ceil($maxPoints / 1000) * 1000;
 ?>
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

setInterval(updateChart, 30000);

function updateChart() {
    // AJAX request to fetch new data from the server
    $.ajax({
        url: 'actions/chart_data.php', // Replace with your actual PHP script URL
        dataType: 'json',
        success: function (data) {
            // Update the chart data and labels
            myBarChart.data.labels = data.labels;
            myBarChart.data.datasets[0].data = data.points;

            // Update the chart
            myBarChart.update();
        }
    });
}

// Bar Chart Example
var ctx = document.getElementById("topBarangayChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    // labels: ["January", "February", "March"],
    labels: [<?php 
            for ($i = 0; $i < count($points); $i++) {
                echo "'" . $brgy[$i] . "',";
            }
         ?>],
    datasets: [{
      label: "Revenue",
      backgroundColor: ["#4e73df","#FF6B6B","#2ECC71"],
      hoverBackgroundColor: ["#4e73df","#FF6B6B","#2ECC71"],
      borderColor: ["#4e73df","#FF6B6B","#2ECC71"],
      // data: [6251, 9821, 14984],
      data: [<?php 
            for ($i = 0; $i < count($points); $i++) {
            echo "'" . $points[$i] . "',";
        }
       ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        // maxBarThickness: 25,
        maxBarThickness: 100,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          // max: 20000,
          max: <?php echo $maxPointsRounded ?>,
          maxTicksLimit: 11,
          padding: 2,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

</script>