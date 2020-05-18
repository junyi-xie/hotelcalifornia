<?php

session_start();

require_once 'class.php';

$db = new Database('localhost','root','','test');

$db->user('Bob', 'bob123@email.com');
echo $_SESSION['message'];