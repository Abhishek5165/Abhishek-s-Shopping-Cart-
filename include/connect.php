<?php
$con = mysqli_connect('localhost', 'root', '', 'Abhishek_Store');
if (!$con) {
    echo "Error connecting to MySQL: " . $con;
    die;
}
