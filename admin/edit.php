<?php

if (!isset($_GET['p'])) {
    $halaman = "beranda";
} else {
    $halaman = $_GET['p'];
}

$header = query("SELECT * FROM header WHERE halaman = '$halaman'")[0];
$artikel = query("SELECT * FROM $halaman");
$footer = query("SELECT * FROM footer");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sunting <?= ucfirst($halaman) ?></title>
    <style>
        p {
            text-align: justify;
        }
    </style>
</head>

<body>
    <h3>Header <?= ucfirst($halaman) ?></h3>
    <form>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input class="form-control" type="text" value="<?= $header['judul'] ?>" aria-label="readonly input example" readonly>
        </div>
        <div class="mb-3">
            <label for="kutipan" class="form-label">Kutipan</label>
            <textarea class="form-control" id="kutipan" rows="6" readonly><?= $header['kutipan'] ?></textarea>
        </div>
        <div class="d-grid gap-2">
            <a class="btn btn-warning" href="?page=editHeader&id=<?= $header['id'] ?>&section=header" role="button">Edit</a>
        </div>
    </form>
    <br>
    <br>
    <h3>Artikel <?= ucfirst($halaman) ?></h3>
    <?php
    if ($_GET['p'] == 'manajemen') :
    ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kutipan</th>
                    <th>Gambar</th>
                    <th>Administrator</th>
                    <th>Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($artikel as $row) :
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td width="200"><?= $row["nama"] ?></td>
                        <td>
                            <p><?= $row["kutipan"] ?></p>
                        </td>
                        <td><img src="../img/<?= $row['gambar'] ?>" alt="" width="150"></td>
                        <td width="200"><?= $row["admin"] ?></td>
                        <td><?= $row["date"] ?></td>
                        <td><a class="btn btn-warning" href="?page=editArtikel&id=<?= $row['id'] ?>&halaman=<?= $halaman ?>" role="button">Edit</a></td>
                    </tr>
                <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>
    <?php
    else :
    ?>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kutipan</th>
                    <th>Gambar</th>
                    <th>Administrator</th>
                    <th>Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($artikel as $row) :
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td width="200"><?= $row["judul"] ?></td>
                        <td>
                            <p><?= $row["kutipan"] ?></p>
                        </td>
                        <td><img src="../img/<?= $row["gambar"] ?>" alt="" width="150"></td>
                        <td width="200"><?= $row["admin"] ?></td>
                        <td><?= $row["date"] ?></td>
                        <td><a class="btn btn-warning" href="?page=editArtikel&id=<?= $row['id'] ?>&halaman=<?= $halaman ?>" role="button">Edit</a></td>
                    </tr>
                <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>

    <?php
    endif;
    ?>
    <h3>Footer Halaman</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kutipan</th>
                <th>Administrator</th>
                <th>Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($footer as $row) :
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td width="200"><?= $row["judul"] ?></td>
                    <td>
                        <p><?= $row["kutipan"] ?></p>
                    </td>
                    <td width="200"><?= $row["admin"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td><a class="btn btn-warning" href="?page=editHeader&id=<?= $row['id'] ?>&section=footer" role="button">Edit</a></td>
                </tr>
            <?php
                $i++;
            endforeach;
            ?>
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