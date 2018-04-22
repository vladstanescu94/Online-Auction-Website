<?php
    include_once 'header.php';
?>
    <section class="auctions">
        <div class="container">
        <?php 
            if (isset($_SESSION['u_id'])) {
               echo '<h2 class="auction-add__intro">Add a new product:</h2>
                    <form action="includes/auctions.inc.php" class="auction-add__form" method="POST">
                        <input type="text" class="auction__input" name="product_name" placeholder="Product name">
                        <input type="text" class="auction__input" name="product_descr" placeholder="Product description">
                        <input type="file" class="auction__input" name="product_img" placeholder="Product image">
                        <select class="auction__select" name="product_cat">
                            <option class="select__option" value="fineart">Fine Art</option>
                            <option class="select__option" value="jewelry">Jewelry</option>
                            <option class="select__option" value="collectibles">Collectibles</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn--center">Add Product</button>
                    </form>';
            }
            else {
                # code...
            }
        ?>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>
