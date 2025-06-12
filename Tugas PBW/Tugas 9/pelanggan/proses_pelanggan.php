<?php
include '../koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $alamat, $email, $telepon);

    if ($stmt->execute()) {
        if (isset($_POST['redirect_to_order']) && $_POST['redirect_to_order'] == 1) {
            $pelanggan_id = $conn->insert_id;
            header("Location: /TugasPBW/Tugas9/transaksi/transaksi.php?pelanggan_id=" . $pelanggan_id);
        } else {
            echo "<script>
                alert('Pelanggan berhasil ditambahkan!');
                window.location.href = '/TugasPBW/Tugas9/transaksi/transaksi.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Gagal menambahkan pelanggan: " . addslashes($stmt->error) . "');
            window.location.href = '/TugasPBW/Tugas9/transaksi/transaksi.php';
        </script>";
    }
}
?>
