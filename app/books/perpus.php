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

// Query untuk mendapatkan data buku sesuai dengan filter
$result = $conn->query("SELECT * FROM books" . $filter_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="perpus.css">

    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- Box item -->
    <link rel="stylesheet" 
     href="https:/unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- remix item -->
      <link href="https:/cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"/>
    <!-- remix item -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<!-- header -->

<header>
        <a href="#" class="logo"><img src="log.png" alt=""></a>
        <ul class="menulist">
            <a href="#home" class="active">Home</a>
            <a href="#buku">Book</a>
            <a href="#kontak">Contact</a>
            <a href="../../index.php" class="menu-btn">Back</a>
        </ul>

        <div class="profile">

<img src="profil.webp" alt="">
<span>User</span>
<i class='bx bx-caret-down'></i>

</div>
</div>
    </header>

    </section>

    <section id="home" class="home">
    <main class="contents">
        <div class="row">
            <div class="content-wrapper">
                <h1>WELCOME TO SAVIRA OKTAVIANI LIBRARY</h1>
                
                <a href="#filterForm" class="btn">MULAI MEMBACA</a>
            </div>

            <div class="content-wrapper">
                <img src="buku.png" alt="" srcset="" height="300px" width="300px">
            </div>

        </div>
    </main>



    

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
  </section>

  

    <main>
    
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $image_path = htmlspecialchars($row["image_path"]);
                echo '<div class="book-item">';
                echo '<img src="' . $image_path . '" alt="' . htmlspecialchars($row["title"]) . '" class="book-image">';
                echo '<div class="book-details">';
                echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                echo '<p><strong>Author:</strong> ' . htmlspecialchars($row["author"]) . '</p>';
                echo '<p><strong>Publication Date:</strong> ' . htmlspecialchars($row["publication_date"]) . '</p>';
                echo '<p><strong>Publisher:</strong> ' . htmlspecialchars($row["publisher"]) . '</p>';
                echo '<p><strong>Pages:</strong> ' . htmlspecialchars($row["pages"]) . '</p>';
                echo '<p><strong>Category ID:</strong> ' . htmlspecialchars($row["category_id"]) . '</p>';
                echo '</div>'; // End of book-details
                echo '</div>'; // End of book-item
            }
        } else {
            echo '<p>No records found.</p>';
        }
        ?>
    </main>

  

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable();
        });

        function confirmDelete() {
            return confirm('Apa anda yakin ingin menghapus data ini?');
        }
    </script>


 <!-- kontak -->

 <section class="contact" id="kontak">

<div class="contact-main">
    <a href="#" class="h-line">
        <i class="ri-shining-2-line"></i>
        <span>Kontak!</span>
    </a> 
    <h2><span>Membacalah jika ingin mengenal dunia</span></h2>
    <div class="email">
        <p>email:</p>
        <h6>svrktvn@gmail.com</h6>
    </div>
    <div class="num">
        <p>Call:</p>
        <h6>081246483950</h6>
    </div>

    <div class="social-icon">
        <a href="https://www.bing.com/ck/a?!&&p=101eb168aca3e809JmltdHM9MTcyMjU1NjgwMCZpZ3VpZD0yMzZjY2I5NC1kMmJjLTZmYWQtM2VlNy1kODczZDNlYTZlM2YmaW5zaWQ9NTE5MA&ptn=3&ver=2&hsh=3&fclid=236ccb94-d2bc-6fad-3ee7-d873d3ea6e3f&psq=instagram+viraktvn&u=a1aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS92aXJha3R2bi8&ntb=1" class="ri-instagram-line"></a>

        <a href="https://www.bing.com/ck/a?!&&p=b46953026262b567JmltdHM9MTcxODkyODAwMCZpZ3VpZD0zMDQzMWMzNi0zNWNjLTY0YzctMWUzNS0wODQ3MzQ5YTY1YjUmaW5zaWQ9NTE4OA&ptn=3&ver=2&hsh=3&fclid=30431c36-35cc-64c7-1e35-0847349a65b5&psq=svrktvn%40gmail.com&u=a1aHR0cHM6Ly9hY2NvdW50cy5nb29nbGUuY29tL2xvZ2luP3NlcnZpY2U9bWFpbCZscD0x&ntb=1" class="bx bxl-gmail"></a>
  </div>

</div>
  
<form class="contact-form">
  <input type="text" placeholder="Nama" required>
  <input type="email" name="" placeholder="Email address..." required>
  <textarea name="" id="" cols="30" rows="10" placeholder="Write Message here..." required> </textarea>
  <input type="submit" value="Kirim" class="submit-btn">
</form>
</section>
<div class="footer">
<div class="copyright">
    <p>©Copyright Savira Otavianiii</p>
</div>
<a href="#home" class="scroll-top">
    <i class="ri-arrow-up-s-line"></i>
</a>
</div>



</body>
</html>