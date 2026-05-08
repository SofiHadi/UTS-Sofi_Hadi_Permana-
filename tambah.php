<form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
    <input type="number" name="harga" placeholder="Harga" required><br>
    <input type="number" name="stok" placeholder="Stok" required><br>
    <input type="file" name="foto" required><br>
    <button type="submit" name="submit">Simpan</button>
</form>