<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
<?php

require('./connect.php');
include('./Function/Function.php');
include('XuLy.php');


$queryall="SELECT * FROM nha_cung_cap";
$nowpage_layout='ncc';
$query='';
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `nha_cung_cap`")); // phân trang
$listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);


///// SEARCH
if(isset($_POST['searchbtn'])){
  if(isset($_POST['searchbox'])){
    $searchdata = trim($_POST['searchbox']);
    $query="SELECT MaNCC, TenNCC, SDT, DiaChi, Email FROM nha_cung_cap 
    WHERE TenNCC LIKE '%$searchdata%' OR SDT LIKE '%$searchdata%' OR DiaChi LIKE '%$searchdata%' OR Email LIKE '%$searchdata%' ";
  }
}
if(isset($_POST['reset'])){
  header('?page_layout=ncc');
}
///// END SEARCH

$result2 = mysqli_query($conn,$query);

?>         

<!-- Modal add Nhà cung cấp -->
<div class="modal fade" id="munonaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Nhà cung cấp </label>
                            <input type="text" name="tenncc" class="form-control" placeholder="Tên nhà cung cấp">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Số điện thoại </label>
                            <input type="text" name="sdtncc" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Địa chỉ </label>
                            <input type="text" name="dcncc" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Email </label>
                            <input type="email" name="emailncc" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertncc" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
  </div>


 <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Quản lý thông tin Mũ Nón </h4>
                    <h4>Nhà cung cấp </h4>

                    <button type="button" class="btn btn-gradient-danger btn-icon-text" 
                   data-toggle="modal" data-target="#munonaddmodal">
                     Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button>

                    
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
                            <th> Tên Nhà cung cấp </th>
                            <th> Số điện thoại </th>
                            <th> Địa chỉ </th>
                            <th> Email </th>
                            <th> Quyền </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows2=mysqli_fetch_array($result2)){
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td><a><?php echo $rows2['TenNCC']  ?></a></td>
                            <td><?php echo $rows2['SDT'] ?></td>
                            <td><?php echo $rows2['DiaChi'] ?></td>
                            <td><?php echo $rows2['Email'] ?></td>
                            <td>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editncc<?php echo $rows2['MaNCC']?>">
                                Edit
                              </button>



                                                       <!-- Modal Edit hang san xuat-->
                          <div class="modal fade" id="editncc<?php echo $rows2['MaNCC']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                      
                                      <input type="hidden" name="MaNCC" id="MaNCC" value="<?php echo $rows2['MaNCC']; ?>">


                                        <div class="form-group">
                                            <label> Nhà cung cấp </label>
                                            <input required value="<?php echo $rows2['TenNCC']; ?>" required type="text" name="TenNCC" class="form-control" id="TenHSX" placeholder="Nhà cugn cấp">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Số điện thoại </label>
                                            <input required value="<?php echo $rows2['SDT']; ?>" required type="text" name="SDTNCC" class="form-control" id="SDTNCC" placeholder="Số điện thoại">
                                        </div> 

                                        <div class="form-group">
                                            <label> Địa chỉ </label>
                                            <input required value="<?php echo $rows2['DiaChi']; ?>" required type="text" name="DiaChiNCC" class="form-control" id="DiaChiNCC" placeholder="Địa chỉ">
                                        </div>

                                        <div class="form-group">
                                            <label> Email </label>
                                            <input required value="<?php echo $rows2['Email']; ?>" required type="email" name="EmailNCC" class="form-control" id="EmailNCC" placeholder="Email">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="submiteditncc">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                                <!---------------------------END-------------------------->
                                <form action="" method="post">
                                <a onclick="return delete_advance();" href="./ChiTietMuNon/XuLy.php?id_ncc=<?php echo $rows2['MaNCC']?>" type="button" class="btn btn-gradient-success btn-sm" name="deletencc">Delete</a>
                                
                                </form>
                
                            </td>
                            
                          </tr>
                        
                        </tbody>
                        <?php
   }
?>     
                      </table>
                      
                   <!-- phan trang -->
                   <?php paginationnav($listPage,$totalRows)?>
                    </div>
                  </div>
                </div>
              </div>
</div>