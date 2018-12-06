<?php include 'header.php'?>
<?php include 'core/init.php'?>
<?php

    $username = $_GET['username'];

    $db = new Database;

    $db->query("SELECT * FROM contacts WHERE username = :username");
    $db->bind(':username', $username);
    $results = $db->results();
    $count = $db->rowCount();

?>
<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading"><?php echo $username."'s";?> Contacts</h1>
    <p class="lead text-muted">A list of all the contacts <?php echo $username;?> has added, you can add the to your contact list.</p>

  </div>
</section>
<div class="container">
<ul class="list-group">
<p><?php echo $count ?> Contacts found</p>

<?php
    foreach($results as $result)
    {
        echo '<li class="list-group-item">Name: '. $result->first_name.' '.$result->last_name.' 
        <a style="float: right; margin-right: 5px; color: white" class="btn btn-primary">Add to my contacts </a>
    </li>';
    }
?>

</ul>
</div>
<?php include 'footer.php' ?>