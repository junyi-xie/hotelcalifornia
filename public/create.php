<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}

if (isset($_POST['add_room']))
{
    $name = $_POST['room_name'];
    $price = $_POST['room_price'];
    $number = $_POST['room_number'];
    $floor = $_POST['room_floor'];
    $category_id = $_POST['category_id'];
    $description = $_POST['room_description'];
	$db->addroom($name, $price, $number, $floor, $category_id, $description);
}

$stmt = $db->pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel California</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/create.css">
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

              			<ul class="collapse list-unstyled show" id="submenuRooms">

                			<li>
                    			<a href="rooms.php?page=1"><i class="fas fa-bed mr-3"></i>Show Rooms</a>
							</li>
							
               	 			<li class="active">
                    			<a href="create.php"><i class="fas fa-plus mr-3-alt"></i>Add Room</a>
                			</li>
        
						  </ul>
						  
					</li>	

		  			<li>
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
						<a href="profile.php"><i class="fas fa-user-circle mr-3"></i>Profile</a>
					</li>

					<li>
						<a href="signout.php"><i class="fas fa-sign-out-alt mr-3"></i>Sign Out</a>
					</li>
					  
				</ul>	   

	  		</div>
		
		</nav>

  		<div id="content" class="p-4 p-md-5 pt-5">
		
        	<main>
				
				<form action="create.php" method="post">

  					<div class="form-row">
						
						<div class="col">

							<label for="room_id">Room Identity</label>

							<input class="form-control" type="text" placeholder="Auto increment" readonly>
						
						</div>

   	 					<div class="col">

							<label for="room_name">Room Name</label>

							<input type="text" class="form-control" name="room_name" id="room_name" placeholder="Input name...">			

						</div>

					</div>

					<div class="form-row mt-4">

						<div class="col">

							<label for="room_price">Room Price</label>

							<input type="number" class="form-control" name="room_price" id="room_price" placeholder="Input price...">
	
						</div>

						<div class="col">

							<label for="room_number">Room Number</label>

							<input type="number" class="form-control" name="room_number" id="room_number" placeholder="Input number...">

						</div>
					
					</div>

					<div class="form-row mt-4">
						
						<div class="col">

							<label for="room_floor">Room Floor</label>

							<input type="number" class="form-control" name="room_floor" id="room_floor" placeholder="Input floor...">

						</div>

						<div class="col">

							<label for="category_id">Room Type</label>

							<select name="category_id" class="form-control" id="category_id">

								<option hidden disabled selected value>Select Category</option>

								<?php foreach ($results as $category): ?>

									<option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

								<?php endforeach; ?>

							</select>

						</div>

					</div>

					<div class="form-group mt-4">

						<label for="room_description">Room Description</label>
						
						<textarea name="room_description" class="form-control" id="room_description" rows="5" placeholder="Input description..."></textarea>
						
					</div>

					<button type="submit" name="add_room" class="btn btn-primary">Add Room</button>

					<?php if (isset($_SESSION['message'])) {
						echo $_SESSION['message'];
					}
					?>
				
				</form>

			</main> 
  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>	
</body>
</html>