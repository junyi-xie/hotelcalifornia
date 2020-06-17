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
    <link rel="stylesheet" href="assets/css/signin.css" >
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
      
        <div class="mb-3">
        
            <a href="../public/index.php">Home</a>
      
        </div>
      
        <button class="btn btn-lg btn-primary btn-block" name="signin" type="submit">Sign in</button>
      
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    
    </form>

</body>
</html>