<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Nilai PHP</title>
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

        form {
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        form h2 {
            color: black;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 1.8rem;
            text-align: center;
        }

        form:hover {
            transform: translateY(-5px);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #444;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 8px 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1.8px solid #ddd;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 5px #667eea;
        }

        form input[type="submit"] {
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

        form input[type="submit"]:hover {
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

        fieldset p {
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

            form input[type="submit"] {
                font-size: 1rem;
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <h2>Form Penilaian</h2>
        <label for="nama">Nama Mahasiswa: </label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="nilai">Nilai Mahasiswa: </label><br>
        <input type="number" step="any" name="nilai" required><br>
        <input type="submit" value ="Proses">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = trim($_POST['nama']);
        $nilai = $_POST['nilai'];
        if(!is_numeric($nilai) || $nilai < 0 || $nilai > 100){
            echo "<div class='error'>Nilai harus berupa angka yang valid!</div>";
            return;
        }

        $predikat = "";
        $status = "";

    if ($nilai >= 85 && $nilai <= 100) {
            $predikat ="A";
        } elseif ($nilai >= 75 && $nilai < 85) {
            $predikat ="B";
        } elseif ($nilai >=65  && $nilai < 75) {
            $predikat ="C";
        }elseif ($nilai >=50 && $nilai < 65){
            $predikat ="D";
        }elseif ($nilai >= 0 && $nilai < 50){
            $predikat ="E";
        }else{
            $predikat = "Tidak Valid!!";
        }

        if($nilai >= 65 && $nilai <= 100){
            $status = "Lulus, Selamat!";
        }elseif ($nilai >= 0 && $nilai < 65){
            $status = "Tidak Lulus, Semangat!";
        }else{
            $status = "Tidak Valid!!";
        }

        echo "<fieldset>";
        echo "Nama Mahasiswa: " .htmlspecialchars($nama). "<br>";
        echo "Nilai Ujian: " .htmlspecialchars($nilai) . "<br>";
        echo "Predikat: " .$predikat. "<br>";
        echo "Status: " .$status. "<br>";
        echo "</fieldset>";
    }
       
    ?>
</body>
</html>