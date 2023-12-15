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
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_layanan = $data->id_layanan;
    $nama_layanan = $data->nama_layanan;
    $deskripsi = $data->deskripsi;
    $status_layanan = $data->status_layanan;
    $harga_layanan = $data->harga_layanan;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_layanan' => $id_layanan,
            'nama_layanan' => $nama_layanan,
            'deskripsi' => $deskripsi,
            'status_layanan' => $status_layanan,
            'harga_layanan' => $harga_layanan
        );
        $abc->tambah_layanan($data2);

    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_layanan' => $id_layanan,
            'nama_layanan' => $nama_layanan,
            'deskripsi' => $deskripsi,
            'status_layanan' => $status_layanan,
            'harga_layanan' => $harga_layanan
        );
        $abc->ubah_layanan($data2);

    } elseif ($aksi == 'hapus') {
        $abc->hapus_layanan($id_layanan);
    }

    unset($postdata, $data, $data2, $id_layanan, $nama_layanan, $deskripsi, $status_layanan, $harga_layanan, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_layanan']))) {
        $id_layanan = filter($_GET['id_layanan']);
        $data = $abc->tampil_layanan($id_layanan);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_layanan();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_layanan, $abc);
}
?>
