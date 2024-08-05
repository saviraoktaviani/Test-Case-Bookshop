<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $sql = "INSERT INTO categories (name) VALUES ('$category')";
    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="container">
        <h3>Add Category</h3>
        <form action="add.php" method="POST">
            <input type="text" name="category" placeholder="Enter category name" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>