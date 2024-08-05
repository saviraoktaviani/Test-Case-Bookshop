<?php
include '../db.php';

// Fetch categories from the database
$result = $conn->query("SELECT * FROM categories");

// Handle success message
$message = '';
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}

// Check if query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Categories</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Modal CSS -->
    <link rel="stylesheet" href="modal.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Categories List</h1>
            <a href="add.php" class="btn">Add Data</a>
        </header>

        <table id="categoriesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?id=" . urlencode($row['id']) . "' class='btn btn-edit'>Edit</a> ";
                    echo "<a href='#' class='btn btn-delete' onclick='confirmDelete(" . $row['id'] . ")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <!-- <div id="modal" class="modal">
            <div class="modal-content">
                <div id="modal-header">Status</div>
                <p id="modal-message"></p>
                <div class="modal-buttons">
                    <button id="modal-close" class="btn-confirm"></button>
                </div>
            </div>
        </div>
    </div> -->
    <script>
        $(document).ready(function() {
            $('#categoriesTable').DataTable();

            // Check URL parameters for messages
            var urlParams = new URLSearchParams(window.location.search);
            var message = urlParams.get('message');

            if (message) {
                document.getElementById('modal-message').innerText = decodeURIComponent(message);
                document.getElementById('modal').style.display = 'flex';
            }
        });

        function confirmDelete(id) {
            if (confirm('Apa anda yakin ingin menghapus data ini?')) {
                window.open('delete.php?id=' + id, '_blank');
            }
        }

        document.getElementById('modal-close').onclick = function() {
            document.getElementById('modal').style.display = 'none';
        };
    </script>

<a href="../index.php" class="back">Back to Dashboard</a>
</body>
</html>