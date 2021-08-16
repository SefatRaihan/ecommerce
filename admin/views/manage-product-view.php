<?php
    $obj_adminBack = new adminBack();
    $product_info = $obj_adminBack->displayProduct();
    if(isset($_GET['status'])){
        $product_id = $_GET['id'];
        if($_GET['status']=='delete'){
           $return_msg = $obj_adminBack->deleteProduct($product_id);
        }
    }

?>

<div class="container-fluid">
<h1>Manage Product</h1>
<?php
    if(isset($return_msg)){
        echo $return_msg;
    }
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>price</th>
            <th width="20%">Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Status</th>
            <th>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($product = mysqli_fetch_assoc($product_info) ) {
        ?>
                <tr>
                    <td><?php echo $product['pdt_id'];?></td>
                    <td><?php echo $product['pdt_name'];?></td>
                    <td><?php echo $product['pdt_price'];?></td>
                    <td width="20%"><?php echo $product['pdt_desc'];?></td>
                    <td> <img height="50px" width="50px" src="upload/<?php echo $product['pdt_image'];?>"></td>
                    <td><?php echo $product['ctg_name'];?></td>
                    <td>
                        <?php
                            if($product['pdt_status']==1){
                                echo "Published";
                            }else{
                                echo "Unpublished";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="edit-product.php?status=edit&&id=<?php echo $product['pdt_id']; ?>">Edit</a>
                        <a href="?status=delete&&id=<?php echo $product['pdt_id']; ?>">Delete</a>
                    </td>
                </tr>
    <?php
            }
    ?>
    </tbody>
</table>
</div>