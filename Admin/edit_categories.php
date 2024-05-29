<?php
include('../include/connect.php');

if (isset($_GET['edit_categories'])) {
    $edit_id = $_GET['edit_categories'];

    $get_data = "SELECT * FROM `categories` WHERE Categories_id=$edit_id";
    $result_query = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result_query);
    $category_title = $row['Categories_title'];
}

if (isset($_POST['edit_cat'])) {

    $categories_title = $_POST['category_title'];

    // update the data ........

    $update_data = "UPDATE `categories` set 
        Categories_title='$categories_title' WHERE Categories_id=$edit_id";

    $result_query_update = mysqli_query($con, $update_data);

    if ($result_query_update) {

        echo "<script>alert('Category Updated Successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>

<div class="container mt-3">
    <h2 class="text-center text-success mb-3">Edit Category</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 m-auto w-50">
            <label for="category_title" class="form-label fw-bold mb-4">Category Title</label>
            <input type="text" class="form-control" name="category_title" required="required" value="<?php echo $category_title ?>">
        </div>
        <!-- Submit -->
        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" name="edit_cat" class="btn btn-warning mb-5 px-3" value="Edit Category">
        </div>
    </form>
</div>