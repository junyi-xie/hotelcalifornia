<?php
require 'class.php';

$rooms = "SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id ORDER BY room_id";
$rooms_stmt = $db->pdo->query($rooms);
$rooms_results = $rooms_stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel California</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b57a0b7ac6.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container p-3">
        welcome to best hotel!

        <?php foreach ($rooms_results as $room):?>
            <ul class="list-group mt-5">
                <li class="list-group-item">Room id: <?=$room['room_id']?></li>
                <li class="list-group-item">Room name: <?=$room['room_name']?></li>
                <li class="list-group-item"> Room price: &euro;<?=$room['room_price']?></li>
                <li class="list-group-item">Room number: <?=$room['room_number']?></li>
                <li class="list-group-item">Room floor: <?=$room['room_floor']?></li>
                <li class="list-group-item">Room category: <?=$room['category_name']?></li>
                <li class="list-group-item">Room description: <?=$room['room_description']?></li>
                <li class="list-group-item"><a href="book.php?id=<?=$room['room_id']?>">view room</a></li>
            </ul>
        <?php endforeach; ?>
    
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>