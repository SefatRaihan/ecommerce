<?php
session_start();
include("admin/classes/adminBack.php");
$obj_adminBack = new adminBack();

$ctg = $obj_adminBack->displayedPublishCategory();

$ctg_datas = array();
while ($data = mysqli_fetch_assoc($ctg)){
    $ctg_datas[] = $data;
}

    if(isset($_POST['btn-send']))
    {
        $Msg = $obj_adminBack->contact($_POST);
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
        
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h2 class="text-center py-2"> Contact Us </h2>
                            <hr>
                            <?php 
                                $Msg = "";
                                if(isset($_GET['error']))
                                {
                                    $Msg = " Please Fill in the Blanks ";
                                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                                }

                                if(isset($_GET['success']))
                                {
                                    $Msg = " Your Message Has Been Sent ";
                                    echo '<div class="alert alert-success">'.$Msg.'</div>';
                                }
                            
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <p class="form-row">
                                    <label for="user_name">Name:<span class="requite">*</span></label>
                                    <input type="text" name="UName" placeholder="User Name" class="form-control mb-2">
                                </p>
                                <p class="form-row">
                                    <label for="user_name">Email:<span class="requite">*</span></label>
                                    <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
                                </p>
                                <p class="form-row">
                                    <label for="user_name">Subject:<span class="requite">*</span></label>
                                    <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">
                                </p>
                                <p class="form-row">
                                    <label for="user_name">Message:<span class="requite">*</span></label>
                                    <textarea name="msg" class="form-control mb-2" placeholder="Write The Message"></textarea>
                                </p>
                                <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" name="btn-send"> Send </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title text-center">FAQ!</h4>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
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