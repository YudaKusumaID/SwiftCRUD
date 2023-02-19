<?php
include "session.php";
$koneksi = mysqli_connect("localhost", "root", "", "akademik");

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    //CEK NIS
    $ceknis = "SELECT * FROM tbsiswa where nis = '$nis'";
    $hasilnis = mysqli_query($koneksi, $ceknis);

    // CEK NISN
    $ceknisn = "SELECT * FROM tbsiswa where nisn = '$nisn'";
    $hasilnisn = mysqli_query($koneksi, $ceknisn);

    if (mysqli_num_rows($hasilnis) > 0) {

        if (mysqli_num_rows($hasilnisn) > 0) {
            $alertnisn = "<div class='alert alert-danger'>NISN TELAH DIPAKAI</div>";
        }

        $alertnis = "<div class='alert alert-danger'>NIS TELAH DIPAKAI</div>";
    } elseif (mysqli_num_rows($hasilnisn) > 0) {
        $alertnisn = "<div class='alert alert-danger'>NISN TELAH DIPAKAI</div>";
    } else {
        $query = "INSERT INTO tbsiswa VALUES('$nis', '$nisn', '$nama', '$jurusan', '$jk', '$alamat', '$tlp', '$tempat_lahir', '$tanggal_lahir')";
        mysqli_query($koneksi, $query);
        $alertberhasil = "<div class='alert alert-success'>DATA BERHASIL DITAMBAHKAN</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="siswa_bs.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SwiftCRUD</title>
</head>

<body>
    <!-- HEADER -->
    <?php include "header.php" ?>

    <?php echo @$alertberhasil ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Siswa
                            <a href="database_siswa.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" name="nis" class="form-control" maxlength="4" required onkeypress="isInputNumber(event)" placeholder="Masukkan NIS Anda">
                                        <?php echo @$alertnis ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="text" name="nisn" class="form-control" maxlength="10" required onkeypress="isInputNumber(event)" placeholder="Masukkan NISN Anda">
                                        <?php echo @$alertnisn ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>NAMA</label>
                                <input type="text" name="nama" class="form-control" maxlength="50" required placeholder="Masukkan Nama Anda" id="nama" onblur="mycapitalized()">
                            </div>
                            <div class="mb-3">
                                <label>JURUSAN</label>
                                <select name="jurusan" id="jurusan">
                                    <option value="PPLG">PPLG</option>
                                    <option value="AKL">AKL</option>
                                    <option value="DKV">DKV</option>
                                    <option value="TKR">TKR</option>
                                    <option value="PERHOTELAN">PERHOTELAN</option>
                                    <option value="TTKJ">TTKJ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>JENIS KELAMIN</label>
                                <input class="input-radio" type="radio" name="jenis_kelamin" value="L" required>Laki -
                                Laki
                                <input class="input-radio" type="radio" name="jenis_kelamin" value="P" required>Perempuan
                            </div>
                            <div class="mb-3">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat" class="form-control" maxlength="50" required placeholder="Masukkan Alamat Anda" id="alamat" onblur="mycapitalized()">
                            </div>

                            <div class=" row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NO TELEPON</label>
                                        <input type="text" name="tlp" class="form-control" required maxLength="13" onkeypress="isInputNumber(event)" placeholder="Masukkan No Telepon Anda">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TEMPAT LAHIR</label>
                                        <input type="text" name="tempat_lahir" class="form-control" maxlength="20" required placeholder="Masukkan Tempat Lahir Anda" id="tempat_lahir" onblur="mycapitalized()">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>TANGGAL LAHIR</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="simpan" class="btn btn-primary">Kirim</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <?php include "footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--SCRIPT -->
    <script>
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }

        }

        function mycapitalized() {
            var x = document.getElementById("nama");
            x.value = x.value.toUpperCase();
            var y = document.getElementById("alamat");
            y.value = y.value.toUpperCase();
            var z = document.getElementById("tempat_lahir");
            z.value = z.value.toUpperCase();
        }
    </script>
</body>

</html>