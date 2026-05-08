<?php
include 'koneksi.php';
$id = $_GET['id'];

// Ambil nama file foto lama untuk dihapus dari folder
$data = mysqli_query($conn, "SELECT foto FROM produk WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
unlink("uploads/" . $row['foto']);

mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
header("Location: index.php");
?>