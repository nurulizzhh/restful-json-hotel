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
        header("Access-Control-Allow_Methods: GET, POST, OPTIONS");
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
    $id_pemesanan = $data->id_pemesanan;
    $nama_pemesan = $data->nama_pemesan;
    $id_kamar = $data->id_kamar;
    $id_layanan = $data->id_layanan;
    $tgl_checkin = $data->tgl_checkin;
    $tgl_checkout = $data->tgl_checkout;
    $jumlah_kamar = $data->jumlah_kamar;
    $total_harga = $data->total_harga;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_pemesanan' => $id_pemesanan,
            'nama_pemesan' => $nama_pemesan,
            'id_kamar' => $id_kamar,
            'id_layanan' => $id_layanan,
            'tgl_checkin' => $tgl_checkin,
            'tgl_checkout' => $tgl_checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'total_harga' => $total_harga
        );
        $abc->tambah_pemesanan($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_pemesanan' => $id_pemesanan,
            'nama_pemesan' => $nama_pemesan,
            'id_kamar' => $id_kamar,
            'id_layanan' => $id_layanan,
            'tgl_checkin' => $tgl_checkin,
            'tgl_checkout' => $tgl_checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'total_harga' => $total_harga
        );
        $abc->ubah_pemesanan($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_pemesanan($id_pemesanan);
    }

    unset($postdata, $data, $data2, $id_pemesanan, $nama_pemesan, $id_kamar, $id_layanan, $tgl_checkin, $tgl_checkout, $jumlah_kamar, $total_harga, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_pemesanan']))) {
        $id_pemesanan = filter($_GET['id_pemesanan']);
        $data = $abc->tampil_pemesanan($id_pemesanan);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_pemesanan();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_pemesanan, $abc);
}
?>
