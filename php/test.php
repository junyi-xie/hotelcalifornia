<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');

echo '<form method="post">';
echo '<input type="number" name="id" placeholder="category id">';
echo '<input type="submit" name="submit" value="Submit">';
echo '</form>';

echo '<pre>';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
    print_r($db->showroom($id));
}

// var_dump($db->addRoom('Banaan', '599', '2', '6F', '2'));

// var_dump($db->deleteroom('5'));
echo '</pre>';

