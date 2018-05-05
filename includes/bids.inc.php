<?php
session_start();
if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    if (isset($_SESSION['u_id'])) {
        $value = $_POST['product_value'];
        $userid = $_SESSION['u_id'];

        $sql = "SELECT * FROM products INNER JOIN categories ON products.product_category = categories.category_id INNER JOIN users ON products.user_id = users.user_id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            // output data of each row
                $row = $result->fetch_assoc(); 
                $oldvalue = $row['product_value'];
                if($value > $oldvalue){
                    $sql2 = "UPDATE `products` SET `user_id`=$userid,`product_value`=$value";
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