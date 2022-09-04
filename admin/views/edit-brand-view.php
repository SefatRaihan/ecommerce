<?php
$obj_adminBack = new adminBack();
if (isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=='edit'){
        $brand_info = $obj_adminBack->editBrand($id);
    }
}
if(isset($_POST['u-brand-btn'])){
    $update_msg = $obj_adminBack->updateBrand($_POST);
}

?>


<?php
    if (isset($update_msg)){
        echo $update_msg;
    }
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input
            hidden
            name="u_brand_id"
            class="form-control"
            value="<?php echo $brand_info['id']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="title">Product Name</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="<?php echo $brand_info['title']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="brand_image">Image</label>
        <input
            type="file"
            name="brand_image"
            class="form-control"
            value="<?php echo $brand_info['brand_image']; ?>"
        >
        <div class="border border-info m-3" style="width:15%">
            <img src="upload/brand/<?= $brand_info['brand_image'];?>" alt="<?= $brand_info['title']; ?>" width="150px" height="100px">
        </div>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="1" <?php echo ($brand_info['status'] == 1) ? 'selected' : ''; ?>>Published</option>
            <option value="0" <?php echo ($brand_info['status'] == 0) ? 'selected' : ''; ?>>Unpublished</option>
        </select>
    </div>
    <input
        type="submit"
        name="u-brand-btn"
        value="Update Product"
        class="btn btn-primary btn-block"

    >
</form>

