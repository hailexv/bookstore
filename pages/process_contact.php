<?php
session_start();
  
require_once('connection.php');
require('config.php');
$id=$_GET['id'];
            $q="select * from book where b_id=$id";

    
    $res=mysqli_query($conn,$q) or die("Can't Execute Query..");
    $row=mysqli_fetch_assoc($res);
 
            $query="insert into contact(con_nm,con_book)
            values ('".$_SESSION['id']."','".$row['b_nm']."')";


            //"."(".$_SESSION['id'].",".$row['b_nm'].")"
            
            mysqli_query($conn,$query) or die("Can't Execute Query...");
            
            echo "<script> alert('book rent successfull');</script>";


  
?>