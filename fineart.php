<?php
    include_once 'header.php';
    include_once '/includes/dbh.inc.php';
?>

    <section class="auctions">
        <div class="container">
        <?php
            $sql = "SELECT * FROM products WHERE product_category = 1";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="includes/bids.inc.php" class="bid__form bid__form'.-$row["product_id"].'" method="POST">
                            <div class="bid__data">
                                <h2 class="bid__name">'.$row["product_name"].'</h2>
                                <img src="" alt="" class="bid__image">
                                <p class="bid__description">'.$row["product_description"].'</p>
                                <p class="bid__category">'.$row["product_category"].'</p>
                            </div>
                            <div class="bid__toolbar">
                            <p class="bid__bider">Current highest bidder : Vlad</p>
                                 <p class="bid__value">Current value :300 $</p>
                                <input type="text" class="bid__input" name="bid_value" placeholder="Bid value">
                                <button type="submit" name="submit" class="btn">Make a bid!</button>
                            </div>    
                            </form>';
                }
            }
            ?>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>