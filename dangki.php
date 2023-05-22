<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="./css/style_quenmk.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banmu";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $yourname =  $youremail =$Mk  = $truyvanthatbai =  $has_pass = "";
    if(isset($_POST['submit'])){
      if(isset($_POST['name'])){
        $yourname=$_POST['name'];
      }
      if(isset($_POST['email'])){
        $youremail=$_POST['email'];
      }      
      if(isset($_POST['mk'])){
        $mk=$_POST['mk'];
        $Mk=MD5($_POST['mk']);
        
      } 
      if(isset($_POST['rpmk'])){
        $rpmk=$_POST['rpmk'];
      }
      if(isset($_POST['sdt'])){
        $sdt=$_POST['sdt'];
      } 
      if(isset($_POST['dc'])){
        $dc=$_POST['dc'];
      } 
      if(isset($_POST['tk'])){
        $tk=$_POST['tk'];
      }       
      if (isset($_POST["submit"])) { 
        if($mk==$rpmk){
          $query="insert into khach_hang values (null,'$yourname','$sdt','$youremail','$dc','$tk','$Mk','')";
          echo "<script>alert('Đăng nhập thành công!');</script>";
        }
        else{
          echo "Vui lòng xác nhận lại mật khẩu! <a href='javascript: history.go(-1)'> Trở lại</a>";
          exit;
        }
      }     
      $ketqua = mysqli_query($conn, $query);
      if (!$ketqua) {
          $truyvanthatbai =  "Thực hiện truy vấn ko thành công";
      }
      else  {
          header("Location: dangnhap.php");
      }      
    }

  ?>
  <div class="container">
    <div class="title">Đăng kí</div>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Họ tên</span>
            <input type="text" placeholder="Nhập họ và tên" name="name">
          </div>
          <div class="input-box">
            <span class="details">Tên tài khoản</span>
            <input type="text" placeholder="Nhập tên tài khoản" name="tk">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Email" name="email">
          </div>
          <div class="input-box">
            <span class="details">Số điện thoại</span>
            <input type="text" placeholder="Số điện thoại" name="sdt">
          </div>
          <div class="input-box">
            <span class="details">Địa chỉ</span>
            <input type="text" placeholder="Nhập địa chỉ" name="dc">
          </div>
          <div class="input-box">
            <span class="details">Mật khẩu</span>
            <input type="password" placeholder="Nhập mật khẩu" name="mk">
          </div>
          <div class="input-box">
            <span class="details">Xác nhận mật khẩu</span>
            <input type="password" placeholder="Nhập mật khẩu" name="rpmk">
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Đăng kí">
          <p class="details">Đã có tài khoản? <a href="dangnhap.php" class="link-danger">Đăng nhập</a></p>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
