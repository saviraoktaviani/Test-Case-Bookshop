<?php
$host = "localhost";
$username = "root";
$password = ""; // pastikan variabel password ditulis dengan benar
$database = "bookshop";

$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi) {
    echo "<script>
            alert('Anda berhasil login sebagai admin');
            window.location.href = '../app/index.php';
          </script>";
} else {
    echo "<script>
            alert('Database error: " . mysqli_connect_error() . "');
          </script>";
}
?>
