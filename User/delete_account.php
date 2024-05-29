<h2 class="text-center text-black mb-4 mt-5">Delete Account</h2>
<form action="" method="post" class="mt-5 delete_account">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto bg-danger fw-bold text-light py-2" value="Delete Account" name="delete">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto bg-success fw-bold py-2 text-light" value="Don't Delete Account" name="dont_delete">
    </div>
</form>

<?php

$user_session = $_SESSION['username'];
if (isset($_POST['delete'])) {

    $delete_query = "Delete from `user_table` where User_name='$user_session'";
    $result_delete_query = mysqli_query($con, $delete_query);

    if ($result_delete_query) {

        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('./profile.php','_self')</script>";
}
?>