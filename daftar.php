<?php 
     @session_start();   
     include 'database/db.php';

    // Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        // data disimpan
        $username = "";
        // data akan disimpan baru
        $tampil = mysqli_query($conn, "SELECT*FROM tbl_user WHERE email='$_POST[email]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $username = $data['username'];
            
        }
        if ($username == "") {
            $simpan= mysqli_query($conn, "INSERT INTO tbl_user (username,email, nomor,  alamat, password)
        VALUES ('$_POST[username]','$_POST[email]' ,'$_POST[nomor]' , '$_POST[alamat]' ,'$_POST[password]')
            ");
                if($simpan){
                    echo "<script>
                        alert('Daftar berhasil');
                        document.location='login.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Daftar gagal');
                        document.location='daftar.php';
                    </script>"; 
                }
        } else {
                    echo "<script>
                        alert('Daftar gagal Email sudah di pakai');
                        document.location='daftar.php';
                    </script>"; 
        }
        
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BilalBelekeArt | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>BilalBeleke</b>ART</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Buat akun</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Nama anda" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nomor" placeholder="Nomor handphone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-book"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="btn" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.php" class="">Sudah mempunyai akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
