<?php
$obj_adminBack = new adminBack();
$ctg_info =  $obj_adminBack->displayCategory();
if (isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=='edit'){
      $pdt_info = $obj_adminBack->editProductInfo($id);
    }
}
if(isset($_POST['u-pdt-btn'])){
   $update_msg = $obj_adminBack->updateProduct($_POST);
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
            name="u-pdt-id"
            class="form-control"
            value="<?php echo $pdt_info['pdt_id']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="u-pdt-name">Product Name</label>
        <input
            type="text"
            name="u-pdt-name"
            class="form-control"
            value="<?php echo $pdt_info['pdt_name']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="u-pdt-price">Product Price</label>
        <input
            type="number"
            name="u-pdt-price"
            class="form-control"
            value="<?php echo $pdt_info['pdt_price']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="u-pdt-category">Product Category</label>
        <select name="u-pdt-category" class="form-control">
            <option value="">Please select a category</option>
            <?php
            while ($ctg_data = mysqli_fetch_assoc($ctg_info)) {
                ?>
                <option value="<?php echo $ctg_data['id']; ?>"><?php echo $ctg_data['ctg_name']; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="u-pdt-desc">Product Description</label>
        <input class="form-control" name="u-pdt-desc" value="<?php echo $pdt_info['pdt_desc']; ?>">
    </div>
    <div class="form-group">
        <label for="u-pdt-image">Product Image</label>
        <input
            type="file"
            name="u-pdt-image"
            class="form-control"
            value="<?php echo $pdt_info['pdt-image']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="u-pdt-status">Product Status</label>
        <select name="u-pdt-status" class="form-control">
            <option value="1" <?php echo ($pdt_info['pdt_status'] == 1) ? 'selected' : ''; ?>>Published</option>
            <option value="0" <?php echo ($pdt_info['pdt_status'] == 1) ? 'selected' : ''; ?>pdt_>Unpublished</option>
        </select>
    </div>
    <input
        type="submit"
        name="u-pdt-btn"
        value="Update Product"
        class="btn btn-primary btn-block"

    >
</form>

