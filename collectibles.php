<?php
    include_once 'header.php';
    include_once '/includes/dbh.inc.php';
?>

<section class="auctions">
        <div class="container">
        <?php
            $sql = "SELECT * FROM products INNER JOIN categories ON products.product_category = categories.category_id INNER JOIN users ON products.user_id = users.user_id AND products.product_category = 3";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo   '<form action="includes/bids.inc.php" class="bid__form bid__form'.-$row["product_id"].'" method="POST">
                            <div class="bid__data">
                                <h2 class="bid__name">'.$row["product_name"].'</h2>
                                <img src="" alt="" class="bid__image">
                                <p class="bid__description">'.$row["product_description"].'</p>
                                <p class="bid__category">'.$row["category_name"].'</p>
                            </div>
                            <div class="bid__toolbar">
                                <p class="bid__bider">Current highest bidder :'.$row["user_first"].' </p>
                                <p class="bid__value">Current value :'.$row["product_value"].'$</p>';
                    echo      ' <input type="hidden" class="bid__input" name="random_val" value='.$row["product_id"].'>
                                <input type="text" class="bid__input" name="product_value" placeholder="Bid value">
                                <button type="submit" name="submit" class="btn">Make a bid!</button>';
                                if($_SESSION['u_uid']=="admin"){
                                    echo '<button type="submit" name="delete" class="btn">Delete</button>
                                            </div>    
                                            </form>';  
                                }else {
                                    echo '</div>    
                                            </form>';
                                }
                 }
            }
        ?>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>