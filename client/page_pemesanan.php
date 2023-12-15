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
      <h1>Pemesanan Kamar</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Masukkan data</h5>
              <form method="POST" action="proses_pemesanan.php">
                <input type="hidden" name="aksi" value="tambah" />
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_pemesan" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">No Kamar</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="id_kamar" id="no_kamar" aria-label="Default select example">
                      <?php
                      include "client_kamar.php";
                      $no = 1;
                      $data_array = $abc->tampil_semua_kamar();
                      foreach ($data_array as $r) { ?>
                        <option value=<?= $r->id_kamar ?>><?= $r->no_kamar ?> - <?= $r->kategori ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Layanan</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="id_layanan" id="nama_layanan" aria-label="Default select example">
                      <?php
                      include "client_layanan.php";
                      $no = 1;
                      $data_array_layanan = $abc->tampil_semua_layanan();
                      foreach ($data_array_layanan as $r) { ?>
                        <option value="<?= $r->id_layanan ?>">
                          <?= $r->nama_layanan ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Check In</label>
                  <div class="col-sm-10">
                    <input type="text" name="tgl_checkin" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Check Out</label>
                  <div class="col-sm-10">
                    <input type="text" name="tgl_checkout" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="1" readonly>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Total Harga</label>
                  <div class="col-sm-10">
                    <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12 text-end">
                    <button type="button" onclick="hitungTotalHarga()" class="btn btn-primary">Hitung Total
                      Harga</button>
                    <button type="submit" class="btn btn-primary">Pesan Kamar</button>
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
      // Ambil nilai jumlah_kamar dari formulir
      var jumlah_kamar = document.getElementById('jumlah_kamar').value;

      // Ambil nilai harga_kamar dari data yang dipilih di formulir
      var no_kamar = document.getElementById('no_kamar').value;
      var selectedKamar = <?= json_encode($data_array) ?>;
      var harga_kamar = selectedKamar.find(k => k.id_kamar == no_kamar).harga_kamar;

      // Ambil nilai harga_layanan dari data yang dipilih di formulir
      var nama_layanan = document.getElementById('nama_layanan').value;
      var selectedLayanan = <?= json_encode($data_array_layanan) ?>;
      var harga_layanan = selectedLayanan.find(l => l.id_layanan == nama_layanan).harga_layanan;

      // Hitung total harga
      var total_harga = (harga_kamar * jumlah_kamar) + harga_layanan;

      // Masukkan total harga ke dalam input total_harga
      document.getElementById('total_harga').value = total_harga;
    }
  </script>

  <!-- ... Bagian setelahnya ... -->

</body>

</html>