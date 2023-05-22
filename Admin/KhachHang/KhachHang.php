<link rel="stylesheet" href="./assets/css/style.css">
<?php

require('./connect.php');
require('./Function/Function.php');

    $queryall="SELECT * FROM khach_hang";
    $nowpage_layout='khachhang';
    $query='';
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `khach_hang` WHERE 1"));
    $listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

    ///// SEARCH
    if(isset($_POST['searchbtn'])){
      if(isset($_POST['searchbox'])){
        $searchdata = trim($_POST['searchbox']);
        $query="SELECT * FROM khach_hang
        WHERE HoTenKH LIKE '%$searchdata%' OR SDT LIKE '%$searchdata%' OR DiaChi LIKE '%$searchdata%' OR Email LIKE '%$searchdata%' OR TaiKhoan LIKE '%$searchdata%' ";
      }
    }
    if(isset($_POST['reset'])){
      header('?page_layout=khachhang');
    }
    ///// END SEARCH

    $result = mysqli_query($conn,$query);


?>                          


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản Lý Khách Hàng</h4>
                    <?php
                    echo'<a href="index.php?page_layout=createkh"><button type="button" class="btn btn-gradient-danger btn-icon-text"> Add <i class="mdi mdi-file-check btn-icon-append"></i>
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
                            <th> Quyền </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){


    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              
                              <a><?php echo $rows['HoTenKH'] ?></a>
                            </td>
                            <td> <?php echo $rows['Email']?></td>
                            <td> <?php echo $rows['DiaChi']?></td>
                            <td> <?php echo $rows['SDT']?></td>
                            <td> <?php echo $rows['TaiKhoan']?></td>
                            <td>
                            <a href="index.php?page_layout=editkh&id_dm=<?php echo $rows['MaKH'] ?>" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
                            <a onclick="return xoa();" href="./KhachHang/DeleteKH.php?id_dm=<?php echo $rows['MaKH']?>" type="button" class="btn btn-gradient-success btn-sm" name="detelenv">Delete</a>
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
         