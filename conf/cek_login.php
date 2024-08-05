<?php
include 'coneksi.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
    $pass = md5($pass);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

    if ($query) {
        $data = mysqli_fetch_array($query);
        $username = $data['username'];
        $password = $data['password'];  // Mengambil password yang benar dari database
        $level = $data['level'];

        if ($user == $username && $pass == $password) {
            session_start();
            $_SESSION['nama'] = $username;
            $_SESSION['level'] = $level;

            echo "<script>
                    alert('Anda berhasil login sebagai: $level');
                    window.location.href = 'app/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Username dan Password Tidak Ditemukan');
                    window.location.href = '../index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Query gagal dijalankan');
                window.location.href = '../index.php';
              </script>";
    }
}
?>