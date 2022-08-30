<?php
    $host='localhost';
    $name='root';
    $dbname='absenqr';
    $dbpass='';

    $con=mysqli_connect($host,$name,$dbpass,$dbname);

    if(!$con){
        die("database tidak ditemukan".mysqli_connect_error());
    }

?>