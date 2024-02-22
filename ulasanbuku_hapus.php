<?php
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE UlasanID=$id");
?>
<script>
    alert('Hapus Data Berhasil');
    location.href = "index.php?ulasanbuku=buku";
</script>