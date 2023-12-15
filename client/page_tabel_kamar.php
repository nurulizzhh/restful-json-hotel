<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tables / Data - NiceAdmin Bootstrap Template</title>
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
            <a href="page_tabel_kamar.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Viva la Vida Hotel</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <div class="header-nav ms-auto">
            <a href="index.php" class="btn"><i class="bi bi-house fs-4"></i></a>
        </div>

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="page_tabel_kamar.php">
                    <i class="bi bi-door-open"></i>
                    <span>Kamar</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="page_tabel_layanan.php">
                    <i class="bi bi-question-circle"></i>
                    <span>Layanan</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="page_tabel_pemesanan.php">
                    <i class="bi bi-envelope"></i>
                    <span>Pemesanan</span>
                </a>
            </li><!-- End Contact Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="page_tabel_pembayaran.php">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Pembayaran</span>
                </a>
            </li><!-- End Register Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Kamar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datatables</h5>
                                <!-- Table with stripped rows -->
                                <table class="table datatable mb-3">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No Kamar</th>
                                            <th>Jenis Kamar</th>
                                            <th>Harga Kamar</th>
                                            <th>Kapasitas Kamar</th>
                                            <th>Status Kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "client_kamar.php";
                                        $no = 1;
                                        $data_array = $abc->tampil_semua_kamar();
                                        foreach ($data_array as $r) { ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $r->no_kamar ?>
                                                </td>
                                                <td>
                                                    <?= $r->kategori ?>
                                                </td>
                                                <td>
                                                    <?= $r->harga_kamar ?>
                                                </td>
                                                <td>
                                                    <?= $r->kapasitas ?>
                                                </td>
                                                <td>
                                                    <?= $r->status_kamar ?>
                                                </td>
                                                <td>
                                                    <!-- Tombol untuk membuka modal -->
                                                    <a class="btn btn-success"
                                                        href="page_edit_kamar.php?id_kamar=<?= $r->id_kamar ?>"><i
                                                            class="bi bi-pencil-square"></i>Ubah</a>

                                                    <a class="btn btn-danger"
                                                        href="proses_kamar.php?aksi=hapus&id_kamar=<?= $r->id_kamar ?>"
                                                        onclick="return confirm('Apakah Anda ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        unset($data_array, $r, $no);
                                        ?>
                                    </tbody>
                                </table>
                                <a class="btn btn-primary" href="page_tambah_kamar.php"><i
                                        class="bi bi-plus-square"></i> Tambah Kamar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </section>

    </main><!-- End #main -->




    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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