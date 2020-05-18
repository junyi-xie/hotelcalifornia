<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');

if(!$db->is_loggedin())
{
 $db->redirect('index.php');
}

echo 'welcome!';