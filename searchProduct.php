<?php


?>

<?php include_once("include/head.php");?>

<body class="biolife-body">

<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <?php include_once("include/header_top.php");?>
    <?php include_once("include/header_middle.php");?>
    <?php include_once("include/header_bottom.php");?>
</header>

<div class="page-contain">
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">
        <div class="sumary-product single-layout">
                                <div class="media">
                                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                                        <li><img src="admin/upload/<?php echo $pro['pdt_image'];?>" alt="" width="500"
                                                height="500"></li>
                                    </ul>
                                </div>
                                <div class="product-attribute">
                                    <h3 class="title"><?php echo $pro['pdt_name'];?></h3>
                                    <div class="rating">
                                        <p class="star-rating"><span class="width-80percent"></span></p>
                                        <span class="review-count">(04 Reviews)</span>
                                        <span class="qa-text">Q&A</span>
                                        <b class="category"><?php echo $pro['ctg_name'];?></b>
                                    </div>
                                    <span class="sku">Sku:<?php echo $pro['pdt_id'];?></span>
                                    <p class="excerpt"><?php echo $pro['pdt_desc'];?></p>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo
                                                $pro['pdt_price'];?>tk</span></ins>
                                    </div>
                                    <div class="shipping-info">
                                        <p class="shipping-day">3-Day Shipping</p>
                                        <p class="for-today">Pree Pickup Today</p>
                                    </div>
                                </div>
                                <div class="action-form">
                                    <div class="quantity-box">

                                    </div>
                                    <div class="total-price-contain">
                                        <span class="title">Product Price:</span>
                                        <p class="price">
                                            <?php
                                            echo $pro['pdt_price']."tk";
                                            ?>
                                        </p>
                                    </div>
                                    <div class="buttons">
                                        <input class="" name="pdt_name" type="hidden" value="<?php echo $pro['pdt_name'];?>">
                                        <input class="" name="pdt_image" type="hidden" value="<?php echo
                                        $pro['pdt_image'];?>">
                                        <input class="" name="pdt_price" type="hidden" value="<?php echo
                                        $pro['pdt_price'];?>">
                                        <input type="submit" name="addtocart" value="add to cart" class="btn btn-block
                                        add-to-cart-btn">
                                        <p class="pull-row">
                                            <a href="#" class="btn wishlist-btn">wishlist</a>
                                            <a href="#" class="btn compare-btn">compare</a>
                                        </p>
                                    </div>
                                    <div class="location-shipping-to">
                                        <span class="title">Ship to:</span>
                                        <select name="shipping_to" class="country">
                                            <option value="-1">Select Country</option>
                                            <option value="america">America</option>
                                            <option value="france">France</option>
                                            <option value="germany">Germany</option>
                                            <option value="japan">Japan</option>
                                        </select>
                                    </div>
                                    <div class="social-media">
                                        <ul class="social-list">
                                            <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="acepted-payment-methods">
                                        <ul class="payment-methods">
                                            <li><img src="assets/images/card1.jpg" alt="" width="51" height="36"></li>
                                            <li><img src="assets/images/card2.jpg" alt="" width="51" height="36"></li>
                                            <li><img src="assets/images/card3.jpg" alt="" width="51" height="36"></li>
                                            <li><img src="assets/images/card4.jpg" alt="" width="51" height="36"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
        </h1>
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