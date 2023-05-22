<body>
		<!-- HEADER -->
		<?php
 include('./H.php');?>
		<!-- /HEADER -->
<?php

use LDAP\Result;
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

?>
	
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Giỏ hàng</li>
                            <li class="active">Thanh toán</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        <div class="section">
        <!-- container -->
        <div class="container">
<?php
    include("connect.php");
    if(isset($_SESSION['giohang'])){
        $arrId=array();
        foreach($_SESSION['giohang'] as $id=>$sl){
            $arrId[]=$id;
        }
        $strId=implode(',', $arrId);
        $query="SELECT * FROM mu_non WHERE MaMN IN($strId) ORDER BY MaMN DESC";
        $result = mysqli_query($conn, $query);
    }          
?>
<form id="giohang" method="post">
<table align='center'>
<tr>
    <th>Tên nhạc cụ</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>
<?php
    $tongtiensp=0;
    while($rows = mysqli_fetch_array($result)){
        $tong1=$rows['DonGia']*$_SESSION['giohang'][$rows['MaMN']];
        echo "<tr>";
        echo "<td>".$rows['TenMN']."</td>";
        echo "<td>".$rows['DonGia']."</td>";
        echo "<td>".$_SESSION['giohang'][$rows['MaMN']]."</td>";
        echo "<td>".$tong1." VNĐ"."</td>";
        echo "</tr>";
        $tongtiensp+=$tong1; 
        
    }
?>


</table>
 
<br>
<div align="right">
    <td colspan="5">
        <font size="3" class="indent1"><b>Tổng giá trị hóa đơn: </font><font size="3" ><span style="color: red;" class="indent"><?php echo $tongtiensp." VNĐ"?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b>
    </td>
</div>   
<div align="right">
    <br><input class="btn btn-success"  name="submit" type="submit" value="Thanh toán"/><br>  
</div>
<font size="3"><b>&nbsp;&nbsp;&nbsp;Thông tin người đặt hàng</b></font>

<?php 
    if(isset($_SESSION["m"])){
        $name=$_SESSION["m"];
        $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name'";
        $result=mysqli_query($conn,$query);
    }
?>                            

<table align='center' width='100%' >
    <br>
<tr>
    <th>Họ tên khách hàng</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Địa chỉ</th>
</tr>
<?php
    while($rows = mysqli_fetch_array($result)){
        echo "<br>";
        echo "<tr>";
        echo "<td>".$rows['HoTenKH']."</td>";
        echo "<td>".$rows['SDT']."</td>";
        echo "<td>".$rows['Email']."</td>";
        echo "<td>".$rows['DiaChi']."</td>";
        echo "</tr>"; 
    }
?>


</table>

</form>   


<br>
<?php

if(isset($_POST['submit'])){  
    $now = date_create()->format('Y-m-d H:i:s');
    $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name'";
    $result1=mysqli_query($conn,$query);
    $Makh=array();
    while($rows = mysqli_fetch_array($result1)){
        $makh1=$rows['MaKH'];
        $makh[]=$rows['MaKH'];
        foreach($makh as $maKH){
            $Makh[]=$maKH;
        }
        $hoadonban="INSERT INTO `hoa_don_ban`( `SoHD`, `NgayDH`, `NgayGH`, `MaKH`, `MaNV`, `TinhTrangDuyet`, `TinhTrangDonHang`) VALUES (null,'$now',null,'$makh1',null,'0','0')";
        mysqli_query($conn,$hoadonban);
    }
    $MaKH=implode(",",$Makh);
    $laymaddh = "select SoHD from hoa_don_ban order by SoHD desc limit 1";
    $result_laymaddh = mysqli_query($conn, $laymaddh);
    $run_laymaddh = mysqli_fetch_array($result_laymaddh);
    $donhangid = $run_laymaddh["SoHD"];

    if(isset($_SESSION['giohang'])){
        $arrId=array();
        foreach($_SESSION['giohang'] as $id=>$sl){
            $arrId[]=$id;
        }
        $strId=implode(',', $arrId);
        $query2="SELECT * FROM mu_non WHERE MaMN IN($strId) ORDER BY MaMN DESC";
        $result2=mysqli_query($conn, $query2);
    }
    while($rows = mysqli_fetch_array($result2)){
        $manc=$rows['MaMN'];
        $soluong=$_SESSION['giohang'][$rows['MaMN']];
        $dongia=$rows['DonGia'];   
        $query="INSERT INTO `gio_hang`(`id`, `MaKH`, `MaMN`, `TrangThai`, `SoLuong`, `DonGia`) VALUES (null,'$MaKH','$manc','1','$soluong','$dongia')";
        mysqli_query($conn, $query); 
    }
    $querygiohang = "SELECT * FROM gio_hang JOIN mu_non ON gio_hang.MaMN=mu_non.MaMN WHERE MaKH='$MaKH'";
    $result3 = mysqli_query($conn, $querygiohang);
    if (mysqli_num_rows($result3) != 0) {
    while($rows = mysqli_fetch_array($result3)){
        $manc=$rows['MaMN'];
        $soluong=$_SESSION['giohang'][$rows['MaMN']];
        $dongia=$rows['DonGia'];   
        $query="INSERT INTO `chi_tiet_hoa_don_ban` VALUE($donhangid,'$manc','$soluong','$dongia')";
        mysqli_query($conn, $query);  
        $thuchienxoa = "delete from gio_hang where MaKH = '$MaKH'";
        mysqli_query($conn, $thuchienxoa);
        echo "<script>
			alert('Mũ nón chất shop xin cảm ơn!');location = ' ./hoanthanh.php';
			</script>";
        }
    }
    
    
}
    

    ?>
        </div>
        </div>
		<!-- FOOTER -->
		<?php include('./F.php'); ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
