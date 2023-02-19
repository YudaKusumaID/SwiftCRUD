<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftCRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <!-- HEADER -->
    <?php include "header.php" ?>

    <!-- HOME -->
    <section class="vh-100 d-flex align-items-center" id="aboutus">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 col-md-6 " id="deskripsi">
                    <h1 class="display-5 fw-light">Selamat Datang</h1>
                    <p>Semudah membuat mie instant. Tambahkan, update, delete data kini berada digengaman Anda.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
                <div class="col-lg-7 col-md-6 d-flex justify-content-end">
                    <img src="img/logo31.jpg" class="img-fluid banner" width="400" id="home-section">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php" ?>
</body>

</html>