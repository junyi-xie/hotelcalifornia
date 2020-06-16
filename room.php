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

<div class="container-fluid">
    <div class="card text-center mt-3">
        <div class="card-header">
            Room Type: <?php echo $results['category_name'];?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $results['room_name'];?></h5>
            <p class="card-text"><?php echo $results['room_description'];?></p>
            <a class="btn btn-primary" href="book.php?id=<?php echo $_GET['id'];?>">Book Room</a>
        </div>
        <div class="card-footer text-muted">
            Room Details: Floor <?php echo $results['room_floor'];?>, Number <?php echo $results['room_number'];?>, &euro;<?php echo $results['room_price'];?>
            <br/>
            <a class="btn btn-primary mt-2" href="category.php?categoryid=<?php echo $results['category_id']?>">Return</a>
        </div>
    </div>
</div>
    
</body>
</html>