<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Kendaraan Berdasarkan Roda</title>
</head>
<body>

<h3>switch menentukan jenis kendaraan berdasarkan jumlah roda.</h3>

    <form method="post">
        Pilih jumlah roda:
        <select name="kendaraan">
            <option value="dua">Dua</option>
            <option value="tiga">Tiga</option>
            <option value="empat">Empat</option>
            <option value="enam">Enam</option>
            <option value="delapan">Delapan</option>
            <option value="lain">Lainnya</option>
        </select>
        <input type="submit" value="Cek">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kendaraan = $_POST["kendaraan"];
        echo "<br>kendaraan roda $kendaraan adalah: <br>";

        switch ($kendaraan) {
        case "dua":
            echo "motor";
            echo "<br>";
            echo "sepedah";
            echo "<br>";
            echo "skuter";
            echo "<br>";
            echo "vespa";
            echo "<br>";
            break;
        case "tiga":
            echo "becak";
            echo "<br>";
            echo "bajaj";
            echo "<br>";
            echo "bemo";
            echo "<br>";
            break;
        case "empat":
            echo "mobil";
            echo "<br>";
            echo "pickup";
            echo "<br>";
            echo "truk kecil";
            echo "<br>";
            break;
        case "enam":
            echo "truk besar";
            echo "<br>";
            echo "mobil pengangkut pasir";
            echo "<br>";
            break;
        case "delapan":
            echo "trailer";
            echo "<br>";
            echo "bus tingkat besar";
            echo "<br>";
            break;
        default:
            echo "apa yaa? ga ada kayanya";
        }
    }
?>
</body>
</html>