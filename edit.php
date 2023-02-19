<?php
include "session.php";
include "koneksi_login.php";

$sql = mysqli_query($koneksi, "SELECT * FROM tbsiswa WHERE nis ='$_GET[id]'");
$data = mysqli_fetch_array($sql);

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
    <?php include "header.php" ?>

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
                        <form action="proses_edit.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" name="nis" class="form-control" maxlength="4" required onkeypress="isInputNumber(event)" placeholder="Masukkan NIS Anda" value="<?php echo $data['nis'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="text" name="nisn" class="form-control" maxlength="10" required onkeypress="isInputNumber(event)" placeholder="Masukkan NISN Anda" value="<?php echo $data['nisn'] ?>">
                                        <?php echo @$alertnisn ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>NAMA</label>
                                <input type="text" name="nama" class="form-control" maxlength="50" required placeholder="Masukkan Nama Anda" id="nama" onblur="mycapitalized()" value="<?php echo $data['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <?php $kelas = $data['jurusan'] ?>
                                <label>JURUSAN</label>
                                <select name="jurusan" id="jurusan">
                                    <option value="PPLG" <?php if ($kelas == "PPLG") {
                                                                echo 'selected';
                                                            } ?>>PPLG
                                    </option>
                                    <option value="AKL" <?php if ($kelas == "AKL") {
                                                            echo 'selected';
                                                        } ?>>AKL</option>
                                    <option value="DKV" <?php if ($kelas == "DKV") {
                                                            echo 'selected';
                                                        } ?>>DKV</option>
                                    <option value="TKR" <?php if ($kelas == "TKR") {
                                                            echo 'selected';
                                                        } ?>>TKR</option>
                                    <option value="PERHOTELAN" <?php if ($kelas == "PERHOTELAN") {
                                                                    echo 'selected';
                                                                } ?>>PERHOTELAN</option>
                                    <option value="TTKJ" <?php if ($kelas == "PPLG") {
                                                                echo 'TTKJT';
                                                            } ?>>TTKJ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <?php $jenis_kelamin = $data['jk'] ?>
                                <label>JENIS KELAMIN</label>
                                <input class="input-radio" type="radio" name="jenis_kelamin" value="L" required <?php if ($jenis_kelamin == "L") {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>Laki - Laki
                                <input class="input-radio" type="radio" name="jenis_kelamin" value="P" required <?php if ($jenis_kelamin == "P") {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>Perempuan
                            </div>
                            <div class="mb-3">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat" class="form-control" maxlength="50" required placeholder="Masukkan Alamat Anda" id="alamat" onblur="mycapitalized()" value="<?php echo $data['alamat'] ?>">
                            </div>

                            <div class=" row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NO TELEPON</label>
                                        <input type="text" name="tlp" class="form-control" required maxLength="13" onkeypress="isInputNumber(event)" placeholder="Masukkan No Telepon Anda" value="<?php echo $data['tlp'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TEMPAT LAHIR</label>
                                        <input type="text" name="tempat_lahir" class="form-control" maxlength="20" required placeholder="Masukkan Tempat Lahir Anda" id="tempat_lahir" onblur="mycapitalized()" value="<?php echo $data['tempat_lahir'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>TANGGAL LAHIR</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $data['tanggal_lahir'] ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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