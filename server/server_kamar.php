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
    $id_kamar = $data->id_kamar;
    $no_kamar = $data->no_kamar;
    $kategori = $data->kategori;
    $harga_kamar = $data->harga_kamar;
    $kapasitas = $data->kapasitas;
    $status_kamar = $data->status_kamar;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_kamar' => $id_kamar,
            'no_kamar' => $no_kamar,
            'kategori' => $kategori,
            'harga_kamar' => $harga_kamar,
            'kapasitas' => $kapasitas,
            'status_kamar' => $status_kamar
        );
        $abc->tambah_kamar($data2);

    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_kamar' => $id_kamar,
            'no_kamar' => $no_kamar,
            'kategori' => $kategori,
            'harga_kamar' => $harga_kamar,
            'kapasitas' => $kapasitas,
            'status_kamar' => $status_kamar
        );
        $abc->ubah_kamar($data2);

    } elseif ($aksi == 'hapus') {
        $abc->hapus_kamar($id_kamar);
    }

    unset($postdata, $data, $data2, $id_kamar, $no_kamar, $kategori, $harga_kamar, $kapasitas, $status_kamar, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_kamar']))) {
        $id_kamar = filter($_GET['id_kamar']);
        $data = $abc->tampil_kamar($id_kamar);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_kamar();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_kamar, $abc);
}
?>