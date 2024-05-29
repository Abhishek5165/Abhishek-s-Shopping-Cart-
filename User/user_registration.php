<?php
include("../include/connect.php");
include("../functions/common_func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">
</head>

<body style="background-color: #E0FBE2;">
    <div class="container">
        <h2 class="text-center B">Register Now</h2>
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 C">
                <form action="" method="post" enctype="multipart/form-data" class="box-s">
                    <!-- Username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" required="required" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    </div>

                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="con_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="con_user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="con_user_password">
                    </div>

                    <!-- User address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" required="required" name="user_address">
                    </div>

                    <!-- User number -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your phone number" required="required" name="user_contact">
                    </div>

                    <div class="mb-4">
                        <input type="submit" value="Register" name="user_register" class="bg-success text-light px-3 py-2 border-0 rounded mt-3 mb-3">
                        <a href='../index.php' class='bg-success px-3 py-2 mx-3 rounded continue'>Continue Shopping</a>
                        <p class="mb-3 small fw-bold">Already have an account ? <a class="text-danger fw-bold" href="/User/user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
div[style*="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"] {
    display: none !important;
}

img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    display: none !important;
}

a[href*="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
    display: none !important;
}
</style>
</body>

</html>

<?php

if (isset($_POST['user_register'])) {

    $username = $_POST['user_username'];
    $email = $_POST['user_email'];
    $image = $_FILES['user_image']['name'];
    $temp_image = $_FILES['user_image']['tmp_name'];
    $password = $_POST['user_password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $con_password = $_POST['con_user_password'];
    $address = $_POST['user_address'];
    $contact = $_POST['user_contact'];
    $user_ip = getIPAddress();

    $select_query = "SELECT * FROM `user_table` WHERE User_email='$email' OR User_mobile='$contact'";
    $result_query = mysqli_query($con, $select_query);

    $number_rows = mysqli_num_rows($result_query);

    if ($number_rows > 0) {

        echo "<script>alert('User already exist')</script>";
    } 
    else if($password != $con_password){

        echo "<script>alert('Password do not match')</script>";
    }
    else {

        move_uploaded_file($temp_image, "./user_images/$image");
        $insert_quesry = "insert into `user_table` (User_name,User_email,User_password,User_image,User_ip,User_address,User_mobile) values ('$username','$email','$hash_password','$image','$user_ip ','$address','$contact')";
        $execute_query = mysqli_query($con, $insert_quesry);
    }

    $select_cart_item = "SELECT *FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart_item = mysqli_query($con, $select_cart_item);

    $number_cart_items = mysqli_num_rows($result_cart_item);

    if($number_cart_items>0){
        $_SESSION['username'] = $username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('../checkout.php','_self')</script>";
    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>