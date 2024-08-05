<?php
include '../db.php';

$filter_query = "";
if (isset($_GET['category_id']) && $_GET['category_id'] != "") {
    $category_id = $conn->real_escape_string($_GET['category_id']);
    $filter_query = " WHERE category_id=$category_id";
} elseif (isset($_GET['search_text'])) {
    $search_text = $conn->real_escape_string($_GET['search_text']);
    $filter_query = " WHERE title LIKE '%$search_text%' OR author LIKE '%$search_text%' OR publisher LIKE '%$search_text%'";
} elseif (isset($_GET['publication_date'])) {
    $publication_date = $conn->real_escape_string($_GET['publication_date']);
    $filter_query = " WHERE publication_date='$publication_date'";
}

$result = $conn->query("SELECT * FROM books" . $filter_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="style.css">

    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>
<body>
    <header>
   
   <div class="satu">
  
   <center><h1>Book List</h1></center>
   <a href="add.php" class="btn satu"><span>+</span>Add Data</a>
   </div>
        


        <form method="GET" id="filterForm" class="filter-form">
        

            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" onchange="document.getElementById('filterForm').submit();">
                <option value="">All Categories</option>
                <?php
                // Fetch categories from the database
                $category_result = $conn->query("SELECT id, name FROM categories");
                while ($category_row = $category_result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($category_row['id']) . '"';
                    if (isset($_GET['category_id']) && $_GET['category_id'] == $category_row['id']) {
                        echo ' selected';
                    }
                    echo '>' . htmlspecialchars($category_row['name']) . '</option>';
                }
                ?>
            </select>
        </form>

      
    </header>

<?php
if ($result->num_rows > 0) {
    // Output table header
    echo '<table id="booksTable">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Title</th>';
    echo '<th>Author</th>';
    echo '<th>Publication Date</th>';
    echo '<th>Publisher</th>';
    echo '<th>Pages</th>';
    echo '<th>Category ID</th>';
    echo '<th>Image</th>'; // Tambahkan kolom untuk gambar
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output table rows
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["id"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["title"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["author"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["publication_date"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["publisher"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["pages"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["category_id"]) . '</td>';
        echo '<td><img src="' . htmlspecialchars($row["image_path"]) . '" alt="' . htmlspecialchars($row["title"]) . '" width="100"></td>'; // Tambahkan elemen gambar
        echo '<td>';
        echo '<a href="update.php?id=' . urlencode($row['id']) . '" class="btn btn-edit">Edit</a>';
        echo '<a href="delete.php?id=' . urlencode($row['id']) . '" class="btn btn-delete" onclick="return confirmDelete();">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No records found.</p>';
}
?>

<script>
    $(document).ready(function() {
        $('#booksTable').DataTable();
    });

    function confirmDelete() {
        return confirm('Apa anda yakin ingin menghapus data ini?');
    }
</script>

<a href="../index.php" class="back">Back to Dashboard</a>
</body>
</html>