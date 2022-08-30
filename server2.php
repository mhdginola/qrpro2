<?php      
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';

    if(isset($_POST['request'])){
        $request=$_POST['request'];
        
        $queryy="SELECT * FROM abseng WHERE tanggal_event = '$request'";        
        $resultt=mysqli_query($con,$queryy);    
        $co=mysqli_num_rows($resultt);        
    
?>

<table class="table shadow">
    <?php
    if($co){
    ?>
    <thead>
        <tr>            
            <th scope="col">no</th>
            <th scope="col">nama</th>
            <th scope="col">qr</th>
            <th scope="col">tanggal</th>            
            <th scope="col">status</th>
            <th scope="col">status2</th>
            <th scope="col">status3</th>
            <th scope="col">jam masuk</th>
        </tr>
    </thead>
    <?php
    }else{
        echo "no data found";
    }
    ?>
    <tbody>
        <?php    

            $i=1;
            while($data = mysqli_fetch_assoc($resultt)){                                        
                $namabarang = $data['nama'];
                $qr = $data['qr'];
                $tanggal = $data['tanggal_event'];
                $status = $data['status'];
                $status2 = $data['status2'];
                $status3 = $data['status3'];
                $jam_masuk = $data['jam_masuk'];
        ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$namabarang?></td>
                <td><?=$qr?></td>
                <td><?=$tanggal?></td>
                <td><?=$status?></td>  
                <td><?=$status2?></td>  
                <td><?=$status3?></td>  
                <td><?=$jam_masuk?></td>
            </tr>        
        <?php
            };
        ?>
    </tbody>
</table>

<?php
    }
    else{
        echo "fail";
    }
?>