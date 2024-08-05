<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $publication_date = $conn->real_escape_string($_POST['publication_date']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $pages = $conn->real_escape_string($_POST['pages']);
    $category_id = $conn->real_escape_string($_POST['category_id']);
    
    // Menangani upload gambar
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];
    
    // Ekstensi file yang diizinkan
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));
    
    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 5000000) { // Maksimal 5MB
                $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                $imageDestination = 'uploads/' . $imageNameNew;
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0777, true);
                }
                move_uploaded_file($imageTmpName, $imageDestination);
                
                $sql = "INSERT INTO books (title, author, publication_date, publisher, pages, category_id, image_path) 
                        VALUES ('$title', '$author', '$publication_date', '$publisher', $pages, $category_id, '$imageDestination')";
                
                if ($conn->query($sql) === TRUE) {
                    header("Location: list.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Ukuran file terlalu besar!";
            }
        } else {
            echo "Terjadi kesalahan saat mengupload file!";
        }
    } else {
        echo "Ekstensi file tidak diperbolehkan!";
    }
}

$result = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="container">
        <h1>Add New Book</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="titlSSe">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="publication_date">Publication Date:</label>
            <input type="date" id="publication_date" name="publication_date" required>

            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" required>

            <label for="pages">Pages:</label>
            <input type="number" id="pages" name="pages" required>

            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" value="Add Book">
        </form>
    </div>
</body>
</html>