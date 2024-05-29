<?php
include('../include/connect.php');
include('../functions/common_func.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./fevi.png">
    <title>Admin Login</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<style>
    /* body {
        overflow: hidden;
    } */
</style>

<body>
    <div class="container-fluid m-3 admin_body">
        <h2 class="text-center mb-5 admin_login_heading">Admin Login</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5 col-md-8">
                <img src="./products_images/login1.avif" alt="Admin Registration" class="img-fluid r_img">
            </div>
            <div class="col-lg-6 col-xl-4 col-md-8">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your name" class="form-control" required="required" autocomplete="off">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter password" class="form-control" required="required">
                    </div>

                    <div class="mb-4">
                        <input type="submit" value="Login" name="admin_login" class="bg-success text-light px-3 py-2 border-0 rounded mt-3 mb-3">

                        <p class="mb-3 small fw-bold">Don't have an account ? <a class="text-danger fw-bold" href="./admin_registration.php">Register</a></p>
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


if (isset($_POST['admin_login'])) {


    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE Admin_name='$admin_username'";
    $result_query = mysqli_query($con, $select_query);

    $row_count = mysqli_num_rows($result_query);
    $row_data = mysqli_fetch_array($result_query);
    $admin_ip = getIPAddress();

    echo $admin_password;

    if ($row_count > 0) {
        $_SESSION['admin_username'] = $admin_username;

        if (password_verify($admin_password, $row_data['Admin_password'])) {

            $_SESSION['admin_username'] = $admin_username;

            echo "<script>alert('You have logged in successfully !')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>