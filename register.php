<?php include "core/init.php"?>
<?php include "helpers/system_helper.php"?>
<?php

//New databse object
$db = new Database();

//Get variables
if (isset($_POST['submit']))
{

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $c_password = htmlspecialchars($_POST['c_password']);
    $feedback = "";

    if (!empty($username) && !empty($email) && !empty($password) && !empty($c_password))
    {
        if ($password == $c_password)
        {
            $hashed = hash("whirlpool", $password);

            try{
                $db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $db->bind(':username', $username);
                $db->bind(':email', $email);
                $db->bind(':password', $hashed);
                $db->execute();
    
                header('Location: login.php?feedback=SignupSuccess');

            }
            catch(PDOException $e)
            {
                $feedback = $e->getMessage();
            }
            
        }
        else
        {
            $feedback = "Passwords need to match!";
            header('Location: register.php');
        }
    }
    else
    {
        $feedback = "All fields are required!";
        header('Location: register.php');
    }
       
    
}

?>

<?php include 'header.php' ?>
<div class="container">
<?php if(isset($feedback)) 
            echo $feedback;
?>
    <form method="post" action="">
    <legend class="border-bottom mb-3">Register</legend>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <label for="Password">Confirm Password</label>
        <input type="password" class="form-control" name="c_password" placeholder="Confirm password" required>
    </div>
    <hr>
    <small class="form-text text-muted">Already have an account? <a href="login.php">Login</a></small>
    <hr>
    <input type="submit" name="submit" class="btn btn-primary" value="Register">
    </form>
</div>
<?php include 'footer.php' ?>