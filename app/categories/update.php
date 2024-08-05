<?php
include '../db.php';

if (isset($_GET['id'])) {
    $category_id = $conn->real_escape_string($_GET['id']);
    $result = $conn->query("SELECT * FROM categories WHERE id = $category_id");
    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        die('Category not found');
    }
} else {
    die('No category ID provided');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="update.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


</head>
<body>
    <header>
        <h1 class="satu"><center>Edit Category</center></h1>
    </header>
   
    <div class="container">
        <form action="update_category.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required><br>

            <button type="submit">Update</button>
            <a href="list.php" class="btn-back">Back to list</a>
        </form>
    </div>
</body>
</html>