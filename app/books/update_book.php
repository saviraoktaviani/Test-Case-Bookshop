<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $publication_date = $conn->real_escape_string($_POST['publication_date']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $pages = $conn->real_escape_string($_POST['pages']);
    $category_id = $conn->real_escape_string($_POST['category_id']);
    
    // Menangani upload gambar
    $imagePath = $_POST['current_image']; // Mengambil path gambar saat ini dari input tersembunyi

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageError = $image['error'];
        $imageType = $image['type'];

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
                    $imagePath = $imageDestination; // Update path gambar
                } else {
                    echo "Ukuran file terlalu besar!";
                    exit();
                }
            } else {
                echo "Terjadi kesalahan saat mengupload file!";
                exit();
            }
        } else {
            echo "Ekstensi file tidak diperbolehkan!";
            exit();
        }
    }

    $sql = "UPDATE books SET title='$title', author='$author', publication_date='$publication_date', publisher='$publisher', pages=$pages, category_id=$category_id, image_path='$imagePath' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method";
}