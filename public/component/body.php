<?php
function isMobileDevice() {
    return preg_match("/(android|iphone|ipod|opera mini|iemobile)/i", $_SERVER['HTTP_USER_AGENT']);
}


if ($session_akses == 0) {
    if (isMobileDevice()) {
        
    }
    else {
        require 'public/component/sidebar2.php';
    }
 }
 else {

    require 'public/component/sidebar.php';
 } 


require 'public/component/topbar.php';
?>


<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php require 'public/component/title.php';?>
            <!-- end page title end breadcrumb -->
            <?php require 'routes/router.php';?>
            <!--end row-->

</div><!-- container -->

<!--Start Rightbar-->
<!--Start Rightbar/offcanvas-->
<?php require 'public/component/rightbar.php';?>
<!--end Rightbar/offcanvas-->
<!--end Rightbar-->

<!--Start Footer-->
<!-- Footer Start -->
<?php require 'public/component/footer.php';?>
   <!-- end Footer -->                
   <!--end footer-->
</div>
<!-- end page content -->
</div>
    <!-- end page-wrapper -->