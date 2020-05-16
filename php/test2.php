<?php
require 'db.class.php';
require 'dbconfig.php';


// if($user->loggedin()) 
// {
//  $user->redirect('test.php');
// }


var_dump($user->loggedin());


echo '<form method="post">
<input type="submit" name="test" value="logout">
</form>';   

echo 'hello!';

if(isset($_POST['test'])){
$user->logout();
{
    $user->redirect('test.php');
}
}