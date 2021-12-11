<?php

//Ambil data di URL
$id = $_GET["id"];
$section = $_GET["section"];

//Query data mahasiswa berdasarkan id
$edit = query("SELECT * FROM $section where id = $id")[0];

//Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //Cek apakah data berhasil diubah
    if (headerEdit($_POST, $section) > 0) {
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
    <title>Sunting <?= ucfirst($section) ?></title>
</head>

<body>
    <h2>Sunting <?= ucfirst($section) ?></h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <input type="hidden" class="form-control" id="date" name="date" value="<?= date("Y-m-d") ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $edit['judul'] ?>">
        </div>
        <div class="mb-3">
            <label for="kutipan" class="form-label">Kutipan</label>
            <textarea class="form-control" id="kutipan" rows="3" name="kutipan"><?= $edit['kutipan'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="admin" class="form-label">Administrator</label>
            <textarea class="form-control" id="admin" rows="3" name="admin"><?= $edit['admin'] ?></textarea>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="submit">Sunting</button>
        </div>
    </form>
</body>

</html>