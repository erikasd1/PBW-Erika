<?php
session_start();
include '../koneksi_db.php';

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('ID tidak valid'); window.location='../index.php';</script>";
    exit();
}

// Ambil data buku sebelum dihapus
$stmt = $conn->prepare("SELECT Judul, Penulis FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if ($book) {
    // Simpan ke session
    $_SESSION['deleted_books'][] = $book['Judul'] . " - " . $book['Penulis'];

    // Simpan ke file riwayat.txt
    $riwayat = $book['Judul'] . " - " . $book['Penulis'] . " (" . date("Y-m-d H:i:s") . ")";
    file_put_contents("riwayat.txt", $riwayat . PHP_EOL, FILE_APPEND);
}

// Hapus buku dari database
$stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if (isset($_POST['id'])) {
        echo "<script>alert('Buku berhasil dihapus'); window.location='/TugasPBW/Tugas9/buku/hapus.php';</script>";
    } else {
        echo "<script>alert('Buku berhasil dihapus'); window.location='../index.php';</script>";
    }
} else {
    $error = addslashes($stmt->error);
    if (isset($_POST['id'])) {
        echo "<script>alert('Gagal menghapus Buku: $error'); window.location='/TugasPBW/Tugas9/buku/hapus.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus Buku: $error'); window.location='../index.php';</script>";
    }
}

$stmt->close();
$conn->close();
?>
