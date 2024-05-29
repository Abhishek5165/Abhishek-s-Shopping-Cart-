<?php
include("../include/connect.php");

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_categorires = $_POST['product_categorires'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing the images by name 

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing the images by temp name 

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];


    if (
        $product_title == '' or $product_description == '' or
        $product_keyword == '' or $product_categorires == '' or
        $product_brands == '' or $product_price == '' or
        $product_image1 == '' or $product_image2 == '' or $product_image3 == ''
    ) {

        echo "<script>alert('Please enter all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./products_images/$product_image1");
        move_uploaded_file($temp_image2, "./products_images/$product_image2");
        move_uploaded_file($temp_image3, "./products_images/$product_image3");


        // This is for not to insert the dublicate products values

        $select_query = "Select *from `products` where Product_description='$product_description'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('This Product is present inside the Database.')</script>";
        } else {
            // Now inserting the products....

            $insert_query = "insert into `products` (Product_title,Product_description,Product_keyword,Categories_id,Brands_id,Product_Image1,Product_Image2,Product_Image3,Product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_categorires','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

            $result_query = mysqli_query($con, $insert_query);

            if ($result_query) {
                echo "<script>alert('Product inserted successfully')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Products</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="/style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="body">

    <div class="container">
        <h1 class="text-center heading_pro">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form_label insert_container">
            <!-- title -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <!-- Produncts keywords -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product Keyword" autocomplete="off" required="required">
            </div>

            <!-- Categorires -->
            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_categorires" id="" class="form-select" required="required">
                    <option value="">Select Category</option>

                    <?php
                    $select_categories = "Select *from `categories`";
                    $result_categories = mysqli_query($con, $select_categories);

                    while ($row_data = mysqli_fetch_assoc($result_categories)) {

                        $category_title = $row_data['Categories_title'];
                        $category_id = $row_data['Categories_id'];

                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_brands" id="" class="form-select" required="required">
                    <option value="">Select Brands</option>

                    <?php

                    $select_brands = "Select *from brands";
                    $result_brands = mysqli_query($con, $select_brands);

                    while ($row_data = mysqli_fetch_assoc($result_brands)) {

                        $brand_title = $row_data['Brands_title'];
                        $brand_id = $row_data['Brands_id'];

                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Produncts Images-->

            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Produnct Price -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" name="insert_product" class="btn btn-success mb-5 px-3" value="Insert Product">
            </div>

        </form>
    </div>

</body>

</html>