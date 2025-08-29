<?php 
session_start();
$u = uniqid();
$id= $_POST['id'];

$_SESSION['inv'][$u] = $id;



echo "<script>location='../../../penyerahan-inventaris';</script>";

 
?>