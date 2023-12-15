<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_pembayaran = $data->id_pembayaran;
    $id_pemesanan = $data->id_pemesanan;
    $total_pembayaran = $data->total_pembayaran;
    $metode_pembayaran = $data->metode_pembayaran;
    $tgl_pembayaran = $data->tgl_pembayaran;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_pembayaran' => $id_pembayaran,
            'id_pemesanan' => $id_pemesanan,
            'total_pembayaran' => $total_pembayaran,
            'metode_pembayaran' => $metode_pembayaran,
            'tgl_pembayaran' => $tgl_pembayaran
        );
        $abc->tambah_pembayaran($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_pembayaran' => $id_pembayaran,
            'id_pemesanan' => $id_pemesanan,
            'total_pembayaran' => $total_pembayaran,
            'metode_pembayaran' => $metode_pembayaran,
            'tgl_pembayaran' => $tgl_pembayaran
        );
        $abc->ubah_pembayaran($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_pembayaran($id_pembayaran);
    }

    unset($postdata, $data, $data2, $id_pembayaran, $id_pemesanan, $total_pembayaran, $metode_pembayaran, $tgl_pembayaran, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_pembayaran']))) {
        $id_pembayaran = filter($_GET['id_pembayaran']);
        $data = $abc->tampil_pembayaran($id_pembayaran);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_pembayaran();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_pembayaran, $abc);
}
?>