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
        
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
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

        $query = "INSERT INTO categories (ctg_name,ctg_desc,ctg_status) VALUE ('$ctg_name','$ctg_desc', $ctg_status)";

        if(mysqli_query($this->conn,$query)){
            $message = "Category added successfully";
            return $message;
        }else{
            $message = "Category added failed";
            return $message;
        }
    }

    function displayCategory(){
        $query = "SELECT * FROM categories";

        if(mysqli_query($this->conn,$query)){
            $return_ctg = mysqli_query($this->conn,$query);
        }
        return $return_ctg;
    }

    function displayedPublishCategory(){
        $query = "SELECT * FROM categories WHERE ctg_status=1";

        if(mysqli_query($this->conn,$query)){
            $return_ctg = mysqli_query($this->conn,$query);
        }
        return $return_ctg;
    }

    function publishCategory($id){
        $query = "UPDATE categories SET ctg_status=1 WHERE id=$id";
        mysqli_query($this->conn,$query);
    }
    function unpublishedCategory($id){
        $query = "UPDATE categories SET ctg_status=0 WHERE id=$id";
        mysqli_query($this->conn,$query);
    }

    function  deleteCategory($id){
        $query = "DELETE FROM categories WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            $msg = "Delete successfully";
        }
        return $msg;
    }

    function editCategory($id){
        $query ="SELECT * FROM categories WHERE id=$id";
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

        $query = "UPDATE categories SET ctg_name='$u_ctg_name',ctg_desc='$u_ctg_desc' WHERE id=$u_ctg_id";

        if (mysqli_query($this->conn,$query)){
            $message = "Category updated successfully";

        }
        return $message;
    }

    function addSlider($data){
        $title = $data['title'];
        $slider_desc = $data['slider_desc'];
        $slider_image_name = $_FILES['slider_image']['name'];
        $slider_image_size = $_FILES['slider_image']['size'];
        $slider_image_tmp_name = $_FILES['slider_image']['tmp_name'];
        $slider_image_extn = pathinfo($slider_image_name, PATHINFO_EXTENSION);
        $slider_status = $data['status'];

        if($slider_image_extn ==  'jpg' or $slider_image_extn == 'png' or $slider_image_extn == 'jpeg'){
            if ($slider_image_size <= '2097152'){
                $query = "INSERT INTO sliders (title,slider_desc,slider_image,status) VALUE ('$title','$slider_desc','$slider_image_name',$slider_status)";

                if (mysqli_query($this->conn, $query)){
                    move_uploaded_file($slider_image_tmp_name, 'upload/sliders/'.$slider_image_name);
                    $msg = "Your Slider  uploaded successfully";
                    return $msg;
                }
            }
        }else{
            $msg = "Your file must be a JPG, PNG or JPEG";
            return $msg;
        }
    }

    function displaySlider(){
        $query = "SELECT * FROM sliders";
        if (mysqli_query($this->conn,$query)){
            $slider = mysqli_query($this->conn,$query);

        }
        return $slider;
    }

    function deleteSlider($id){
        $query = "DELETE FROM sliders WHERE id =$id";
        if(mysqli_query($this->conn, $query)){
            $message = "Delete Successful!";
            return $message;
        }
    }

    function editSlider($id){
        $query = "SELECT * FROM sliders WHERE id=$id";
        if (mysqli_query($this->conn,$query)){
            $slider_info = mysqli_query($this->conn,$query);
            $slider_data = mysqli_fetch_assoc($slider_info);
            return $slider_data;
        }
    }

    function updateSlider($data){
        $id = $data['u_slider_id'];
        $title = $data['title'];
        $slider_desc = $data['slider_desc'];
        $image_name = $_FILES['slider_image']['name'];
        $image_size = $_FILES['slider_image']['size'];
        $image_tmp_name = $_FILES['slider_image']['tmp_name'];
        $image_extn = pathinfo($image_name, PATHINFO_EXTENSION);
        $status = $data['status'];

            if($image_extn ==  'jpg' or $image_extn == 'png' or $image_extn == 'jpeg')
            {
                if ($image_size <= '2097152'){
                        $query = "UPDATE sliders SET title='$title',slider_desc='$slider_desc',slider_image='$image_name',status='$status' WHERE id=$id";
                        if (mysqli_query($this->conn, $query)){
                            move_uploaded_file($image_tmp_name, 'upload/sliders/'.$image_name);
                            $msg = "Your Slider uploaded successfully";
                            return $msg;
                        }
                }
            }else{
                $msg = "Your file must be a JPG, PNG or JPEG";
                return $msg;
            }
    }


    function addBrand($data){
        $title = $data['title'];
        $brand_image_name = $_FILES['brand_image']['name'];
        $brand_image_size = $_FILES['brand_image']['size'];
        $brand_image_tmp_name = $_FILES['brand_image']['tmp_name'];
        $brand_image_extn = pathinfo($brand_image_name, PATHINFO_EXTENSION);
        $status = $data['status'];

        if($brand_image_extn ==  'jpg' or $brand_image_extn == 'png' or $brand_image_extn == 'jpeg'){
            if ($brand_image_size <= '2097152'){
                $query = "INSERT INTO brands (title,brand_image,status) VALUE ('$title','$brand_image_name',$status)";

                if (mysqli_query($this->conn, $query)){
                    move_uploaded_file($brand_image_tmp_name, 'upload/brand/'.$brand_image_name);
                    $msg = "Your Brand  uploaded successfully";
                    return $msg;
                }
            }
        }else{
            $msg = "Your file must be a JPG, PNG or JPEG";
            return $msg;
        }
    }

    
    function displayBrand(){
        $query = "SELECT * FROM brands";
        if (mysqli_query($this->conn,$query)){
            $brand = mysqli_query($this->conn,$query);

        }
        return $brand;
    }

    function editBrand($id){
        $query = "SELECT * FROM brands WHERE id=$id";
        if (mysqli_query($this->conn,$query)){
            $brand_info = mysqli_query($this->conn,$query);
            $brand_data = mysqli_fetch_assoc($brand_info);
            return $brand_data;
        }
    }

    function updateBrand($data){
        $id = $data['u_brand_id'];
        $title = $data['title'];
        $image_name = $_FILES['brand_image']['name'];
        $image_size = $_FILES['brand_image']['size'];
        $image_tmp_name = $_FILES['brand_image']['tmp_name'];
        $image_extn = pathinfo($image_name, PATHINFO_EXTENSION);
        $status = $data['status'];

            if($image_extn ==  'jpg' or $image_extn == 'png' or $image_extn == 'jpeg')
            {
                if ($image_size <= '2097152'){
                        $query = "UPDATE brands SET title='$title',brand_image='$image_name',status='$status' WHERE id=$id";
                        if (mysqli_query($this->conn, $query)){
                            move_uploaded_file($image_tmp_name, 'upload/brand/'.$image_name);
                            $msg = "Your Brand uploaded successfully";
                            return $msg;
                        }
                }
            }else{
                $msg = "Your file must be a JPG, PNG or JPEG";
                return $msg;
            }
    }

    function deleteBrand($id){
        $query = "DELETE FROM brands WHERE id =$id";
        if(mysqli_query($this->conn, $query)){
            $message = "Delete Successful!";
            return $message;
        }
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
                $query = "INSERT INTO products (pdt_name,pdt_price,pdt_category,pdt_desc,pdt_image,pdt_status) VALUE ('$pdt_name',$pdt_price,'$pdt_category','$pdt_desc','$pdt_image_name',$pdt_status)";

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
        $query = "DELETE FROM products WHERE pdt_id =$id";
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

        $id = $data['u-pdt-id'];
        $name = $data['u-pdt-name'];
        $price = $data['u-pdt-price'];
        $category = $data['u-pdt-category'];
        $desc = $data['u-pdt-desc'];
        $image_name = $_FILES['u-pdt-image']['name'];
        $image_size = $_FILES['u-pdt-image']['size'];
        $image_tmp_name = $_FILES['u-pdt-image']['tmp_name'];
        $image_extn = pathinfo($image_name, PATHINFO_EXTENSION);
        $status = $data['u-pdt-status'];

            if($image_extn ==  'jpg' or $image_extn == 'png' or $image_extn == 'jpeg')
            {
                if ($image_size <= '2097152'){
                        $query = "UPDATE products SET pdt_name='$name',pdt_price=$price,pdt_category=$category,pdt_desc='$desc',pdt_image='$image_name',pdt_status='$status' WHERE pdt_id=$id";
                        if (mysqli_query($this->conn, $query)){
                            move_uploaded_file($image_tmp_name, 'upload/'.$image_name);
                            $msg = "Your Product updated successfully";
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
    function  category_by_id($id){
        $query = "SELECT * FROM product_info_category WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            $proinfo = mysqli_query($this->conn,$query);
            $ctg = mysqli_fetch_assoc($proinfo);
            return $ctg;
        }
    }

    function displayedPublishedSlider(){
        $query = "SELECT * FROM sliders WHERE status=1";

        if(mysqli_query($this->conn,$query)){
            $return_sliders = mysqli_query($this->conn,$query);
        }
        return $return_sliders;
    }

    function displayedPublishedBrand(){
        $query = "SELECT * FROM brands WHERE status=1";

        if(mysqli_query($this->conn,$query)){
            $return_sliders = mysqli_query($this->conn,$query);
        }
        return $return_sliders;
    }
    
    function userRegister($data){
        $userName       = $data['user_name'];
        $userFirstName  = $data['first_name'];
        $userLastName   = $data['last_name'];
        $userEmail      = $data['user_email'];
        $userPassword   = md5($data['user_pass']);
        $userMobile     = $data['user_mobile'];
        $userRoles      = $data['user_roles'];

        $get_user_data = "SELECT * FROM users WHERE user_name='$userName' or user_email = '$userEmail'";
        $sendData = mysqli_query($this->conn, $get_user_data);
        $row = mysqli_num_rows($sendData);
        if($row == 1){
            $msg = "This Username or Email Already Exist!";
            return $msg;
        }else{
            if(strlen($userMobile) < 11 or strlen($userMobile) > 11)
            {
                $msg = "Your Mobile Number is not valid";
            }
        }

        $query="INSERT INTO users SET userName='$userName', first_name='$userFirstName', last_name='$userLastName', user_email='$userEmail', user_password='$userPassword', user_mobile=$userMobile, user_roles=$userRoles";
        
        if(mysqli_query($this->conn, $query)){
            $msg = "Your account registered successfully";
            return $msg;
        }else{
            $msg = "Registration failed";
            return $msg;
        }
        
    }

    function userLogin($data)
    {
        $user_email = $data['user_email'];
        $user_password = md5($data['user_password']);

        $query = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";

        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);
            $user_info = mysqli_fetch_assoc($result);
            

            if ($user_info){
                header('location:user_profile.php');
                session_start();
                $_SESSION['user_id'] = $user_info['user_id'];
                $_SESSION['user_email'] = $user_info['user_email'];
                $_SESSION['user_password'] = $user_info['user_password'];
                $_SESSION['user_name'] = $user_info['userName'];
            } else {
                $error =  "your email or password is incorrect";
            }

        }

    }

    function userLogout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_name']);
        header('location:user_login.php');
    }

    function userProfile(){
        $query = "SELECT * FROM users";
        if (mysqli_query($this->conn,$query)){
            $profile = mysqli_query($this->conn,$query);

        }
        return $profile;
    }

    function contact($data)
    {
        $UserName = $data['UName'];
        $Email = $data['Email'];
        $Subject = $data['Subject'];
        $Msg = $data['msg'];

        if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
        {
            header('location:index.php?error');
        }
        else
        {
            $to = "sefat.pondit@gmail.com";

            if(mail($to,$Subject,$Msg,$Email))
            {
                header("location:index.php?success");
            }
        }
    }

 // function searchbar($query){
    //     $min_length = 3;
	
	//     if(strlen($query) >= $min_length){ 
            
    //         // $query = htmlspecialchars($query); 
    //         // $query = mysqli_real_escape_string($query);
		
	// 	    $query = "SELECT * FROM products WHERE (`pdt_name` LIKE '%".$query."%')";
			
    //         if(mysqli_query($this->conn, $query)) 
    //         {
    //             $raw_results = mysqli_query($this->conn, $query);
    //             if(mysqli_num_rows($raw_results) > 0)
    //             { 
			
    //                 while($results = mysqli_fetch_array($raw_results)){
    //                     return $results;
    //                 }
                    
    //             }
    //             else
    //             { 
    //                 echo "No results";
    //             }
                    
    //         }
		
    //     }
    //     else{
    //         echo "Minimum length is ".$min_length;
    //     }
    // }   


}