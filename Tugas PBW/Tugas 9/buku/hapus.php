<?php
session_start();
include '../koneksi_db.php';
include '../nav.php';

// Jika tombol Hapus Riwayat ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_riwayat'])) {
    $file = 'riwayat.txt';
    if (file_exists($file)) {
        file_put_contents($file, ''); // Kosongkan isi file
    }
    $message = "Riwayat berhasil dihapus.";
}

// Ambil daftar buku dari database
$result = $conn->query("SELECT ID, Judul, Penulis FROM Buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Buku - Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Hapus Buku</h2>

    <?php if (isset($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="post" action="/TugasPBW/Tugas9/buku/proses_hapus.php">
        <div class="mb-3">
            <label for="buku_id" class="form-label">Pilih Buku</label>
            <select class="form-select" name="id" id="buku_id" required>
                <option value="">Pilih Buku</option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>">
                        <?= htmlspecialchars($row['Judul']) ?> - <?= htmlspecialchars($row['Penulis']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus Buku</button>
    </form>

    <h3 class="mt-4">Riwayat Buku yang Dihapus</h3>
    <ul class="list-group">
        <?php
        $file = 'riwayat.txt';
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (count($lines) > 0) {
                foreach (array_reverse($lines) as $line) {
                    echo "<li class='list-group-item'>" . htmlspecialchars($line) . "</li>";
                }
            } else {
                echo "<li class='list-group-item'>Tidak ada buku yang dihapus.</li>";
            }
        } else {
            echo "<li class='list-group-item'>Tidak ada buku yang dihapus.</li>";
        }
        ?>
    </ul>

    <!-- Tombol hapus riwayat -->
    <form method="post">
        <input type="hidden" name="hapus_riwayat" value="1">
        <button type="submit" class="btn btn-warning mt-3" onclick="return confirm('Yakin ingin menghapus semua riwayat?')">Hapus Riwayat Buku yang Dihapus</button>
    </form>
</div>
</body>
</html>
