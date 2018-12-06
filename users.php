<?php include 'core/init.php' ?>

<?php
//Create a db object

$db = new Database;

//Run query
$db->query("SELECT * FROM users");

//Assign results set
$users = $db->results();



?>
<?php include 'header.php'?>
<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Other Users That Use This Platform</h1>
  </div>
</section>



<div class="album py-3 bg-light">
    <div class="container">
  
      <div class="row">
        

        <?php 
        foreach ($users as $user)
        {
            $db1 = new Database;

            //Run query
            $db1->query("SELECT * FROM contacts WHERE username = :username");
            $db1->bind(':username', $user->username);
            $db1->execute();
            $contacts = $db1->rowCount();

            echo '<div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="img/Screenshot (11).png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">'. $user->username .'</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="view_user_contacts.php?username='. $user->username. '"type="button" class="btn btn-sm btn-outline-secondary">View '. $user->username.'`s Contacts</a>
                </div>
                <small class="text-muted">'. $contacts.' Contacts</small>
              </div>
            </div>
          </div></div>';
        }
            ?>
        
    
      </div>
    </div>
  </div>
  
  </main>
  <?php include 'footer.php' ?>

