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
/////////////////edit invoice 
if(isset($_POST['submitupdateiv']))
{   
    $idiv = $_POST['SoHD'];

    $TinhTrangDH=$_POST['tinhtrangdh'];

    

    if($TinhTrangDH==0){
        $query = "UPDATE hoa_don_ban SET MaNV=NULL,NgayGH=NULL,TinhTrangDuyet=0,TinhTrangDonHang=0 WHERE SoHD=$idiv";
    }
    if($TinhTrangDH==1){
        $query = "UPDATE hoa_don_ban SET TinhTrangDonHang=1 WHERE SoHD = $idiv";

    }
    if($TinhTrangDH==2){
        $query = "UPDATE hoa_don_ban SET TinhTrangDonHang=2 WHERE SoHD = $idiv";

    }

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        
        header("?page_layout=invoice");
      
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
/////////////////edit invoice_paid
if(isset($_POST['submitupdateivp']))
{   
    $idivp = $_POST['SoHD'];

    $TinhTrangDH=$_POST['tinhtrangdh'];

    

    if($TinhTrangDH==0){
        $query = "UPDATE hoa_don_ban SET MaNV=NULL,NgayGH=NULL,TinhTrangDuyet=0,TinhTrangDonHang=0 WHERE SoHD=$idivp";
    }
    if($TinhTrangDH==1){
        $query = "UPDATE hoa_don_ban SET TinhTrangDonHang=1 WHERE SoHD = $idivp";

    }
    if($TinhTrangDH==2){
        $query = "UPDATE hoa_don_ban SET TinhTrangDonHang=2 WHERE SoHD = $idivp";

    }

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        
        header("?page_layout=invoicepaid");
      
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}

//////////Xoa
$idiv="";
$idnc = "";
if(!empty($_GET['id_iv']) and !empty($_GET['id_nc'])){
    $idiv = $_GET['id_iv'];
    $idnc = $_GET['id_nc'];
}
if($idiv!=null and $idnc!=null){
    $querys_run1=mysqli_query($conn,"DELETE FROM `chi_tiet_hoa_don_ban` WHERE SoHD=$idiv AND MaMN=$idnc");
    $query2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `chi_tiet_hoa_don_ban` WHERE SoHD = $idiv"));
    if($query2>=1){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        if($query2==0){
                $querys = "DELETE FROM `hoa_don_ban` WHERE SoHD=$idiv";
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
    }
    
}    


?>