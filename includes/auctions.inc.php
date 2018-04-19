<?php

if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';

    $iname = mysqli_real_escape_string($conn, $_POST['iname']);
    $iimg  = mysqli_real_escape_string($conn, $_POST['iimg']);
    $idescr = mysqli_real_escape_string($conn, $_POST['idescr']);
    $ilist   =$_POST['ilist'];
    $istartD   = $_POST['istartD'];
    $iendD   =$_POST['iendD'];

    if (empty($iname) || empty($ilist) || empty($istartD) || empty($iendD)){
        header("Location: ../auctions.php?auctions=empty");
        exit();
    } else{
        if (!preg_match("/^[a-zA-Z]*$/", $iname) || !preg_match("/^[a-zA-Z]*$/", $idescr)){
            header("Location: ../auctions.php?auctions=invalid");
            exit();
        } else {
            $sql = "SELECT * FROM items WHERE item_name='$iname'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                header("Location: ../auctions.php?auctions=itemunavabile");
                    exit();
            } else {
               $sql = "INSERT INTO items(item_name, item_img, item_desc, item_cat, item_startDate, item_endDate)
                         VALUES ('$iname', '$iimg', '$idescr', '$ilist', '$istartD', '$iendD');";
                mysqli_query($conn, $sql); 
                header("Location: ../auctions.php?auctions=success");
                exit();     
            }
        }
    }

}else {
    header("Location: ../auctions.php");
    exit();
}