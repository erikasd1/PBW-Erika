<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 Praktikum 8</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial, sans-serif';
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: #333;
            margin: 0;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 1.8rem;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        form:hover {
            transform: translateY(-5px);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1.8px solid #ddd;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 5px #667eea;
        }

        input[type="submit"] {
            background-color: #667eea;
            color: white;
            padding: 12px 0;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: rgb(27, 228, 27);
        }

        fieldset {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 25px 30px;
            border: 2px solid #4CAF50;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            max-width: 400px;
            width: 100%;
            color: #2c3e50;
        }

        fieldset p,
        fieldset br {
            font-size: 1rem;
            margin: 8px 0;
        }

        .error {
            background-color: #ffe0e0;
            color: #d8000c;
            border: 1px solid #d8000c;
            padding: 10px 15px;
            border-radius: 8px;
            max-width: 400px;
            margin: 20px auto 0;
            text-align: center;
            font-weight: 700;
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 10px;
            }

            form, fieldset {
                max-width: 100%;
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 1rem;
                padding: 10px 0;
            }
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