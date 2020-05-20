<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');

echo '<h1>SHOW ROOM</h1>';
echo '<form method="post">';
echo '<input type="number" min="1" max="4" name="id" placeholder="id" required>';
echo '<input type="submit" name="show" value="Submit">';
echo '</form>';

echo '<pre>';

if (isset($_POST['show']))
{
    $id = $_POST['id'];
    print_r($db->showroom($id));
}

echo '</pre>';

echo '<br/><br/>';

echo '<h1>ADD ROOM</h1>';
echo '<form method="post">';
echo '<input type="text" name="name" placeholder="room name" required>';
echo '<input type="text" name="price" placeholder="room price" required>';
echo '<input type="text" name="number" placeholder="room number" required>';
echo '<input type="text" name="floor" placeholder="room floor" required>';
echo '<input type="text" name="category_id" placeholder="category id" required> ';
echo '<input type="submit" name="add" value="Submit">';
echo '</form>';

if (isset($_POST['add']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $number = $_POST['number'];
    $floor = $_POST['floor'];
    $category_id = $_POST['category_id'];
    var_dump($db->addroom($name, $price, $number, $floor, $category_id));
}

echo '<br/><br/>';

echo '<h1>REMOVE ROOM</h1>';
echo '<form method="post">';
echo '<input type="text" name="room_number" placeholder="room number" required>';
echo '<input type="text" name="room_floor" placeholder="room floor" required>';
echo '<input type="submit" name="remove" value="Submit">';
echo '</form>';

if (isset($_POST['remove']))
{
    $room_number = $_POST['room_number'];
    $room_floor = $_POST['room_floor'];
    var_dump($db->removeroom($room_number, $room_floor));
}