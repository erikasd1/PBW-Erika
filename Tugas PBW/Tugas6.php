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

$nama_barang = "Keyboard";
$jumlah_beli = 2;

$harga_satuan = $barang[$nama_barang];
$total_harga_sebelum_pajak = $harga_satuan * $jumlah_beli;

$pajak = $total_harga_sebelum_pajak * PAJAK;

$total_bayar = $total_harga_sebelum_pajak + $pajak;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian (Dengan Array)</title>
    <style>
        body {
            font-family: Times new roman;
            background-color: #ffffff;
        }

        .square {
            border: 1px solid black;
            padding: 20px;
            width: 500px;
            background-color:rgb(214, 218, 211);
            margin: 100px auto;
        }

        h2 {
            margin-top: 0;
            color: black;
        }

        p {
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
    </style>
</head>
<body>
    <div class="square">
    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>
    <p>Nama Barang: <?php echo $nama_barang; ?></p>
    <p>Harga Satuan: Rp. <?php echo number_format($harga_satuan, 0, ',', '.'); ?></p>
    <p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
    <p>Total Harga (Sebelum Pajak): Rp. <?php echo number_format($total_harga_sebelum_pajak, 0, ',', '.'); ?></p>
    <p>Pajak (10%): Rp. <?php echo number_format($pajak, 0, ',', '.'); ?></p>
    <p><b>Total Bayar: Rp. <?php echo number_format($total_bayar, 0, ',', '.'); ?></b></p>
    </div>
</body>
</html>
