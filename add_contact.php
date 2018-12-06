<?php include 'header.php' ?>
<div class="container">
<?php if(isset($feedback)) 
            echo $feedback;
?>
    <form id="addContact" method="post" >
    <legend class="border-bottom mb-3">Add Contact</legend>
    <div class="form-group">
        <label for="First name">First name</label>
        <input type="text" class="form-control" name="f_name" placeholder="Enter First name" required>
    </div>
    <div class="form-group">
        <label for="Last naml">Last name</label>
        <input type="text" class="form-control" name="l_name" placeholder="Enter Last name" required>
    </div>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" name="phone" placeholder="Enter Phone number" required>
    </div>
    <hr>
    <input type="submit" name="submit" class="btn btn-primary" value="Save Contact">
    </form>
</div>
<?php include 'footer.php' ?>