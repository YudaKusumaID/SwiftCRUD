<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="database_siswa.css">
    <title>SwiftCRUD</title>
</head>

</head>

<body>
    <!-- HEADER -->
    <?php include "header.php" ?>

    <!-- TABLE -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Database Siswa
                            <a href="eksport_xls.php" class="btn btn-primary float-end">Eksport XLS</a>
                            <a href="siswa.php" class="btn btn-primary float-end">Tambahkan Siswa</a>
                        </h4>
                    </div>
                    <div class="card-body d-flex justify-content-center">

                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
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
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi_login.php";
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
                                        <th>$tampil[tlp]</th>
                                        <th>$tampil[tempat_lahir]</th>
                                        <th>$tampil[tanggal_lahir]</th>
                                        <th><a href='?hapus=$tampil[nis]' class='btn btn-danger' onclick=\"return konfirmasi();\" >Hapus</a> <a href='edit.php?id=$tampil[nis]' class='btn btn-warning mt-1'>Edit</a></th>
                                    </tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- AKSI HAPUS -->
                    <?php
                    if (isset($_GET['hapus'])) {
                        mysqli_query($koneksi, "delete  from tbsiswa where nis='$_GET[hapus]'");

                        echo "DATA TELAH DIHAPUS";
                        echo "<meta http-equiv=refresh content=1;URL='database_siswa.php'>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include "footer.php" ?>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function konfirmasi() {
        var result = confirm("Apakah Anda yakin ingin melanjutkan?");
        if (result == true) {
            alert("Data Telah Dihapus");
        } else {
            alert("Tindakan Dibatalkan");
        }
    }
    </script>
    </table>
</body>

</html>