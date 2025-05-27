<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 Praktikum 8</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        fieldset {
            background-color: #fff;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
        }

        fieldset br {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <h2>Form Mahasiswa</h2>
        <label for="npm">NPM:</label>
        <input type="number" name="npm" id="npm" required><br>
        <label for="nama">NAMA:</label>
        <input type="text" name="nama" id="nama" required><br>
        <label for="prodi">PRODI:</label>
        <input type="text" name="prodi" id="prodi" required><br>
        <label for="semester">SEMESTER:</label>
        <input type="number" name="semester" id="semester" min="1" required><br>
        <label for="ukt">BIAYA UKT (Rp):</label>
        <input type="number" step="any" name="ukt" id="ukt" min="0" required><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $npm = htmlspecialchars($_POST["npm"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $prodi = htmlspecialchars($_POST["prodi"]);
        $semester = htmlspecialchars($_POST["semester"]);
        $ukt = htmlspecialchars($_POST["ukt"]);

        $diskon = 0;

        if($ukt >= 5000000 && $semester > 8){
            $diskon = 15;
        }elseif($ukt >= 5000000){
            $diskon = 10;
        }else{
            $diskon = 0;
        }

        $potongan = ($diskon / 100) * $ukt;
        $bayar = $ukt - $potongan;

        function rupiah($angka){
            return "Rp. " . number_format($angka, 0, ',', '.') . ",-";
        }
        echo "<fieldset>";
        echo "NPM: " .htmlspecialchars($npm). "<br>";
        echo "NAMA: " .htmlspecialchars(strtoupper($nama)). "<br>";
        echo "PRODI: " .htmlspecialchars(strtoupper($prodi)). "<br>";
        echo "SEMESTER: " .htmlspecialchars($semester). "<br>";
        echo "BIAYA UKT: " .rupiah($ukt). "<br>";
        echo "DISKON: " .$diskon. "%<br>";
        echo "YANG HARUS DIBAYARKAN: " .rupiah($bayar). "<br>";
        echo "</fieldset>";
    }
    ?>

</body>
</html>