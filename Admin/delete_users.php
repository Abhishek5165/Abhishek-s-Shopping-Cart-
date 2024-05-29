<?php
include('../include/connect.php');

if (isset($_GET['delete_user'])) {

    $delete_id = $_GET['delete_user'];
    $delete_query = "DELETE FROM `user_table` WHERE User_id=$delete_id";
    $result_query = mysqli_query($con, $delete_query);

    if ($result_query) {

        echo "<script>alert('User Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?users_list','_self')</script>";
    }
}
