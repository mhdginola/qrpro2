<?php  
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div>
      <h1>Pilih event</h1>
      <ul>
      <?php
        $fill=mysqli_query($con,"select nama_event from abseng group by nama_event");
        while($data = mysqli_fetch_array($fill)){
          $namaEvent = $data['nama_event'];
      ?>
        <li><a href="pilih.php?nama_event=<?=$namaEvent?>"><?=$namaEvent?></a></li>
      <?php
        }
      ?>
      </ul>
    </div>
    <hr>
    <a href="logout.php">logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>