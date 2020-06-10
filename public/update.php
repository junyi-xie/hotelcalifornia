<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}

if(isset($_POST['update']))
{
    $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : NULL;
    $room_name = isset($_POST['room_name']) ? $_POST['room_name'] : '';
    $room_price = isset($_POST['room_price']) ? $_POST['room_price'] : '';
    $room_number = isset($_POST['room_number']) ? $_POST['room_number'] : '';
    $room_floor = isset($_POST['room_floor']) ? $_POST['room_floor'] : '';
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
    $room_description = isset($_POST['room_description']) ? $_POST['room_description'] : '';
    $id = $_GET['id'];
    $db->editroom($room_id, $room_name, $room_price, $room_number, $room_floor, $category_id, $room_description, $id);
    $db->redirect('rooms.php?page=1');
}

    $stmt = $db->pdo->prepare("SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id WHERE room_id = :room_id");
    $stmt->execute(array(':room_id'=>$_GET['id']));
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel California</title>
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

                			<li class="active">
                    			<a href="rooms.php?page=1"><i class="fas fa-bed mr-3"></i>Show Rooms</a>
							</li>
							
               	 			<li>
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
						<a href="signout.php"><i class="fas fa-sign-out-alt mr-3"></i>Sign Out</a>
					</li>
					  
				</ul>	   

	  		</div>
		
		</nav>

  		<div id="content" class="p-4 p-md-5 pt-5">
        
            <form action="update.php?id=<?=$results['room_id']?>" method="post">

                <input type="number" name="room_id" value="<?=$results['room_id']?>" placeholder="<?=$results['room_id']?>">
                <input type="text" name="room_name" value="<?=$results['room_name']?>" placeholder="<?=$results['room_name']?>">
                <input type="text" name="room_price" value="<?=$results['room_price']?>" placeholder="<?=$results['room_price']?>">
                <input type="text" name="room_number" value="<?=$results['room_number']?>" placeholder="<?=$results['room_number']?>">
                <input type="text" name="room_floor" value="<?=$results['room_floor']?>" placeholder="<?=$results['room_floor']?>">
                <input type="text" name="category_id" value="<?=$results['category_id']?>" placeholder="<?=$results['category_id']?>">
                <input type="text" name="room_description" value="<?=$results['room_description']?>" placeholder="<?=$results['room_description']?>">
                <input type="submit" name="update" value="update">
        
            </form>

        </div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>	
</body>
</html>



<!-- <?php
echo '<br/><br/>';
// if (isset($_POST['edit']))
// {
//     $id = $_POST['edit_room_id'];
//     $room_name = $_POST['name'];
//     $room_price = $_POST['price'];
//     $room_number = $_POST['number'];
//     $room_floor = $_POST['floor'];
//     $category_id = $_POST['category_id'];
//     $room_description = $_POST['description'];
//     var_dump($db->editroom($id, $room_name, $room_price, $room_number, $room_floor, $category_id, $room_description));
// }
?> -->
