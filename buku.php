<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Sampul</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategoribuku ON buku.id_kategori = kategoribuku.KategoriID");
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['NamaKategori']; ?></td>
                <td><img style="width: 150px; height:200px;" src="images/<?php echo $data['Sampul']; ?>"></td>
                <td><?php echo $data['Judul']; ?></td>
                <td><?php echo $data['Penulis']; ?></td>
                <td><?php echo $data['Penerbit']; ?></td>
                <td><?php echo $data['Tahun_Terbit']; ?></td>
                <td><?php echo $data['Stok']; ?></td>
                <td>
                <a href="?page=buku_ubah&&id=<?php echo $data['BukuID']; ?>" class="btn btn-info">Ubah</a>
                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');" href="?page=buku_hapus&&id=<?php echo $data['BukuID']; ?>" class="btn btn-info">Hapus</a>
                </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
    </div>
</div>