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

<h1>BOOK RESERVATION</h1>


<form method="post">
<label for="start date">startdate</label>
<input type="date" min="<?php echo date('Y-m-d')?>" name="start_date" placeholder="start_date">
<label for="start date">end date</label>
<input type="date" min="<?php echo date('Y-m-d')?>" name="end_date" placeholder="end_date">
<select name="customer_id">
<option hidden disabled selected value> -- select which customer you are -- </option>
    <?php foreach ($customers_results as $customers):?>
     
        <br><option value="<?=$customers['id']?>"><?=$customers['customer_first_name'], str_repeat('&nbsp;', 1), $customers['customer_last_name']?></option>
    
    
    <?php endforeach;?>
</select>

<select name="select_room">
<option hidden disabled selected value> -- select which room you wanna book -- </option>
<?php foreach ($rooms_results as $key => $room):?>
    <option value="<?=$room['room_id']?>"><?=$room['room_name']?></option>
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
    
    print_r($db->bookreservation($reservation_start_date, $reservation_end_date, $customer_id, $room_id));
}
?>

<br/><br/>

<h1>SHOW RESERVATIONS</h1>
<form method="post">

<select name="res_id" onchange="this.form.submit()">
<option hidden disabled selected value> -- show which room got booked -- </option>
    <?php foreach ($reservations_results as $reservation):?>
     
        <br><option value="<?=$reservation['id']?>"><?=$reservation['room_name']?></option>
    
    
    <?php endforeach;?>
</select>
<input type="hidden" name="show_res">
</form>

<pre>
<?php
if (isset($_POST['show_res']))
{
    $id = $_POST['res_id'];
    print_r($db->showreservation($id));
}
?>
</pre>