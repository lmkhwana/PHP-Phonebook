<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Phone Book</title>
  </head>
  <body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">Phone Book</a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
  <?php  if (isset($_SESSION['username'])) echo "Welcome ". $_SESSION['username']." | "; ?>
    <a class="p-2 text-dark" href="users.php">Other Users</a>
    <a class="p-2 text-dark" href="contacts.php">Your Contacts</a>
  </nav>
  <?php
     if (isset($_SESSION['username']))
        echo '  <a class="btn btn-outline-primary" href="logout.php">Logout</a>
        ';
    else
    {
        echo '<a class="btn btn-outline-primary" href="Login.php">Login</a>';

    }
    ?>
</div>

