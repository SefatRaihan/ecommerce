<?php
    $obj_adminBack = new adminBack();
    if (isset($_POST['brand-btn'])){
        $return_msg = $obj_adminBack->addBrand($_POST);
    }
?>

<h1>Add Brand</h1>
<?php
if (isset($return_msg)){
    echo $return_msg;
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ctg-name">Title</label>
        <input
            type="text"
            name="title"
            class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="brand-image">Image</label>
        <input
                type="file"
                name="brand_image"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>

    <input
    type="submit"
    name="brand-btn"
    value="Save"
    class="btn btn-primary"
    >


</form>
