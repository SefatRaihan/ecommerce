<div class="main-slide block-slider nav-change">
    <ul class="biolife-carousel" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": false, "speed": 800}' >
        <?php foreach($sliders as $slider){ ?>
        <li>
            <div class="slide-contain slider-opt03__layout02 slide_animation type_02">
                <div class="media background-geen-01" style="background-image: url('./admin/upload/sliders/<?php echo $slider['slider_image']?>');"></div>
                <div class="text-content">
                    <i class="first-line">Pomegranate</i>
                    <h3 class="second-line"><?= $slider['title'] ?></h3>
                    <p class="third-line"><?= $slider['slider_desc'] ?></p>
                    <p class="buttons">
                        <a href="#" class="btn btn-bold">Shop now</a>
                        <a href="#" class="btn btn-thin">View lookbook</a>
                    </p>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>