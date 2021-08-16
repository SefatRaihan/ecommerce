<?php
    $obj_adminBack = new adminBack();
    $ctg_info =  $obj_adminBack->displayedPublishCategory();
    if (isset($_POST['pdt-btn'])){
      $return_msg = $obj_adminBack->addProduct($_POST);
    }
?>

<h1>Add Product</h1>
<?php
if (isset($return_msg)){
    echo $return_msg;
}
?>
<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pdt-name">Product Name</label>
        <input
                type="text"
                name="pdt-name"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="pdt-price">Product Price</label>
        <input
                type="number"
                name="pdt-price"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="pdt-category">Product Category</label>
        <select name="pdt-category" class="form-control">
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
        <label for="pdt-desc">Product Description</label>
        <textarea class="form-control" name="pdt-desc" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="pdt-image">Product Image</label>
        <input
                type="file"
                name="pdt-image"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="pdt-status">Product Status</label>
        <select name="pdt-status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input
            type="submit"
            name="pdt-btn"
            value="Add Product"
            class="btn btn-primary btn-block"

    >
</form>

