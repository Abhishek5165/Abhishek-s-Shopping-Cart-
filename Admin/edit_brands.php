<?php
include('../include/connect.php');

if (isset($_GET['edit_brands'])) {
    $edit_id = $_GET['edit_brands'];

    $get_data = "SELECT * FROM `brands` WHERE Brands_id=$edit_id";
    $result_query = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result_query);
    $brand_title = $row['Brands_title'];
}

if (isset($_POST['edit_brand'])) {

    $brands_title = $_POST['brand_title'];

    // update the data ........

    $update_data = "UPDATE `brands` set 
        Brands_title='$brands_title' WHERE Brands_id=$edit_id";

    $result_query_update = mysqli_query($con, $update_data);

    if ($result_query_update) {

        echo "<script>alert('Brand Updated Successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>

<div class="container mt-3">
    <h2 class="text-center text-success mb-3">Edit Brand</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 m-auto w-50">
            <label for="brand_title" class="form-label fw-bold mb-4">Brand Title</label>
            <input type="text" class="form-control" name="brand_title" required="required" value="<?php echo $brand_title ?>">
        </div>
        <!-- Submit -->
        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" name="edit_brand" class="btn btn-warning mb-5 px-3" value="Edit Brand">
        </div>
    </form>
</div>