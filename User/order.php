<?php
include("../include/connect.php");
include('../functions/common_func.php');

if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;

$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_query = mysqli_query($con, $cart_query);

$invoice_number = mt_rand();
$status = 'Pending';

$count_cart_items=mysqli_num_rows($result_cart_query);
while ($row_price=mysqli_fetch_array($result_cart_query)) {

    $product_id = $row_price['products_id'];
    $cart_orders = "SELECT * FROM `products` WHERE products_id=$product_id";
    $result_cart_orders = mysqli_query($con, $cart_orders);

    while ($row_product_price=mysqli_fetch_array($result_cart_orders)) {

        $product_price = array($row_product_price['Product_price']);
        $product_price_sum = array_sum($product_price);
        $total_price += $product_price_sum;
    }
}


// getting quantities .....

$get_quantity = "SELECT * FROM `cart_details`";
$run_get_quantity = mysqli_query($con,$get_quantity);
$get_item_quantity = mysqli_fetch_array($run_get_quantity);
$quantity = $get_item_quantity['quantity'];

if($quantity==0){

$quantity = 1;
$subtotal = $total_price;
}
else{

    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
}

$insert_orders = "INSERT INTO `user_orders` (User_id,Amount_due,Invoice_number,Total_products,Order_date,Order_status) values ($user_id,$subtotal,
$invoice_number,$count_cart_items,NOW(),'$status')";

$run_insert_query = mysqli_query($con,$insert_orders);
if($run_insert_query){

echo "<script>alert('Orders are submitted successfully')</script>";
echo "<script>window.open('./profile.php','_self')</script>";
}

// order pending 

$insert_pending_orders = "INSERT INTO `pending_orders` (User_id,Invoice_number,Product_id,Quantity,Order_status) values ($user_id,$invoice_number,$product_id, $quantity,'$status')";

$run_insert_pending_query = mysqli_query($con,$insert_pending_orders);


// Delete items from cart 

$empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
$run_empty_query = mysqli_query($con,$empty_cart);

?>