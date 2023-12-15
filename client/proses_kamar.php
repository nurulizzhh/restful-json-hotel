<?php
include "client_kamar.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_kamar" => $_POST['id_kamar'],
        "no_kamar" => $_POST['no_kamar'],
        "kategori" => $_POST['kategori'],
        "harga_kamar" => $_POST['harga_kamar'],
        "kapasitas" => $_POST['kapasitas'],
        "status_kamar" => $_POST['status_kamar'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_kamar($data);
    header('location:page_tabel_kamar.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_kamar" => $_POST['id_kamar'],
        "no_kamar" => $_POST['no_kamar'],
        "kategori" => $_POST['kategori'],
        "harga_kamar" => $_POST['harga_kamar'],
        "kapasitas" => $_POST['kapasitas'],
        "status_kamar" => $_POST['status_kamar'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_kamar($data);
    header('location:page_tabel_kamar.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_kamar" => $_GET['id_kamar'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_kamar($data);
    header('location:page_tabel_kamar.php');
}
unset($abc, $data);
?>