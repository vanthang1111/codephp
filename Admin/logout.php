<?php
session_start();
if(isset($_SESSION['HoTenNV']) and isset($_SESSION['DangNhap']) and isset($_SESSION['Quyen'])){
    session_destroy();
    header('location:login.php');
}
else{
    header('location:login.php');
}

?>