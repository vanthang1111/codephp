


<?php

require('./connect.php');

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
            if(isset($_POST['mk']) and !empty(trim($_POST['mk']))){
              $matkhau=md5($_POST['mk']);
            }else{
                $loi.=', Mật khẩu sai';
            }
          if(isset($loi) and !empty($loi)){
              echo '<script> alert("'.$loi.'"); </script>';
          }else{
            $query="INSERT INTO `nhan_vien`(`MaNV`, `HoTenNV`, `TenDN`, `MatKhau`, `SDT`, `Email`, `DiaChi`, `NVQuanLy`) 
            VALUES ('','$hoten','$tendn','$matkhau','$sdt','$email','$diachi','0')";
            $result = mysqli_query($conn,$query);
            if(!$result){
              echo '<script> alert("Tạo mới thất bại"); </script>';
            }else {
              echo '<script> alert("Tạo mới thành công"); </script>';
                        header("?page_layout=nhanvien");
            }
          }
    }
?>

<div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý nhân viên</h4>
                    <p class="card-description"> Tạo mới </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label >Họ Tên</label>
                        <input type="text" class="form-control"  name="ht" placeholder="Họ và tên">
                      </div>
                      <div class="form-group">
                        <label >Tên đăng nhập</label>
                        <input type="text" class="form-control"  name="tdn" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label >Mật khẩu</label>
                        <input type="password" class="form-control"  name="mk" placeholder="Password">
                      </div>
                      <div class="form-group">
                      <label >Số điện thoại</label>
                      <input type="text" class="form-control"  name="sdt" placeholder="số diện thoại">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" class="form-control"  name="dc" placeholder="Địa chỉ">
                      </div>

                      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Thêm</button>
                      <a href="./index.php?page_layout=nhanvien" class="btn btn-dark" type="button" name="exit">Thoát</a>

                    </form>
                  </div>
                </div>
              </div>
</div>              