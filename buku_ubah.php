<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                     $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        // $kategoribuku = $_POST['NamaKategori'];
                        $id_kategori = $_POST['id_kategori'];
                        $sampul = $_FILES['Sampul']['name'];
                        $tmp_name = $_FILES['Sampul']['tmp_name'];
                        move_uploaded_file($tmp_name, "images/".$sampul);
                        $Judul = $_POST['Judul'];
                        $Penulis = $_POST['Penulis'];
                        $Penerbit = $_POST['Penerbit'];
                        $Tahun_Terbit = $_POST['Tahun_Terbit'];
                        $Stok = $_POST['Stok'];
                        $query = mysqli_query($koneksi, "UPDATE buku set id_kategori='$id_kategori', Sampul='$sampul', Judul='$Judul',Penulis='$Penulis',Penerbit='$Penerbit',Tahun_Terbit='$Tahun_Terbit',Stok='$Stok' WHERE BukuID=$id");

                        if ($query) {
                            echo '<script>alert("Ubah Data Berhasil.")</script>';
                        } else {
                            echo '<script>alert("Ubah Data Gagal.")</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE BukuID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                                while ($kategoribuku = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option <?php if($kategoribuku['NamaKategori'] == $data ['id_kategori']) echo 'selected'; ?> value="<?php echo $kategoribuku['KategoriID']; ?>"><?php echo $kategoribuku['NamaKategori']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Sampul</div>
                        <div class="col-md-8"><input type="file" value="<?php echo $data['Sampul']; ?>" class="form-control" name="Sampul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Judul']; ?>" class="form-control" name="Judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Penulis']; ?>" class="form-control" name="Penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Penerbit']; ?>" class="form-control" name="Penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun_Terbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Tahun_Terbit']; ?>" class="form-control" name="Tahun_Terbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Stok</div>
                        <div class="col-md-8"><input type="number" value="<?php echo $data['Stok']; ?>" class="form-control" name="Stok"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>