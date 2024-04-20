<?php 
session_start();
$title = str_replace("-", " ", $_GET['halaman']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    

    <meta charset="utf-8" />
            <title>RSPM - <?=ucwords($title)?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />

            <!-- App favicon -->
            <link rel="shortcut icon" href="public/resources/assets/images/favicon.ico">

       

     <!-- Tambahan komponen-->
     <link href="public/resources/assets/libs/mobius1-selectr/selectr.min.css" rel="stylesheet" type="text/css" />
     <link href="public/resources/assets/libs/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
     <link href="public/resources/assets/libs/vanillajs-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />
     <!-- App css -->
     <link href="public/resources/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="public/resources/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="public/resources/assets/css/app.min.css" rel="stylesheet" type="text/css" />


</head>