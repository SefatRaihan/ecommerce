<?php
    $obj_adminBack = new adminBack();
    $category_data = $obj_adminBack->displayCategory();

    if(isset($_GET['status'])){
        $id = $_GET['id'];
        if($_GET['status']=='publish'){
            $obj_adminBack->publishCategory($id);
        }elseif ($_GET['status']=='unpublished'){
            $obj_adminBack->unpublishedCategory($id);
        }elseif ($_GET['status']=='delete'){
            $msg = $obj_adminBack->deleteCategory($id);
        }

    }
?>

<table class="table">
    <thead>
        <tr>
            <th>Category Id</th>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
            <th>Delete/Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($category = mysqli_fetch_assoc($category_data)) {
        ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['ctg_name']; ?></td>
                    <td><?php echo $category['ctg_desc']; ?></td>
                    <td>
                        <?php
                            if ($category['ctg_status']== 0) {
                                echo "Unpublished";
                        ?>
                        <a class="btn btn-sm btn-success" href="?status=publish&&id=<?php echo $category['id']; ?>">Make Publish</a>
                        <?php
                            }else{
                                echo "Published";
                        ?>
                        <a class="btn btn-sm btn-danger" href="?status=unpublished&&id=<?php echo $category['id']; ?>">Make Unpublished</a>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <a href="edit-cat.php?status=edit&&id=<?php echo $category['id']; ?>">Edit</a>
                        <a href="?status=delete&&id=<?php echo $category['id']; ?>">Delete</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
if (isset($msg)){
    echo $msg;
}
?>
