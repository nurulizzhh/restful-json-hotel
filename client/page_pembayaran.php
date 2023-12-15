<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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
      <h1>Pembayaran</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Masukkan data</h5>
              <form method="POST" action="proses_pembayaran.php">
                <input type="hidden" name="aksi" value="tambah" />
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">No Kamar</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="id_pemesanan" id="id_pemesanan"
                      aria-label="Default select example">
                      <?php
                      include "client_pemesanan.php";
                      $no = 1;
                      $data_array = $abc->tampil_semua_pemesanan();
                      foreach ($data_array as $r) { ?>
                        <option value=<?= $r->id_pemesanan ?>><?= $r->id_pemesanan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Total Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="text" name="total_pembayaran" id="total_pembayaran" class="form-control" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Metode Pembayaran</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="metode_pembayaran">
                      <option selected>-Pilih-</option>
                      <option value="Debit">Debit</option>
                      <option value="Cash">Cash</option>
                      <option value="Qris">Qris</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_pembayaran" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12 text-end">
                    <button type="button" onclick="hitungTotalHarga()" class="btn btn-primary">Hitung Total
                      Harga</button>
                    <button type="submit" class="btn btn-primary">Bayar Pemesanan</button>
                  </div>
                </div>
            </div>
            </form><!-- End General Form Elements -->
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
  <!-- ... Bagian sebelumnya ... -->

  <script>
    function hitungTotalHarga() {
      // Ambil nilai harga_layanan dari data yang dipilih di formulir
      var id_pemesanan = document.getElementById('id_pemesanan').value;
      var selectedpemesanan = <?= json_encode($data_array) ?>;
      var total_harga = selectedpemesanan.find(l => l.id_pemesanan == id_pemesanan).total_harga;

      // Masukkan total harga ke dalam input total_harga
      document.getElementById('total_pembayaran').value = total_harga;
    }
  </script>

  <!-- ... Bagian setelahnya ... -->

</body>

</html>