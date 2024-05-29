<h2 class="text-center text-success mt-4">All Orders</h2>
<div class="table-responsive">
<table class="table table-bordered mt-4 view_table">

<tbody>
    <?php
    $get_order = "SELECT * FROM `user_orders`";
    $result_query = mysqli_query($con, $get_order);
    $row_count = mysqli_num_rows($result_query);

    if ($row_count == 0) {
        echo "<h2 class='text-center text-danger mt-5'>No Orders Yet !</h2>";
    } else {

        echo "<thead>
        <tr class='text-center'>
            <td>SL No</td>
            <td>Due Amount</td>
            <td>Total Products</td>
            <td>Order Date</td>
            <td>Status</td>
            <td>Delete</td>
        </tr>
        </thead>";

        $number = 0;
        while ($row = mysqli_fetch_assoc($result_query)) {

            $order_id = $row['Order_id'];
            $amount_due = $row['Amount_due'];
            $total_products = $row['Total_products'];
            $order_date = $row['Order_date'];
            $order_status = $row['Order_status'];
            $number++;

            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>

            <td><a href='./index.php?delete_order=$order_id' type='button' class='' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa-solid fa-trash text-black'></i></a></td>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?orders_list'>No</a></button>

                <button type="button" class='btn btn-danger'><a href='./index.php?delete_order=<?php echo $order_id ?>' class="text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>