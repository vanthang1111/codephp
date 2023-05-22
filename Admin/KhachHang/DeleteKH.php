<?php

require('../connect.php');
// check connection

if(!$conn){
die("Connection failed: " .mysqli_connect_error());
}else "Thanh cong";
        $id_dm=$_GET['id_dm'];
        
        $sql="DELETE FROM khach_hang WHERE MaKH=$id_dm";
        $result= mysqli_query($conn,$sql);
        header('location:../index.php?page_layout=khachhang');



    ?>