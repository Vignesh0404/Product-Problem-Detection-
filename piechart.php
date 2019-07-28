<?php
$dbhandle = new mysqli('localhost','root','','srm');
echo $dbhandle->connect_error;

$query ="SELECT problems, sum(frequency) FROM input group by problems";
$res = $dbhandle->query($query);

?>





<html>
  <head>
     <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['problems', 'frequency'],

          <?php
            while($row=$res->fetch_assoc())
            {
              echo "['".$row['problems']."',".$row['sum(frequency)']."],";
            }

          ?>



        ]);

        var options = {
          title: 'PRODUCT PROBLEM DETECTION'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

     <button type="button" class="btn1" onclick="window.location.href='pareto.html'">Generate Pareto Graph</button>
     <button type="button" class="btn1" onclick="window.location.href='page4.php'">Calculate Weightage</button>
  </body>
</html>
