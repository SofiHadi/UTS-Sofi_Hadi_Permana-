// Konfirmasi sebelum menghapus data
document.querySelectorAll('.btn-hapus').forEach(button => {
    button.addEventListener('click', function(e) {
        const setuju = confirm("Apakah Anda yakin ingin menghapus produk ini?");
        if (!setuju) {
            e.preventDefault(); // Membatalkan aksi klik jika user pilih 'Cancel'
        }
    });
});

// Preview gambar saat akan diunggah (Opsional tapi keren)
const inputFoto = document.querySelector('input[name="foto"]');
if (inputFoto) {
    inputFoto.addEventListener('change', function() {
        console.log("Foto siap diunggah: " + this.files[0].name);
    });
}