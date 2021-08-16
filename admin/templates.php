
<?php
include("classes/adminBack.php");
session_start();
$adminId = $_SESSION['id'];
$adminEmail = $_SESSION['adminEmail'];
if($adminId == null){
    header('location:index.php');
}
if(isset($_GET['adminLogout'])){
    $obj_adminBack = new adminBack();
    $obj_adminBack->adminLogout();
}
?>
<?php
include("includes/head.php");
?>


<body>
<div class="fixed-button">
    <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
    </a>
</div>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?php include_once("includes/header-nav.php"); ?>
        <?php include_once("includes/aside.php");?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">
                                        <?php
                                            if($views){
                                               if($views == "dashboard"){
                                                   include("views/dashboard-view.php");
                                               } elseif($views=="add-cat"){
                                                   include("views/add-category-view.php");
                                               }elseif($views=="add-product"){
                                                   include("views/add-product-view.php");
                                               }elseif($views=="manage-category"){
                                                   include("views/manage-category-view.php");
                                               }elseif($views=="manage-product"){
                                                   include("views/manage-product-view.php");
                                               }elseif($views=="manage-user"){
                                                   include("views/manage-user-view.php");
                                               }elseif($views=="edit-cat"){
                                                   include("views/edit-cat-view.php");
                                               }elseif($views=="edit-product"){
                                                   include("views/edit-product-view.php");
                                               }
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
   <?php include("includes/scripts.php"); ?>
</body>
