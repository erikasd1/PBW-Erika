<?php
   include 'koneksi.php'; // koneksi dengan OOP ($conn = new mysqli(...))


   // Cek apakah form disubmit
   if (isset($_POST['submit'])) {
       // Ambil data dari form
       $id = $_POST['id'];
       $judul = $_POST['judul'];
       $penulis = $_POST['penulis'];
       $tahun = $_POST['tahun'];
       $harga = $_POST['harga'];


       // Siapkan query UPDATE dengan prepared statement
       $stmt = $conn->prepare("UPDATE buku SET Judul = ?, Penulis = ?, Tahun_Terbit = ?, Harga = ? WHERE ID = ?");
       $stmt->bind_param("ssidi", $judul, $penulis, $tahun, $harga, $id);
       // ssidi = string, string, integer, double, integer


       // Eksekusi statement
       if ($stmt->execute()) {
           echo "<script>alert('Data berhasil diperbarui.'); window.location.href='index.php';</script>";
       } else {
           echo "<script>alert('Terjadi kesalahan: " . addslashes($stmt->error) . "'); window.history.back();</script>";
       }


       // Tutup statement
       $stmt->close();
   }


   // Tutup koneksi
   $conn->close();
?>


