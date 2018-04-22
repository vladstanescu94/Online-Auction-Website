<?php
    include_once 'header.php';
    include_once '/includes/dbh.inc.php';
?>
    <section class="auctions">
        <div class="container">
        <?php 
            if (isset($_SESSION['u_id'])) {
               echo '<h2 class="auction-add__intro">Add a new product:</h2>
                    <form action="includes/auctions.inc.php" class="auction-add__form" method="POST">
                        <input type="text" class="auction__input" name="product_name" placeholder="Product name">
                        <input type="text" class="auction__input" name="product_descr" placeholder="Product description">
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
            else {
                # code...
            }
        ?>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>
