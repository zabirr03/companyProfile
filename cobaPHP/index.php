<?php
require 'admin/functions.php';

if (!isset($_GET['p'])) {
    $halaman = "beranda";
} else {
    $halaman = $_GET['p'];
}

$footer = query("SELECT * FROM footer");
$kiri = $footer[0];
$kanan = $footer[1];
$bawah = $footer[2];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALSUD Corporation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto+Slab:wght@200;400;700&family=Stick+No+Bills:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stailee.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="?p=beranda"><img class="logo" src="img/logo.jpeg" alt=""></a>
            <div class="menu_nav">
                <ul>
                    <li class="active"><a href="?p=beranda"><span>Beranda</span></a></li>
                    <li><a href="?p=profil"><span>Profil</span></a></li>
                    <li><a href="?p=manajemen"><span>Manajemen</span></a></li>
                    <li><a href="?p=proyek"><span>Proyek</span></a></li>
                    <li><a href="admin/login.php" target="_blank"><span>Log In</span></a></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <?php
            if (empty($_GET['p'])) {
                $filename = "beranda";
            } else {
                $filename = $_GET['p'];
            }
            require $filename . ".php";
            ?>
        </div>
        <div class="footer">
            <div class="col c2">
                <h2><span><?= $kiri["judul"] ?></span></h2>
                <p><?= $kiri["kutipan"] ?></p>
            </div>
            <div class="col c3">
                <h2><span><?= $kanan["judul"] ?></span></h2>
                <p><?= $kanan["kutipan"] ?></p>
            </div>
            <p class="copy"><?= $bawah["kutipan"] ?></p>
        </div>
    </div>
</body>

</html>