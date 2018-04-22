<?php

if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $name  = mysqli_real_escape_string($conn, $_POST['product_name']);
    $descr = mysqli_real_escape_string($conn, $_POST['product_descr']);
    $image = $_POST['product_img'];
    $cat   = $_POST['product_cat'];

    if (empty($name) || empty($cat)){
        header("Location: ../auctions.php?prduct=empty");
        exit();
    } 
    else {
            $sql = "INSERT INTO products (product_name, product_description, product_image, product_category)
                     VALUES ('$name', '$descr', '$image', '$cat');";
            mysqli_query($conn, $sql); 
            header("Location: ../auctions.php?product=success");
            exit();
    }   


}else {
    header("Location: ../auctions.php");
    exit();
}