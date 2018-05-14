<?php
    include_once 'header.php';
    include_once '/opt/lampp/htdocs/proiectweb/includes/dbh.inc.php';
?>
<section class="auctions">
    <div class="container">
    <?php 
        if (isset($_SESSION['u_id'])) {
            echo '<h2 class="auction-add__intro">Add a new product:</h2>
                <form action="includes/auctions.inc.php" class="auction-add__form" enctype="multipart/form-data" method="POST">
                    <input type="text" class="auction__input" name="product_name" placeholder="Product name">
                    <input type="text" class="auction__input" name="product_descr" placeholder="Product description">
                    <input type="text" class="auction__input" name="product_value" placeholder="Product value">
                    <input type="file" class="auction__input" name="product_img">
                    <select class="auction__select" name="product_cat">';
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                                echo '<option class="select__option" value='.$row["category_id"].'>'.$row["category_name"].'</option>';
                                }
                            }   
            echo   '</select>
                    <button type="submit" name="submit" class="btn btn--center">Add Product</button>
                </form>';
        }
        $sql = "SELECT * FROM products INNER JOIN categories ON products.product_category = categories.category_id INNER JOIN users ON products.user_id = users.user_id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $imagesrc = $row['product_image'];
                echo   '<form action="includes/bids.inc.php" class="bid__form bid__form'.-$row["product_id"].'" method="POST">
                        <div class="bid__data">
                            <h2 class="bid__name">'.$row["product_name"].'</h2>
                            <img src="img/products/'.$imagesrc.'" alt="" class="bid__image">
                            <p class="bid__description">'.$row["product_description"].'</p>
                            <p class="bid__category">'.$row["category_name"].'</p>
                        </div>
                        <div class="bid__toolbar">
                            <p class="bid__bider">Current highest bidder :'.$row["user_first"].' </p>
                            <p class="bid__value">Current value :'.$row["product_value"].'$</p>';
                echo      ' <input type="hidden" class="bid__input" name="random_val" value='.$row["product_id"].'>
                            <input type="text" class="bid__input" name="product_value" placeholder="Bid value">
                            <button type="submit" name="submit" class="btn">Make a bid!</button>';
                            if (isset($_SESSION['u_id'])) {
                                if($_SESSION['u_uid']=="admin"){
                                    echo '<button type="submit" name="delete" class="btn -color-red">Delete</button>
                                            </div>    
                                            </form>';  
                                }else {
                                    echo '</div>    
                                        </form>';
                                }
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
