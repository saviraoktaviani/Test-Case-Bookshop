<?php 
$host = "localhost";
$username = "root";
$password = ""; // pastikan variabel password ditulis dengan benar
$database = "bookshop";

$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi) {
    echo "<script>
            alert('anda berhasil login sebagai user');
            window.location.href = '../app/books/perpus.php';
          </script>";
} else {
    echo "<script>
            alert('Database error: " . mysqli_connect_error() . "');
          </script>";
}
?>