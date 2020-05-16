<?php

require 'db.class.php';
require 'dbconfig.php';

$db = new Database('localhost','root','','hotelcalifornia');
$connect = $db->connect();


if(isset($_POST['login']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];
  
 if($user->login($username,$password))
 {
  $user->redirect('test2.php');
 }
}
?>

<form method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="login" value="login">
</form>    

</body>
</html>