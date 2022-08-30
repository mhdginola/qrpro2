<?php  
  include 'config/config.php';  
  require 'function.php';
  require 'cek.php';

  $namaEvent=$_GET['nama_event'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="scanner/css/p.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->    
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mb-4 mt-1 text-center">
      <h1>DASHBOARD</h1>
    </div>  

    <!-- filter -->
    <div class="filter">
      
    </div>
    <!-- filter end -->

    <!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->
    <div class="container" id="dag">
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

<!-- <script>
var xValues = ["Hadir", "Tidak Hadir"];
var yValues = [15,72];
var barColors = [
  "#b91d47",
  "#00aba9",  
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Data kehadiran"
    }
  }
});
</script> -->
    


  </body>
</html>

<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dag").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php?nama_event=<?=$namaEvent?>", true);
  xhttp.send();
}

setInterval(function(){
    loadXMLDoc();
}, 1000);

window.onload = loadXMLDoc;

</script>