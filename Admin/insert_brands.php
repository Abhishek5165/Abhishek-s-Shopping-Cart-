<?php

include("../include/connect.php");

if (isset($_POST["insert_brands"])) {

    $brand_title = $_POST["brand_title"];

    // This is for not to insert the dublicate brands values
    $select_query = "Select *from `brands` where Brands_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This Brand is present inside the Database.')</script>";
    } else {
        $insert_query = "insert into `brands` (Brands_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted Successfully')</script>";
        }
    }
}
?>

<h2 class="text-center mb-4">Insert Brands</h2>

<form action="" method="post" class="mb-2 field">
    <div class="input-group wd-90 mb-2">
        <span class="input-group-text bg-danger" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Insert Brands" required="required">
    </div>

    <div class="input-group wd-10 mb-2 m-auto">
        <input type="submit" class="insert" name="insert_brands" value="Insert Brands">
    </div>
</form>