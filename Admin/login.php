<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
  </head>
  <body>
  <?php

      ob_start();
      session_start();
      include_once './connect.php';


    if(isset($_POST['submit'])){
        $TenDN=$_POST['TenDN'];
        $pass = $_POST['password'];
        $query= "SELECT * FROM `nhan_vien` WHERE TenDN='$TenDN'and MatKhau='$pass'";
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result)>0){
          $rows=mysqli_fetch_assoc($result);
            $_SESSION['HoTenNV']=$rows['HoTenNV'];
            $_SESSION['DangNhap']=1;
            if($rows['NVQuanLy']==1){
              $_SESSION['Quyen']=true;
            }else{
              $_SESSION['Quyen']=false;
            }
            header('location:index.php');
          echo "thanh cong";
        }
        else{
          echo "that bai";
        }
    }
        ?>
        <?php

        if(!isset($_SESSION['HoTenNV']) and !isset($_SESSION['DangNhap']) and !isset($_SESSION['Quyen'])){
        
        ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo" style="text-align: center;">
                  <img src="../img/logo.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Tài khoản" name="TenDN">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"  placeholder="Mật khẩu" name="password">
                  </div>
                  <div class="mt-3" style="text-align: center;">
                    <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"  name="submit" value="SIGN IN">
                  </div>
                  </div>

                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php
    }else{
      header('location:index.php');
    }
    
    ?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>