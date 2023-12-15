<?php
include "client_layanan.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_layanan" => $_POST['id_layanan'],
        "nama_layanan" => $_POST['nama_layanan'],
        "deskripsi" => $_POST['deskripsi'],
        "status_layanan" => $_POST['status_layanan'],
        "harga_layanan" => $_POST['harga_layanan'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_layanan($data);
    header('location:page_tabel_layanan.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_layanan" => $_POST['id_layanan'],
        "nama_layanan" => $_POST['nama_layanan'],
        "deskripsi" => $_POST['deskripsi'],
        "status_layanan" => $_POST['status_layanan'],
        "harga_layanan" => $_POST['harga_layanan'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_layanan($data);
    header('location:page_tabel_layanan.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_layanan" => $_GET['id_layanan'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_layanan($data);
    header('location:page_tabel_layanan.php');
}
unset($abc, $data);
?>
