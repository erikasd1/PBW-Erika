<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Hewan</title>
</head>
<body>
    <?php

    $judul = "array daftar nama hewan dan tampilkan menggunakan foreach.";
    echo "<h3>$judul</h3>";

    $hewan = [
        "darat" => "harimau, ayam",
        "air" => "ikan, lumba-lumba",
        "udara" => "burung, kupu-kupu",
        "amfibi" => "katak, buaya, ular",
    ];


    foreach ($hewan as $habitat => $nama) {
        echo "Habitat: ". $habitat. "<br>";
        echo "Nama hewan:". $nama."<br><br>";
    }

?>
</body>
</html>