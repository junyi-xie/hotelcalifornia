<?php
require '../private/class.php';

echo 'welcome to the page of room with ID' . $_GET['id'];

?>

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


<!-- book room code -->
<label for="start date">startdate</label>
<input type="date" min="<?php echo date('Y-m-d')?>" name="start_date" placeholder="start_date">
<label for="start date">end date</label>
<input type="date" min="<?php echo date('Y-m-d', strtotime(' +1 day'))?>" name="end_date" placeholder="end_date">

<input type="hidden" name="test" value="<?php echo $_GET['id']?>">

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


    $reservation_start_date = $_POST['end_date'];
    $reservation_end_date = $_POST['start_date'];
    $room_id = $_GET['id'];


    $db->addcustomer($first_name, $last_name, $address, $zipcode, $city, $country, $telephone, $email);

    // $db->bookreservation($reservation_start_date, $reservation_end_date, $room_id);
}

?> 

<br>




<button>Book ROom!</button>


<a href="index.php">go back!</a>
