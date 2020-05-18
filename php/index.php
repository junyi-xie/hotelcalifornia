<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');

if($db->is_loggedin()!="")
{
 $db->redirect('home.php');
}

if(isset($_POST['submit']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];
  
 if($db->login($username,$password))
 {
  $db->redirect('home.php');
 }
}

echo '<form method="post">
<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" value="Login">
</form>';