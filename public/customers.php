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
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customers - Hotel California</title>
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
						<a href="dashboard.php"><span class="fas fa-tachometer-alt mr-3"></span>Dashboard</a>
		  			</li>
		  
					<li>
					  	<a href="#submenuRooms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fas fa-hotel mr-3"></span>Rooms</a>

              			<ul class="collapse list-unstyled" id="submenuRooms">

                			<li>
                    			<a href="rooms.php?page=1"><i class="fas fa-bed mr-3"></i>Show Rooms</a>
							</li>
							
               	 			<li>
                    			<a href="create.php"><i class="fas fa-plus mr-3-alt"></i>Add Rooms</a>
                			</li>
        
						</ul>
						  
					</li>

		  			<li class="active">
		  				<a href="customers.php"><span class="fas fa-address-card mr-3"></span>Customers</a>
					</li>
					  
		  			<li>
		  				<a href="reservations.php"><span class="fas fa-user-alt mr-3"></span>Reservations</a>
		  			</li>
				  
					<li>
					  	<a href="#submenuPages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-paper-plane mr-3"></i>Pages</a>

              			<ul class="collapse list-unstyled" id="submenuPages">

						  	<li>
                    			<a href="#"><i class="fas fa-map-marker-alt mr-3"></i>Location</a>
							</li>

                			<li>
                    			<a href="#"><i class="far fa-address-book mr-3"></i>Contact</a>
							</li>
									
							<li>
								<a href="#"><i class="fas fa-clock mr-3"></i>Openinghours</a>
							</li>

							<li>
								<a href="#"><i class="fas fa-exclamation-triangle mr-3"></i>Alerts</a>
							</li>
        
						</ul>
						  
					</li>

					<li>
						<a href="signout.php"><i class="fas fa-sign-out-alt mr-3"></i>Sign Out</a>
					</li>
					  
				</ul>	   

	  		</div>
		
		</nav>

  		<div id="content" class="p-4 p-md-5 pt-5">
		
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
  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>	
</body>
</html>