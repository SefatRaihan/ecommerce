<?php

    session_start();

    include("admin/classes/adminBack.php");
    $obj_adminBack = new adminBack();
    $ctg = $obj_adminBack->displayedPublishCategory();

    $ctg_datas = array();
    while ($data = mysqli_fetch_assoc($ctg)){
        $ctg_datas[] = $data;
    }

    if(isset($_POST['addtocart'])){
        if(isset($_SESSION['cart'])){
            $product_name = array_column($_SESSION['cart'], 'pdt_name');
            if (in_array($_POST['pdt_name'], $product_name)){
                echo "
                <script>
                    alert('This product already added!');
                </script>            
            ";
            }else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array(
                    'pdt_name' => $_POST['pdt_name'],
                    'pdt_price' => $_POST['pdt_price'],
                    'pdt_image' => $_POST['pdt_image'],
                    'quantity' => 1,
                );
            }
        }else{
            $_SESSION['cart'][0] = array(
              'pdt_name' => $_POST['pdt_name'],
              'pdt_price' => $_POST['pdt_price'],
              'pdt_image' => $_POST['pdt_image'],
              'quantity' => 1,
            );

        }
    }

    if(isset($_POST['remove_product'])){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value['pdt_name'] == $_POST['remove_product_name']){
                unset($_SESSION['cart'][$key]);

            }
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
        <div class="container" style="margin-top: 50px; margin-bottom: 60px">
            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your cart items</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                <tr>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if(isset($_SESSION['cart'])){
                                    $subtotal = 0;
                                    $total_product =0;
                                    foreach ($_SESSION['cart'] as $key=>$value ){
                                    $subtotal = $subtotal + $value['pdt_price'];
                                    $total_product++;
                                    ?>
                                <tr class="cart_item">
                                    <td class="product-thumbnail" data-title="Product Name">
                                        <a class="prd-thumb" href="#">
                                            <figure><img width="113" height="113" src="admin/upload/<?php echo $value['pdt_image'];?>"
                                            alt="shipping
                                            cart"></figure>
                                        </a>
                                        <a class="prd-name" href="#"><?php
                                           echo $value['pdt_name'];?></a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol"></span><?php
                                                    echo $value['pdt_price']."tk";?></span></ins>
                                        </div>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity-box type1">
                                            <div class="qty-input">

                                                <form action="" method="post">
                                                    <input type="hidden" name="remove_product_name" value="<?php echo
                                                    $value['pdt_name'];?>">
                                                    <input class="btn btn-warning btn-block" type="submit"
                                                           name="remove_product"
                                                           value="Remove" >
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                            <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                        </div>
                                    </td>
                                </tr>
                                 <?php }}else{
                                    echo "Your cart is now empty!";
                                }?>
                                <tr class="cart_item wrap-buttons">
                                    <td class="wrap-btn-control" colspan="4">
                                        <a class="btn back-to-shop">Back to Shop</a>
                                        <button class="btn btn-update" type="submit" disabled>update</button>
                                        <button class="btn btn-clear" type="reset">clear all</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line">
                                <b class="stt-name">Subtotal <span class="sub">(<?php echo $total_product;?>)</span></b>
                                <span class="stt-price"><?php echo $subtotal;?></span>
                            </div>
                            <div class="subtotal-line">
                                <b class="stt-name">Shipping</b>
                                <span class="stt-price">£0.00</span>
                            </div>
                            <div class="tax-fee">
                                <p class="title">Est. Taxes & Fees</p>
                                <p class="desc">Based on 56789</p>
                            </div>
                            <div class="btn-checkout">
                                <a href="#" class="btn checkout">Check out</a>
                            </div>
                            <div class="biolife-progress-bar">
                                <table>
                                    <tr>
                                        <td class="first-position">
                                            <span class="index">$0</span>
                                        </td>
                                        <td class="mid-position">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="last-position">
                                            <span class="index">$99</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
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