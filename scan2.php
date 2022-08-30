<?php  
  include 'config/config.php';
  require 'function.php';
  require 'cek.php';

  $namaEvent=$_GET['nama_event'];
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login with Qrcode</title>
	<style>
		.sidebar{ width: 350px; margin:auto;}
		.camera{ width: 610px; margin:auto; }
	</style>
  <!-- bootstrap & jquery   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
	  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- scanner -->
    <script src="scanner/vendor/modernizr/modernizr.js"></script>
    <script src="scanner/vendor/vue/vue.min.js"></script>

  <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <div class="container mt-1 text-center">
      <h1>SESI 2</h1>
    </div>
	  <!-- scan -->
  <!-- <div id="app" class="row box"> -->
    <div class="d-flex justify-content-center sidebar col-12">
      <!-- <p id="dt"></p> -->
      <!-- form scan -->
      <form action="" method="POST" id="myForm"> 
        <div class="row">          
        <div class="col form-group mt-3">
          <label class="small mb-1" for="dtg">DATE</label>
          <input class="form-control py-2" name="dtg" id="dtg" type="text" readonly/>
        </div>                    
        <div class="col form-group mt-3">
          <label class="small mb-1" for="dtg">QR</label>
          <input class="form-control py-2" name="qrcode" id="code" type="password" readonly/>
        </div>          
        </div>
          <!-- <fieldset class="scheduler-border">
            <legend class="scheduler-border"> Date </legend>            
            <input type="text" name="dtg" id="dtg" value="" readonly>
          </fieldset>
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> QR </legend>            
            <input type="password" name="qrcode" id="code" readonly>
          </fieldset> -->
        </form>

      <?php
        if(!empty($_POST['qrcode'])){          
          $text=$_POST['qrcode'];
          $dtg=$_POST['dtg'];                    
          $sql22= "SELECT qr FROM abseng WHERE qr='$text' AND nama_event='$namaEvent'";
          $resSQL22=mysqli_query($con,$sql22);
          if(mysqli_num_rows($resSQL22)==1){
            $sql77= "SELECT status FROM abseng WHERE qr='$text'";
            $resSQL77=mysqli_query($con,$sql77);
            while ($row2 = $resSQL77->fetch_assoc()) {              
              if($row2['status']=='1'){
                $sql33= "SELECT status2,jam_masuk FROM abseng WHERE qr='$text'";
                $resSQL33=mysqli_query($con,$sql33);
                while ($row = $resSQL33->fetch_assoc()) {              
                  if($row['status2']=='1'){                
                    // echo "anda sudah masuk jam";
                    $rowg=$row['jam_masuk'];
                    
                    echo "<audio id='basd' autoplay>
                            <source src='sound/hah.mp3' type='audio/mpeg'>
                            Your browser does not support the audio element.
                          </audio>";
                    echo "<script>Swal.fire({
                      position: 'center',
                      icon: 'warning',
                      title: 'Anda sudah masuk sesi kedua, jam $rowg',
                      showConfirmButton: false,
                      timer: 2000
                    })
                    </script>";
                  }
                  else{
                    $sql= "UPDATE abseng set status2 = '1', jam_masuk2 = '$dtg' where qr = '$text'";
                    $resSQL=mysqli_query($con, $sql);                
                    // echo "Selamat Datang";            
                    echo "<audio id='basd' autoplay>
                      <source src='sound/wow.mp3' type='audio/mpeg'>
                    Your browser does not support the audio element.
                    </audio>";
                    echo "<script>Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Semoga harimu menyenangkan',
                      showConfirmButton: false,
                      timer: 2000                  
                    })
                    </script>";
                    }
                }
              }
              else{
                // echo "ID tidak ditemukan";
                echo "<audio id='basd' autoplay>
                      <source src='sound/no.mp3' type='audio/mpeg'>
                      Your browser does not support the audio element.
                    </audio>";
                echo "<script>Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Kamu belum absen pertama',
                  showConfirmButton: false,
                  timer: 2000                  
                })
                </script>";                
              }
            }
          }
          else{
            // echo "ID tidak ditemukan";
            echo "<audio id='basd' autoplay>
                  <source src='sound/no.mp3' type='audio/mpeg'>
                  Your browser does not support the audio element.
                </audio>";
            echo "<script>Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'ID tidak ditemukan',
              showConfirmButton: false,
               timer: 2000                  
            })
            </script>";                
          }          
        }
      ?>
      <!-- form scan end -->

    </div>

    <!-- preview camera -->
      <div class="d-flex justify-content-center preview-container camera">
        <video id="preview" class="thumbnail"></video>
      </div>
    <!-- preview camera end -->  
  <!-- </div> -->
   <!-- scanner -->
    <script src="scanner/js/app.js"></script>
    <script src="scanner/vendor/instascan/instascan.min.js"></script>
    <script src="scanner/js/scanner.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
    var clockElement = document.getElementById('dt');
    var clockElement2 = document.getElementById('dtg');

    function clock() {
      let today = new Date();

      let date = ("0" + today.getDate()).slice(-2);
      let month = ("0" + (today.getMonth() + 1)).slice(-2);
      let year = today.getFullYear();

      let hours = ("0"+today.getHours()).slice(-2);
      let minutes = ("0"+today.getMinutes()).slice(-2);
      let seconds = ("0"+today.getSeconds()).slice(-2);

      let current_date = year+"-"+month+"-"+date+" ";
      let current_time = hours + ":" + minutes + ":" + seconds;
      let dateg = current_date + current_time;
      clockElement2.innerText = dateg;
      // clockElement.setAttribute("value", "12");
      clockElement2.setAttribute("value", dateg);
    }

    setInterval(clock, 1000);
    </script>

</body>
</html>