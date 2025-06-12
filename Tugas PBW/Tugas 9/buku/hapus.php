<?php
session_start(); // Mulai session
include '../koneksi_db.php';
include '../nav.php';

// Ambil daftar buku untuk dihapus, termasuk penulis
$result = $conn->query("SELECT ID, Judul, Penulis FROM Buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hapus Buku - Toko Buku Online</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Hapus Buku</h2>
        
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
        <?php endif; ?>

        <form method="post" action="/TugasPBW/Tugas9/buku/proses_hapus.php">
            <div class="mb-3">
                <label for="buku_id" class="form-label">Pilih Buku yang akan dihapus</label>
                <select class="form-select" name="id" id="buku_id" required>
                    <option value="">Pilih Buku</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Judul']) ?> - <?= htmlspecialchars($row['Penulis']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus Buku</button>
        </form>

        <h3>Riwayat Buku yang Dihapus</h3>
        <ul class="list-group">
            <?php if (isset($_SESSION['deleted_books'])): ?>
                <?php foreach ($_SESSION['deleted_books'] as $deleted_book): ?>
                    <li class="list-group-item"><?= htmlspecialchars($deleted_book) ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">Tidak ada buku yang dihapus.</li>
            <?php endif; ?>
        </ul>

        <!-- Tambahkan tombol untuk menghapus riwayat -->
        <form method="post" action="/TugasPBW/Tugas9/buku/hapus_riwayat.php">
            <button type="submit" class="btn btn-warning mt-3">Hapus Riwayat Buku yang Dihapus</button>
        </form>
    </div>
</body>
</html>
