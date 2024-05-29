<h2 class="text-center text-success mt-4">View Brands</h2>
<table class="table table-bordered mt-4 view_table">
    <thead>
        <tr class="text-center">
            <td>SL No</td>
            <td>Brand Title</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_brand = "SELECT * FROM `brands`";
        $result_query = mysqli_query($con, $get_brand);

        $number = 0;
        while ($row = mysqli_fetch_assoc($result_query)) {

            $brand_id = $row['Brands_id'];
            $brand_title = $row['Brands_title'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$brand_title</td>
            <td><a href='./index.php?edit_brands=$brand_id'><i class='fa-solid fa-pen-to-square text-black'></i></a></td>

            <td><a href='./index.php?delete_brand=$brand_id' type='button' class='' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa-solid fa-trash text-black'></i></a></td>
            </tr>";
        }
        ?>
    </tbody>
</table>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want to delete ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_brands'>No</a></button>

                <button type="button" class='btn btn-danger'><a href='./index.php?delete_brand=<?php echo $brand_id ?>' class="text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>