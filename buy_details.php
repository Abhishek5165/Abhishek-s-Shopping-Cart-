<?php
include("./include/connect.php");
include('./functions/common_func.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./fevi.png">
    <title>Abhishek's E-Commerece Website Cart Details</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- Navbaar -->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color:#198754">
            <div class="container-fluid">
                <h1 class="metal">
                    ▂▃▅█▓▒░ Abhishek's Shop ░▒▓█▅▃▂
                </h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all_products.php">Products</a>
                        </li>
                        <?php

                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                        <a class='nav-link' href='../User/profile.php'>My Account</a></li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='../User/user_registration.php'>Register</a></li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buy_details.php"><i class="fa-solid fa-cart-arrow-down">
                                    <sup>
                                        <?php cart_items(); ?>
                                    </sup></i></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="./search.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search Products" name="search_data" aria-label="Search">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
                    </form>
                </div>
            </div>
        </nav>

        <!-- --------------------------------------------------------------------- -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {

                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                } else {

                    echo "<li class='nav-item'>
                <a class='nav-link' href='../User/profile.php'>Welcome " . $_SESSION['username'] . "</a>
                </li>";
                }
                ?>

                <?php
                if (!isset($_SESSION['username'])) {

                    echo "<li class='nav-item'>
                    <a class='nav-link' href='/User/user_login.php'>Login</a>
                    </li>";
                } else {

                    echo "<li class='nav-item'>
                <a class='nav-link' href='../User/logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>

        <!-- ------------------------------------------------------------------- -->

        <div class="mt-3">
            <h3 class="text-center text-warning fw-bolder">Buy Now !!</h3>
            <p class="text-center">
                Always deliver more than expected !
            </p>
        </div>

        <!-- ------------------------------------------------------------ -->

        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered text-center">

                            <?php
                            global $con;
                            $total = 0;
                            $ip = getIPAddress();
                            $select_query = "Select * from `cart_details` where ip_address='$ip'";
                            $result_query = mysqli_query($con, $select_query);
                            $count_result = mysqli_num_rows($result_query);

                            if ($count_result > 0) {

                                echo " <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Total-Price</th>
            <th>Remove</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody class='text-center'>";

                                while ($row = mysqli_fetch_array($result_query)) {

                                    $product_id = $row['products_id'];
                                    $select_products = "Select * from `products` where products_id=$product_id";
                                    $result_products = mysqli_query($con, $select_products);

                                    while ($row_product_price = mysqli_fetch_array($result_products)) {

                                        $product_price = array($row_product_price['Product_price']);
                                        $price_table = $row_product_price['Product_price'];
                                        $product_title = $row_product_price['Product_title'];
                                        $product_image1 = $row_product_price['Product_Image1'];
                                        $product_price_values = array_sum($product_price);
                                        $total += $product_price_values;
                            ?>

                                        <tr>
                                            <td><?php echo $product_title ?></td>
                                            <td class="product_img"><img src="./Admin/products_images/<?php echo $product_image1 ?>" alt=""></td>


                                            <td><?php echo $price_table ?>/-</td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>

                                            <td>
                                                <input type="submit" value="Remove" name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3 rounded mt-3">
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            } else {

                                echo "<h2 class='No_CB'>Cart is Empty !</h2>";
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex mb-5">

                        <?php

                        $ip = getIPAddress();
                        $select_query = "Select * from `cart_details` where ip_address='$ip'";
                        $result_query = mysqli_query($con, $select_query);
                        $count_result = mysqli_num_rows($result_query);

                        if ($count_result > 0) {

                            echo "<h4 class='px-3 card-body'>Subtotal : <strong>$total/-</strong></h4>
                            <a href='index.php' class='bg-success px-3 py-2 mx-3 rounded'>Continue Shopping</a>
                            <a href='/User/checkout.php' class='bg-dark px-3 py-2 rounded'>Checkout</a>";
                        } else {

                            echo "<a href='index.php' class='bg-success px-3 py-2 mx-auto rounded'>Continue Shopping</a>";
                        }
                        ?>
                    </div>
            </div>
        </div>
        </form>

        <!-- < remove items > -->

        <?php
        function remove_items()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {

                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where products_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);

                    if ($run_delete) {

                        echo "<script>window.open('buy_details.php','_self')</script>";
                    }
                }
            }
        }

        echo $remove = remove_items();
        ?>



        <!-- ------------------------------------------------------ -->


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