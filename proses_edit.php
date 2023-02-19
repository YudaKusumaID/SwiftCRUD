<?php

include('koneksi_login.php');

$nis = $_POST['nis'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

$query = "UPDATE tbsiswa SET nis = '$nis', nisn= '$nisn', nama='$nama', jurusan = '$jurusan', jk = '$jk', alamat = '$alamat', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir' WHERE nis = '$nis'";


if ($koneksi->query($query)) {
    header("location: database_siswa.php");
} else {
    echo "Data Gagal Diupate!";
}
