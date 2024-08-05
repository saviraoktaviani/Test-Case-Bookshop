<?php
include '../db.php';

if (isset($_POST['id'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);

    $query = "UPDATE categories SET name='$name' WHERE id=$id";
    if ($conn->query($query)) {
        header('Location: list.php?message=Category updated successfully');
        exit;
    } else {
        die('Error updating category: ' . $conn->error);
    }
} else {
    die('Invalid request');
}
?>