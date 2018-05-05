<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
    if (isset($_SESSION['u_id'])) {
        $value = $_POST['product_value'];
        $pid =  $_POST['random_val'];
        $userid = $_SESSION['u_id'];

        $sql = "SELECT * FROM products INNER JOIN categories ON products.product_category = categories.category_id INNER JOIN users ON products.user_id = users.user_id  WHERE products.product_id LIKE $pid";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            // output data of each row
                $row = $result->fetch_assoc(); 
                $oldvalue = $row['product_value'];
                if($value > $oldvalue){
                    $sql2 = "UPDATE `products` SET `user_id`=$userid,`product_value`=$value WHERE products.product_id LIKE $pid";
                    mysqli_query($conn, $sql2);
                    header("Location: ../auctions.php?bid=success");
                    exit();
                }
                else{
                    header("Location: ../auctions.php?bid=valueistoolow");
                    exit();
                }
            }
        }
    else{
        header("Location: ../auctions.php?bid=loginplease");
        exit();
    }
}

if(isset($_POST['delete'])){
    $pid =  $_POST['random_val'];
    if($_SESSION['u_uid']=="admin"){
        $sql = "DELETE FROM products  WHERE products.product_id LIKE $pid";
        mysqli_query($conn, $sql);
        header("Location: ../auctions.php?bid=deleted");
        exit();
    }
    else{
        exit();
    }
}