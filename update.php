<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Update Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_siswa WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {

        ?>
        <section class="row">
            <div class="col-md-6 offset-md-3 align-self-center">
                <h1 class="text-center mt-4">Form Update Data</h1>
                <form method="POST">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="mb-3">
                    <label for="inputNis" class="form-label">Nis</label>
                    <input type="Number" class="form-control" id="inputNis" value="<?= $data['nis'] ?>" name="nis" placeholder="Masukan Nis Siswa">
                </div>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" name="nama" placeholder="Masukan Nama Siswa">
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="inputKelas" value="<?= $data['kelas'] ?>" name="kelas" placeholder="Masukan Kelas Siswa">
                </div>
                <input type="submit" name="daftar" class="btn btn-primary" value="update">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
                </form>
            </div>
        </section>
    <?php } ?>

    <?php
    if(isset($_POST['daftar'])){
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', kelas = 'kelas' WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        if($result){
            header("location: index.php");
        }
        else {
            echo "<script>alert ('Data Gagal di update!')</script>";
        }
    }
    ?>
</body>
</html>