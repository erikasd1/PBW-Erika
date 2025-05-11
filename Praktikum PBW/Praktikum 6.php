<?php
    echo "Hello, selamat datang di dunia PHP<br>";
    echo "<br>";

    $nama = "Erika Sita Dewi";
    $umur = 20;
    $berat = 59;
 
    echo "Nama saya adalah " . $nama . "<br>";
    echo "Umur saya " . $umur . " tahun<br>";
    echo "Berat badan saya ". $berat ." kg<br>";

    echo "<br>";

    define("SITE_NAME", "unsika.ac.id");
    define("VERSION", "1.0");


    echo "Selamat datang di " . SITE_NAME . "<br>";
    echo "Versi Sistem: " . VERSION . "<br>";

    $isLogin = true;

    $buah = ["apel", "jeruk", "mangga", "pisang", "semangka"];
    echo "Saya suka buah " . $buah[4];

    echo "<br>";
    echo "<br>";

    class Mahasiswa {
        public $nama;
        public function sapa() {
            return "Halo, saya $this->nama";
        }
    }
    $mhs = new Mahasiswa();
    $mhs->nama = "Erika Sita Dewi";
    echo $mhs->sapa();
    
    echo"<br>";

    $data = null;
    var_dump($data);
 
?>