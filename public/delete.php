<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}

// id of which room to delete
$room_id = $_GET['id'];
$db->removeroom($room_id);

// after room has been deleted return to rooms.php
$db->redirect('rooms.php?page=1');
?>