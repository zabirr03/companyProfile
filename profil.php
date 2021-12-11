<?php
$header = query("SELECT * FROM header WHERE halaman = '$halaman'")[0];
$artikel = query("SELECT * FROM $halaman");
$visi = $artikel[0];
$misi = $artikel[1];
$artikel = $artikel[2];
?>

<head>
  <title>ALSUD CORPORATION - Profil</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto+Slab:wght@200;400;700&family=Stick+No+Bills:wght@200;400;700&display=swap" rel="stylesheet">
  <link href="stailee.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="profil-header">
    <div class="text">
      <h2 class="biru"><span><?= $header["judul"] ?></span></h2>
      <p><?= $header["kutipan"] ?></p>
    </div>
  </div>
  <div class="twin">
    <div class="profil-article visi">
      <h2><?= $visi["judul"] ?></h2>
      <p><?= $visi["kutipan"] ?></p>
    </div>
    <div class="profil-article misi">
      <h2><?= $misi["judul"] ?></h2>
      <p><?= $misi["kutipan"] ?></p>
    </div>
  </div>
  <div class="profil-article usaha">
    <h2><span class="biru"><?= $artikel["judul"] ?></span></h2>
    <div class="text">
      <img src="img/<?= $artikel['gambar']?>" alt="">
      <p><?= $artikel["kutipan"] ?></p>
    </div>
  </div>
</body>

</html>