<?php  
  include 'config/config.php';  
  require 'function.php';
  require 'cek.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mb-4 mt-1 text-center">
      <h1>DASHBOARD</h1>
    </div>  
    
    <div class=container style="width: 400px; height: 400px;">
      <canvas id="myChart"></canvas>
    </div>
 
         
    <div class="container" id="dag">
    </div>
  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

<script>
  var au;
  var myChart;
  function ctg(au){              
    var grapharea = document.getElementById("myChart").getContext("2d");    
    myChart = null;
    
    // myChart.destroy();

    myChart = new Chart(
    grapharea,{
      type: 'doughnut',
      options:{
        animation:false
      },
      data: {
      labels: [
        'Hadir',
        'Tidak Hadir',        
      ],
      datasets: [{
        label: 'My First Dataset',
        data: au,
        backgroundColor: [
          'blue',
          'pink',
        ],
        
      }]
      }
      
    });
        
  } 

  // var dtg;
// function loadXMLDoc() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("dag").innerHTML =
//       this.responseText;            
//       // let af= JSON.parse(this.response);
//       // console.log(af[0]);
//     }
//   };
//   xhttp.open("GET", "server.php", true);
//   xhttp.send();
// }

function loadXMLDoc2() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dag").innerHTML =
      this.responseText;            
      let af= JSON.parse(this.response);
      console.log(af);
      ctg(af);
    }
  };
  xhttp.open("GET", "cdt.php", true);
  xhttp.send();
}

setInterval(function(){       
    myChart.destroy();
    loadXMLDoc2();
}, 3000);

// setInterval(function(){    
//     loadXMLDoc();
// }, 1000);

window.onload = loadXMLDoc2;

</script>