<?php

include('../functions/common_func.php');
include('../include/connect.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abhishek's E-Commerece Website Checkout Page</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body style="background-color: #E0FBE2;">

    <!-- ------------------------------------------------------------ -->

    <div class="container">
        <h2 class="text-center B">Login Now</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-xl-6">
                <form action="" method="post" class="box-s">
                    <!-- Username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="mb-4">
                        <input type="submit" value="Login" name="user_login" class="bg-success text-light px-3 py-2 border-0 rounded mt-3 mb-3">
                        <a href='../index.php' class='bg-success px-3 py-2 rounded'>Continue Shopping</a>
                        <p class="mb-3 small fw-bold">Don't have an account ? <a class="text-danger fw-bold" href="../User/user_registration.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
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

if (isset($_POST['user_login'])) {


    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE User_name='$user_username'";
    $result_query = mysqli_query($con, $select_query);

    $row_count = mysqli_num_rows($result_query);
    $row_data = mysqli_fetch_assoc($result_query);
    $user_ip = getIPAddress();

    // form cart table ..................

    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_query_cart = mysqli_query($con, $select_query_cart);
    $result_query_cart_count = mysqli_num_rows($result_query_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;

        if (password_verify($user_password, $row_data['User_password'])) {

            if ($row_count > 0 and $result_query_cart_count == 0) {
                $_SESSION['username'] = $user_username;

                echo "<script>alert('You have logged in successfully !')</script>";
                echo "<script>window.open('./profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;

                echo "<script>alert('You have logged in successfully !')</script>";
                echo "<script>window.open('./checkout.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>