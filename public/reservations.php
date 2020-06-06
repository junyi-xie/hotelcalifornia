<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}

$rooms = "SELECT * FROM rooms";
$rooms_stmt = $db->pdo->query($rooms);
$rooms_results = $rooms_stmt->fetchAll();

$customers = "SELECT * FROM customers";
$customers_stmt = $db->pdo->query($customers);
$customers_results = $customers_stmt->fetchAll();

$categories = "SELECT * FROM categories";
$categories_stmt = $db->pdo->query($categories);
$categories_results = $categories_stmt->fetchAll();

$reservations = "SELECT * FROM rooms INNER JOIN reservations ON rooms.id = reservations.id";
$reservations_stmt = $db->pdo->query($reservations);
$reservations_results = $reservations_stmt->fetchAll();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Hotel California</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b57a0b7ac6.js" crossorigin="anonymous"></script>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch">

		<nav id="sidebar">

			<div class="custom-menu">
				
				<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-bars"></i><span class="sr-only">Toggle Menu</span></button>

			</div>

			<div class="p-4 pt-5">

			  <h1><span class="logo">California</span></h1>

				<ul class="list-unstyled components">

		  			<li>
						<a href="dashboard.php"><span class="fas fa-home mr-3"></span>Dashboard</a>
		  			</li>
		  
					<li>
			  			<a href="rooms.php"><span class="fas fa-hotel mr-3"></span>Rooms</a>
					</li>

		  			<li>
		  				<a href="customers.php"><span class="fas fa-user-alt mr-3"></span>Customers</a>
					</li>
					  
		  			<li class="active">
		  				<a href="reservations.php"><span class="fas fa-bed mr-3"></span>Reservations</a>
		  			</li>
				  
					<li>
		  				<a href="#"><i class="fa fa-paper-plane mr-3"></i>Contact</a>
					</li>

					<li>
						<a href="signout.php"><i class="fas fa-sign-out-alt mr-3"></i>Sign Out</a>
					</li>
					  
				</ul>	   

	  		</div>
		
		</nav>

  		<div id="content" class="p-4 p-md-5 pt-5">
		
          <h1>BOOK RESERVATION</h1>


<form method="post">
<input type="date" min="<?php echo date('Y-m-d')?>" name="start_date" placeholder="start_date">
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


<?php
if (isset($_POST['show_res']))
{
    $id = $_POST['res_id'];
    print_r($db->showreservation($id));
}
?>


  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>	
</body>
</html>