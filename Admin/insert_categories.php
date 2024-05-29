<?php

include("../include/connect.php");

if (isset($_POST["insert_cat"])) {

    $category_title = $_POST["cat_title"];

    // This is for not to insert the dublicate categories values
    $select_query = "Select *from `categories` where Categories_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This Category is present inside the Database.')</script>";
    } 
    else {
        $insert_query = "insert into `categories` (Categories_title) values ('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted Successfully')</script>";
        }
    }
}
?>

<h2 class="text-center mb-4">Insert Categories</h2>

<form action="" method="post" class="mb-2 field">
    <div class="input-group wd-90 mb-2">
        <span class="input-group-text bg-danger" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Insert Categories" required="required">
    </div>

    <div class="input-group wd-10 mb-2 m-auto">
        <input type="submit" class="insert" name="insert_cat" value="Insert Categories">
    </div>
</form>