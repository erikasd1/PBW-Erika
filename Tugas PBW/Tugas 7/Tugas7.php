<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Praktikum 7</title>
</head>
<body>
    <h2>Latihan Praktikum 7</h2>

    <div class="nav">
        <a href="Tugas7.php?page=kendaraan">1. Kendaraan</a> | 
        <a href="Tugas7.php?page=genap2-10">2. Genap</a> | 
        <a href="Tugas7.php?page=hewan">3. Hewan</a> | 
        <a href="Tugas7.php?page=ternaryoperator">4. Ternary Operator</a>
    </div>

    <hr>

    <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        if ($page == 'kendaraan'){
            include 'kendaraan1.php';
        } elseif ($page == 'genap2-10'){
            include 'genap2.php';
        } elseif ($page == 'hewan'){
            include 'hewan3.php';
        } elseif ($page == 'ternaryoperator'){
            include 'ternaryoperator4.php';
        } else {
            echo "<p>Halaman tidak ditemukan.</p>";
        }
    } else {
        echo "<p>Silakan pilih salah satu soal di atas.</p>";
    }
    ?>

    <hr>
    <h2>Sekian</h2>
</body>
</html>