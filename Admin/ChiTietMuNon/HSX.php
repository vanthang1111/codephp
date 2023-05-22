<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
<?php
   
require('./connect.php');
include('./Function/Function.php');
include('XuLy.php');

$queryall="SELECT * FROM hang_san_xuat";
$nowpage_layout='hsx';
$query='';
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `hang_san_xuat` WHERE 1"));
$listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

if(isset($_POST['searchbtn'])){
  if(isset($_POST['searchbox'])){
    $searchdata = trim($_POST['searchbox']);
    $query="SELECT * FROM hang_san_xuat
    WHERE TenHSX LIKE '%$searchdata%' OR SDT LIKE '%$searchdata%' OR DiaChi LIKE '%$searchdata%' ";
  }
}
if(isset($_POST['reset'])){
  header('?page_layout=hsx');
}

$result1 = mysqli_query($conn,$query);

?>
 <!------------------------------------------------------------------------------>
   <!------------------------------------------------------->
<!-- Modal add hãng sản xuất -->
<div class="modal fade" id="hangsxaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm hãng sản xuất </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Hãng sản xuất </label>
                            <input type="text" name="tenhsx" class="form-control" placeholder="Tên Hãng">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Địa chỉ </label>
                            <input type="text" name="dc" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Số điện thoại </label>
                            <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="inserthsx" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
  </div>


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Quản lý thông tin Mũ Nón  </h4>
                    <h4>Hãng sản xuất </h4>
                    <button type="button" class="btn btn-gradient-danger btn-icon-text" 
                   data-toggle="modal" data-target="#hangsxaddmodal">
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
                            <th> Tên Hãng sản xuất </th>
                            <th> Địa chỉ </th>
                            <th> Số điện thoại </th>
                            <th> Quyền </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows1=mysqli_fetch_array($result1)){
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td><a><?php echo $rows1['TenHSX']  ?></a></td>
                            <td><?php echo $rows1['DiaChi'] ?></td>
                            <td><?php echo $rows1['SDT'] ?></td>
                            <td>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#edithsx<?php echo $rows1['MaHSX']?>">
                                Edit
                              </button>



                                                       <!-- Modal Edit hang san xuat-->
                          <div class="modal fade" id="edithsx<?php echo $rows1['MaHSX']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      
                                      <input type="hidden" name="MaHSX" id="MaHSX" value="<?php echo $rows1['MaHSX']; ?>">


                                        <div class="form-group">
                                            <label> Tên hãng </label>
                                            <input required value="<?php echo $rows1['TenHSX']; ?>" required type="text" name="TenHSX" class="form-control" id="TenHSX" placeholder="Hãng sản xuất">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Địa chỉ </label>
                                            <input required value="<?php echo $rows1['DiaChi']; ?>" required type="text" name="DiaChi" class="form-control" id="DiaChi" placeholder="Địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label> Số điện thoại </label>
                                            <input required value="<?php echo $rows1['SDT']; ?>" required type="text" name="SDT" class="form-control" id="SDT" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="submitedithsx">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                                <!---------------------------END-------------------------->
                                <form action="" method="post">
                                <a onclick="return delete_advance();" href="./ChiTietMuNon/XuLy.php?id_hsx=<?php echo $rows1['MaHSX']?>" type="button" class="btn btn-gradient-success btn-sm" name="deletehsx">Delete</a>
                                
                                </form>
                                
                
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