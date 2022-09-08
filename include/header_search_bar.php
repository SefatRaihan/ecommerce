<?php

// $get =  $_GET['query'];

?>

<div class="header-search-bar layout-01">
    <form action="" class="form-search" name="desktop-seacrh" method="GET">
        <input type="text" name="query" class="input-text" value="" placeholder="Search here...">
        <select name="category">
            <option value="-1" selected>All Categories</option>
            <?php
                foreach ($ctg_datas as $ctg_data){
            ?>
            <option value="vegetables"><a href="./category.php?status=catView&&id=<?php echo $ctg_data['id'];?>" class="menu-name" data-title="<?php echo $ctg_data['ctg_name'];?>"><?php echo $ctg_data['ctg_name'];?></a></option>
            <?php } ?>
        </select>
        <input type="submit" class="search btn-submit" value="search">
    </form>
</div>

<style>
    .search{
        background-color: #7faf51 !important;
        padding:24px 25px 23px 15px !important;
        /* font-weight: bold; */
        color: white !important;
        /* margin-bottom:0; */
        position: absolute !important;
        top: 0 !important;

    }
    .search:hover{
        background-color: #ffff !important;
        color: #7faf51 !important;
        border:1px solid #7faf51 !important;
    }
</style>