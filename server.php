<?php  
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';

  $namaEvent=$_GET['nama_event'];
  echo $namaEvent;
?>
    
<?php
    $ambildatanya =mysqli_query($con, "select * from abseng WHERE nama_event='$namaEvent'");
    $jumlah_total = mysqli_num_rows($ambildatanya);
    $ambildatanya2 =mysqli_query($con, "select * from abseng WHERE status=1 AND nama_event='$namaEvent'");
    $jumlah_hadir = mysqli_num_rows($ambildatanya2);
    $persentase=($jumlah_hadir/$jumlah_total)*100;
    $persentase2=number_format((float)$persentase, 1, '.', '');
    $jumlah_tidak_hadir=$jumlah_total-$jumlah_hadir;
?>

<div class="row">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow border-0 rounded">
            <div class="card-body">
                <h5 class="card-title">Jumlah hadir</h5>
                <p class="card-text"><?php echo $jumlah_hadir?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow border-0 rounded">
            <div class="card-body">
                <h5 class="card-title">Jumlah tidak hadir</h5>
                <p class="card-text"><?php echo $jumlah_tidak_hadir?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow border-0 rounded">
            <div class="card-body">
                <h5 class="card-title">Jumlah peserta</h5>
                <p class="card-text"><?php echo $jumlah_total?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow border-0 rounded">    
            <div class="card-body">
                <h5 class="card-title">Persentase</h5>
                <p class="card-text"><?php echo $persentase2?> %</p>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<table class="table shadow">
    <thead>
        <tr>            
            <th scope="col">no</th>
            <th scope="col">nama</th>
            <th scope="col">qr</th>
            <th scope="col">tanggal event</th>            
            <!-- <th scope="col">status</th>
            <th scope="col">status2</th>
            <th scope="col">status3</th> -->
            <th scope="col" class="text-center">jam masuk1</th>
            <th scope="col" class="text-center">jam masuk2</th>
            <th scope="col" class="text-center">jam masuk3</th>
        </tr>
    </thead>
    <tbody>
        <?php    
            $i=1;
            while($data = mysqli_fetch_array($ambildatanya)){                                        
                $namabarang = $data['nama'];
                $qr = $data['qr'];
                $tanggal = $data['nama_event'];
                $status = $data['status'];
                $status2 = $data['status2'];
                $status3 = $data['status3'];
                $jam_masuk = $data['jam_masuk'];
                $jam_masuk2 = $data['jam_masuk2'];
                $jam_masuk3 = $data['jam_masuk3'];
        ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$namabarang?></td>
                <td><?=$qr?></td>
                <td><?=$tanggal?></td>
                <!-- <td><?=$status?></td>  
                <td><?=$status2?></td>  
                <td><?=$status3?></td>   -->
                <td>
                    <div
                    <?php
                        if($jam_masuk!=0) echo " id='goc'";
                        else echo " id='cog'";
                    ?>
                    >
                    <?php
                        if($jam_masuk!=0) echo $jam_masuk;
                        else echo "belum absen";
                    ?>
                    </div>
                </td>
                <td>
                    <div
                    <?php
                        if($jam_masuk2!=0) echo " id='goc'";
                        else echo " id='cog'";
                    ?>
                    >
                    <?php
                        if($jam_masuk2!=0) echo $jam_masuk2;
                        else echo "belum absen";
                    ?>
                    </div>
                </td>
                <td>
                    <div
                    <?php
                        if($jam_masuk3!=0) echo " id='goc'";
                        else echo " id='cog'";
                    ?>
                    >
                    <?php
                        if($jam_masuk3!=0) echo $jam_masuk3;
                        else echo "belum absen";
                    ?>
                    </div>
                </td>
            </tr>        
        <?php
            };
        ?>
    </tbody>
</table>