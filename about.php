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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <!-- HEADER -->
    <?php include "header.php" ?>

    <!-- ABOUT US -->
    <section class="vh-100 d-flex align-items-center" id="aboutus">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 col-md-6 " id="deskripsi">
                    <h1 class="display-5 fw-bold">SwiftCRUD</h1>
                    <p>SwiftCRUD didesain dengan antarmuka pengguna yang sederhana dan intuitif sehingga memudahkan
                        pengguna dalam melakukan penulisan data. Fitur-fitur yang disediakan meliputi pembuatan,
                        pembacaan, pembaruan, penghapusan data, pencarian data, pengurutan, dan eksport data.</p>
                </div>
                <div class="col-lg-7 col-md-6 d-flex justify-content-end">
                    <img src="img/8672698_3964906.jpg" alt="" class="img-fluid banner" width="400" id="home-section">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php" ?>
</body>

</html>