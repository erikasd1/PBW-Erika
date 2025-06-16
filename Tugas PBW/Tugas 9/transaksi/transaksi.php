<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: ../login.php?message=" . urlencode("Mengakses fitur harus login dulu cuuuyyy."));
    exit;
}

// Mencegah cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Tambahkan ini untuk mencegah kembali ke halaman sebelumnya
echo '<script>if (window.history.length > 1) { window.history.forward(); }</script>';

include '../koneksi_db.php';
include '../nav.php';

// Ambil daftar buku dan pelanggan
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
$pelanggan_result = $conn->query("SELECT ID, Nama, Alamat, Email, Telepon FROM Pelanggan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Buat Pesanan - Toko Buku Online</title>
</head>
<body>
<div class="container mt-4">
    <h2>Buat Pesanan</h2>
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="existing-customer-tab" data-bs-toggle="tab" data-bs-target="#existing-customer" type="button" role="tab">Pelanggan Lama</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="new-customer-tab" data-bs-toggle="tab" data-bs-target="#new-customer" type="button" role="tab">Pelanggan Baru</button>
        </li>
    </ul>

    <div class="tab-content" id="orderTabsContent">
        <!-- Existing Customer Tab -->
        <div class="tab-pane fade show active" id="existing-customer" role="tabpanel">
            <form method="post" action="/TugasPBW/Tugas9/transaksi/proses_transaksi.php">
                <div class="mb-3">
                    <label for="pelanggan_id" class="form-label">Pilih Pelanggan</label>
                    <select class="form-select" name="pelanggan_id" id="pelanggan_id" required>
                        <option value="">Pilih Pelanggan</option>
                        <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                            <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Nama']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <h3>Daftar Buku</h3>
                <div class="mb-3">
                    <label for="buku_id" class="form-label">Pilih Buku</label>
                    <select class="form-select" name="buku[1][id]" id="buku_id" required>
                        <option value="">Pilih Buku</option>
                        <?php 
                        $buku_result->data_seek(0); // Reset pointer to beginning
                        while ($row = $buku_result->fetch_assoc()): ?>
                            <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Judul']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kuantitas" class="form-label">Jumlah Buku</label>
                    <input type="number" class="form-control" id="kuantitas" name="buku[1][kuantitas]" required>
                </div>
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            </form>

            <h3>Daftar Pelanggan</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pelanggan_result->data_seek(0); // Reset pointer to beginning
                    while ($row = $pelanggan_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['ID'] ?></td>
                            <td><?= htmlspecialchars($row['Nama']) ?></td>
                            <td><?= htmlspecialchars($row['Alamat']) ?></td>
                            <td><?= htmlspecialchars($row['Email']) ?></td>
                            <td><?= htmlspecialchars($row['Telepon']) ?></td>
                            <td>
                                <a href="/TugasPBW/Tugas9/pelanggan/form_edit_pelanggan.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/TugasPBW/Tugas9/pelanggan/proses_hapus_pelanggan.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- New Customer Tab -->
        <div class="tab-pane fade" id="new-customer" role="tabpanel">
            <form method="post" action="/TugasPBW/Tugas9/pelanggan/proses_pelanggan.php">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <input type="hidden" name="redirect_to_order" value="1">
                <button type="submit" class="btn btn-primary">Daftar Pelanggan</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Mencegah tombol kembali
    window.history.pushState(null, '', window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, '', window.location.href);
    };
</script>
</body>
</html>
