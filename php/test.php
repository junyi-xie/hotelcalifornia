<?php
require_once 'class.php';

$db = new Database('localhost','root','','hotelcalifornia');

$rooms = "SELECT * FROM rooms";
$rooms_stmt = $db->pdo->query($rooms);
$rooms_results = $rooms_stmt->fetchAll();

$customers = "SELECT * FROM customers";
$customers_stmt = $db->pdo->query($customers);
$customers_results = $customers_stmt->fetchAll();

$categories = "SELECT * FROM categories";
$categories_stmt = $db->pdo->query($categories);
$categories_results = $categories_stmt->fetchAll();

$reservations = "SELECT * FROM reservations";
$reservations_stmt = $db->pdo->query($reservations);
$reservations_results = $reservations_stmt->fetchAll();

session_start();
?>

<h1>SHOW ROOM</h1>

<form method="post">
<select name="id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select category type -- </option>
    <option value="1">Single Room</option>
    <option value="2">Double Room</option>
    <option value="3">Family Room</option>
    <option value="4">Apartment</option>
</select>
<input type="hidden" name="show">
</form>

<!-- <form method="post">
<input type="number" min="1" max="4" name="id" placeholder="id" required>
<input type="submit" name="show" value="Submit">
</form> -->

<?php
echo '<pre>';

if (isset($_POST['show']))
{
    $id = $_POST['id'];
    print_r($db->showroom($id));
}

echo '</pre>';
echo '<br/><br/>';
?>

<h1>ADD ROOM</h1>
<form method="post">
<input type="text" name="name" placeholder="room name" required>
<input type="text" name="price" placeholder="room price" required>
<input type="text" name="number" placeholder="room number" required>


<!-- <input type="text" name="floor" placeholder="room floor" required> -->
<select name="floor">
<option hidden disabled selected value> -- select floor -- </option>
<option value="1F">First Floor</option>
<option value="2F">Second Floor</option>
<option value="3F">Third Floor</option>
<option value="4F">Fourth Floor</option>
<option value="5F">Fifth Floor</option>

</select>


<select name="category_id">
<option hidden disabled selected value> -- select which category-- </option>
<?php foreach ($categories_results as $category):?>
     
     <br><option value="<?=$category['id']?>"><?=$category['category_name']?></option>
 
 
 <?php endforeach;?>
</select>
<!-- <input type="text" name="category_id" placeholder="category id" required>  -->
<textarea name="description" placeholder="enter description" required></textarea>
<input type="submit" name="add" value="Add room">
</form>
<?php
if (isset($_POST['add']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $number = $_POST['number'];
    $floor = $_POST['floor'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    print_r($db->addroom($name, $price, $number, $floor, $category_id, $description));
}

echo '<br/><br/>';


?>



<h1>REMOVE ROOM</h1>

<form method="post">
<select name="room_id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select which room to delete -- </option>
    <?php foreach ($rooms_results as $room):?>
     
        <br><option value="<?=$room['id']?>"><?=$room['room_name']?></option>
    
    
    <?php endforeach;?>
</select>
<input type="hidden" name="remove">
</form>

<?php
echo '<br/><br/>';
if (isset($_POST['remove']))
{
    $room_id = $_POST['room_id'];
    var_dump($db->removeroom($room_id));
}
?>


<h1>EDIT ROOM</h1>

<form method="post">

<select name="edit_room_id">
<option hidden disabled selected value> -- select old room name -- </option>
<?php foreach ($rooms_results as $key => $room):?>
    <option value="<?=$room['id']?>"><?=$room['room_name']?></option>
<?php endforeach; ?>
</select>

<input type="text" name="name" placeholder=" new room name" required>
<input type="text" name="price" placeholder=" new room price" required>
<input type="text" name="number" placeholder="new room number" required>


<!-- <input type="text" name="floor" placeholder="room floor" required> -->
<select name="floor">
<option hidden disabled selected value> -- select floor -- </option>
<option value="1F">First Floor</option>
<option value="2F">Second Floor</option>
<option value="3F">Third Floor</option>
<option value="4F">Fourth Floor</option>
<option value="5F">Fifth Floor</option>
</select>

<select name="category_id">
<option hidden disabled selected value> -- select category -- </option>
<?php foreach ($categories_results as $category):?>
     
     <br><option value="<?=$category['id']?>"><?=$category['category_name']?></option>
 
 
 <?php endforeach;?>
</select>
<!-- <input type="text" name="category_id" placeholder="category id" required>  -->
<textarea name="description" placeholder="enter description" required></textarea>
<input type="submit" name="edit" value="edit room">


</form>

<?php
echo '<br/><br/>';
if (isset($_POST['edit']))
{
    $id = $_POST['edit_room_id'];
    $room_name = $_POST['name'];
    $room_price = $_POST['price'];
    $room_number = $_POST['number'];
    $room_floor = $_POST['floor'];
    $category_id = $_POST['category_id'];
    $room_description = $_POST['description'];
    var_dump($db->editroom($id, $room_name, $room_price, $room_number, $room_floor, $category_id, $room_description));
}
?>


<!-- <form method="post">
<input type="text" name="room_number" placeholder="room number" required>
<input type="text" name="room_floor" placeholder="room floor" required>
<input type="submit" name="remove" value="Submit">
</form> -->



<h1>CUSTOMER FORM</h1>
<form method="post">
<input type="text" name="first_name" placeholder="first name" required>
<input type="text" name="last_name" placeholder="last name" required>
<input type="text" name="address" placeholder="address" required>
<input type="text" name="zipcode" placeholder="zip code" required>
<input type="text" name="city" placeholder="city" required>
<input type="text" name="country" placeholder="country" required>
<input type="tel" name="telephone" placeholder="telephone" required>
<input type="email" name="email" placeholder="email" required>
<input type="submit" name="customer" value="Submit">
</form>

<?php
echo '<br/><br/>';
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
?>


<h1>SHOW CUSTOMERS</h1>

<form method="post">
<select name="customers_id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select customer -- </option>
    <?php foreach ($customers_results as $customers):?>
     
        <br><option value="<?=$customers['id']?>"><?=$customers['customer_first_name'], str_repeat('&nbsp;', 1), $customers['customer_last_name']?></option>
    
    
    <?php endforeach;?>
</select>
<input type="hidden" name="show_customers">
</form>

<?php
echo '<pre>';
if (isset($_POST['show_customers']))
{
    $id = $_POST['customers_id'];
    print_r($db->showcustomers($id));
}
echo '</pre>';
echo '<br/><br/>';
?>


<h1>BOOK RESERVATION</h1>


<form method="post">
<input type="date" name="start_date" placeholder="start_date">
<input type="date" name="end_date" placeholder="end_date">
<select name="customer_id">
<option hidden disabled selected value> -- select which customer you are -- </option>
    <?php foreach ($customers_results as $customers):?>
     
        <br><option value="<?=$customers['id']?>"><?=$customers['customer_first_name'], str_repeat('&nbsp;', 1), $customers['customer_last_name']?></option>
    
    
    <?php endforeach;?>
</select>

<select name="select_room">
<option hidden disabled selected value> -- select which room you wanna book -- </option>
<?php foreach ($rooms_results as $key => $room):?>
    <option value="<?=$room['id']?>"><?=$room['room_name']?></option>
<?php endforeach; ?>
</select>
<input type="submit" name="book_room" value="book room">

</form>

<?php
if (isset($_POST['book_room']))
{
    $reservation_start_date = $_POST['end_date'];
    $reservation_end_date = $_POST['start_date'];
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['select_room'];
    
    print_r($db->reservation($reservation_start_date, $reservation_end_date, $customer_id, $room_id));
}
?>

<br/><br/>