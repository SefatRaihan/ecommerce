<?php
    $obj_adminBack = new adminBack();
    if (isset($_POST['slider-btn'])){
        $return_msg = $obj_adminBack->addSlider($_POST);
    }
?>

<h1>Add Slider</h1>
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
        <label for="slider_desc">Description</label>
        <input
                type="text"
                name="slider_desc"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="pdt-image">Image</label>
        <input
                type="file"
                name="slider_image"
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
    name="slider-btn"
    value="Save"
    class="btn btn-primary"
    >


</form>
