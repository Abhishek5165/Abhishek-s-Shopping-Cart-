<?php
include('../include/connect.php');

if (isset($_GET['delete_order'])) {

    $delete_id = $_GET['delete_order'];
    $delete_query = "DELETE FROM `user_orders` WHERE Order_id=$delete_id";
    $result_query = mysqli_query($con, $delete_query);

    if ($result_query) {

        echo "<script>alert('Order Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?orders_list','_self')</script>";
    }
}
