<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mũ Nón Chất Shop - Mua hàng thành công</title>
<link rel="stylesheet" type="text/css" href="css/trangchu.css" />

<link rel="stylesheet" type="text/css" href="css/hoanthanh.css" />

<link rel="stylesheet" type="text/css" href="css/slideshow.css" />

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">

</script>

</head>
<body>

	<!-- Header -->
    <?php include("./H.php");
    
    use LDAP\Result;
    use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;
    
    
        require './PHPMailer/src/Exception.php';
        require './PHPMailer/src/PHPMailer.php';
        require './PHPMailer/src/SMTP.php';
    
    ?>
    <div class="section">
        <!-- container -->
        <div class="container">
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
        <!-- Right Column -->
        <div id="r-col">
            <div id="main">
            	<div class="prd-block">
                	<div class="ordered">
                    <br><br>
                    <font size="5"><b><p align="center" class="ordered-report">Quý khách đã đặt hàng thành công!</p></b><font>
                        
                        <font size="3">• Hóa đơn mua hàng của Quý khách đã được lưu lại trong phần Thông tin khách hàng của chúng tôi.</font>
                        <br>
                        <font size="3">• Sản phẩm của Quý khách sẽ được chuyển đến địa chỉ có trong phần Thông tin khách hàng của chúng tôi sau thời gian 2 đến 3 ngày. </font>
                        <br>
                        <font size="3">• Nhân viên giao hàng sẽ liên hệ với Quý khách qua số điện thoại trước khi giao hàng 24 tiếng.</font>
                        <br><br>
                        <font size="3"><p align="center">Cám ơn Quý khách đã sử dụng sản phẩm của cửa hàng chúng tôi!</p></font>
                        <br>
                    </div>
                    <form method="post">
                        <div classs="row">
                        <div align="center">
                            <a href="./index.php"><input id="return-home" name="reset" class="btn btn-warning" value="Quay về trang chủ"></a>
                            <input class="btn btn-success" name="submit" type="submit" value="Gửi hóa đơn về Email"/>
                        </div>
                        </div>
                    </form>
                <br><br>
                </div>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['submit'])){
        if($_SESSION['giohang']){
            if(isset($_SESSION["m"])){
                $name=$_SESSION["m"];
                $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name'";
                $result1=mysqli_query($conn,$query);
                $Makh=array();
                while($rows = mysqli_fetch_array($result1)){
                    $makh1=$rows['MaKH'];
                    $makh[]=$rows['MaKH'];
                    foreach($makh as $maKH){
                        $Makh[]=$maKH;
                    }  
                }
                $MaKH=implode(",",$Makh);
                $query="SELECT * FROM khach_hang WHERE MaKH='$MaKH'";
                $result=mysqli_query($conn,$query);
                $rows = mysqli_fetch_array($result);
                $hoten=$rows['HoTenKH'];
                $email=$rows['Email'];
                $sdt=$rows['SDT'];
                $dc=$rows['DiaChi'];
                $strBody = '';
                //Thông tin Khách hàng
                $strBody = '<p>
                <b>Khách hàng:</b> '.$hoten.'<br />
                <b>Email:</b> '.$email.'<br />
                <b>Điện thoại:</b> '.$sdt.'<br />
                <b>Địa chỉ:</b> '.$dc.'
                </p>';
                
                $arrId=array();
                foreach($_SESSION['giohang'] as $id=>$sl){
                    $arrId[]=$id;
                }
                $strId=implode(',', $arrId);
                $query="SELECT * FROM mu_non WHERE MaMN IN($strId) ORDER BY MaMN DESC";
                $result=mysqli_query($conn, $query);
                
                // Danh sách Sản phẩm đã mua
                $strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
                width="100%">
                <tr>
                <td align="center" bgcolor="#3F3F3F" colspan="4"><font
                color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
                </tr>
                <tr id="invoice-bar">
                <td width="45%"><b>Tên Sản phẩm</b></td>
                <td width="20%"><b>Giá</b></td>
                <td width="15%"><b>Số lượng</b></td>
                <td width="20%"><b>Thành tiền</b></td>
                </tr>';
                
                $tongtiensp = 0;
                while($rows = mysqli_fetch_array($result)){
                    $tong = $rows['DonGia']*$_SESSION['giohang'][$rows['MaMN']];
                    $strBody .= '<tr>
                    <td class="prd-name">'.$rows['TenMN'].'</td>
                    <td class="prd-price"><font color="#C40000">'.$rows['DonGia'].'
                    VNĐ</font></td>
                    <td class="prd-number">'.$_SESSION['giohang'][$rows['MaMN']].'</td>
                    <td class="prd-total"><font color="#C40000">'.$tong.'
                    VNĐ</font></td>
                    </tr>';
                    $tongtiensp += $tong;
                }
                $strBody .= '<tr>
                <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                <td colspan="2"></td>
                <td class="prd-total"><b><font color="#C40000">'.$tongtiensp.'
                VNĐ</font></b></td>
                </tr>
                </table>';
                $strBody .= '<p align="justify">
                <b>Quý khách đã đặt hàng thành công!</b><br />
                • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
                Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
                />
                • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
                khi giao hàng 24 tiếng.<br />
                <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
                Tôi!</b>
                </p>';

                //Thiết lập cấu hình PHP mailer để gửi Email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;// Enable verbose debug output
                    $mail->isSMTP();// gửi mail SMTP
                    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                    $mail->SMTPAuth = true;// Enable SMTP authentication
                    $mail->CharSet  = "utf-8";
                    $mail->Username = 'thangpro9669@gmail.com';// SMTP username
                    $mail->Password = 'ihbfckpvohehdfyu'; // SMTP password
                    $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port = 587; // TCP port to connect to 
                    //Recipients
                    $mail->addAddress($email); // Add a recipient
                    // Content
                    $mail->isHTML(true);   // Set email format to HTML
                    $mail->Subject = 'Quán mũ nón chất gửi hóa đơn đến bạn';
                    $mail->Body = $strBody;
                    $mail->send();
                    echo 'Xuất hóa đơn tới khách hàng '.$hoten.' thành công!';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                unset($_SESSION['giohang']);
            }
        
        }else {
            echo "Giỏ hàng trống, vui lòng về trang chủ chọn hàng và thanh toán!";
            echo "<br>";
        }
        
    }
    else{
        unset($_SESSION['giohang']);
    }
    ?>
        </div>
</div>
    <!-- End Body -->
    <?php include("./F.php");?>

<!-- End Wrapper -->

</body>
</html>
