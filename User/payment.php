<?php
include('../include/connect.php');
include('../functions/common_func.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">
</head>

<body style="overflow-x:hidden">

    <?php
    
    $get_ip = "SELECT * FROM `user_table`";
    $get_user_ip = mysqli_query($con, $get_ip);
    $result = mysqli_fetch_array($get_user_ip);
    $u_ip = $result['User_ip'];
    

    $get_user = "SELECT * FROM `user_table` WHERE User_ip='$u_ip'";
    $select_payment = mysqli_query($con, $get_user);
    $result_payment = mysqli_fetch_array($select_payment);
    
    $user_id = $result_payment['User_id'];

    ?>


    <div class="container">
        <h2 class="text-center text-dark mb-4 mt-2">Payment Option</h2>
        <div class="row payment_card">
            <div class='col-md-6 mb-4 ml-10'>
                <div class='card payment-card'>
                    <img src='../images/payment.webp' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title mb-3'>Payment Modes</h5>
                        <a target="_blank" href='https:/www.paypal.com' class='btn btn-danger'>Pay Online</a>
                        <a href='./order.php?user_id=<?php echo $user_id ?>' class='btn btn-success'>Pay Offline</a>
                        <a href='../index.php' class='bg-success px-3 py-2 back rounded'>Back Home</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 option">
                <h4 class="m-4">How would you like to pay ?</h4>
                <img src="../images/paym.png" alt="">
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