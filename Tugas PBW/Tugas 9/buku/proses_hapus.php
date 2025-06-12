<?php
session_start(); // Mulai session
include '../koneksi_db.php';

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    // Penghapusan dari hapus.php
    $id = $_POST['id'];
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Penghapusan dari index.php
    $id = $_GET['id'];
} else {
    echo "<script>alert('ID tidak valid'); window.location='../index.php';</script>";
    exit();
}

// Ambil judul dan penulis buku sebelum dihapus
$stmt = $conn->prepare("SELECT Judul, Penulis FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if ($book) {
    // Simpan judul dan penulis buku yang dihapus ke dalam session
    $_SESSION['deleted_books'][] = $book['Judul'] . " - " . $book['Penulis'];
}

// Hapus buku dari tabel Buku
$stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if (isset($_POST['id'])) {
        // Redirect kembali ke hapus.php jika dihapus dari sana
        echo "<script>alert('Buku berhasil dihapus'); window.location='/TugasPBW/Tugas9/buku/hapus.php';</script>";
    } else {
        // Redirect kembali ke index.php jika dihapus dari sana
        echo "<script>alert('Buku berhasil dihapus'); window.location='../index.php';</script>";
    }
} else {
    if (isset($_POST['id'])) {
        echo "<script>alert('Gagal menghapus Buku: " . addslashes($stmt->error) . "'); window.location='/TugasPBW/Tugas9/buku/hapus.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus Buku: " . addslashes($stmt->error) . "'); window.location='../index.php';</script>";
    }
}

// Tutup statement
$stmt->close();

// Tutup koneksi
$conn->close();
?>
