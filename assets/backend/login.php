<?php
 @session_start();   
     include '../../database/db.php';
     
     
     if(@$_SESSION['Admin']){
        header("location: ../../admin.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BilalBelekeArt | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.php"><b>BilalBeleke</b>ART</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <div class="social-auth-links text-center mb-3">
       
       <button name="login" class="btn btn-block btn-primary"> Masuk <i class="fab fa-sign-in-alt mr-2"></i> </button>
      
      </div>
      </form>
      
      <?php
      $user = @$_POST['email'];
        $pass = @$_POST['password'];
        $login = @$_POST['login'];
        
        
        if(isset($_POST['login'])){
          if($user == "" || $pass ==""){
                ?> <script type="text/javascript">alert("Username / Password Tidak Boleh Kosong");</script> <?php

            }else{
                $sql = mysqli_query($conn,"select * from tbl_admin where email='$user' && password = '$pass'") or die (mysql_error());
                $CEK= mysqli_num_rows($sql);
                $data= mysqli_fetch_array($sql);
                if($CEK > 0){
                       @$_SESSION['Admin'] = $data['id'];
                       echo "<script>
       alert('Login Berhasil');
       document.location='../../admin.php';
       </script>"; 
            
                }else{
                    echo "<script>
       alert('Login Gagal');
       </script>"; 
                }
            }  
        }
      
      ?>

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

<?php }?>