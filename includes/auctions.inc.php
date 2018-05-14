<?php
session_start();
if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $name  = mysqli_real_escape_string($conn, $_POST['product_name']);
    $descr = mysqli_real_escape_string($conn, $_POST['product_descr']);
    $image = $_POST['product_img'];
    $target_dir = "../img/products/";
    $imagename = basename($_FILES["product_img"]["name"]);
    $imagename_hash = hash('sha256',  $imagename . strval(time()));
    $target_file = $target_dir . $imagename_hash;

    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["product_img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $cat   = $_POST['product_cat'];
    $value = mysqli_real_escape_string($conn,$_POST['product_value']);
    $userid = $_SESSION['u_id'];

    if (empty($name) || empty($cat) || empty($value)){
        header("Location: ../auctions.php?prduct=empty");
        exit();
    } else{
        if (!preg_match("/^[0-9]*$/", $value)) {
            header("Location: ../auctions.php?signup=invalid");
            exit();
        }
        else {
            $sql = "INSERT INTO `products`( `product_name`, `product_description`, `product_image`, `product_category`, `user_id`, `product_value`)
                     VALUES ('$name', '$descr', '$imagename_hash', '$cat' , '$userid', '$value');";
            mysqli_query($conn, $sql);
            header("Location: ../auctions.php?product=success");
            exit();
        }   
    }
    
}else {
    header("Location: ../auctions.php");
    exit();
}