<?php
include "koneksi_login.php";
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    header('Content-Type: application/vnd-ms-excel');
    header('Content-Disposition: attachment; filename=Data Siswa.xls');
    ?>
    <table border="1">
        <thead>
            <tr style="height: 30px;vertical-align:middle;text-align:center;font: size 16px;">
                <th>NO</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>NO TELP</th>
                <th>TEMPAT LAHIR</th>
                <th>TANGGAL LAHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi_login.php";
            // ini_set('precision', '15');
            $no = 1;
            $ambildata = mysqli_query($koneksi, "select * from tbsiswa");
            while ($tampil = mysqli_fetch_array($ambildata)) {
                echo "
                                    <tr>
                                        <th>$no</th>
                                        <th>$tampil[nis]</th>
                                        <th>$tampil[nisn]</th>
                                        <th>$tampil[nama]</th>
                                        <th>$tampil[jurusan]</th>
                                        <th>$tampil[jk]</th>
                                        <th>$tampil[alamat]</th>
                                        <th>'$tampil[tlp]</th>
                                        <th>$tampil[tempat_lahir]</th>
                                        <th>$tampil[tanggal_lahir]</th>
                                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>