<?php
$header = query("SELECT * FROM header WHERE halaman = '$halaman'")[0];
$artikel = query("SELECT * FROM $halaman");
$artikel1 = $artikel[0];
$artikel2 = $artikel[1];
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>ALSUD CORPORATION - Beranda</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto+Slab:wght@200;400;700&family=Stick+No+Bills:wght@200;400;700&display=swap" rel="stylesheet">
  <link href="stailee.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="beranda-header">
    <span class="dark">
      <h1 class="biru"><?= $header["judul"] ?></h1>
      <h3><?= $header["kutipan"] ?></h3>
    </span>
  </div>
  <div class="beranda-article satu">
    <h2><?= $artikel1["judul"] ?></h2>
    <div class="article-content">
      <p><img src="img/<?= $artikel1['gambar'] ?>" alt="" />Disunting pada <?= date_format(date_create($artikel1["date"]), "d M, Y") . "," . " oleh " . $artikel1["admin"] ?></p>
      <p><?= $artikel1["kutipan"] ?></p>
    </div>
  </div>

  <div class="beranda-article dua">
    <h2><?= $artikel2["judul"] ?></h2>
    <div class="article-content">
      <p><?= $artikel2["kutipan"] ?></p>
      <p class="right"><img src="img/<?= $artikel2["gambar"] ?>" alt="" /> Disunting pada <?= date_format(date_create($artikel2["date"]), "d M, Y") . "," . " oleh " . $artikel2["admin"] ?></p>
    </div>
  </div>
</body>

</html>