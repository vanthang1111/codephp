<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">

<?php

require('./connect.php');
include('Handle.php');
include('./Function/Function.php');



        $queryall="SELECT hdb.SoHD, hdb.NgayDH, hdb.NgayGH, hdb.MaKH, hdb.MaNV, hdb.TinhTrangDuyet, hdb.TinhTrangDonHang,cthd.MaMN, 
        nc.TenMN, kh.HoTenKH, cthd.SoLuong, cthd.DonGia FROM hoa_don_ban as hdb JOIN 
        chi_tiet_hoa_don_ban as cthd ON hdb.SoHD=cthd.SoHD JOIN mu_non AS nc ON cthd.MaMN=nc.MaMN JOIN 
        khach_hang AS kh ON kh.MaKH=hdb.MaKH";
        $nowpage_layout='invoice';
        $query='';
        $totalRows=mysqli_num_rows(mysqli_query($conn,$queryall)); // phân trang
        $listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

        if(isset($_POST['searchbtn'])){
          if(isset($_POST['searchbox'])){
            $searchdata = trim($_POST['searchbox']);
            $query="$queryall WHERE hdb.NgayDH LIKE '%$searchdata%' OR hdb.NgayGH LIKE '%$searchdata%' OR cthd.SoLuong LIKE '%$searchdata%' 
            OR kh.HoTenKH LIKE '%$searchdata%' OR nc.TenMN LIKE '%$searchdata%' OR cthd.DonGia LIKE '%$searchdata%' ";
          }
        }
        if(isset($_POST['reset'])){
          header('?page_layout=invoice');
        }
        ///// END SEARCH

        $result = mysqli_query($conn,$query);

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
        $tennvgh=""; // Tên nhân viên giao hàng
        if($rows['MaNV']!=null){
          $manv=$rows['MaNV'];
          $query1="SELECT HoTenNV FROM nhan_vien WHERE MaNV=$manv";
          $rows1=mysqli_fetch_array(mysqli_query($conn,$query1));
          $tennvgh=$rows1['HoTenNV'];
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
                            <td> <?php echo $tennvgh?></td>
                            <td> <?php echo $rows['NgayGH']?></td>
                            <td> <?php echo $Duyet ?></td>
                            <td> <?php echo $Tinhtrang ?></td>
                            
 
                            <td>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editiv<?php echo $rows['SoHD']?>">
                                Edit
                              </button>



                                                       <!-- Modal Edit Đơn hàng cụ-->
                          <div class="modal fade" id="editiv<?php echo $rows['SoHD']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                      
                                      <input type="hidden" name="SoHD" id="SoHD" value="<?php echo $rows['SoHD']; ?>">


                                        <div class="form-group">
                                            <label> Tình trạng đơn hàng </label>
                                            <select name="tinhtrangdh" class="form-select" id="tinhtrangdh">
                                            <option value="<?php echo $rows["TinhTrangDonHang"] ?>"><?php echo $Tinhtrang?></option>
                                            <?php
                                            if($rows["TinhTrangDonHang"]==1){
                                              echo '<option value="2">Hoàn thành</option>';
                                              echo '<option value="0">Lỗi vận chuyển hoặc hủy đơn</option>';
                                            }
                                            ?>
                                            
                                          </select>
                
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="submitupdateiv">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                                <!---------------------------END-------------------------->
                                <form action="" method="post">
                                <a onclick="return delete_advance();" href="./HoaDon/Handle.php?id_iv=<?php echo $rows['SoHD']?>&id_nc=<?php echo $rows['MaMN']?>" type="button" class="btn btn-gradient-success btn-sm" name="deleteIV">Delete</a>
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
         