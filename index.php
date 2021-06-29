<?php 

	// // cek apakah yang mengakses halaman ini sudah login
	// if($_SESSION['level']=="1"){
	// 	header("location:leader/index.php");
	// }else if($_SESSION['level']=="1"){
  //   header("location:leader/index.php");
  // }else {
  //   header("location:staff/index.php");
  // }

  include 'koneksi.php';
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Monitoring Apps - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <center class="mt-4 mb-0">
                <img src="img/background_login.png" alt="Backgorund" style="width:auto; height:230px;">
              </center>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <!-- cek pesan notifikasi -->
                  <?php 
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                      echo '
                      <div class="alert alert-danger" role="alert">
                        Username atau Password salah!
                      </div>
                      ';
                    }else if($_GET['pesan'] == "logout"){
                      echo '
                      <div class="alert alert-success" role="alert">
                        Berhasil keluar!
                      </div>
                      ';
                    }else if($_GET['pesan'] == "belum_login"){
                      echo '
                      <div class="alert alert-warning" role="alert">
                        Kamu belum Login!
                      </div>
                      ';
                    }
                  }
                  ?>
                  <form method="POST" action="cek_login.php" class="user">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <hr>
                    <!-- <input type="submit" value="LOGIN" class="btn btn-primary btn-user btn-block"> -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="#" value="Register" class="btn btn-secondary btn-user btn-block disabled">
                      </div>
                      <div class="col-sm-6">
                        <input type="submit" value="Login Now" class="btn btn-primary btn-user btn-block">
                      </div>
                    </div>
                    <!-- <a href="#" class="btn btn-primary btn-user btn-block">
                      Login Now
                    </a> -->
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="#">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="#">Create an Account!</a>
                  </div> -->
                  <div class="text-center">
                  <span>
                      Copyright &copy; Fulfilment Monitoring 
                      <?php $d=date('Y'); echo $d; ?>             
                  </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
