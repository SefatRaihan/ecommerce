<?php
    include("admin/classes/adminBack.php");
    $obj_adminBack = new adminBack();
    $ctg = $obj_adminBack->displayedPublishCategory();

    $ctg_datas = array();
    while ($data = mysqli_fetch_assoc($ctg)){
        $ctg_datas[] = $data;
    }
    if(isset($_GET['status'])){
        $catId = $_GET['id'];
        if ($_GET['status']==='catView'){
            $pro_data = $obj_adminBack->product_by_category($catId);
            $pros = array();
            while ($pro_datas = mysqli_fetch_assoc($pro_data)){
                $pros[] = $pro_datas;
            }
        }
    }
if(isset($_GET['status'])){
    $catId = $_GET['id'];
    if ($_GET['status']==='catView'){
        $category_name = $obj_adminBack->category_by_id($catId);
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
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title"><?php echo $category_name['ctg_name']; ?>
        </h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page"><?php echo $category_name['ctg_name']; ?></span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="product-category grid-style">
                        <div class="row">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                            <?php foreach( $pros as $pro ){ ?>
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="single-product.php?status=singleProduct&&id=<?php echo $pro['pdt_id']; ?>"
                                               class="link-to-product">
                                                <img src="admin/upload/<?php echo $pro['pdt_image']; ?>" alt="dd"
                                                     width="270"
                                                     height="270"
                                                     class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"><?php echo $pro['ctg_name']; ?></b>
                                            <h4 class="product-title"><a href="single-product.php?status=singleProduct&&id=<?php echo $pro['pdt_id']; ?>" class="pr-name"><?php echo $pro['pdt_name'];?></a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span><?php echo $pro['pdt_price']?>tk</span></ins>

                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">All products are carefully selected to ensure food safety.</p>
                                                <div class="buttons">
                                                    <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                    <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                    <a href="single-product.php?status=singleProduct&&id=<?php echo
                                                    $pro['pdt_id']; ?>" class="btn compare-btn"><i class="fa fa-eye"
                                                                                                   aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
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