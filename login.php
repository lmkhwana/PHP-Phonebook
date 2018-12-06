<?php include "core/init.php"?>


<?php include 'header.php' ?>
<?php

if (isset($_GET['feedback'])  && $_GET['feedback'] == 'SignupSuccess')
    $feedback = "Successfully signed up, You can Login now!";

if (isset($_GET['feeback'])  && $_GET['feeback'] == 'YouHaveToLogin')
    $feedback = "You have to login first!";

?>
<div class="container">
<?php if(isset($feedback)) 
            echo $feedback;
?>
    <form method="post" action="">
    <legend class="border-bottom mb-5">Login</legend>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <hr>
    <small class="form-text text-muted">Don't have an account? <a href="register.php">register</a></small>
    <hr>
    <small class="form-text text-muted"><a href="forgot.php">Forgot Password</a></small>
    <hr>
    <input type="submit" name="submit" class="btn btn-primary" value="Login">
    </form>
</div>
<?php include 'footer.php' ?>
<?php
//New databse object
$db = new Database();


    //Get variables
if (isset($_POST['submit']))
{

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $hashed = hash("whirlpool", $password);

    try
    {
        $db->query("SELECT * FROM users WHERE email = :email");
        $db->bind(':email', $email);
        $results = $db->single();


            if ($results->password == $hashed)
            {
                $_SESSION['username'] = $results->username;
                $_SESSION['id'] = $results->id;
                header('Location: index.php?feedback=signinSuccess');
            }
                
            else
            {
                $feedback = "Incorrect password";
                header('Location: login.php');
            }

    }
    catch(PDOException $e)
    {
            $feedback = $e->getMessage();
    }
}
            

?>