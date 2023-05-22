<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="./css/style_dangki.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
    include("connect.php");
    $loi= "";
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $query="SELECT * FROM khach_hang WHERE Email='$email'";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 0) {
            $loi = "Email bạn nhập chưa đăng kí tài khoản thành viên";
        }
        else{
            $mk=rand(0,999999);
            $matkhaumoi=MD5($mk);
            $query="UPDATE khach_hang SET MatKhau='$matkhaumoi' WHERE Email='$email'";
            $result=mysqli_query($conn,$query);
            echo "<script>
			alert('Mật khẩu mới của bạn là: ".$mk."');location = ' ./dangnhap.php';
			</script>";
            
        }
      }
          
    

  ?>
  <div class="container">
    <div class="title">Quên mật khẩu</div>
    <div class="content">
      <form method="post">
        <table align="center">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nhập Email</span>
            <?php if($loi != 0){?>
                <div class="alert alert-danger"><?php echo $loi;?></div>
            <?php }?>
            <input type="email" placeholder="Nhập địa chỉ email" name="email" value="<?php if(isset($email)) echo $email;?>">
            <div class="button">
                <input type="submit" name="submit" value="Đổi mật khẩu">
            </div>
          </div>
        </div>
        </table>
      </form>
    </div>
  </div>

</body>
</html>
