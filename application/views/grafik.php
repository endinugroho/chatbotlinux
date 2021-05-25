

  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Grafik

        <small>Grafik Sistem Chatbot</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Menu</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



    <div class="container" style="margin-top: 30px">

        <?php echo $this->session->flashdata('notif') ?>

		<div class="col-sm-11" style="background-color:white;">


    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
//select message,count(message) total from transaksi group by message

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Message', 'Total'],
  <?php
foreach($trafikkeyword as $hasil){
    ?>
  ['<?php echo $hasil->pertanyaan; ?>', <?php echo $hasil->jumlah; ?>],
<?php  } ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Trafik Transaksi berdasarkan kode', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart.draw(data, options);
}
</script>
<br>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data2 = google.visualization.arrayToDataTable([
  ['Message', 'Total'],
  <?php
foreach($trafikuser as $hasil2){
    ?>
  ['<?php echo $hasil2->nama; ?>', <?php echo $hasil2->total; ?>],
<?php  } ?>
]);
// let a = [['Nama Customer', 'Total Transaksi']]
//   $.ajax({
//             type: "GET",
//             url: "http://localhost/chatbot/index.php/Grafik/getajak",
//             async: false,
//             dataType: "json",
//             success: function(text) {
//               text.forEach(function(data){
//                 a.push([data['nama']+','+data['total']])
//               })
//             }
//         });

  // Optional; add a title and set the width and height of the chart
  var options2 = {'title':'Trafik Transaksi berdasarkan User', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart2.draw(data2, options2);
}



</script>
<script type="text/javascript">

google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Tanggal", "Jumlah", { role: "style" } ],
        <?php
foreach($trafiktanggal as $hasil3){
    ?>


        ["1", <?php echo $hasil3->tanggal1; ?>, "#b87333"],
        ["2", <?php echo $hasil3->tanggal2; ?>, "silver"],
        ["3", <?php echo $hasil3->tanggal3; ?>, "gold"],
        ["4", <?php echo $hasil3->tanggal4; ?>, "color: #e5e4e2"],
        ["5", <?php echo $hasil3->tanggal5; ?>, "#b87333"],
        ["6", <?php echo $hasil3->tanggal6; ?>, "silver"],
        ["7", <?php echo $hasil3->tanggal7; ?>, "gold"],
        ["8", <?php echo $hasil3->tanggal8; ?>, "color: #e5e4e2"],
        ["9", <?php echo $hasil3->tanggal9; ?>, "#b87333"],
        ["10", <?php echo $hasil3->tanggal10; ?>, "#b87333"],
        ["11", <?php echo $hasil3->tanggal11; ?>, "#b87333"],
        ["12", <?php echo $hasil3->tanggal12; ?>, "silver"],
        ["13", <?php echo $hasil3->tanggal13; ?>, "gold"],
        ["14", <?php echo $hasil3->tanggal14; ?>, "color: #e5e4e2"],
        ["15", <?php echo $hasil3->tanggal15; ?>, "#b87333"],
        ["16", <?php echo $hasil3->tanggal16; ?>, "#b87333"],
        ["17", <?php echo $hasil3->tanggal17; ?>, "silver"],
        ["18", <?php echo $hasil3->tanggal18; ?>, "gold"],
        ["19", <?php echo $hasil3->tanggal19; ?>, "color: #e5e4e2"],
        ["20", <?php echo $hasil3->tanggal20; ?>, "#b87333"],
        ["21", <?php echo $hasil3->tanggal21; ?>, "#b87333"],
        ["22", <?php echo $hasil3->tanggal22; ?>, "silver"],
        ["23", <?php echo $hasil3->tanggal23; ?>, "gold"],
        ["24", <?php echo $hasil3->tanggal24; ?>, "color: #e5e4e2"],
        ["25", <?php echo $hasil3->tanggal25; ?>, "#b87333"],
        ["26", <?php echo $hasil3->tanggal26; ?>, "#b87333"],
        ["27", <?php echo $hasil3->tanggal27; ?>, "silver"],
        ["28", <?php echo $hasil3->tanggal28; ?>, "gold"],
        ["29", <?php echo $hasil3->tanggal29; ?>, "color: #e5e4e2"],
        ["30", <?php echo $hasil3->tanggal30; ?>, "#b87333"]
        <?php  } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Table trafik per bulan",
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
</script>

<div id="piechart1" ></div>
<div id="piechart2" ></div>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        </div>
        
        
        </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->


