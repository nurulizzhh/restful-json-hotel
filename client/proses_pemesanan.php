<?php
include "client_pemesanan.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_pemesanan" => $_POST['id_pemesanan'],
        "nama_pemesan" => $_POST['nama_pemesan'],
        "id_kamar" => $_POST['id_kamar'],
        "id_layanan" => $_POST['id_layanan'],
        "tgl_checkin" => $_POST['tgl_checkin'],
        "tgl_checkout" => $_POST['tgl_checkout'],
        "jumlah_kamar" => $_POST['jumlah_kamar'],
        "total_harga" => $_POST['total_harga'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_pemesanan($data);
    header('location:page_pembayaran.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_pemesanan" => $_POST['id_pemesanan'],
        "nama_pemesan" => $_POST['nama_pemesan'],
        "id_kamar" => $_POST['id_kamar'],
        "id_layanan" => $_POST['id_layanan'],
        "tgl_checkin" => $_POST['tgl_checkin'],
        "tgl_checkout" => $_POST['tgl_checkout'],
        "jumlah_kamar" => $_POST['jumlah_kamar'],
        "total_harga" => $_POST['total_harga'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_pemesanan($data);
    header('location:page_tabel_pemesanan.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_pemesanan" => $_GET['id_pemesanan'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_pemesanan($data);
    header('location:page_tabel_pemesanan.php');
}
unset($abc, $data);
?>