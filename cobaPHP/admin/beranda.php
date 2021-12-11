<?php


if (!isset($_GET['p'])) {
    $halaman = "beranda";
} else {
    $halaman = $_GET['p'];
}

$header = query("SELECT * FROM header WHERE halaman = '$halaman'");
$header = $header[0];
$artikel = query("SELECT * FROM $halaman");
$artikel1 = $artikel[0];
$artikel2 = $artikel[1];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sunting Beranda</title>
</head>

<body>
    <h2>Sunting Beranda</h2>
    <!-- <a class="btn btn-info" href="tambah.php" role="button">Tambah Artikel</a> -->

    <h3>Header</h3>
    <form>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input class="form-control" type="text" value="<?= $header['judul'] ?>" aria-label="readonly input example" readonly>
        </div>
        <div class="mb-3">
            <label for="kutipan" class="form-label">Kutipan</label>
            <input class="form-control" type="text" value="<?= $header['kutipan'] ?>" aria-label="readonly input example" readonly>
        </div>
        <div class="d-grid gap-2">
            <a class="btn btn-warning" href="?p=editHeader&id=<?= $header['id'] ?>" role="button">Edit</a>
        </div>
    </form>
    <br>
    <br>
    <h3>Artikel</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kutipan</th>
                <th>Gambar</th>
                <th>Admin</th>
                <th>Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td width="250"><?= $artikel1["judul"] ?></td>
                <td><?= $artikel1["kutipan"] ?></td>
                <td><img src="../img/<?= $artikel1["gambar"] ?>" alt="" width="150"></td>
                <td><?= $artikel1["admin"] ?></td>
                <td><?= $artikel1["date"] ?></td>
                <td><a class="btn btn-warning" href="?p=artikelBeranda&id=<?= $artikel1['id'] ?>" role="button">Edit</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td width="250"><?= $artikel2["judul"] ?></td>
                <td><?= $artikel2["kutipan"] ?></td>
                <td><img src="../img/<?= $artikel2["gambar"] ?>" alt="" width="150"></td>
                <td><?= $artikel2["admin"] ?></td>
                <td><?= $artikel2["date"] ?></td>
                <td><a class="btn btn-warning" href="?p=artikelBeranda&id=<?= $artikel2['id'] ?>" role="button">Edit</a></td>
            </tr>
        </tbody>
    </table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>