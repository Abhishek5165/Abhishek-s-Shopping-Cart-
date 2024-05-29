<?php
include('../include/connect.php');
include('../functions/common_func.php');
session_start();

if (isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $select_order_query = "SELECT * FROM `user_orders` WHERE Order_id=$order_id";
    $result_order_query = mysqli_query($con, $select_order_query);
    $row_fetch = mysqli_fetch_assoc($result_order_query);
    $invoice = $row_fetch['Invoice_number'];
    $amount = $row_fetch['Amount_due'];
}
if (isset($_POST['confirm_payment'])) {

    $invoice_number = $_POST['invoice_number'];
    $amount_due = $_POST['amount'];
    $payment_mode = $_POST['mode'];

    $insert_query = "insert into `user_payments` (Order_id,Invoice_number,Amount,	Payment_mode) values ($order_id,$invoice_number,$amount_due,'$payment_mode')";

    $result_query = mysqli_query($con, $insert_query);

    if ($result_query) {
        echo "<script>alert('Successfully Completed the Payment 🤝')</script>";
        echo "<script>window.open('./profile.php?my_orders','_self')</script>";
    }
    $update_query = "Update `user_orders` set Order_status='Complete' where Order_id=$order_id";
    $result_update_query = mysqli_query($con, $update_query);

    $empty_cart = "DELETE FROM `pending_orders` WHERE Invoice_number=$invoice_number";
    $run_empty_query = mysqli_query($con, $empty_cart);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="payment">
    <div class="container my-5">
        <h1 class="text-center">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-group text-center my-4">
                <label for="invoice_number" class="text-black fw-bold mb-3">Invoice Number</label>
                <input type="text" id="invoice_number" class="form-control" name="invoice_number" value="<?php echo $invoice ?>" readonly>
                <label for="amount" class="text-black fw-bold mb-3 mt-3">Amount</label>
                <input type="text" id="amount" class="form-control" name="amount" value="<?php echo $amount ?>" readonly>
            </div>
            <div class="form-group text-center my-4">
                <select class="form-select" name="mode">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>PayPal</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-group text-center my-4">
                <input type="submit" value="Confirm" name="confirm_payment" class="btn btn-primary px-4 py-2">
                <a href="../index.php" class="btn btn-success px-4 py-2 mx-3">Continue Shopping</a>
            </div>
        </form>
    </div>
</body>

</html>