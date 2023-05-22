


<?php

require('./connect.php');
$id_dm=$_GET['id_dm'];
$query1="SELECT * FROM khach_hang WHERE MaKH=$id_dm ";
        $result1 = mysqli_query($conn,$query1);
        $rows=mysqli_fetch_assoc($result1);

    if(isset($_POST['submit'])){
      $loi='';
      if(isset($_POST['sdt']) and !empty(trim($_POST['sdt'])) and is_numeric($_POST['sdt'])){
          $sdt=$_POST['sdt'];
      }else{
          $loi.='Số điện thoại sai';
      }
      if(isset($_POST['ht']) and !empty(trim($_POST['ht']))){
        $hoten=$_POST['ht'];
      }else{
          $loi.=', Họ và tên bị sai';
      }
      if(isset($_POST['dc']) and !empty(trim($_POST['dc']))){
        $diachi=$_POST['dc'];
      }else{
          $loi.=', Địa chỉ sai';
      }
      if(isset($_POST['email']) and !empty(trim($_POST['email']))){
        $email=$_POST['email'];
      }else{
          $loi.=', Email sai';
      }
      if(isset($_POST['tdn']) and !empty(trim($_POST['tdn']))){
        $tendn=$_POST['tdn'];
      }else{
          $loi.=', Tên đăng nhập sai';
      }
    if(isset($loi) and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{
        if(isset($_POST['mk']) and !empty(trim($_POST['mk']))){
          $matkhau=MD5($_POST['mk']);
          $query="UPDATE khach_hang SET HoTenKH='$hoten',TaiKhoan='$tendn',MatKhau='$matkhau'
          ,SDT='$sdt',Email='$email',DiaChi='$diachi' WHERE MaKH=$id_dm";
        }else{
          $query="UPDATE khach_hang SET HoTenKH='$hoten',TaiKhoan='$tendn'
          ,SDT='$sdt',Email='$email',DiaChi='$diachi' WHERE MaKH=$id_dm";
        }
      $result = mysqli_query($conn,$query);
      if(!$result){
        echo '<script> alert("Edit thất bại"); </script>';
        
      }else {echo '<script> alert("Edit thành công"); </script>';
              header("?page_layout=editkh");
            };
      }
    }
?>

<div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý Khách Hàng</h4>
                    <p class="card-description"> Cập nhật </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label >Họ Tên</label>
                        <input type="text" class="form-control"  name="ht" placeholder="Họ và tên" value="<?php  if(isset($hoten)) echo $hoten; else echo $rows['HoTenKH']?>">
                      </div>
                      <div class="form-group">
                        <label >Tên đăng nhập</label>
                        <input type="text" class="form-control"  name="tdn" placeholder="Username" value="<?php if(isset($tendn)) echo $tendn; else echo $rows['TaiKhoan']?>">
                      </div>
                      <div class="form-group">
                        <label >Mật khẩu</label>
                        <input type="password" class="form-control"  name="mk" placeholder="password" value="">
                      </div>
                      <div class="form-group">
                      <label >Số điện thoại</label>
                      <input type="text" class="form-control"  name="sdt" placeholder="số diện thoại" value="<?php if(isset($sdt)) echo $sdt; else echo $rows['SDT']?>">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; else echo $rows['Email']?>">
                      </div>
                      <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" class="form-control"  name="dc" placeholder="Địa chỉ" value="<?php if(isset($diachi)) echo $diachi; else echo $rows['DiaChi']?>">
                      </div>

                      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Cập nhật</button>
                      <a href="./index.php?page_layout=khachhang" class="btn btn-dark" type="button" name="exit">Thoát</a>

                      
                      <div class="form-group">
                        <?php if(isset($thongbao))
                        echo '<a style="color: red;">'.$thongbao.'</a>'
                        ?>
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>              