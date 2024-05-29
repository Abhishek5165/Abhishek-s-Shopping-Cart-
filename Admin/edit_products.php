<?php
include('../include/connect.php');

if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];

    $get_data = "SELECT * FROM `products` WHERE products_id=$edit_id";
    $result_query = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result_query);
    $product_title = $row['Product_title'];
    $product_description = $row['Product_description'];
    $product_keyword = $row['Product_keyword'];
    $product_Image1 = $row['Product_Image1'];
    $product_Image2 = $row['Product_Image2'];
    $product_Image3 = $row['Product_Image3'];
    $product_price = $row['Product_price'];

    if (isset($_POST['edit_products'])) {

        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keyword = $_POST['product_keyword'];
        $product_categories = $_POST['product_categorires'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];

        $product_Image1 = $_FILES['product_image1']['name'];
        $product_Image2 = $_FILES['product_image2']['name'];
        $product_Image3 = $_FILES['product_image3']['name'];

        $temp_Image1 = $_FILES['product_image1']['tmp_name'];
        $temp_Image2 = $_FILES['product_image2']['tmp_name'];
        $temp_Image3 = $_FILES['product_image3']['tmp_name'];

        move_uploaded_file($temp_Image1, "./products_images/$product_Image1");
        move_uploaded_file($temp_Image2, "./products_images/$product_Image2");
        move_uploaded_file($temp_Image3, "./products_images/$product_Image3");

        // update the data ........

        $update_data = "UPDATE `products` set 
    Product_title='$product_title', 
    Product_description='$product_description',
    Product_keyword='$product_keyword', 
    Categories_id=$product_categories, 
    Brands_id=$product_brands, 
    Product_Image1='$product_Image1', 
    Product_Image2='$product_Image2', 
    Product_Image3='$product_Image3', 
    Product_price='$product_price',
    date=NOW() WHERE products_id=$edit_id";

        $result_query_update = mysqli_query($con, $update_data);

        if ($result_query_update) {

            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}

?>

<div class="container">
    <h1 class="text-center heading_pro">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data" class="form_label insert_container">
        <!-- title -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" autocomplete="off" required="required" value="<?php
            echo $product_title ?>">
        </div>
        <!-- description -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" autocomplete="off" required="required" value="<?php echo $product_description ?>">
        </div>
        <!-- Produncts keywords -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" class="form-control" autocomplete="off" required="required" value="<?php
            echo $product_keyword ?>">
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
                <option value="" class="menuPlacement='auto'">Select Brands</option>

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
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" class="form-control user_in" required="required" name="product_image1">
                <img src='./products_images/<?php
                echo $product_Image1 ?>' class="edit_page_img product_i border-0 w-90 m-auto" alt=''>
            </div>
        </div>

        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" class="form-control user_in" required="required" name="product_image2">
                <img src='./products_images/<?php
                echo $product_Image2 ?>' class="edit_page_img product_i border-0 w-90 m-auto" alt=''>
            </div>
        </div>

        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" class="form-control user_in" required="required" name="product_image3">
                <img src='./products_images/<?php
                echo $product_Image3 ?>' class="edit_page_img product_i border-0 w-90 m-auto" alt=''>
            </div>
        </div>

        <!-- Produnct Price -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" autocomplete="off" required="required" value="<?php
            echo $product_price ?>">
        </div>

        <!-- Submit -->
        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" name="edit_products" class="btn btn-warning mb-5 px-3" value="Edit Product">
        </div>
    </form>
</div>