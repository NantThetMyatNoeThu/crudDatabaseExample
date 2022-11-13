<?php
require_once "./connectdb.php";
$id=$_GET['id'];
// echo $id;
$secQuery="ALTER TABLE customer AUTO_INCREMENT=1 ";
$query="DELETE FROM customer WHERE id='$id'";
if($sql=mysqli_query($conn,$query)){
    $secSql=mysqli_query($conn,$secQuery);
    header("location:./read.php");
}else echo "Deletion is error!". mysqli_connect_error();
?>