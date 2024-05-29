<?php
include('../include/connect.php');

if (isset($_GET['edit_account'])) {

    $user_session_name = $_SESSION['username'];
    $select_form_query = "SELECT * FROM `user_table` WHERE User_name='$user_session_name'";
    $result_form_query = mysqli_query($con, $select_form_query);
    $row_fetch = mysqli_fetch_array($result_form_query);

    $user_id = $row_fetch['User_id'];
    $user_name = $row_fetch['User_name'];
    $user_email = $row_fetch['User_email'];
    $user_address = $row_fetch['User_address'];
    $user_mobile = $row_fetch['User_mobile'];
}

if (isset($_POST['user_update'])) {

    $update_id = $user_id;
    $user_name = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    // update the data ........

    $update_data = "update `user_table` set User_name='$user_name', User_email='$user_email',
    User_image='$user_image', user_address='$user_address', User_mobile='$user_mobile'
    where User_id= $update_id";
    $result_query_update = mysqli_query($con, $update_data);
    
   
    if ($result_query_update) {

        echo "<script>alert('Data Updated successfully')</script>";
        echo "<script>window.open('./logout.php','_self')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1 class="text-center text-success mb-4">Edit Account</h1>
    <form action="" method="post" class="box-s form-left" enctype="multipart/form-data">
        <!-- Username -->
        <div class="form-outline mb-3">
            <label for="user_username" class="form-label">Name</label>
            <input type="text" id="user_username" class="form-control" value="<?php echo $user_name ?>" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
        </div>

        <!-- Email -->
        <div class="form-outline mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_email" class="form-control" value="<?php echo $user_email ?>" placeholder="Enter Your Email" required="required" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
        </div>

        <!-- Image -->
        <div class="form-outline mb-2 user_lab">
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" id="user_image" class="form-control user_in" required="required" name="user_image">
            <img src='./user_images/<?php echo $user_image ?>' class="edit_page_img" alt=''>
        </div>

        <!-- User address -->
        <div class="form-outline mb-3">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" id="user_address" class="form-control" value="<?php echo $user_address ?>" placeholder="Enter Your Address" required="required" name="user_address">
        </div>

        <!-- User number -->
        <div class="form-outline mb-3">
            <label for="user_contact" class="form-label">Contact</label>
            <input type="text" id="user_contact" class="form-control" value="<?php echo $user_mobile ?>" placeholder="Enter Your phone number" required="required" name="user_contact">
        </div>

        <div>
            <input type="submit" value="Update" name="user_update" class="bg-success text-light px-3 py-2 border-0 rounded">
        </div>
    </form>
</body>

</html>