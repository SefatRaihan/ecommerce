<?php
    $obj_adminBack = new adminBack();
    $sliders_info = $obj_adminBack->displaySlider();
    if(isset($_GET['status'])){
        $product_id = $_GET['id'];
        if($_GET['status']=='delete'){
            $return_msg = $obj_adminBack->deleteSlider($product_id);
        }
    }

?>

<div class="container-fluid">
<h1>Manage Sliders</h1>
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
                <th width="20%">Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                while ($slider = mysqli_fetch_assoc($sliders_info) ) {
            ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $slider['title'];?></td>
                        <td width="20%"><?php echo $slider['slider_desc'];?></td>
                        <td> <img height="70px" width="100px" src="upload/sliders/<?php echo $slider['slider_image'];?>"></td>
                        <td>
                            <?php
                                if($slider['status']==1){
                                    echo "Published";
                                }else{
                                    echo "Unpublished";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="edit-sliders.php?status=edit&&id=<?php echo $slider['id']; ?>">Edit</a>
                            <a href="?status=delete&&id=<?php echo $slider['id']; ?>">Delete</a>
                        </td>
                    </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>
</div>