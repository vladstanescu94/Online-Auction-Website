<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Vlad Stanescu proiect Web Development">
    <meta name="keywords" content="web dev, Vlad Stanescu, code , programming">
    <meta name="author" content="Vlad Stanescu">
    <title>Sold | Official Website</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class = "header">
        <div class="header__main">
            <h1 class="header__branding">Sold.com</h1>
            <?php
                if (isset($_SESSION['u_id'])) {
                    $firstname = $_SESSION['u_first'];
                    echo "<form action='includes/logout.inc.php' method ='POST' class='header__form'>
                             <h2 class= 'login__welcome'>Welcome $firstname</h2>
                             <button type='submit' name='submit' class='btn'>Logout</button>
                          </form>";
                }else {
                    echo '<form action="includes/login.inc.php" method="POST" class="header__form">
                             <input type="text" name="uid" placeholder = "User Name">
                             <input type="password" name="pwd" placeholder = "Password">
                             <button type="submit" name="submit" class="btn">Log In</button>
                             <a href="signup.php" class="btn btn--signup">Sign Up</a>
                          </form>';
                }
            ?>
            
            <div class="clear"></div>
        </div>
        <nav class="header__nav">
            <ul>
                <li><a href="index.php" class="highlight">Home</a></li>
                <li><a href="auctions.php" class="highlight">Auctions</a></li>
                <li><a href="">Fine Art</a></li>
                <li><a href="">Jewelry</a></li>
                <li><a href="">Collectibles</a></li>
            </ul>
        </nav>
    </header>