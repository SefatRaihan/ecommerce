<?php
session_start();
include("admin/classes/adminBack.php");
$obj_adminBack = new adminBack();
$ctg = $obj_adminBack->displayedPublishCategory();

$ctg_datas = array();
while ($data = mysqli_fetch_assoc($ctg)){
    $ctg_datas[] = $data;
}

if(isset($_POST['user_login_btn'])){
    $msg = $obj_adminBack->userLogin($_POST);
}

if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    if($userId){
        header('location:user_profile.php');
    }
}

?>



<?php include_once("include/head.php");?>

    <body class="biolife-body">



    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <?php include_once("include/header_top.php");?>
        <?php include_once("include/header_middle.php");?>
        <?php include_once("include/header_bottom.php");?>
    </header>
    <!-- Page Contain -->
    <div class="page-contain">
        <div class="container">
            <?php 
                if (isset($msg)) {
                    echo $msg;
                } 
            ?>
            <div class="row">

                <!--Form Sign In-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="#" name="frm-login" method="post">
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="user_email" value="" class="txt-input" required>
                            </p>
                            <p class="form-row">
                                <label for="user_password">Password:<span class="requite">*</span></label>
                                <input type="password" id="user_password" name="user_password" value="" class="txt-input" required>
                            </p>
                            <p class="form-row wrap-btn">
                                <input type="submit" name="user_login_btn" class="btn btn-submit btn-bold"
                                    value="Login" >
                            </p>
                        </form>
                    </div>
                </div>

                <!--Go to Register form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">Already Registered?</h4>
                            <p class="sub-title">Login to access your account:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                            <a href="./user-register.php" class="btn btn-bold">Create your account</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once("include/footer.php");?>

    <!--Footer For Mobile-->
    <?php include_once("include/mobile_footer.php");?>
    <?php include_once("include/mobile_global_block.php");?>

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
    </body>
<?php include_once ("include/scripts.php");?>