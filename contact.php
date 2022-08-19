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
<style>
.accordion {
background-color: white !important;
  color: #7faf51;
  font-weight: bold;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 8px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
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
                            <h4 class="box-title text-center" style="margin-bottom: 20px">FAQ!</h4>
                            <button class="accordion">What do you have to sell?</button>
                            <div class="panel">
                            <p>We are bringing in our fold traditional, native, healthy and unique tasting sweets and snacks to be delivered at your doorstep</p>
                            </div>

                            <button class="accordion">Where are the products prepared?</button>
                            <div class="panel">
                            <p>The products are prepared at the place where they have originated from or are well known and famous. Yes, if your choice is Halwa then it is obviously from Tirunelveli District.</p>
                            </div>

                            <button class="accordion">Are only native snacks and sweets dealt with?</button>
                            <div class="panel">
                            <p>No. All snacks and sweets that are not only native but those which have a unique taste from a particular place are also brought in our fold.</p>
                            </div>
                            <button class="accordion">What guarantees freshness for the products ordered?</button>
                            <div class="panel">
                            <p>Tredy Foods strives to deliver the products that are fresh and systems are kept in place to source the best products and safely consign them to you. We don't stock the products but place once we receive orders. Even though we don't deny that it involves time we at Tredy Foods believe that centralising the whole despatch process would lead to economies of scale and allow quality check , aggregating the products would add value to the customers who wish to procure different products from different sources instead of routing the orders to the respective vendors.</p>
                            </div>
                            <button class="accordion">How will my order be delivered?</button>
                            <div class="panel">
                            <p>Courier companies offering the best services are roped in to deliver your products safely.</p>
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
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
        }
</script>
<?php include_once ("include/scripts.php");?>