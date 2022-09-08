<?php
session_start();
include("admin/classes/adminBack.php");
$obj_adminBack = new adminBack();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];    
// $first_name = $_SESSION['first_name'];    
// $last_name = $_SESSION['last_name'];    

if($user_id == null){
    header('location: user_login.php');
}

if(isset($_GET['logoutuser'])){
    if($_GET['logoutuser']='logout'){
        $obj_adminBack->userLogout();
    }
}

if(isset($_GET[$user_id])){
    $user = $obj_adminBack->userLogin($data);
}
// $info = $obj_auserdminBack->userLogin($data);
// while ($data = mysqli_fetch_assoc($ctg)){
//     $ctg_datas[] = $data;
// }
// print_r($user['user_mobile']);

?>



<?php include_once("include/head.php");?>
<?php
if (isset($user)){
    echo $user;
}
?>
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
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h3>
                                <span>
                                <?php 
                                    if (isset($user_id)) {
                                        echo $_SESSION['first_name'] ?? '';
                                    } 
                                ?>
                                </span>
                                <span>
                                <?php 
                                    if (isset($user_id)) {
                                        echo $_SESSION['last_name'] ?? '';
                                    } 
                                ?>
                                </span>
                            </h3>
                            <h6>
                                Web Developer and Designer
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <div class="about">
                                <p style="border-bottom: 3px solid #7faf51; width: fit-content;">
                                    About
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Tabs content -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php if (isset($user_id)) {
                                        echo $user_name ?? '';
                                    } ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-6">
                                <p><?php if (isset($user_id)) {
                                        echo $_SESSION['first_name'] ?? '';
                                    } ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>last Name</label>
                                </div>
                                <div class="col-md-6">
                                <p><?php if (isset($user_id)) {
                                        echo $_SESSION['last_name'] ?? '';
                                    } ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                <p><?php if (isset($user_id)) {
                                        echo $_SESSION['user_email'] ?? '';
                                    } ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php if (isset($user_id)) {
                                        echo $_SESSION['user_mobile'] ?? '';
                                    } ?></p>
                                </div>
                            </div>
                    </div>
                </div>
            </form>   
            <p>
                <a class="btn btn-submit btn-bold" href="?logoutuser=logout">Logout</a>
            </p>        
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