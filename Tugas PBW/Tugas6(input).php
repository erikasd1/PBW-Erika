<?php
define("PAJAK", 0.10);

$barang = [
    "Keyboard" => 150000,
    "Mouse" => 50000,
    "Monitor" => 1000000,
    "Printer" => 850000,
    "Flashdisk 32GB" => 75000,
    "Headset" => 120000
];

$nama_barang = "";
$jumlah_beli = 0;
$harga_satuan = 0;
$total_harga_sebelum_pajak = 0;
$pajak = 0;
$total_bayar = 0;

$is_submitted = ($_SERVER["REQUEST_METHOD"] == "POST");

if ($is_submitted) {
    $nama_barang = $_POST['nama_barang'];
    $jumlah_beli = (int) $_POST['jumlah_beli'];

    if (isset($barang[$nama_barang])) {
        $harga_satuan = $barang[$nama_barang];
        $total_harga_sebelum_pajak = $harga_satuan * $jumlah_beli;
        $pajak = $total_harga_sebelum_pajak * PAJAK;
        $total_bayar = $total_harga_sebelum_pajak + $pajak;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Times New Roman;
            background-color: #ffffff;
        }

        .square {
            border: 1px solid black;
            padding: 20px;
            width: 500px;
            background-color: rgb(214, 218, 211);
            margin: 100px auto;
        }

        h2 {
            margin-top: 0;
            color: black;
        }

        p, label {
            color: black;
            margin: 5px 0;
        }

        b {
            color: black;
        }

        hr {
            border: none;
            border-top: 1px solid black;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="square">
        <?php if (!$is_submitted): ?>
            <h2>Pembelian Barang</h2>
            <hr>
            <form method="POST">
                <label for="nama_barang">Pilih Barang:</label>
                <select name="nama_barang" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($barang as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $key ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="jumlah_beli">Jumlah Beli:</label>
                <input type="number" name="jumlah_beli" min="1" required>

                <button type="submit">Hitung</button>
            </form>
        <?php else: ?>
            <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
            <hr>
            <p>Nama Barang: <?= $nama_barang; ?></p>
            <p>Harga Satuan: Rp. <?= number_format($harga_satuan, 0, ',', '.'); ?></p>
            <p>Jumlah Beli: <?= $jumlah_beli; ?></p>
            <p>Total Harga (Sebelum Pajak): Rp. <?= number_format($total_harga_sebelum_pajak, 0, ',', '.'); ?></p>
            <p>Pajak (10%): Rp. <?= number_format($pajak, 0, ',', '.'); ?></p>
            <p><b>Total Bayar: Rp. <?= number_format($total_bayar, 0, ',', '.'); ?></b></p>
        <?php endif; ?>
    </div>
</body>
</html>
