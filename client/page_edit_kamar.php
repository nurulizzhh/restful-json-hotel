<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Kamar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Viva la Vida Hotel</span>
            </a>
        </div><!-- End Logo -->
        <div class="header-nav ms-auto">
            <a href="index.php" class="btn"><i class="bi bi-house fs-4"></i></a>
        </div>
    </header><!-- End Header -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Kamar</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            include "client_kamar.php";
                            $r = $abc->tampil_kamar($_GET['id_kamar']);
                            ?>
                            <h5 class="card-title">Edit Data Kamar</h5>
                            <form method="POST" action="proses_kamar.php">
                                <input type="hidden" name="aksi" value="ubah" />
                                <input type="hidden" name="id_kamar" value="<?= $r->id_kamar ?>" />
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $r->id_kamar ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">No Kamar</label>
                                    <div class="col-sm-10">
                                        <input type="number" name=no_kamar class="form-control"
                                            value="<?= $r->no_kamar ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Jenis Kamar</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="kategori" value="<?= $r->kategori ?>">
                                            <option value="Standard">Standard</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Suite"> Suite</option>
                                            <option value="Executive Suite"> Executive Suite</option>
                                            <option value="Presidential Suite"> Presidential Suite</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Harga Kamar</label>
                                    <div class="col-sm-10">
                                        <input type="number" name=harga_kamar class="form-control"
                                            value="<?= $r->harga_kamar ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Kapasitas Kamar</label>
                                    <div class="col-sm-10">
                                        <input type="number" name=kapasitas class="form-control"
                                            value="<?= $r->kapasitas ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Status Kamar</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status_kamar" value="<?= $r->status_kamar ?>">
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 text-end">
                                        <button type="submit" class="btn btn-primary">Edit Kamar</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>