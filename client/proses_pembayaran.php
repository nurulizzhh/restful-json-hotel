<?php
include "client_pembayaran.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_pembayaran" => $_POST['id_pembayaran'],
        "id_pemesanan" => $_POST['id_pemesanan'],
        "total_pembayaran" => $_POST['total_pembayaran'],
        "metode_pembayaran" => $_POST['metode_pembayaran'],
        "tgl_pembayaran" => $_POST['tgl_pembayaran'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_pembayaran($data);
    $id_pembayaran = $r->id_pembayaran;
header('location: page_tabel_pembayaran.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_pembayaran" => $_POST['id_pembayaran'],
        "id_pemesanan" => $_POST['id_pemesanan'],
        "total_pembayaran" => $_POST['total_pembayaran'],
        "metode_pembayaran" => $_POST['metode_pembayaran'],
        "tgl_pembayaran" => $_POST['tgl_pembayaran'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_pembayaran($data);
    header('location:page_tabel_pembayaran.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_pembayaran" => $_GET['id_pembayaran'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_pembayaran($data);
    header('location:page_tabel_pembayaran.php');
}
unset($abc, $data);
?>