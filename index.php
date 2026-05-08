<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php" class="btn-tambah">Tambah Produk Baru</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk");
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                <td>$no</td>
                <td><img src='uploads/{$row['foto']}' width='50'></td>
                <td>{$row['nama_produk']}</td>
                <td>Rp " . number_format($row['harga']) . "</td>
                <td>{$row['stok']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>