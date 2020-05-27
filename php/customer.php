<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');

echo '<h1>CUSTOMER FORM</h1>';
echo '<form method="post">';
echo '<input type="text" name="first_name" placeholder="first name" required>';
echo '<input type="text" name="last_name" placeholder="last name" required>';
echo '<input type="text" name="address" placeholder="address" required>';
echo '<input type="text" name="zipcode" placeholder="zip code" required>';
echo '<input type="text" name="city" placeholder="city" required>';
echo '<input type="text" name="country" placeholder="country" required>';
echo '<input type="tel" name="telephone" placeholder="telephone" required>';
echo '<input type="email" name="email" placeholder="email" required>';
echo '<input type="submit" name="customer" value="Submit">';
echo '</form>';

if (isset($_POST['customer']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    var_dump($db->addcustomer($first_name, $last_name, $address, $zipcode, $city, $country, $telephone, $email));
}

echo '<input type="datetime" name="" id="">';