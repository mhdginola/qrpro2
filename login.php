<?php
    require 'function.php';
    include 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->
    </head>
    <body style="background-color:#134A86;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group mt-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-2" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-2" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                    
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>       
<?php
    //cek login
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $cekdatabase = mysqli_query($con, "SELECT * FROM admg where email='$email' and password='$password'");

        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung>0){
            // echo "masuk";   
            $_SESSION['log']= 'true';            
            echo "<script>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Selamat Datang',
                showConfirmButton: false,
                timer: 2000                  
              })
              setTimeout(function dr1(){window.location.href='index.php';},2000);              
              </script>";                        
        }
        else{
            // echo "gagal";   
            echo "<script>Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'email dan password salah',
                showConfirmButton: false,
                timer: 2000                  
              })
              setTimeout(function dr2(){},2000);
              </script>";           
            // header("location:login.php");
        }
    }
    if(!isset($_SESSION['log'])){

    }
    else{
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Selamat Datang',
            showConfirmButton: false,
            timer: 2000                  
          })
          setTimeout(function dr1(){window.location.href='index.php';},2000);              
          </script>";   
    }
?>                                                                                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>                
    </body>
</html>
