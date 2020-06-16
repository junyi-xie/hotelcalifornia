<?php
require '../private/class.php';

$stmt = $db->pdo->prepare("SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id WHERE rooms.category_id = :category_id ORDER BY room_id");
$stmt->bindParam(':category_id', $_GET['categoryid']);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel California</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <main class="text-center pt-3">
    <h2>Please select your room!</h2>
        <a class="btn btn-outline-primary" href="index.php">Go back!</a>
    </main>
    <div class="wrapper mt-3 mb-3">
    <?php foreach ($results as $room):?>
        <ul class="list-group p-3">
            <li class="list-group-item">ID: <?=$room['room_id']?></li>
            <li class="list-group-item">Name: <?=$room['room_name']?></li>
            <li class="list-group-item">Price: &euro;<?=$room['room_price']?></li>
            <li class="list-group-item">Number: <?=$room['room_number']?></li>
            <li class="list-group-item">Floor: <?=$room['room_floor']?></li>
            <li class="list-group-item">Category: <?=$room['category_name']?></li>
            <li class="list-group-item">Description: <?=$room['room_description']?></li>
            <li class="list-group-item"><a href="room.php?id=<?=$room['room_id']?>">View Room</a></li>
        </ul>
    <?php endforeach;?>
    </div>
</div>

</body>
</html>