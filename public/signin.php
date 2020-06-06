<?php
require 'class.php';

if($db->loggedin()!="")
{
 $db->redirect('dashboard.php');
}

if(isset($_POST['signin']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];
  
 if($db->login($username,$password))
 {
  $db->redirect('dashboard.php');
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Sign In</title>
</head>

<body class="text-center">

    <form class="form-signin" method="post">

        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
            <label for="inputUsername" class="sr-only">Username</label>
            
            <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
      
            <label for="inputPassword" class="sr-only">Password</label>
            
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      
        <div class="checkbox mb-3">
        
            <label><input type="checkbox" value="remember-me"> Remember me</label>
      
        </div>
      
        <button class="btn btn-lg btn-primary btn-block" name="signin" type="submit">Sign in</button>
      
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>