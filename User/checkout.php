<?php
session_start();
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../User/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact Us</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="../search.php" method="get">
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
                <a class='nav-link' href='./logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>


        <!-- ------------------------------------------------------------ -->

        <div class="row m-auto">
            <div class="col m-auto">
                <div class="row m-auto">

                    <?php
                    if (!isset($_SESSION['username'])) {

                        include('./user_login.php');
                    } else {

                        include('./payment.php');
                    }
                    ?>

                </div>
            </div>
        </div>

        <!-- footer -->

        <footer class="text-center text-lg-start text-dark" style="background-color: #41B06E">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-3 text-white" style="background-color: #141E46">
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

            <div class="text-center p-2 text-light" style="font-size:18px;">
                © 2024 Copyright :
                <a class="text-light" href="https://secret-inky.vercel.app/" target="_blank">abhishekverma.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>