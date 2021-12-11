<?php
$header = query("SELECT * FROM header WHERE halaman = '$halaman'")[0];
$artikel = query("SELECT * FROM $halaman");
$ali = $artikel[0];
$rizky = $artikel[1];
$huda = $artikel[2];
$putri = $artikel[3];
$chris = $artikel[4];
?>

<head>
  <title>ALSUD CORPORATION - Manajemen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto+Slab:wght@200;400;700&family=Stick+No+Bills:wght@200;400;700&display=swap" rel="stylesheet">
  <link href="stailee.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="manajemen-header">
    <h2><span class="biru"><?= $header["judul"] ?></span></h2>
    <p><?= $header["kutipan"] ?></p>
  </div>
  <div class="komisaris">
    <h1 class="judul">Dewan Komisaris</h1>
    <div class="utama">
      <img class="profpic" src="img/<?= $ali['gambar'] ?>" alt="">
      <h2 class="nama"><?= $ali['nama'] ?></h2>
      <h3><?= $ali['jabatan'] ?></h3>
      <p class="kalimat"><?= $ali['kutipan'] ?></p>
    </div>
    <div class="independen">
      <img class="profpic" src="img/<?= $rizky['gambar'] ?>" alt="">
      <h2 class="nama"><?= $rizky['nama'] ?></h2>
      <h3><?= $rizky['jabatan'] ?></h3>
      <p class="kalimat"><?= $rizky['kutipan'] ?></p>
    </div>
  </div>
  <div class="direksi">
    <h1 class="judul">Dewan Direksi</h1>
    <div class="utama">
      <img class="profpic" src="img/<?= $huda['gambar'] ?>" alt="">
      <h2 class="nama"><?= $huda['nama'] ?></h2>
      <h3><?= $huda['jabatan'] ?></h3>
      <p class="kalimat"><?= $huda['kutipan'] ?></p>
    </div>
    <div class="direktur">
      <img class="profpic" src="img/<?= $putri['gambar'] ?>" alt="">
      <h2 class="nama"><?= $putri['nama'] ?></h2>
      <h3><?= $putri['jabatan'] ?></h3>
      <p class="kalimat"><?= $putri['kutipan'] ?></p>
    </div>
    <div class="direktur2">
      <img class="profpic" src="img/<?= $chris['gambar'] ?>" alt="">
      <h2 class="nama"><?= $chris['nama'] ?></h2>
      <h3><?= $chris['jabatan'] ?></h3>
      <p class="kalimat"><?= $chris['kutipan'] ?></p>
    </div>
  </div>
</body>

</html>