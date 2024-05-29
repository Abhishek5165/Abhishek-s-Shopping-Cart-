<h2 class="text-center text-success mt-4">All Users</h2>
<div class="table-responsive">
    <table class="table table-bordered mt-4 view_table user_table">

        <tbody>
            <?php
            $get_user = "SELECT * FROM `user_table`";
            $result_query = mysqli_query($con, $get_user);
            $row_count = mysqli_num_rows($result_query);

            if ($row_count == 0) {
                echo "<h2 class='text-center text-danger mt-5'>No Users Present !</h2>";
            } else {

                echo "<thead>
        <tr class='text-center'>
            <td>SL No</td>
            <td>User Name</td>
            <td>User Email</td>
            <td class='column-td'>User Image</td>
            <td>User Mobile</td>
            <td>User Address</td>
            <td>Delete</td>
        </tr>
        </thead>";

                $number = 0;
                while ($row = mysqli_fetch_assoc($result_query)) {

                    $user_id = $row['User_id'];
                    $user_name = $row['User_name'];
                    $user_email = $row['User_email'];
                    $user_image = $row['User_image'];
                    $user_address = $row['User_address'];
                    $user_mobile = $row['User_mobile'];

                    $number++;

                echo "<tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td class='user_i column-td'><img src='../User/user_images/$user_image' alt='$user_name'/></td>
            <td>$user_mobile</td>
            <td>$user_address</td>

            <td><a href='./index.php?delete_user=$user_id' type='button' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa-solid fa-trash text-black'></i></a></td>
            </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want to delete ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?users_list'>No</a></button>

                <button type="button" class='btn btn-danger'><a href='./index.php?delete_user=<?php echo $user_id ?>' class="text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>