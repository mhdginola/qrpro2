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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="mb-4 mt-1 text-center">
      <h1>DASHBOARD</h1>
    </div>  

    <!-- filter -->
    <div class="filter">
      <span>Fetch result by &nbsp;</span>
      <select name="fetchval" id="fetchval">
        <option value="*" disabled="" selected="">select</option>
        <option value="2022-06-13">2022-06-13</option>
        <option value="2022-06-14">2022-06-14</option>
        <option value="2022-06-23">2022-06-23</option>
      </select>
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
  
  <script type="text/javascript">
    $(document).ready(function(){
      $("#fetchval").on('change',function(){
        var value = $(this).val();
        // alert(value);

        $.ajax({
          url: "server2.php",
          type:"POST",
          data:'request=' + value,
          beforeSend:function(){
            $(".container").html("<span>Working...</span>");
          },
          success:function(data){
            $(".container").html(data);
          }
        });
      });
    });
  </script>

  </body>
</html>