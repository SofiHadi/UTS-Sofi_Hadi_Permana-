<?php
include 'koneksi.php';

// Kode ini hanya jalan jika tombol 'update' ditekan dari edit.php
if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    
    $foto_baru = $_FILES['foto']['name'];
    $tmp       = $_FILES['foto']['tmp_name'];

    // Jika user TIDAK mengunggah foto baru
    if (empty($foto_baru)) {
        $query = "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id='$id'";
    } else {
        // Jika user mengunggah foto baru, hapus foto lama agar folder tidak penuh
        $cari_foto = mysqli_query($conn, "SELECT foto FROM produk WHERE id='$id'");
        $data_lama = mysqli_fetch_assoc($cari_foto);
        
        if (file_exists("uploads/" . $data_lama['foto'])) {
            unlink("uploads/" . $data_lama['foto']);
        }

        // Upload foto yang baru
        move_uploaded_file($tmp, "uploads/" . $foto_baru);
        $query = "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok', foto='$foto_baru' WHERE id='$id'";
    }

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Berhasil, balik ke depan
    } else {
        echo "Gagal Update: " . mysqli_error($conn);
    }

} else {
    // Kalau ada yang coba akses file ini langsung lewat URL, usir ke depan
    header("Location: index.php");
}
?>