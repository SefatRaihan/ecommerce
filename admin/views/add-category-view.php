<?php
$obj_adminBack = new adminBack();
if (isset($_POST['ctg-btn'])){
    $return_message = $obj_adminBack->addCategory($_POST);
}

?>
<h1>Add Category</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="ctg-name">Category Name</label>
        <input
            type="text"
            name="ctg-name"
            class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="ctg-desc">Category Description</label>
        <input
                type="text"
                name="ctg-desc"
                class="form-control"
        >
    </div>
    <div class="form-group">
        <label for="ctg-status">Category Status</label>
        <select name="ctg-status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>

    <input
    type="submit"
    name="ctg-btn"
    value="Save"
    class="btn btn-primary"
    >

        <?php
            if(isset($return_message)){
                echo $return_message;
            }
        ?>


</form>
