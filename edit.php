<?php
// PAKSA ERROR KELUAR AGAR TIDAK PUTIH POLOS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

// Cek apakah ID ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: ID Produk tidak ditemukan di URL. Silakan kembali ke index.php");
}

$id = $_GET['id'];

// Ambil data dari database
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Cek apakah data benar-benar ada
if (!$data) {
    die("Error: Data dengan ID $id tidak ada di database.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk - Toko Online</title>
    <style>
        /* CSS langsung di sini agar pasti terpanggil */
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .box { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>

<div class="box">
    <h2>Edit Data Produk</h2>
    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required>

        <label>Harga:</label>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required>

        <label>Stok:</label>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required>

        <label>Foto Saat Ini:</label><br>
        <img src="uploads/<?php echo $data['foto']; ?>" width="80" style="border: 1px solid #ccc; margin: 5px 0;"><br>

        <label>Ganti Foto (Kosongkan jika tidak ganti):</label>
        <input type="file" name="foto">

        <button type="submit" name="update">Update Produk</button>
        <a href="index.php" style="font-size: 14px; color: #666; text-decoration: none; margin-left: 10px;">Batal</a>
    </form>
</div>

</body>
</html>