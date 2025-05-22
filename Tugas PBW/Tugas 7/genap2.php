<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilangan Genap 2-10</title>
</head>
<body>
    <?php

    $judul = "for untuk mencetak bilangan genap dari 2 sampai 10.";
    echo "<h3>$judul</h3>";

    for ($i = 2; $i <= 10; $i +=2) {
            echo "Angka genap 2-10: ".$i."<br>";
        }

?>
</body>
</html>