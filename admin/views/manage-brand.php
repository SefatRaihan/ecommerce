<?php
    $obj_adminBack = new adminBack();
    $brands_info = $obj_adminBack->displayBrand();

    if(isset($_GET['status'])){
        $brand_id = $_GET['id'];
        if($_GET['status']=='delete'){
            $return_msg = $obj_adminBack->deleteBrand($brand_id);
        }
    }

?>

<div class="container-fluid">
<h1>Manage Brand</h1>
<?php
    if(isset($return_msg)){
        echo $return_msg;
    }
?>
<div class="table-responsive">
    <table class="table" border="1">
        <thead>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($brand = mysqli_fetch_assoc($brands_info) ) {
            ?>
                    <tr>
                        <td><?php echo $brand['id'];?></td>
                        <td><?php echo $brand['title'];?></td>
                        <td> <img height="70px" width="100px" src="upload/brand/<?php echo $brand['brand_image'];?>"></td>
                        <td>
                            <?php
                                if($brand['status']==1){
                                    echo "Published";
                                }else{
                                    echo "Unpublished";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="edit-brand.php?status=edit&&id=<?php echo $brand['id']; ?>">Edit</a>
                            <a href="?status=delete&&id=<?php echo $brand['id']; ?>">Delete</a>
                        </td>
                    </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>   
</div>