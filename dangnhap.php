<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>
<body>
   
    <?php
    include("connect.php");
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $Pass=($_POST['pass']);
        $pass=MD5($_POST['pass']);
        $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name' and MatKhau='$pass'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        $row = mysqli_fetch_array($result);
        if ($pass != $row['MatKhau']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        if(mysqli_num_rows($result)<>0){
            session_start();
            $_SESSION["m"] = "$name";
            if(isset($_POST['nhomk'])){
                setcookie('user',$name,time()+3600,'/','',0,0);
                setcookie('pass',$Pass,time()+3600,'/','',0,0);
            }
            header("location: ./index.php");
            exit;
            
        }
    }

?>
<section class="vh-100">
    <div class="container-fluid h-custom" >
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./img/logo.png"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post">
                   

                <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Đăng nhập</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Nhập tài khoản" value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user'];?>"/>
                        <label class="form-label" for="form3Example3">Tài khoản</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Nhập mật khẩu" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass'];?>"/>
                        <label class="form-label" for="form3Example4">Mật khẩu</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" name="nhomk" value="<?php if(isset($_COOKIE['user'])) echo "checked";?>" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Nhớ mật khẩu
                            </label>
                        </div>
                        <a href="./quenmatkhau.php" class="text-body">Quên mật khẩu?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Chưa tạo tài khoản? <a href="dangki.php"
                                                                                          class="link-danger">Đăng kí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>
</body>
</html>
