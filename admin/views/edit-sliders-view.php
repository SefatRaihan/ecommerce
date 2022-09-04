<?php
$obj_adminBack = new adminBack();
if (isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=='edit'){
        $slider_info = $obj_adminBack->editSlider($id);
    }
}
if(isset($_POST['u-slider-btn'])){
    $update_msg = $obj_adminBack->updateSlider($_POST);
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
            name="u_slider_id"
            class="form-control"
            value="<?php echo $slider_info['id']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="title">Product Name</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="<?php echo $slider_info['title']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="slider_desc">Description</label>
        <input class="form-control" name="slider_desc" value="<?php echo $slider_info['slider_desc']; ?>">
    </div>
    <div class="form-group">
        <label for="slider_image">Image</label>
        <input
            type="file"
            name="slider_image"
            class="form-control"
            value="<?php echo $slider_info['slider_image']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="1" <?php echo ($slider_info['status'] == 1) ? 'selected' : ''; ?>>Published</option>
            <option value="0" <?php echo ($slider_info['status'] == 0) ? 'selected' : ''; ?>>Unpublished</option>
        </select>
    </div>
    <input
        type="submit"
        name="u-slider-btn"
        value="Update Product"
        class="btn btn-primary btn-block"

    >
</form>

