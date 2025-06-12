<?php
   include 'koneksi.php'; // Koneksi OOP, misalnya: $conn = new mysqli(...);


   // Validasi: pastikan parameter 'id' ada dan berupa angka
   if (isset($_GET['id']) && is_numeric($_GET['id'])) {
       $id = $_GET['id'];


       // Siapkan prepared statement untuk DELETE
       $stmt = $conn->prepare("DELETE FROM buku WHERE id = ?");
       $stmt->bind_param("i", $id); // "i" untuk integer


       // Eksekusi dan periksa hasilnya
       if ($stmt->execute()) {
           echo "<script>alert('Data berhasil dihapus.'); 
                       window.location.href = 'index.php';</script>";
       } else {
           echo "<script>alert('Gagal menghapus data: " . addslashes($stmt->error) . "'); window.history.back();</script>";
       }


       // Tutup statement dan koneksi
       $stmt->close();
   } else {
       echo "<script>alert('ID tidak valid.'); window.history.back();</script>";
   }


   $conn->close();
?>


