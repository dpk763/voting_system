<?php

session_start();

if (!isset($_SESSION['uname'])) {
    header("location:session.php");  
} 


include 'conn.php';

    $sql="DELETE FROM `vote`";

    $result=mysqli_query($conn,$sql);

    if($result){
        header('location:welcome.php');
    }



?>