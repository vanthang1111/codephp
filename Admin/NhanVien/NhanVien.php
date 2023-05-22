<link rel="stylesheet" href="./assets/css/style.css">
<?php

require('./connect.php');
require('./Function/Function.php');

    
$queryall="SELECT * FROM nhan_vien";
$nowpage_layout='nhanvien';
$query='';
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `nhan_vien` WHERE 1"));
$listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

///// SEARCH
if(isset($_POST['searchbtn'])){
  if(isset($_POST['searchbox'])){
    $searchdata = trim($_POST['searchbox']);
    $query="SELECT * FROM nhan_vien
    WHERE HoTenNV LIKE '%$searchdata%' OR SDT LIKE '%$searchdata%' OR DiaChi LIKE '%$searchdata%' OR Email LIKE '%$searchdata%' OR TenDN LIKE '%$searchdata%' ";
  }
}
if(isset($_POST['reset'])){
  header('?page_layout=nhanvien');
}
///// END SEARCH

  $result = mysqli_query($conn,$query);


?>                          


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản Lý Nhân Viên</h4>
                    <?php
                    echo'<a href="index.php?page_layout=createnv"><button type="button" class="btn btn-gradient-danger btn-icon-text"> Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button></a>';
                    ?>

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
                            <th> Email </th>
                            <th> Địa chỉ </th>
                            <th> SĐT </th>
                            <th>Tài khoản</th>
                            <th> Chức vụ </th>
                            <th> Lựa chọn </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){
    if($rows['NVQuanLy']==1){ $cv='Quản lý'; 
      $Anh='<img src="./assets/images/faces/manager-icon.png'.'" class="me-2" alt="image"';
    }
    else {$cv='Nhân viên';
      $Anh='<img src="./assets/images/faces/Staff.jpg'.'" class="me-2" alt="image"';}
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              <?php echo $Anh?>
                              <a><?php echo $rows['HoTenNV'] ?></a>
                            </td>
                            <td> <?php echo $rows['Email']?></td>
                            <td> <?php echo $rows['DiaChi']?></td>
                            <td> <?php echo $rows['SDT']?></td>
                            <td> <?php echo $rows['TenDN']?></td>
                            <td> <?php echo $cv?></td>
                            <td>
                            <a href="index.php?page_layout=editnv&id_dm=<?php echo $rows['MaNV'] ?>" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
                            <a onclick="return delete_normal();" href="./Nhanvien/DeleteNV.php?id_dm=<?php echo $rows['MaNV']?>" type="button" class="btn btn-gradient-success btn-sm" name="detelenv">Delete</a>
                            </td>
                            
                          </tr>
                        
                        </tbody>
                        <?php
   }
?>     
                      </table>

               <!-- phan tran -->
               <?php paginationnav($listPage,$totalRows)?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         