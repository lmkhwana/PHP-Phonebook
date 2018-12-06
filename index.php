<?php include 'header.php' ?>

<main>
    <div class="container">
    <?php

        if (isset($_SESSION['username']))
        {
            header('Location: contacts.php');
        }
        else
        {
            echo '<section class="jumbotron text-center mt-15">
            <div class="container">
                <br>      
            <h1 class="jumbotron-heading">Phonebook Application</h1>
            <p class="lead text-muted">Welcome to this phone book application, to use this app you have to create an account or if you already have it, login, you can view other users on this platform without an account.</p>
            <p>
                <a href="login.php" class="btn btn-primary my-2">Login</a>
                <a href="register.php" class="btn btn-secondary my-2">Signup</a>
            </p>
            </div>
        </section>';
        }

?>
    </div>
</main>
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
<?php include 'footer.php' ?>
</html>