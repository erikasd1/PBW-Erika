<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genap atau Ganjil</title>
</head>
<body>

    <h3>ternary operator untuk menentukan apakah angka adalah genap atau ganjil.</h3>

    <form method = "post">
        Masukkan angka: <input type="number" name="angka" required>
        <input type="submit" value="Cek">
    </form>

    <?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $angka = $_POST['angka'];
        $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
         echo "angka " .$angka. " adalah " .$status;
    }

?>
</body>
</html>