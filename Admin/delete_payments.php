<?php
include('../include/connect.php');

if (isset($_GET['delete_payment'])) {

    $delete_id = $_GET['delete_payment'];
    $delete_query = "DELETE FROM `user_payments` WHERE Order_id=$delete_id";
    $result_query = mysqli_query($con, $delete_query);

    if ($result_query) {

        echo "<script>alert('User Payment Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?payments_list','_self')</script>";
    }
}
