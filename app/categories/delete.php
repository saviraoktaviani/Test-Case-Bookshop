<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete related books
        $deleteBooks = $conn->query("DELETE FROM books WHERE category_id=$id");

        // Delete the category
        $deleteCategory = $conn->query("DELETE FROM categories WHERE id=$id");

        // Commit transaction
        $conn->commit();

        echo "<script>
                localStorage.setItem('message', 'Kategori berhasil dihapus');
                window.close();
                window.opener.location.reload();
              </script>";
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();

        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.close();
              </script>";
    }
} else {
    echo "<script>
            alert('No category ID provided');
            window.close();
          </script>";
}
?>