<?php
include '../db.php';

// Ambil daftar kategori
$categories = $conn->query("SELECT * FROM categories");

// Ambil data buku berdasarkan ID
if (isset($_GET['id'])) {
    $book_id = $conn->real_escape_string($_GET['id']);
    $result = $conn->query("SELECT * FROM books WHERE id = $book_id");
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        die('Book not found');
    }
} else {
    die('No book ID provided');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <header>
        <h1>Edit Book</h1>
    </header>
   
    <div class="container">
        <form action="update_book.php" method="post" enctype="multipart/form-data">

        <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <?php if (!empty($book['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($book['image_path']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" width="100"><br>
            <?php endif; ?>


            <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required><br>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required><br>

            <label for="publication_date">Publication Date:</label>
            <input type="date" id="publication_date" name="publication_date" value="<?php echo htmlspecialchars($book['publication_date']); ?>" required><br>

            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" value="<?php echo htmlspecialchars($book['publisher']); ?>" required><br>

            <label for="pages">Pages:</label>
            <input type="number" id="pages" name="pages" value="<?php echo htmlspecialchars($book['pages']); ?>" required><br>

            <label for="category">Category:</label>
            <select id="category" name="category_id" required>
                <?php while ($row = $categories->fetch_assoc()) { ?>
                    <option value="<?php echo htmlspecialchars($row['id']); ?>" <?php echo ($row['id'] == $book['category_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['name']); ?>
                    </option>
                <?php } ?>
            </select><br>

         
            <button type="submit">Update</button>
            <a href="list.php" class="btn btn-update">Back to list</a>
        </form>
    </div>
</body>
</html>