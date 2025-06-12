<?php
// Mengimpor file koneksi database agar bisa menggunakan koneksi $conn
include 'koneksi_db.php';


// Mengecek apakah permintaan yang masuk adalah POST (biasanya dari form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Mengambil data yang dikirim melalui form dengan method POST
   $judul = $_POST['judul'];               // Judul buku
   $penulis = $_POST['penulis'];           // Nama penulis buku
   $tahun_terbit = $_POST['tahun_terbit']; // Tahun terbit buku
   $harga = $_POST['harga'];               // Harga buku
   $stok = $_POST['stok'];                 // Jumlah stok buku


   // Menyiapkan query SQL untuk menyisipkan data ke tabel 'Buku' menggunakan prepared statement
   $stmt = $conn->prepare("INSERT INTO Buku (Judul, Penulis, Tahun_Terbit, Harga, stok) VALUES (?, ?, ?, ?, ?)");
  
   // Mengikat parameter ke statement SQL dengan format tipe data:
   // s = string, i = integer. Dalam hal ini: judul & penulis (string), lainnya integer
   $stmt->bind_param("ssiii", $judul, $penulis, $tahun_terbit, $harga, $stok);
  
   // Mengeksekusi statement, dan menyimpan pesan keberhasilan atau kesalahan
   if ($stmt->execute()) {
       $message = "Buku berhasil ditambahkan!"; // Jika berhasil insert ke DB
   } else {
       $message = "Error: " . $stmt->error;     // Jika gagal, tampilkan pesan error
   }
}
?>
