<?php
include('../include/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./fevi.png">
    <title>Abhishek's Admin Panel</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="overflow-x:hidden;">

    <div class="container-fluid p-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <h1 class="metal">
                    ▂▃▅█▓▒░ Abhishek's Shop ░▒▓█▅▃▂
                </h1>

                <!-- ------------------------------------------------------- -->

                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <ul class="navbar-nav me-auto">
                        <?php
                        if (!isset($_SESSION['admin_username'])) {

                            echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                        } else {

                            echo "<li class='nav-item'>
                     <a class='nav-link' href='./index.php'>Welcome " . $_SESSION['admin_username'] . "</a>
                      </li>";
                        }
                        ?>

                        <?php
                        if (!isset($_SESSION['admin_username'])) {

                            echo "<li class='nav-item'>
                    <a class='nav-link' href='./admin_login.php'>Login</a>
                    </li>";
                        } else {

                            echo "<li class='nav-item'>
                <a class='nav-link' href='./logout.php'>Logout</a>
                </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- ------------------------------------------------------- -->

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- ------------------------------------------------------- -->

        <div class="row p-0 Ad">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center admin_container">
                <div>

                    <?php

                    if (!isset($_SESSION['admin_username'])) {

                        echo "<img class='Admin Before_log' src='../User/user_images/Admin.png'>";
                    } else {

                        $username = $_SESSION['admin_username'];
                        $admin = "SELECT * FROM `admin_table` WHERE Admin_name='$username'";

                        $result_admin = mysqli_query($con, $admin);
                        $row_image = mysqli_fetch_array($result_admin);
                        $admin_image = $row_image['Admin_Image'];

                        echo "<a href='#!'><img class='Admin' src='../User/user_images/$admin_image' alt='$username'></a>'
                    <p class='text-center text-light my-3 Ad-name'>$username</p>";
                    }
                    ?>

                </div>
                <div class="button text-center">
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?insert_product" role="button">Insert Products</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?view_products" role="button">View Products</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="index.php?category" role="button">Insert Categories</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?view_categories" role="button">View Categories</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="index.php?brand" role="button">Insert Brands</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?view_brands" role="button">View Brands</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?orders_list" role="button">All Orders</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?payments_list" role="button">All Payments</a></button>
                    <button class="but"><a class="btn btn-primary btn-lg my-3 mx-2" href="./index.php?users_list" role="button">Users List</a></button>
                    <button class="but"><a class="btn btn-danger btn-lg my-3 mx-2" href="./logout.php" role="button">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------- -->

    <?php

    if (!isset($_SESSION['admin_username'])) {
        include('./admin_login.php');
    } else {

    ?>
        <div class="container my-3">
            <?php
            if (isset($_GET['category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['insert_product'])) {
                include('insert_products.php');
            }
            if (isset($_GET['view_products'])) {
                include('./view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('./edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('./delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('./view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('./view_brands.php');
            }
            if (isset($_GET['edit_categories'])) {
                include('./edit_categories.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('./edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('./delete_categories.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('./delete_brands.php');
            }
            if (isset($_GET['orders_list'])) {
                include('./orders_list.php');
            }
            if (isset($_GET['delete_order'])) {
                include('./delete_orders.php');
            }
            if (isset($_GET['payments_list'])) {
                include('./payments_list.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('./delete_payments.php');
            }
            if (isset($_GET['users_list'])) {
                include('./users_list.php');
            }
            if (isset($_GET['delete_user'])) {
                include('./delete_users.php');
            }
            ?>
        </div>
    <?php } ?>


    <footer class="text-center text-lg-start text-dark" style="background-color: #1679AB">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4 text-white" style="background-color: #141E46">
            <!-- Left -->
            <div class="me-5">
                <span>Get connected with us on social networks :</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="https://twitter.com/Abhishek_13107" class="text-white me-4" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/abhishek_v13/" class="text-white me-4" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/abhishek-verma-600899247/" class="text-white me-4" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/Abhishek5165" class="text-white me-4" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </section>

        <div class="text-center p-3 text-light" style="font-size:18px;">
            © 2024 Copyright :
            <a class="text-light" href="https://secret-inky.vercel.app/" target="_blank">abhishekverma.com</a>
        </div>
        <!-- Copyright -->
    </footer>
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