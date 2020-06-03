<?php
require_once 'class.php';

session_start();

$db = new Database('localhost','root','','hotelcalifornia');
?>

<?php

//select query and fetch all
$sql = "SELECT * FROM rooms";
$smt = $db->pdo->query($sql);
$results = $smt->fetchAll();

//select query for customers
$sto = "SELECT * FROM customers";
$stmt = $db->pdo->query($sto);
$resultsC = $stmt->fetchAll();

// select query category
$sto2 = "SELECT * FROM categories";
$stmt2 = $db->pdo->query($sto2);
$resultsCC = $stmt2->fetchAll();
?>

<h1>SHOW ROOM</h1>

<form method="post">
<select name="id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select an option -- </option>
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
<input type="text" name="floor" placeholder="room floor" required>
<select name="category_id">
<option hidden disabled selected value> -- select an option -- </option>
<?php foreach ($resultsCC as $category):?>
     
     <br><option value="<?=$category['id']?>"><?=$category['category_name']?></option>
 
 
 <?php endforeach;?>
</select>
<!-- <input type="text" name="category_id" placeholder="category id" required>  -->
<textarea name="description" placeholder="enter description" required></textarea>
<input type="submit" name="add" value="Submit">
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
    var_dump($db->addroom($name, $price, $number, $floor, $category_id, $description));
}

echo '<br/><br/>';


?>



<h1>REMOVE ROOM</h1>

<form method="post">
<select name="room_id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select an option -- </option>
    <?php foreach ($results as $room):?>
     
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


<!-- <form method="post">
<input type="text" name="room_number" placeholder="room number" required>
<input type="text" name="room_floor" placeholder="room floor" required>
<input type="submit" name="remove" value="Submit">
</form> -->

<h1>SHOW CUSTOMERS</h1>

<form method="post">
<select name="customers_id" onchange="this.form.submit()">
<option hidden disabled selected value> -- select an option -- </option>
    <?php foreach ($resultsC as $customers):?>
     
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
echo '<pre>';
?>


