<?php
    $servername = "localhost";
    $username = "root";
    $password= "";
    $dbname= "banmu";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    // check connection
    
    if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
    }




///////////////////Thêm loại mu

    if(isset($_POST['insertlnc']))
{   
    if(isset($_POST['TenLoaiMN']) and !empty($_POST['TenLoaiMN'])){
        

            $LoaiMN = $_POST['TenLoaiMN'];
            $query = "INSERT INTO `loai_mu`(`MaLoaiMN`, `TenLoaiMN`) VALUES ('','$LoaiMN')";
            $query_run = mysqli_query($conn, $query);
        
            if($query_run)
            {
                echo '<script> alert("Thêm thành công"); </script>';
                header("?page_layout=lnc");
            }
            else
            {
                echo '<script> alert("Thêm thất bại"); </script>';
            }
    }else{
        echo '<script> alert("Thiếu dữ liệu"); </script>';
    }



}
////////////////////Thêm hãng sản xuất
if(isset($_POST['inserthsx']))
{
    $loi='';
    if(isset($_POST['sdt']) and !empty(trim($_POST['sdt'])) and is_numeric($_POST['sdt'])){
        $sdt = $_POST['sdt'];
    }else{
        $loi.='Số điện thoại bị sai';
    }
    if(isset($_POST['tenhsx']) and !empty(trim($_POST['tenhsx']))){
        $tenhsx = $_POST['tenhsx'];
    }else{
        $loi.=', Tên hãng sản xuất sai';
    }
    if(isset($_POST['dc']) and !empty(trim($_POST['dc']))){
        $diachi = $_POST['dc'];
    }else{
        $loi.=', Địa chỉ sai';
    }
    if(isset($loi)and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{
                $query = "INSERT INTO `hang_san_xuat`(`MaHSX`, `TenHSX`, `DiaChi`, `SDT`) VALUES ('','$tenhsx','$diachi','$sdt')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                echo '<script> alert("Thêm thành công"); </script>';
                header("?page_layout=hsx");
            }
            else
            {
                echo '<script> alert("Thêm thất bại"); </script>';
            }
    }
}
////////////////////Thêm nhà cung cấp
if(isset($_POST['insertncc']))
{   
    $loi='';
    if(isset($_POST['sdtncc']) and !empty(trim($_POST['sdtncc'])) and is_numeric($_POST['sdtncc'])){
        $sdt = $_POST['sdtncc'];
    }else{
        $loi.='Số điện thoại bị sai';
    }
    if(isset($_POST['tenncc']) and !empty(trim($_POST['tenncc']))){
        $tenncc = $_POST['tenncc'];
    }else{
        $loi.=', Tên nhà cung cấp sai';
    }
    if(isset($_POST['dcncc']) and !empty(trim($_POST['dcncc']))){
        $diachi = $_POST['dcncc'];
    }else{
        $loi.=', Địa chỉ cấp sai';
    }
    if(isset($_POST['emailncc']) and !empty(trim($_POST['emailncc']))){
        $email = $_POST['emailncc'];
    }else{
        $loi.=', Email sai';
    }
    if(isset($loi)and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{
        $query = "INSERT INTO `nha_cung_cap`(`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `Email`) 
        VALUES ('','$tenncc','$sdt','$diachi','$email')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            echo '<script> alert("thêm thành công"); </script>';
            header("?page_layout=ncc");
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }

    }
}
/////////////////// Edit loại mũ
if(isset($_POST['submiteditlnc']))
{   
    if(isset($_POST['TenLoaiMN']) and !empty($_POST['TenLoaiMN'])){
            $id = $_POST['MaLoaiMN'];
            $tenlnc = $_POST['TenLoaiMN'];
            $query = "UPDATE loai_mu SET TenLoaiMN='$tenlnc' WHERE MaLoaiMN=$id";
            $query_run = mysqli_query($conn, $query);
    
                if($query_run)
                {
                    echo '<script> alert("Edit thành công"); </script>';
                    header("?page_layout=lnc");
                }
                else
                {
                    echo '<script> alert("Edit thất bại"); </script>';
                }
        }else{
            echo '<script> alert("Thiếu dữ liệu"); </script>';
        }

}
//////////////////////Edit hãng sản xuất
if(isset($_POST['submitedithsx']))
{   $loi='';
    if(isset($_POST['SDT']) and !empty(trim($_POST['SDT'])) and is_numeric($_POST['SDT'])){
        $sdt = $_POST['SDT'];
    }else{
        $loi.='Số điện thoại bị sai';
    }
    if(isset($_POST['TenHSX']) and !empty(trim($_POST['TenHSX']))){
        $tenhsx = $_POST['TenHSX'];
    }else{
        $loi.=', Tên hãng sản xuất sai';
    }
    if(isset($_POST['DiaChi']) and !empty(trim($_POST['DiaChi']))){
        $diachi = $_POST['DiaChi'];
    }else{
        $loi.=', Địa chỉ sai';
    }
    if(isset($loi)and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{
        $id = $_POST['MaHSX'];
        $query = "UPDATE hang_san_xuat SET TenHSX='$tenhsx',DiaChi='$diachi',SDT='$sdt' WHERE MaHSX=$id";
         $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                echo '<script> alert("Edit thành công"); </script>';
                header("?page_layout=hsx");
            }
            else
            {
                echo '<script> alert("Edit thất bại"); </script>';
            }
    }

}
/////////////////////Edit nhà cung cấp
if(isset($_POST['submiteditncc']))
{   
    $loi='';
    if(isset($_POST['SDTNCC']) and !empty(trim($_POST['SDTNCC'])) and is_numeric($_POST['SDTNCC'])){
        $sdtncc = $_POST['SDTNCC'];
    }else{
        $loi.='Số điện thoại bị sai';
    }
    if(isset($_POST['TenNCC']) and !empty(trim($_POST['TenNCC']))){
        $tenncc = $_POST['TenNCC'];
    }else{
        $loi.=', Tên nhà cung cấp sai';
    }
    if(isset($_POST['DiaChiNCC']) and !empty(trim($_POST['DiaChiNCC']))){
        $diachincc = $_POST['DiaChiNCC'];
    }else{
        $loi.=', Địa chỉ sai';
    }
    if(isset($_POST['EmailNCC']) and !empty(trim($_POST['EmailNCC']))){
        $emailncc = $_POST['EmailNCC'];
    }else{
        $loi.=', Email sai';
    }
    if(isset($loi) and !empty($loi)){
        echo '<script> alert("'.$loi.'"); </script>';
    }else{
        $id = $_POST['MaNCC'];
        $query = "UPDATE nha_cung_cap SET TenNCC='$tenncc',SDT='$sdtncc',DiaChi='$diachincc',Email='$emailncc' WHERE MaNCC=$id";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            echo '<script> alert("Edit thành công"); </script>';
            header("?page_layout=ncc");
        }
        else
        {
            echo '<script> alert("Edit thất bại"); </script>';
        }
    }

}


/////////////////////Xóa loại Mũ 
    $idlnc="";
    if(!empty($_GET['id_lnc'])){
        $idlnc = $_GET['id_lnc'];
    }
    if($idlnc!=null){
    
    $querys_run1=mysqli_query($conn,"DELETE FROM `mu_non` WHERE MaLoaiMN=$idlnc");
    $querys = "DELETE FROM loai_mu WHERE MaLoaiMN=$idlnc";
    $query_run = mysqli_query($conn, $querys);

    if($query_run)
    {
        echo '<script> alert("Thành công"); </script>';
        $idlnc=null;
        header('Location: ' . $_SERVER['HTTP_REFERER']);;
    }
    else
    {
        echo '<script> alert("Thất bại"); </script>';
    }
}
///////////////////Xóa hãng sản xuất
    $idhsx="";
    if(!empty($_GET['id_hsx'])){
        $idhsx = $_GET['id_hsx'];
    }
    if($idhsx!=null){
        $querys_run1=mysqli_query($conn,"DELETE FROM `mu_non` WHERE MaHSX=$idhsx");
        $querys = "DELETE FROM hang_san_xuat WHERE MaHSX=$idhsx";
        $query_run = mysqli_query($conn, $querys);

        if($query_run)
        {
            echo '<script> alert("Thành công"); </script>';
            $idhsx=null;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
           
        }
        else
        {
            echo '<script> alert("Thất bại"); </script>';
        }
    }
//////////////////Xóa nhà cung cấp
$idncc="";
if(!empty($_GET['id_ncc'])){
    $idncc = $_GET['id_ncc'];
}
if($idncc!=null){
    $querys_run1=mysqli_query($conn,"DELETE FROM `mu_non` WHERE MaNCC=$idncc");
    $querys = "DELETE FROM nha_cung_cap WHERE MaNCC=$idncc";
    $query_run = mysqli_query($conn, $querys);

    if($query_run)
    {
        echo '<script> alert("Thành công"); </script>';
        $idncc=null;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo '<script> alert("Thất bại"); </script>';
    }
}    




?>



