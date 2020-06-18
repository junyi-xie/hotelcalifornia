<?php
require '../private/class.php';

$stmt = $db->pdo->prepare("SELECT * FROM categories INNER JOIN rooms ON categories.category_id = rooms.category_id WHERE room_id = :room_id");
$stmt->bindParam(':room_id', $_GET['id']);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
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

<div class="container p-3">
    <main class="text-center">
        <h2>Room Detail:</h2>
    </main>

    <ul class="list-group list-group-horizontal justify-content-center text-center">
        <li class="list-group-item"><b>Room Type</b><br><?php echo $results['category_name'];?></li>
        <li class="list-group-item"><b>Room Name</b><br><?php echo $results['room_name'];?></li>
        <li class="list-group-item"><b>Room Number</b><br><?php echo $results['room_number'];?></li>
        <li class="list-group-item"><b>Room Floor</b><br><?php echo $results['room_floor'];?></li>
        <li class="list-group-item"><b>Room Price</b><br>&euro;<?php echo $results['room_price'];?></li>
        <li class="list-group-item"><b>Link</b><br><a href="book.php?id=<?php echo $_GET['id'];?>">Book Room</a></li>
        <li class="list-group-item"><b>Link</b><br><a href="category.php?categoryid=<?php echo $results['category_id']?>">Go Back</a></li>
    </ul>
</div>
    
</body>
</html>