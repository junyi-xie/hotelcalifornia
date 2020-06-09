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

$reservations = "SELECT * FROM reservations";
$reservations_stmt = $db->pdo->query($reservations);
$reservations_results = $reservations_stmt->fetchAll();

$test = "SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id ORDER BY room_floor";
$test_stmt = $db->pdo->query($test);
$test_results = $test_stmt->fetchAll(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rooms - Hotel California</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/room.css">
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
						<a href="dashboard.php"><span class="fas fa-tachometer-alt mr-3"></span>Dashboard</a>
		  			</li>
		  
					<li class="active">
			  			<a href="rooms.php"><span class="fas fa-hotel mr-3"></span>Rooms</a>
					</li>

		  			<li>
		  				<a href="customers.php"><span class="fas fa-address-card mr-3"></span>Customers</a>
					</li>
					  
		  			<li>
		  				<a href="reservations.php"><span class="fas fa-user-alt mr-3"></span>Reservations</a>
		  			</li>
				  
					<li>
		  				<a href="pages.php"><i class="fa fa-paper-plane mr-3"></i>Pages</a>
					</li>

					<li>
						<a href="signout.php"><i class="fas fa-sign-out-alt mr-3"></i>Sign Out</a>
					</li>
					  
				</ul>	   

	  		</div>
		
		</nav>

  		<div id="content" class="p-4 p-md-5 pt-5">

			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Price</th>
						<th>Number</th>
						<th>Floor</th>
						<th>Category</th>
						<th>Description</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($test_results as $room): ?>
					<tr>
						<td><?=$room['id']?></td>
						<td><?=$room['room_name']?></td>
						<td><?=$room['room_price']?></td>
						<td><?=$room['room_number']?></td>
						<td><?=$room['room_floor']?></td>
						<td><?=$room['category_name']?></td>
						<td><?=$room['room_description']?></td>	
						<td class="actions">
                    		<a href="update.php?id=<?=$room['id']?>" class="edit"><i class="fas fa-pen"></i></a>
                    		<a href="delete.php?id=<?=$room['id']?>" class="trash"><i class="fas fa-trash-alt"></i></a>
                		</td>
					</tr>
					<?php endforeach;?>
				</tbody>


			</table>
		














		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>	
</body>
</html>