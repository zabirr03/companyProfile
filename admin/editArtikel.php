<?php
date_default_timezone_set("Asia/Bangkok");

//Ambil data di URL
$id = $_GET["id"];
$halaman = $_GET["halaman"];

//Query data mahasiswa berdasarkan id
$edit = query("SELECT * FROM $halaman where id = '$id'")[0];

//Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //Cek apakah data berhasil diubah
    if (artikelEdit($_POST, $halaman) > 0) {
        echo "
        <script> 
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script> 
            alert('data gagal diubah');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunting Artikel</title>
    <style>
        body {
            height: 1000px;
        }
    </style>
</head>

<body>
    <h2>Sunting Artikel</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <input type="hidden" name="gambarLama" value="<?= $edit["gambar"] ?>">
        <?php
        if ($halaman == "manajemen") :
        ?>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit['nama'] ?>">
            </div>
        <?php
        else :
        ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $edit['judul'] ?>">
            </div>
        <?php
        endif;
        ?>
        <div class="mb-3">
            <label for="kutipan" class="form-label">Kutipan</label>
            <textarea class="form-control" id="kutipan" rows="6" name="kutipan"><?= $edit['kutipan'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <br>
            <img src="../img/<?= $edit['gambar'] ?>" alt="" width="200">
            <input class="form-control" type="file" name="gambar" id="gambar">
        </div>
        <div class="mb-3">
            <label for="admin" class="form-label">Admin</label>
            <input type="text" class="form-control" id="admin" name="admin" value="<?= $edit['admin'] ?>">
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="date" name="date" value="<?= date("Y-m-d") ?>">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="submit">Sunting</button>
        </div>
    </form>
</body>

</html>