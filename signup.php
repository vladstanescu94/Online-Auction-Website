    <?php
        include_once 'header.php';
    ?>
    <section class = "signup">
        <div class="signup__intro">
            <h1>Sign Up!</h1>
            <form action="includes/signup.inc.php" method="POST" class="signup__form">
                <input type="text" name="first" placeholder = "Firstname">
                <input type="text" name="last" placeholder = "Lastname">
                <input type="email" name="email" placeholder = "E-mail">
                <input type="text" name="uid" placeholder = "User Name">
                <input type="password" name="pwd" placeholder = "Password">
                <button type="submit" name="submit" class="btn btn--signup">Sign Up</button>
            </form>
        </div>
    </section>
    <?php
        include_once 'footer.php';
    ?>