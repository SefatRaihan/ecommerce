<?php

class adminBack
{

    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "ecommerce";

        $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if(!$this->conn) {
            die("Database Connection Error!");
        }


        }


    function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['password']);

        $query = "SELECT * FROM admin_log WHERE admin_email = '$admin_email' AND password = '$admin_pass'";

        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);
            $admin_info = mysqli_fetch_assoc($result);

            if ($admin_info){
                header('location:dashboard.php');
                session_start();
                $_SESSION['id'] = $admin_info['id'];
                $_SESSION['adminEmail'] = $admin_info['admin_email'];
                $_SESSION['adminPass'] = $admin_info['password'];

            } else {
                echo "your username or password is incorrect";
            }

        }

    }

    function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['adminEmail']);
        unset($_SESSION['adminPass']);
        header('location:index.php');
    }

    function addCategory($data){
        $ctg_name = $data['ctg-name'];
        $ctg_desc = $data['ctg-desc'];
        $ctg_status = $data['ctg-status'];

        $query = "INSERT INTO category (ctg_name,ctg_desc,ctg_status) VALUE ('$ctg_name','$ctg_desc', $ctg_status)";

        if(mysqli_query($this->conn,$query)){
            $message = "Category added successfully";
            return $message;
        }else{
            $message = "Category added failed";
            return $message;
        }
    }

    function displayCategory(){
        $query = "SELECT * FROM category";

        if(mysqli_query($this->conn,$query)){
            $return_ctg = mysqli_query($this->conn,$query);
        }
        return $return_ctg;
    }
    function displayedPublishCategory(){
        $query = "SELECT * FROM category WHERE ctg_status=1";

        if(mysqli_query($this->conn,$query)){
            $return_ctg = mysqli_query($this->conn,$query);
        }
        return $return_ctg;
    }

    function publishCategory($id){
        $query = "UPDATE category SET ctg_status=1 WHERE id=$id";
        mysqli_query($this->conn,$query);
    }
    function unpublishedCategory($id){
        $query = "UPDATE category SET ctg_status=0 WHERE id=$id";
        mysqli_query($this->conn,$query);
    }

    function  deleteCategory($id){
        $query = "DELETE FROM category WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            $msg = "Delete successfully";
        }
        return $msg;
    }

    function editCategory($id){
        $query ="SELECT * FROM category WHERE id=$id";
        if (mysqli_query($this->conn,$query)){
            $cat_info = mysqli_query($this->conn,$query);
            $cat_data = mysqli_fetch_assoc($cat_info);
            return $cat_data;
        }
    }
    function updateCategory($receive_data){
        $u_ctg_name = $receive_data['u-ctg-name'];
        $u_ctg_desc = $receive_data['u-ctg-desc'];
        $u_ctg_id = $receive_data['u-ctg-id'];

        $query = "UPDATE category SET ctg_name='$u_ctg_name',ctg_desc='$u_ctg_desc' WHERE id=$u_ctg_id";

        if (mysqli_query($this->conn,$query)){
            $message = "Category updated successfully";

        }
        return $message;
    }

    function addProduct($data){
        $pdt_name = $data['pdt-name'];
        $pdt_price = $data['pdt-price'];
        $pdt_category = $data['pdt-category'];
        $pdt_desc = $data['pdt-desc'];
        $pdt_image_name = $_FILES['pdt-image']['name'];
        $pdt_image_size = $_FILES['pdt-image']['size'];
        $pdt_image_tmp_name = $_FILES['pdt-image']['tmp_name'];
        $pdt_image_extn = pathinfo($pdt_image_name, PATHINFO_EXTENSION);
        $pdt_status = $data['pdt-status'];

        if($pdt_image_extn ==  'jpg' or $pdt_image_extn == 'png' or $pdt_image_extn == 'jpeg'){
            if ($pdt_image_size <= '2097152'){
                $query = "INSERT INTO product (pdt_name,pdt_price,pdt_category,pdt_desc,pdt_image,pdt_status) VALUE ('$pdt_name',$pdt_price,'$pdt_category','$pdt_desc','$pdt_image_name',$pdt_status)";
                if (mysqli_query($this->conn, $query)){
                    move_uploaded_file($pdt_image_tmp_name, 'upload/'.$pdt_image_name);
                    $msg = "Your Product  uploaded successfully";
                    return $msg;
                }
            }
        }else{
            $msg = "Your file must be a JPG, PNG or JPEG";
            return $msg;
        }
    }

    function displayProduct(){
        $query = "SELECT * FROM product_info_category";
        if (mysqli_query($this->conn,$query)){
            $product = mysqli_query($this->conn,$query);

        }
        return $product;
    }

    function deleteProduct($id){
        $query = "DELETE FROM product WHERE pdt_id =$id";
        if(mysqli_query($this->conn, $query)){
            $message = "Delete Successful!";
            return $message;
        }
    }
    function editProductInfo($id){
        $query = "SELECT * FROM product_info_category WHERE pdt_id=$id";
        if (mysqli_query($this->conn,$query)){
            $product_info = mysqli_query($this->conn,$query);
            $product_data = mysqli_fetch_assoc($product_info);
            return $product_data;
        }
    }

    function updateProduct($data){
        $u_pdt_id = $data['u-pdt-id'];
        $u_pdt_name = $data['u-pdt-name'];
        $u_pdt_price = $data['u-pdt-price'];
        $u_pdt_category = $data['u-pdt-category'];
        $u_pdt_desc = $data['u-pdt-desc'];
        $u_pdt_image_name = $_FILES['u-pdt-image']['name'];
        $u_pdt_image_size = $_FILES['u-pdt-image']['size'];
        $u_pdt_image_tmp_name = $_FILES['u-pdt-image']['tmp_name'];
        $u_pdt_image_extn = pathinfo($u_pdt_image_name, PATHINFO_EXTENSION);
        $u_pdt_status = $data['u-pdt-status'];

        if($u_pdt_image_extn ==  'jpg' or $u_pdt_image_extn == 'png' or $u_pdt_image_extn == 'jpeg'){
            if ($u_pdt_image_size <= '2097152'){
                $query = "UPDATE product SET pdt_name='$u_pdt_name',pdt_price=$u_pdt_price,pdt_category=$u_pdt_category,pdt_desc='$u_pdt_desc',pdt_image='$u_pdt_image_name',pdt_status='$u_pdt_status' WHERE pdt_id=$u_pdt_id";
                if (mysqli_query($this->conn, $query)){
                    move_uploaded_file($u_pdt_image_tmp_name, 'upload/'.$u_pdt_image_name);
                    $msg = "Your Product uploaded successfully";
                    return $msg;
                }
            }
        }else{
            $msg = "Your file must be a JPG, PNG or JPEG";
            return $msg;
        }
    }

    function product_by_category($id){
        $query = "SELECT * FROM product_info_category WHERE id =$id";
        if (mysqli_query($this->conn, $query)){
            $product_info = mysqli_query($this->conn, $query);
            return $product_info;
        }
    }

    function product_by_id($id){
        $query = "SELECT * FROM product_info_category WHERE pdt_id=$id";
        if (mysqli_query($this->conn, $query)){
            $product_info = mysqli_query($this->conn, $query);
            return $product_info;
        }
    }

    function related_product($id){
        $query = "SELECT * FROM product_info_category WHERE id=$id ORDER BY pdt_id DESC";
       if(mysqli_query($this->conn,$query)){
           $proinfo = mysqli_query($this->conn,$query);
           return $proinfo;
       }
    }
    function category_by_id($id){
        $query = "SELECT * FROM product_info_category WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            $proinfo = mysqli_query($this->conn,$query);
            $ctg = mysqli_fetch_assoc($proinfo);
            return $ctg;
        }
    }

}