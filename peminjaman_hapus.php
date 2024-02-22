<?php
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "DELETE FROM peminjam WHERE PeminjamanID=$id");
?>
<script>
    alert('Hapus Data Berhasil');
    location.href = "index.php?peminjaman=buku";
</script>