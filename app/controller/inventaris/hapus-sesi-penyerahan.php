<?php 
session_start();

$id = $_GET['id'];

unset($_SESSION['inv'][$id]);




echo "<script>location='../../../penyerahan-inventaris';</script>";




?>