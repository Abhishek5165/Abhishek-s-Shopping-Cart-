<?php
function getproducts()
{
    global $con;

    if (!isset($_GET['category'])) {

        if (!isset($_GET['brand'])) {

            $select_products = "Select * from `products` order by rand() limit 0,4";
            $result_products = mysqli_query($con, $select_products);

            while ($row = mysqli_fetch_assoc($result_products)) {

                $product_id = $row['products_id'];
                $product_title = $row['Product_title'];
                $product_description = $row['Product_description'];
                $product_keyword = $row['Product_keyword'];
                $Product_Image1 = $row['Product_Image1'];
                $Product_price = $row['Product_price'];
                $Categories_id = $row['Categories_id'];
                $Brands_id = $row['Brands_id'];



                echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div>";
            }
        }
    }
}


function getp_all_products()
{

    global $con;

    if (!isset($_GET['category'])) {

        if (!isset($_GET['brand'])) {

            $select_products = "Select * from `products` order by rand()";
            $result_products = mysqli_query($con, $select_products);

            while ($row = mysqli_fetch_assoc($result_products)) {

                $product_id = $row['products_id'];
                $product_title = $row['Product_title'];
                $product_description = $row['Product_description'];
                $product_keyword = $row['Product_keyword'];
                $Product_Image1 = $row['Product_Image1'];
                $Product_price = $row['Product_price'];
                $Categories_id = $row['Categories_id'];
                $Brands_id = $row['Brands_id'];



                echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div>";
            }
        }
    }
}


function get_unique_catagories()
{
    global $con;

    if (isset($_GET['category'])) {

        $category_id = $_GET['category'];

        $select_products = "Select * from `products` where Categories_id=$category_id";
        $result_products = mysqli_query($con, $select_products);
        $number_of_rows = mysqli_num_rows($result_products);

        if ($number_of_rows <= 0) {

            echo "<h2 class='No_CB'>No Products found under this Category !</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_products)) {

            $product_id = $row['products_id'];
            $product_title = $row['Product_title'];
            $product_description = $row['Product_description'];
            $product_keyword = $row['Product_keyword'];
            $Product_Image1 = $row['Product_Image1'];
            $Product_price = $row['Product_price'];
            $Categories_id = $row['Categories_id'];
            $Brands_id = $row['Brands_id'];



            echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div>";
        }
    }
}


function getcategories()
{

    global $con;

    $select_categories = "Select *from categories";
    $result_categories = mysqli_query($con, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {

        $category_title = $row_data['Categories_title'];
        $category_id = $row_data['Categories_id'];

        echo "<li class='nav-item'>
        <a href='index.php?category=$category_id'
        class='nav-link'>$category_title </a></li>";
    }
}




function get_unique_brands()
{
    global $con;

    if (isset($_GET['brand'])) {

        $brand_id = $_GET['brand'];

        $select_products = "Select * from `products` where Brands_id=$brand_id";
        $result_products = mysqli_query($con, $select_products);
        $number_of_rows = mysqli_num_rows($result_products);

        if ($number_of_rows <= 0) {

            echo "<h2 class='No_CB'>This Brand is not available for Service !</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_products)) {

            $product_id = $row['products_id'];
            $product_title = $row['Product_title'];
            $product_description = $row['Product_description'];
            $product_keyword = $row['Product_keyword'];
            $Product_Image1 = $row['Product_Image1'];
            $Product_price = $row['Product_price'];
            $Categories_id = $row['Categories_id'];
            $Brands_id = $row['Brands_id'];



            echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div>";
        }
    }
}



function getbrands()
{

    global $con;
    $select_brands = "Select *from brands";
    $result_brands = mysqli_query($con, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {

        $brand_title = $row_data['Brands_title'];
        $brand_id = $row_data['Brands_id'];

        echo "<li class='nav-item'>
            <a href='index.php?brand=$brand_id'
        class='nav-link'> $brand_title </a></li>";
    }
}


function get_view_details()
{

    global $con;

    if (isset($_GET['product'])) {

        if (!isset($_GET['category'])) {

            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product'];

                $select_products = "Select * from `products` where products_id=$product_id";

                $result_products = mysqli_query($con, $select_products);

                while ($row = mysqli_fetch_assoc($result_products)) {

                    $product_id = $row['products_id'];
                    $product_title = $row['Product_title'];
                    $product_description = $row['Product_description'];
                    $product_keyword = $row['Product_keyword'];
                    $Product_Image1 = $row['Product_Image1'];
                    $Product_Image2 = $row['Product_Image2'];
                    $Product_Image3 = $row['Product_Image3'];
                    $Product_price = $row['Product_price'];
                    $Categories_id = $row['Categories_id'];
                    $Brands_id = $row['Brands_id'];



                    echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='index.php' class='btn btn-secondary'>Go Home</a>
        </div>
    </div>
</div>

<div class='col-md-8 more_products'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='related_head'>Related Products</h4>
                            </div>

                            
                            <div class='col-md-6 boxes text-center'>
                            <img src='./Admin/products_images/$Product_Image2' class='card-img-top' alt='...'>
            
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go Home</a>
                            </div>


                            <div class='col-md-6 boxes text-center'>
                            <img src='./Admin/products_images/$Product_Image3' class='card-img-top' alt='...'>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go Home</a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}


function search_products()
{

    global $con;

    if (isset($_GET['search_data_products'])) {

        $search_data_value = $_GET['search_data'];

        $search_query = "Select *from `products` where Product_keyword like '%$search_data_value%'";
        $result_product = mysqli_query($con, $search_query);

        $number_of_rows = mysqli_num_rows($result_product);

        if ($number_of_rows == 0) {
            echo "<h2 class='No_CB'>No Results Match for this Search !</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_product)) {

            $product_id = $row['products_id'];
            $product_title = $row['Product_title'];
            $product_description = $row['Product_description'];
            $product_keyword = $row['Product_keyword'];
            $Product_Image1 = $row['Product_Image1'];
            $Product_price = $row['Product_price'];
            $Categories_id = $row['Categories_id'];
            $Brands_id = $row['Brands_id'];



            echo "<div class='col-md-3 mb-4 ml-10'>
    <div class='card'>
        <img src='./Admin/products_images/$Product_Image1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text fw-bold text-primary'>Price: $Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div>";
        }
    }
}

// ------------get ip address------------

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

function cart()
{

    if (isset($_GET['add_to_cart'])) {

        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $insert_query = "insert IGNORE into `cart_details` (products_id,ip_address,quantity) values ($get_product_id,'$ip',0)";

        $result_query = mysqli_query($con, $insert_query);
        echo "<script>alert('Item is added to Cart Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

function cart_items()
{
    if (isset($_GET['add_to_cart'])) {

        global $con;
        $ip = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_items = mysqli_num_rows($result_query);
    }
    echo $count_items;
}

function total_price()
{

    global $con;
    $total = 0;
    $ip = getIPAddress();
    $select_query = "Select * from `cart_details` where ip_address='$ip'";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_array($result_query)) {

        $product_id = $row['products_id'];
        $select_products = "Select * from `products` where products_id=$product_id";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {

            $product_price = array($row_product_price['Product_price']);
            $product_price_values = array_sum($product_price);
            $total += $product_price_values;
        }
    }
    echo $total;
}

// get_pending_orders_details

function get_pending_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM `user_table` WHERE User_name='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_details = mysqli_fetch_array($result_query)) {

        $user_id = $row_details['User_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['delete_account'])) {
                if (!isset($_GET['my_orders'])) {

                    $get_orders = "SELECT * FROM `user_orders`
                     WHERE User_id=$user_id AND Order_status='pending'";
                    $result_order_query = mysqli_query($con, $get_orders);
                    $count_orders = mysqli_num_rows($result_order_query);

                    if ($count_orders > 0) {

                        echo "<h2 class='text-center mt-5'>You have <span class='text-danger'>$count_orders</span> Pending Orders !</h2>
                     <p class='text-center'><a href='../User/profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    } else {

                        echo "<h2 class='text-center mt-5'>You have <span class='text-danger'>0</span> Pending Orders !</h2>
                    <p class='text-center'><a href='../index.php' class='text-dark'><button class='py-2 px-2 rounded bg-primary text-light border-0 mt-4'>Explore Products</button></a></p>";
                    }
                }
            }
        }
    }
}
