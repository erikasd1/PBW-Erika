<?php
session_start();

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    echo "Halo, brooo " . $_SESSION['username'] . "!<br>";
    echo "Status login: Aktif<br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "kamu belum login bruh. <a href='login.php'>Login di sini ya bro</a>";
}
?>
