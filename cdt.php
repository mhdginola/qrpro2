<?php
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';
    $ambildatanya =mysqli_query($con, "select * from abseng");
    $jumlah_total = mysqli_num_rows($ambildatanya);
    $ambildatanya2 =mysqli_query($con, "select * from abseng WHERE status=1");
    $jumlah_hadir = mysqli_num_rows($ambildatanya2);
    $persentase=($jumlah_hadir/$jumlah_total)*100;
    $persentase2=number_format((float)$persentase, 1, '.', '');
    $jumlah_tidak_hadir=$jumlah_total-$jumlah_hadir;

echo json_encode(
    array(
        $jumlah_hadir,
        $jumlah_tidak_hadir
    )
    );

?>