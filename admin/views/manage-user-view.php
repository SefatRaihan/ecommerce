<?php
    $obj_adminBack = new adminBack();
    $users_info = $obj_adminBack->displayUser();

    // if(isset($_GET['status'])){
    //     $user_id = $_GET['id'];
    //     if($_GET['status']=='delete'){
    //         $return_msg = $obj_adminBack->deleteBrand($user_id);
    //     }
    // }

?>

<div class="container-fluid">
<h1>User</h1>
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
                <th>User id</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                while ($user = mysqli_fetch_assoc($users_info) ) {
            ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $user['user_id'] ?? '';?></td>
                        <td><?php echo $user['userName'] ?? '';?></td>
                        <td><?php echo $user['user_email'] ?? '';?></td>
                        <td><?php echo $user['user_mobile'] ?? '';?></td>
                        <td>
                            <!-- <a href="?status=delete&&id=<?php echo $user['id']; ?>">Delete</a> -->
                        </td>
                    </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>   
</div>