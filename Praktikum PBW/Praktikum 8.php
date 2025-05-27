<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 8</title>
</head>
<body>

<?php
    $umur = 20;
    $ktp = true;
    if ($umur >= 17 && $ktp) {
    echo "kamu boleh memilih";
    }

///////////////////////////////////////////////
?>

    <h2>cek umur</h2>
        <form method="POST" action="">
            Umur: <input type="number" name="umur"><br>
            <input type="submit" value ="Proses">
        </form>
<?php

        echo "<br>";
        $ktp = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($_POST['umur'])){
                $umur = (int) $_POST['umur'];

                if($umur >= 17 && $ktp){
                    echo "kamu boleh memilih.";
                }else{
                    echo "kamu belum boleh memilih.";
                }
            }else{
                echo "umur tidak boleh kosong ya!";
            }
        }
        echo "<br>";
        echo "<br>";

///////////////////////////////////////////////////////
?>

    <form method="POST" action="">
        Nama: <input type="text" name="nama"><br>
        Nilai: <input type="number" name="nilai"><br>
        <input type="submit" value ="Proses">
    </form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['nama'])) {
            echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br>";
        } else {
            echo "Nama tidak boleh kosong!<br>";
        }

    if (!empty($_POST['nilai'])) {
        $nilai = (int) $_POST['nilai'];
        if ($nilai >= 80) {
            echo "Nilai A, selamat ya!";
        } elseif ($nilai >= 70) {
            echo "Nilai B, ok lah!";
        } elseif ($nilai >= 60) {
            echo "Nilai C, semangat belajar ya!";
        } else {
            echo "Nilai D, semangat belajar!";
        }
    } else {
        echo "Nilai tidak boleh kosong!";
    }
}
?>

</body>
</html>