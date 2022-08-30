<?php  
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';

  $namaEvent=$_GET['nama_event'];
  echo $namaEvent;
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
    <div><a href="livedata.php?nama_event=<?=$namaEvent?>">livedata</a></div>
    <div><a href="scan1.php?nama_event=<?=$namaEvent?>">scan1</a></div>
    <div><a href="scan2.php?nama_event=<?=$namaEvent?>">scan2</a></div>
    <div><a href="scan3.php?nama_event=<?=$namaEvent?>">scan3</a></div>
    <div><a href="logout.php?nama_event=<?=$namaEvent?>">logout</a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>