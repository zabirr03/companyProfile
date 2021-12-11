<?php
$header = query("SELECT * FROM header WHERE halaman = '$halaman'")[0];
$artikel = query("SELECT * FROM $halaman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Proyek</title>
    <link rel="stylesheet" href="stailee.css">
</head>

<body>
    <div class="proyek-header">
        <h2><span class="biru"><?= $header["judul"] ?></span></h2>
    </div>
    <div class="komersial">
        <h2 class="judul-proyek">KOMERSIAL</h2>
        <div class="gambar-content satu">
            <img src="img/<?= $artikel[0]['gambar'] ?>" alt="">
            <p><span><?= $artikel[0]['judul'] ?></span><br><br><?= $artikel[0]['kutipan'] ?></p>
        </div>
        <div class="gambar-content dua">
            <img src="img/<?= $artikel[1]['gambar'] ?>" alt="">
            <p><span><?= $artikel[1]['judul'] ?></span><br><br><?= $artikel[1]['kutipan'] ?></p>
        </div>
    </div>
    <div class="transportasi">
        <h2 class="judul-proyek">TRANSPORTASI</h2>
        <div class="gambar">
            <div class="gambar-content satu">
                <img src="img/<?= $artikel[2]['gambar'] ?>" alt="">
                <p><span><?= $artikel[2]['judul'] ?></span><br><br><?= $artikel[2]['kutipan'] ?></p>
            </div>
            <div class="gambar-content dua">
                <p><span><?= $artikel[3]['judul'] ?></span><br><br><?= $artikel[3]['kutipan'] ?></p>
                <img src="img/<?= $artikel[3]['gambar'] ?>" alt="">
            </div>
            <div class="gambar-content tiga">
                <img src="img/<?= $artikel[4]['gambar'] ?>" alt="">
                <p><span><?= $artikel[4]['judul'] ?></span><br><br><?= $artikel[4]['kutipan'] ?></p>
            </div>
        </div>
    </div>
    <div class="perumahan">
        <h2 class="judul-proyek">PERUMAHAN</h2>
        <div class="gambar-content satu">
            <img src="img/<?= $artikel[5]['gambar'] ?>" alt="">
            <p><span><?= $artikel[5]['judul'] ?></span><br><br><?= $artikel[5]['kutipan'] ?></p>
        </div>
        <div class="gambar-content dua">
            <img src="img/<?= $artikel[6]['gambar'] ?>" alt="">
            <p><span><?= $artikel[6]['judul'] ?></span><br><br><?= $artikel[6]['kutipan'] ?></p>
        </div>
        <div class="gambar-content tiga">
            <img src="img/<?= $artikel[7]['gambar'] ?>" alt="">
            <p><span><?= $artikel[7]['judul'] ?></span><br><br><?= $artikel[7]['kutipan'] ?></p>
        </div>
        <div class="gambar-content empat">
            <img src="img/<?= $artikel[8]['gambar'] ?>" alt="">
            <p><span><?= $artikel[8]['judul'] ?></span><br><br><?= $artikel[8]['kutipan'] ?></p>
        </div>
    </div>
    <div class="industrial">
        <h2 class="judul-proyek">INDUSTRIAL</h2>
        <div class="gambar">
            <div class="gambar-content satu">
                <img src="img/<?= $artikel[9]['gambar'] ?>" alt="">
                <p><span><?= $artikel[9]['judul'] ?></span><br><br><?= $artikel[9]['kutipan'] ?></p>
            </div>
            <div class="gambar-content dua">
                <p><span><?= $artikel[10]['judul'] ?></span><br><br><?= $artikel[10]['kutipan'] ?></p>
                <img src="img/<?= $artikel[10]['gambar'] ?>" alt="">
            </div>
        </div>
    </div>
</body>

</html>