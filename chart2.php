<?php
require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $sql="SELECT products.name,products.id,sales.product_id,sum(sales.qty) as sc FROM sales 
  inner join products on sales.product_id=products.id
  GROUP BY products.name";
$result=$db->query($sql);
  ?>
  <?php include_once('layouts/header.php'); ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['name', 'qty'],
          <?php 
          while($row=mysqli_fetch_array($result))
          {
            echo "['".$row["name"]."',".$row['sc']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Sales Items Pi chart',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html> 
<?php include_once('layouts/footer.php'); ?>