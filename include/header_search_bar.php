<div class="header-search-bar layout-01">
    <form action="#" class="form-search" name="desktop-seacrh" method="get">
        <input type="text" name="query" class="input-text" value="" placeholder="Search here...">
        <select name="category">
            <option value="-1" selected>All Categories</option>
            <?php
                foreach ($ctg_datas as $ctg_data){
            ?>
            <option value="vegetables"><a href="./category.php?status=catView&&id=<?php echo $ctg_data['id'];?>" class="menu-name" data-title="<?php echo $ctg_data['ctg_name'];?>"><?php echo $ctg_data['ctg_name'];?></a></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn-submit" value="search"><i class="biolife-icon icon-search"></i></button>
    </form>
</div>