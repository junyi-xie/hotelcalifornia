<?php
require_once 'db.class.php';

$db = new Database('localhost','root','','hotelcalifornia');

echo '<pre>';

var_dump($db->login('test','test'));
var_dump($db->login('test','test2'));

echo '</pre>';

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
<input type="text" name="username">
<input type="password" name="password">
<input type="submit" name="submit" value="Login">
</form>';