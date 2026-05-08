<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    
    // Logika Upload Foto
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    $path = "uploads/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO produk (nama_produk, harga, stok, foto) VALUES ('$nama', '$harga', '$stok', '$foto')";
        if (mysqli_query($conn, $query)) {
            header("Location: index.php");
        }
    }
}
?>