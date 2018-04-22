<?php

if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';

    

}else {
    header("Location: ../auctions.php");
    exit();
}