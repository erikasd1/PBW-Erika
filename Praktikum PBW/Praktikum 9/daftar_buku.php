<?php
   // Import koneksi dari file terpisah yang menggunakan OOP
   include 'koneksi.php'; // Pastikan koneksi dibuat dengan: $conn = new mysqli(...);


   // Query SELECT untuk mengambil semua data dari tabel buku
   $sql = "SELECT * FROM buku";
   $result = $conn->query($sql); // Menggunakan metode OOP


   // Cek apakah query berhasil dijalankan
   if (!$result) {
       die("Query gagal: " . $conn->error); // Properti error OOP
   }


   // Inisialisasi array untuk menyimpan data
   $data = [];


   // Fetch data baris demi baris ke dalam array asosiatif
   while ($row = $result->fetch_assoc()) {
       $data[] = $row;
   }


   // Menampilkan hasil data menggunakan foreach
   foreach ($data as $row) {
       echo "ID: " . $row['ID'] . "<br>";
       echo "Judul: " . htmlspecialchars($row['Judul']) . "<br>";
       echo "Penulis: " . htmlspecialchars($row['Penulis']) . "<br>";
       echo "Tahun Terbit: " . $row['Tahun_Terbit'] . "<br>";
       echo "Harga: Rp" . number_format($row['Harga'], 2) . "<br><hr>";
   }


   // Tutup koneksi setelah selesai
   $conn->close();
?>


