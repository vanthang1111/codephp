<?php
include('connect.php');
$sodonhang=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `hoa_don_ban` WHERE TinhTrangDuyet=0"));

$date = getdate();

$sokhachhang=mysqli_num_rows(mysqli_query($conn,'SELECT * FROM `khach_hang` WHERE 1'));
$query1="SELECT SUM(cthd.DonGia) AS doanhthu FROM hoa_don_ban as hd JOIN chi_tiet_hoa_don_ban as cthd ON hd.SoHD=cthd.SoHD WHERE hd.TinhTrangDuyet =1 AND TinhTrangDonHang=2 AND MONTH(NgayGH)=MONTH(CURDATE())";
$result2=mysqli_query($conn,$query1);
$doanhthu=mysqli_fetch_assoc($result2);
?>
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Home
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="./assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Đơn hàng <i class="mdi mdi-cart mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php if(isset($sodonhang)){ echo $sodonhang;} else echo '0'; ?></h2>
                    <!--<h6 class="card-text">Increased by 60%</h6>--->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="./assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Khách Hàng <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php if(isset($sokhachhang)){ echo $sokhachhang;} else echo '0'; ?></h2>
                    <!--<h6 class="card-text">Decreased by 10%</h6>-->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="./assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Doanh thu tháng <?php echo $date['mon']?> <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php if(isset($doanhthu['doanhthu'])){echo $doanhthu['doanhthu'].' VND';}else echo '0 VND'?></h2>
                   <!-- <h6 class="card-text">Increased by 5%</h6> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                      <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <i class="mdi mdi-account-outline icon-sm me-2"></i>
                        <span>Admin status</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6 pe-1">
                        <img src="./assets/images/dashboard/img1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image" style="width:300px ; height:300px">
                        <img src="./assets/images/dashboard/img4.jpg" class="mw-100 w-100 rounded" alt="image" style="width:300px ; height:300px">
                      </div>
                      <div class="col-6 ps-1">
                        <img src="./assets/images/dashboard/img2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image" style="width:300px ; height:300px">
                        <img src="./assets/images/dashboard/img3.jpg" class="mw-100 w-100 rounded" alt="image" style="width:300px ; height:300px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
