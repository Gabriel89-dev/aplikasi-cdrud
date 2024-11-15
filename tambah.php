<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tabel Data</title>
</head>
<body>
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">
                Form Tambah Data
            </h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="inputNis" class="form-label">Nis</label>
                    <input type="number" class="form-control" id="inputNis" name="nis" placeholder="Masukan Nis Disini"> 
                </div>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan nama Disini"> 
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="inputKelas" name="kelas" placeholder="Masukan Kelas Disini"> 
                </div>
                <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php
    if(isset($_POST['daftar'])){
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        $query = "INSERT INTO tb_siswa (nis,nama,kelas) VALUES('".$nis."','".$nama."','".$kelas."')";
        $result = mysqli_query($koneksi, $query);
        if($result) {
            header("location: index.php");
        }
        else {
            echo "<script>alert('Data gagal di tambahkan!</script>";
        }
        
    }
    ?>
</body>
</html>