<div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
    <div class="container">
        <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 1}}]}'>
            <?php foreach($brands as $brand){ ?>
            <li>
                <div class="biolife-brd-container">
                    <a href="#" class="link">
                        <figure><img src="./admin/upload/brand/<?= $brand['brand_image'] ?>" width="150" height="70" alt="<?= $brand['title']; ?>"></figure>
                    </a>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>