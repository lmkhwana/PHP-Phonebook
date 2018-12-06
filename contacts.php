<?php include 'header.php'?>
<?php include 'core/init.php' ?>
<?php if (!isset($_SESSION['username'])) header('Location:login.php?feeback=YouHaveToLogin'); 

    $username = $_SESSION['username'];

    $db = new Database;

    $db->query("SELECT * FROM contacts WHERE username = :username");
    $db->bind(':username', $username);
    $results = $db->results();
    $count = $db->rowCount();

?>
<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Your Contacts</h1>
    <p class="lead text-muted">A list of all the contacts you have added, you can view, edit or delete them.</p>

  </div>
</section>
<div class="container">
<p>Total Contacts : <?php echo $count ?></p>
<ul class="list-group">

<li class="list-group-item">
    <a href="add_contact.php" style="float: right; margin-right: 5px; color: white" class="btn btn-primary">Add Contact </a>
</li>
<?php
    foreach($results as $result)
    {
        echo '<li class="list-group-item">Name: '. $result->first_name.' '.$result->last_name.'
    
        <a style="float: right; margin-right: 5px; color: white" class="btn btn-danger">Delete </a>
        <a style="float: right; margin-right: 5px; background-color: green; color: white" class="btn btn-primary">Edit </a>
        <a style="float: right; margin-right: 5px; color: white" class="btn btn-primary">View </a>
    </li>';
    }
?>
</ul>
</div>


<?php include 'footer.php' ?>