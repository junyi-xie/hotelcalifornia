<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$records_per_page = 10;

$stmt = $db->pdo->prepare("SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id ORDER BY room_id LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_rooms = $db->pdo->query("SELECT COUNT(*) FROM rooms")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel California</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/table.css">
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

                			<li class="active">
                    			<a href="rooms.php?page=1"><i class="fas fa-bed mr-3"></i>Show Rooms</a>
							</li>
							
               	 			<li>
                    			<a href="create.php"><i class="fas fa-plus mr-3-alt"></i>Add Room</a>
                			</li>
        
						</ul>
						  
					</li>		  
			  
		  			<li>
		  				<a href="customers.php?page=1"><span class="fas fa-address-card mr-3"></span>Customers</a>
					</li>
					  
		  			<li>
		  				<a href="reservations.php?page=1"><span class="fas fa-user-alt mr-3"></span>Reservations</a>
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

			<table>

				<thead>
					<tr>
						<td>#</td>
						<td>Room Name</td>
						<td>Room Price</td>
						<td>Room Number</td>
						<td>Room Floor</td>
						<td>Room Type</td>
						<td>Room Description</td>
						<td class="actions">Actions</td>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($results as $room): ?>
					<tr>
						<td><?=$room['room_id']?></td>
						<td><?=$room['room_name']?></td>
						<td>&euro;<?=$room['room_price']?></td>
						<td><?=$room['room_number']?></td>
						<td><?=$room['room_floor']?></td>
						<td><?=$room['category_name']?></td>
						<td><?=$room['room_description']?></td>	
						<td class="actions">
                    		<a href="update.php?id=<?=$room['room_id']?>" class="edit"><i class="fas fa-edit mr-2"></i>Edit</a>
                    		<a href="delete.php?id=<?=$room['room_id']?>" class="delete"><i class="fas fa-trash-alt mr-2 ml-3"></i>Delete</a>
                		</td>
					</tr>
					<?php endforeach;?>
				</tbody>

			</table>

			<div class="page">

				<?php if ($page > 1): ?>
				<a class="left" href="rooms.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left"></i></a>
				<?php endif; ?>

				<?php if ($page*$records_per_page < $num_rooms): ?>
				<a class="right" href="rooms.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right"></i></a>
				<?php endif; ?>
				
			</div>
		  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>	
</body>
</html>