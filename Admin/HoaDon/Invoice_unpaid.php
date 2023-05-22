<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">


<?php

require('./connect.php');
include('./Function/Function.php');

      $queryall="SELECT hdb.SoHD, hdb.NgayDH, hdb.NgayGH, hdb.MaKH, hdb.MaNV, hdb.TinhTrangDuyet, hdb.TinhTrangDonHang,cthd.MaMN,
      nc.TenMN, kh.HoTenKH, cthd.SoLuong, cthd.DonGia FROM hoa_don_ban as hdb JOIN 
      chi_tiet_hoa_don_ban as cthd ON hdb.SoHD=cthd.SoHD JOIN mu_non AS nc ON cthd.MaMN=nc.MaMN JOIN 
      khach_hang AS kh ON kh.MaKH=hdb.MaKH WHERE hdb.TinhTrangDuyet=0";
      $nowpage_layout='invoiceunpaid';
      $query='';
      $totalRows=mysqli_num_rows(mysqli_query($conn,$queryall)); // phân trang
      $listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

      ///// SEARCH
      if(isset($_POST['searchbtn'])){
        if(isset($_POST['searchbox'])){
          $searchdata = trim($_POST['searchbox']);
          $query="$queryall AND (hdb.NgayDH LIKE '%$searchdata%' OR hdb.NgayGH LIKE '%$searchdata%' OR cthd.SoLuong LIKE '%$searchdata%' 
          OR kh.HoTenKH LIKE '%$searchdata%' OR nc.TenNC LIKE '%$searchdata%' OR cthd.DonGia LIKE '%$searchdata%') ";
        }
      }
      if(isset($_POST['reset'])){
        header('?page_layout=invoiceunpaid');
      }
      //// END SEARCH

      $result = mysqli_query($conn,$query);



    if(isset($_POST['submitduyet1'])){
   
        $manvgh=$_POST['MaNVGH']; // mã nhân viên giao hàng
        $ngaygh=$_POST['NgayGH'];
      
        $sohd=$_POST['SoHD'];


        $query2="UPDATE hoa_don_ban SET 
        NgayGH='$ngaygh',MaNV=$manvgh,TinhTrangDuyet=1,TinhTrangDonHang=1 WHERE SoHD=$sohd";

        $result2=mysqli_query($conn,$query2);
        header("refresh");

      
    }

  
?>                          


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản Lý Đơn Hàng</h4>

                    
                    <div class="searchbox">
                    <form id="form" method="post"> 
                      <input type="search" id="query" name="searchbox" placeholder="Search...">
                      <button style="submit" name="searchbtn">Search</button>
                      <button style="submit" name="reset">Reset</button>
                    </form>
                    </div>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Họ Tên </th>
                            <th> Mũ Nón</th>
                            <th> Ngàu đặt hàng</th>
                            <th> Số lượng </th>
                            <th>Đơn Giá</th>
                            <th>Nhân viên</th>
                            <th>Ngày giao hàng</th>
                            <th> Duyệt</th>
                            <th> Tình trạng </th>
                            <th> Quyền </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){
    if($rows['TinhTrangDuyet']==1){
        $Duyet='Yes';
    } else $Duyet='No';
    if($rows['TinhTrangDonHang']==2){
      $Tinhtrang='Hoàng thành';
    }else{
      if($rows['TinhTrangDonHang']==1){
        $Tinhtrang='Đang vận chuyển';
      }else $Tinhtrang='Chưa vận chuyển';
    }
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              <a><?php echo $rows['HoTenKH'] ?></a>
                            </td>
                            <td> <?php echo $rows['TenMN']?></td>
                            <td> <?php echo $rows['NgayDH']?></td>
                            <td> <?php echo $rows['SoLuong']?></td>
                            <td> <?php echo $rows['DonGia']?></td>
                    
                            <td> <?php echo $rows['MaNV']?></td>
                            <td> <?php echo $rows['NgayGH']?></td>
           
                            <td> <?php echo $Duyet ?></td>
                            <td> <?php echo $Tinhtrang ?></td>
                            
 
                            <td>
                        
                            
                            
                            <button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $rows['SoHD']?>">
                                Duyệt
                              </button>

                                                       <!-- Modal Duyệt đơn-->
                          <div class="modal fade" id="edit<?php echo $rows['SoHD']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Duyệt đơn</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                      
                                      <input type="hidden" name="SoHD" id="SoHD" value="<?php echo $rows['SoHD']; ?>">

                                        <div class="form-group">
                                            <label> Chọn nhân viên giao hàng </label>
                                        <select name="MaNVGH" class="form-select" id="MaNVGH">

                                        <?php 
                                            $query1='SELECT MaNV, HoTenNV FROM nhan_vien WHERE NVQuanLy=0';
                                            $result1 = mysqli_query($conn,$query1);
                                        while ($rows1=mysqli_fetch_array($result1)) { ?>
                                            <option value="<?php echo $rows1["MaNV"] ?>"><?php echo $rows1["HoTenNV"]?></option>
                                        <?php } ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label> Chọn ngày giao hàng </label>
                                            <input type="datetime-local" name="NgayGH" class="form-control">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="submitduyet1">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                                <!---------------------------END-------------------------->
                                <form action="" method="post">
                                <a onclick="return delete_advance();" href="./HoaDon/Handle.php?id_iv=<?php echo $rows['SoHD']?>&id_nc=<?php echo $rows['MaMN']?>" type="button" class="btn btn-gradient-success btn-sm" name="deleteiv">Delete</a>
                                </form>

                            </td>
                            
                          </tr>
                        
                        </tbody>
                        <?php
   }
?>     
                      </table>
                      <?php paginationnav($listPage,$totalRows)?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         