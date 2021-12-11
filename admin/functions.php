<?php
$conn = mysqli_connect("localhost", "root", "", "companyprofile");

function query($input)
{
    global $conn;

    $result = mysqli_query($conn, $input);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //Cek ketersediaan username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('Username sudah terdaftar'); </script>";
        return false;
    }

    //Cek konfirmasi password
    if($password !== $password2){
        echo "<script> alert('Konfirmasi password tidak sesuai'); </>";
        return false;
    }

    //Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Tambahkan user baru ke DB
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    //Cek apakah gambar terupload
    if ($error === 4) {
        echo "<script> alert('Pilih gambar terlebih dahulu'); </script>";
        return false;
    }

    //Cek ekstensi file
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Ekstensi file tidak valid'); </script>";
        return false;
    }

    //Cek ukuran file
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran gambar terlalu besar'); </script>";
        return false;
    }

    //Gambar siap di-upload
    $namaFileBaru = uniqid() . "." . $ekstensiGambar;
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}

function artikelEdit($data, $halaman){
    global $conn;

    if($halaman == "manajemen"):
        $nama = htmlspecialchars($data["nama"]);    
    else:
        $judul = htmlspecialchars($data["judul"]);
    endif;
    $id = $data["id"];
    $kutipan = htmlspecialchars($data["kutipan"]);
    $admin = htmlspecialchars($data["admin"]);
    $date = htmlspecialchars($data["date"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //Cek apakah ada gambar baru
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    if($halaman == "manajemen"):
        $editQuery =
        "UPDATE $halaman SET
            nama = '$nama',
            kutipan = '$kutipan',
            admin = '$admin',
            date = '$date',
            gambar = '$gambar'
        WHERE id = $id";
    else:
        $editQuery = 
        "UPDATE $halaman SET
            judul = '$judul',
            kutipan = '$kutipan',
            admin = '$admin',
            date = '$date',
            gambar = '$gambar'
        WHERE id = $id";
    endif;

    mysqli_query($conn, $editQuery);

    return mysqli_affected_rows($conn);
}

function headerEdit($data, $section){
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $kutipan = htmlspecialchars($data["kutipan"]);
    $admin = htmlspecialchars($data["admin"]);
    $date = htmlspecialchars($data["date"]);

    $editQuery = "UPDATE $section SET 
    judul = '$judul',
    kutipan = '$kutipan',
    admin = '$admin',
    date = '$date'
    WHERE id = $id";

    mysqli_query($conn, $editQuery);

    return mysqli_affected_rows($conn);
}
?>