<?php

include('../functions/common_func.php');
include('../include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./fevi.png">
    <title>Admin Registration</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<style>
    body {
        overflow-x: hidden;
    }
</style>

<body>
    <div class="container-fluid m-3 admin_body">
        <h2 class="text-center mb-3 admin_login_heading">Admin Registration</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5 col-md-8">
                <img src="./products_images/register.avif" alt="Admin Registration" class="img-fluid r_img">
            </div>
            <div class="col-lg-6 col-xl-4 col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-3">
                        <label for="admin_username" class="form-label">Name</label>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your name" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-3">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" name="admin_email" placeholder="Enter email" class="form-control" required="required">
                    </div>

                    <div class="form-outline mb-3">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter password" class="form-control" required="required">
                    </div>

                    <div class="form-outline mb-3">
                        <label for="con_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="con_admin_password" name="con_admin_password" class="form-control" required="required">
                    </div>

                    <div class="form-outline mb-2">
                        <label for="admin_image" class="form-label">Admin Image</label>
                        <input type="file" id="admin_image" class="form-control" name="admin_image">
                    </div>

                    <div class="mb-2">
                        <input type="submit" value="Register" name="admin_register" class="bg-success text-light px-3 py-2 border-0 rounded mt-3 mb-3">

                        <p class="mb-3 small fw-bold">Already have an account ? <a class="text-danger fw-bold" href="./admin_login.php">Login</a></p>
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

if (isset($_POST['admin_register'])) {

    $username = $_POST['admin_username'];
    $email = $_POST['admin_email'];
    $image = $_FILES['admin_image']['name'];
    $temp_image = $_FILES['admin_image']['tmp_name'];
    $password = $_POST['admin_password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $con_password = $_POST['con_admin_password'];
    $admin_ip = getIPAddress();

    $select_query = "SELECT * FROM `admin_table` WHERE Admin_email='$email' OR Admin_ip='$admin_ip'";
    $result_query = mysqli_query($con, $select_query);

    $number_rows = mysqli_num_rows($result_query);

    if ($number_rows > 0) {

        echo "<script>alert('Admin already exist')</script>";
    } else if ($password != $con_password) {

        echo "<script>alert('Password do not match')</script>";
    } else {

        move_uploaded_file($temp_image, "../User/user_images/$image");
        $insert_quesry = "insert into `admin_table` (Admin_ip,Admin_name,Admin_email,Admin_password,Admin_image) values ('$admin_ip','$username','$email','$hash_password','$image')";
        $execute_query = mysqli_query($con, $insert_quesry);

        if ($execute_query) {
            echo "<script>alert('Registered Successful !')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
}
?>
