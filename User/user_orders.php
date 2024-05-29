<h2 class="text-success mt-2 text-center">All my Orders</h2>
<div class="table-responsive">

    <table class="table table-bordered mt-3">

        <tbody class="text-center">

            <?php

            $username = $_SESSION['username'];
            $get_user = "SELECT * FROM `user_table` WHERE User_name='$username'";
            $result_query = mysqli_query($con, $get_user);
            $row_fetch = mysqli_fetch_assoc($result_query);
            $user_id = $row_fetch['User_id'];
            ?>

            <?php
            $get_user_order = "SELECT * FROM `user_orders` WHERE User_id=$user_id";
            $result_order_query = mysqli_query($con, $get_user_order);
            $row_count = mysqli_num_rows($result_order_query);

            if ($row_count == 0) {
                echo "<h2 class='text-center text-danger mt-4'>No Orders Yet !</h2>";
            } else {

                echo "<thead class='text-center'>
            <tr>
                <th class='bg-info'>SL No</th>
                <th class='bg-info'>Amount Due</th>
                <th class='bg-info'>Total Products</th>
                <th class='bg-info'>Invoice Number</th>
                <th class='bg-info'>Date</th>
                <th class='bg-info'>Complete / Incomplete</th>
                <th class='bg-info'>Status</th>
            </tr>
            </thead>";

                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_order_query)) {

                    $order_id = $row_orders['Order_id'];
                    $amount_due = $row_orders['Amount_due'];
                    $invoice_number = $row_orders['Invoice_number'];
                    $total_products = $row_orders['Total_products'];
                    $order_date = $row_orders['Order_date'];
                    $order_status = $row_orders['Order_status'];

                    if ($order_status == 'Pending') {
                        $order_status = 'Incomplete';
                    } else {
                        $order_status = 'Complete';
                    }

                    echo "<tr class='text-center'>
                <td>$number</td>
                <td>$amount_due /-</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
            ?>
            <?php
                    if ($order_status == 'Complete') {
                        echo "<td>Paid</td>";
                    } else {
                        echo "<td><a href='./confirm_payment.php?order_id=$order_id' class='bg-danger p-1 rounded'>Confirm</a></td>
             </tr>";
                    }
                    $number++;
                }
            }
            ?>
        </tbody>
    </table>
</div>