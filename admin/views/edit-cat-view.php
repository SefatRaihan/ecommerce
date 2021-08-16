<?php
$obj_adminBack = new adminBack();

if(isset($_GET['status'])){
        $id = $_GET['id'];
        if (isset($_GET['status'])=='edit'){
           $return_data = $obj_adminBack->editCategory($id);
        }
}
if (isset($_POST['u-ctg-btn'])){
   $return_message = $obj_adminBack->updateCategory($_POST);
}

?>

<form action="" method="post">
    <div class="form-group">
        <input
            hidden
            type="text"
            name="u-ctg-id"
            class="form-control"
            value="<?php echo $return_data['id'];?>"
        >
    </div>
    <div class="form-group">
        <label for="u_ctg-name">Category Name</label>
        <input
            type="text"
            name="u-ctg-name"
            class="form-control"
            value="<?php echo $return_data['ctg_name'];?>"
        >
    </div>
    <div class="form-group">
        <label for="u_ctg-desc">Category Description</label>
        <input
            type="text"
            name="u-ctg-desc"
            class="form-control"
            value="<?php echo $return_data['ctg_desc'];?>"
        >
    </div>
    <input
        type="submit"
        name="u-ctg-btn"
        value="Update"
        class="btn btn-primary"
    >

    <?php
    if(isset($return_message)){
        echo $return_message;
    }
    ?>

</form>
