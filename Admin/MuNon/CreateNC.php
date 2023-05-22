<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
  function chooseFile(fileInput){
    var reader = new FileReader();

    reader.onload = function(e){
      $('#image').attr('src',e.target.result);
    }
    reader.readAsDataURL(fileInput.files[0]);
  }
  </script>


  </head>
  <body>

  <?php

require('./connect.php');
include('./Function/Function.php');

    if(isset($_POST['submit'])){

      $loi='';
      if(isset($_POST['gia']) and !empty(trim($_POST['gia'])) and is_numeric($_POST['gia'])){
        $gia=$_POST['gia'];
      }else{
          $loi.='Giá tiền sai';
      }
      if(isset($_POST['tnc']) and !empty(trim($_POST['tnc']))){
        $tenmn=$_POST['tnc'];
      }else{
          $loi.=', Tên Mũ sai';
      }
      if(isset($_POST['lnc']) and !empty(trim($_POST['lnc']))){
        $loaimn=$_POST['lnc'];
      }else{
          $loi.=', loại Mũ sai';
      }
      if(isset($_POST['ncc']) and !empty(trim($_POST['ncc']))){
        $mu=$_POST['ncc'];
      }else{
          $loi.=', Nhà Mũ sai';
      }
      if(isset($_POST['hsx']) and !empty(trim($_POST['hsx']))){
        $hangsx=$_POST['hsx'];
      }else{
          $loi.=', Hãng sản xuất sai';
      }
      if(isset($_POST['mota']) and !empty(trim($_POST['mota']))){
        $mota=$_POST['mota'];
      }else{
          $loi.=', Mô tả không hợp lệ';
      }
    if(isset($loi) and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{

      $target_dir = "./assets/images/musical/";
      $target_file = $target_dir . basename($_FILES["imgselect"]["name"]);
      $hinhmn=basename($_FILES["imgselect"]["name"]);
      


      $query="INSERT INTO `mu_non`(`MaMN`, `TenMN`, `MoTa`, `HinhMN`, `DonGia`, `MaLoaiMN`, `MaNCC`, `MaHSX`) 
      VALUES ('','$tenmn','$mota','$hinhmn','$gia','$loaimn','$mu','$hangsx')";
      $result = mysqli_query($conn,$query);
      if(!$result){
        echo '<script> alert("tạo mới thất bại"); </script>';
      }else{  echo '<script> alert("Tạo mới thành công"); </script>';
        move_uploaded_file($_FILES["imgselect"]["tmp_name"], $target_file);
        header("?page_layout=MuNon");
      }
    }
    }

   
?>


<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý Mũ</h4>
                    <p class="card-description"> Tạo mới </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label >Tên mũ nón</label>
                        <input type="text" class="form-control"  name="tnc" placeholder="Tên mũ nón">
                      </div>
                      <div class="form-group">
                        <label >Đơn giá</label>
                        <input type="text" class="form-control"  name="gia" placeholder="Giá sản phẩm">
                      </div>
                      
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Loại Mũ</label>
                      <select class="form-control form-control-sm"  name="lnc">
                      <?php
                                    $querylnc='SELECT * FROM `loai_mu` WHERE 1';
                                    $resultlnc=mysqli_query($conn,$querylnc);
                                    while($row1=mysqli_fetch_array($resultlnc)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     <?php endwhile;?>
                      </select>
                    </div>

                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Nhà cung cấp</label>
                      <select class="form-control form-control-sm" name="ncc">
                      <?php
                                    $queryncc='SELECT * FROM `nha_cung_cap` WHERE 1';
                                    $resultncc=mysqli_query($conn,$queryncc);
                                    while($row1=mysqli_fetch_array($resultncc)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     <?php endwhile;?>
                      </select>
                    </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Hãng sản xuất</label>
                      <select class="form-control form-control-sm" name="hsx">
                      <?php
                                    $queryhsx='SELECT * FROM `hang_san_xuat` WHERE 1';
                                    $resulthsx=mysqli_query($conn,$queryhsx);
                                    while($row1=mysqli_fetch_array($resulthsx)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     <?php endwhile;?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="mota"></textarea>
                      </div>
                    <div class="row mt-3">
                        <img src="" class="mb-2 mw-100 w-100 rounded" alt="image" id="image" width="400" height="300" style="border: 2px solid black;">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="imgselect" class="file-upload-default" onchange="chooseFile(this)"
                        accept="image/gif, image/jpeg , image/png">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>



                    <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Thêm</button>
                      <a href="./index.php?page_layout=MuNon" class="btn btn-dark" type="button" name="exit">Thoát</a>
                      <?php if(isset($thongbao))
                        echo '<a style="color: red;">'.$thongbao.'</a>';
                        ?>
                      <div class="form-group">

                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>


    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/file-upload.js"></script>

  </body>
</html>
