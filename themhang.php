<?php
    session_start();
    $id=$_GET['id'];
    if(isset($_SESSION['giohang'][$id])){
        $_SESSION['giohang'][$id]=$_SESSION['giohang'][$id]+1;
    }
    else{
        $_SESSION['giohang'][$id]=1;
    }
    header("location: index.php");
?>