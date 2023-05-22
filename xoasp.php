<?php
    session_start();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($id==0){
            unset($_SESSION['giohang']);
        }
        else{
            unset($_SESSION['giohang'][$id]);
        }
    }
    header("location: giohang.php");
?>