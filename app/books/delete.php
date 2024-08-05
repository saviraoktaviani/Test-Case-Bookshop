<?php
include '../db.php';

if (isset($_GET['id'])) {
    $book_id = $conn->real_escape_string($_GET['id']);
    $delete_query = "DELETE FROM books WHERE id=$book_id";

    if ($conn->query($delete_query) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();

// Redirect back to the book list page
header("Location: list.php");
exit;
?>