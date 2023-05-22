<?php 
    //Kết nối
    $servername= "localhost";
    $username="root";
    $password="";
    $dbname="banmu";
    $conn=mysqli_connect($servername,$username,$password,$dbname);

    //kiểm tra kết nối
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }else;
 ?>