<?php
session_start(); // Mulai session

// Hapus riwayat buku yang dihapus
unset($_SESSION['deleted_books']);

// Redirect kembali ke halaman hapus.php
header("Location: /TugasPBW/Tugas9/buku/hapus.php?message=Riwayat buku yang dihapus telah dihapus.");
exit();
?>
