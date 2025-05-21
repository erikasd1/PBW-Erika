<?php

$hari = "Senin";



switch ($hari) {
   case "Senin":
       echo "Hari pertama kerja!";
       echo "<br>";
       echo "OH NO";
       echo "<br>";
       break;
   case "jum'at":
       echo "Solat jumat cuyy!";
       break;
   case "Minggu":
       echo "Libur akhir pekan!";
       break;
   default:
       echo "Hari biasa.";
   }

////////////////////////////////////////////////////
   for ($i = 1; $i <= 5; $i++) {
    echo "<br>";
   echo "Angka ke-”.$i.”<br>";
   echo "<br>";
    }

//////////////////////////////////////////////////
    $buah = ["sushi", "ayam bakar", "soto"];

    for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
    }

/////////////////////////////////////////////
    $nilai = 7;

    while ($nilai <= 10 ) {
    echo "Nilai: ". $nilai."<br>";
    echo "<br>";
    $nilai++;
    }

/////////////////////////////////////////////////

    $mahasiswa = [
    "10001" => "Erika",
    "10002" => "Sita",
    "10003" => "Dewi"
    ];
    foreach ($mahasiswa as $nim => $nama) {
    echo "NIM: ". $nim .", Nama:". $nama."<br>";
    }

///////////////////////////////////////////////////

    echo "<br>";
    $umur = 1;
    $status = ($umur >= 17) ? "Dewasa" : "Anak-anak";

    echo "Saya adalah " .$status;
?>