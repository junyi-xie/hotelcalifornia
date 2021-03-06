<?php
require 'class.php';

if(!$db->loggedin())
{
 $db->redirect('signin.php');
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel California</title>
	<link rel="stylesheet" href="assets/css/admin.css">
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
						<a href="dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
		  			</li>
		  
					<li>
					  	<a href="#submenuRooms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-hotel mr-3"></i>Rooms</a>

              			<ul class="collapse list-unstyled" id="submenuRooms">

                			<li>
                    			<a href="rooms.php?page=1"><i class="fas fa-bed mr-3"></i>Show Rooms</a>
							</li>
							
               	 			<li>
                    			<a href="create.php"><i class="fas fa-plus mr-3-alt"></i>Add Room</a>
                			</li>
        
						</ul>
						  
					</li>

		  			<li>
		  				<a href="customers.php?page=1"><i class="fas fa-address-card mr-3"></i>Customers</a>
					</li>
					  
		  			<li>
		  				<a href="reservations.php?page=1"><i class="fas fa-user-alt mr-3"></i>Reservations</a>
		  			</li>
				  
					<li>
					  	<a href="#submenuPages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-paper-plane mr-3"></i>Pages</a>

              			<ul class="collapse list-unstyled show" id="submenuPages">

						  	<li class="active">
                    			<a href="location.php"><i class="fas fa-map-marker-alt mr-3"></i>Location</a>
							</li>

                			<li>
                    			<a href="contact.php"><i class="far fa-address-book mr-3"></i>Contact</a>
							</li>
									
							<li>
								<a href="openinghours.php"><i class="fas fa-clock mr-3"></i>Openinghours</a>
							</li>

							<li>
								<a href="alerts.php"><i class="fas fa-exclamation-triangle mr-3"></i>Alerts</a>
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

			<h2>Location!</h2>
			
			<!-- wip -->

		    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ea est praesentium cupiditate necessitatibus natus aliquam soluta exercitationem ipsum illo id possimus quasi doloribus, neque ipsa, a aut vero itaque.</p>
		    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ea est praesentium cupiditate necessitatibus natus aliquam soluta exercitationem ipsum illo id possimus quasi doloribus, neque ipsa, a aut vero itaque.</p>
		  
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="assets/js/main.js"></script>	
</body>
</html>