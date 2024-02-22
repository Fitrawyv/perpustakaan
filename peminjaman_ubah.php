<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                     $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $BukuID = $_POST['BukuID'];
                        $UserID = $_SESSION['userid']['UserID'];
                        // $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
                        $TanggalPengembalian = $_POST['TanggalPeminjaman'];
                        $StatusPeminjaman = $_POST['StatusPeminjaman'];
                        $query = mysqli_query($koneksi, "UPDATE peminjam set BukuID='$BukuID',
                        TanggalPeminjaman='$TanggalPeminjaman', TanggalPengembalian='$TanggalPengembalian',
                        StatusPeminjaman='$StatusPeminjaman' WHERE PeminjamanID=$id");

if ($StatusPeminjaman == 'dikembalikan'){
    // update stok buku
    $query_update_stok = mysqli_query($koneksi, "UPDATE buku SET Stok = Stok +1 WHERE BukuID = $id");
    if(!$query_update_stok){
        echo '<script>alert("Gagal Update Stok Buku.")</script>';
    }
}

                        if ($query) {
                            echo '<script>alert("Ubah Data Berhasil.")</script>';
                        } else {
                            echo '<script>alert("Ubah Data Gagal.")</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjam WHERE PeminjamanID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="BukuID" class="form-control">
                            <?php
                            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                            while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                <option <?php if ($buku['BukuID'] == $data['BukuID']) echo 'selected'; ?>
                                    value="<?php echo $buku['BukuID']; ?>"> <?php echo $buku['Judul']; ?></option>
                                    <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <span><?php echo $data['TanggalPeminjaman'];?></span>
                            <input type="hidden" name="TanggalPeminjaman" value="<?php echo $data['TanggalPeminjaman'] ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['TanggalPengembalian']; ?>" name="TanggalPengembalian">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="StatusPeminjaman" class="form-control">
                                <option value="dipinjam" <?php if ($data['StatusPeminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                                <option value="dikembalikan" <?php if ($data['StatusPeminjaman'] =='dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>