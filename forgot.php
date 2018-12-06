<?php include 'header.php' ?>

<div class="container">
<form method="post" action="">
    <legend class="border-bottom mb-5">Recover password</legend>
    <p>Please Enter the email address you used to create an account.</p>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
    <hr>
    <input type="submit" name="submit" class="btn btn-primary" value="Reset">
</form>
</div>
<?php include 'footer.php' ?>