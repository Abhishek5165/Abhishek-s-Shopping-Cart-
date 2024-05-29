<?php
include('../include/connect.php');

if (isset($_GET['delete_brand'])) {

    $delete_id = $_GET['delete_brand'];
    $delete_query = "DELETE FROM `brands` WHERE Brands_id=$delete_id";
    $result_query = mysqli_query($con, $delete_query);

    if ($result_query) {

        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
