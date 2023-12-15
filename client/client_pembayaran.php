<?php
error_reporting(1);
class Client_pembayaran
{
    private $url;

    // function yang pertama kali di load saat class dipanggil 
    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_pembayaran()
    {
        $client = curl_init($this->url . "?tabel=pembayaran");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }

    public function tampil_pembayaran($id_pembayaran)
    {
        $id_pembayaran = $this->filter($id_pembayaran);
        $client = curl_init($this->url . "?aksi=tampil&id_pembayaran=" . $id_pembayaran);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_pembayaran, $client, $response, $data);
    }

    public function tambah_pembayaran($data)
    {
        $data = '{
            "id_pembayaran":"' . $data['id_pembayaran'] . '",
            "id_pemesanan":"' . $data['id_pemesanan'] . '",
            "total_pembayaran":"' . $data['total_pembayaran'] . '",
            "metode_pembayaran":"' . $data['metode_pembayaran'] . '",
            "tgl_pembayaran":"' . $data['tgl_pembayaran'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_pembayaran($data)
    {
        $data = '{
            "id_pembayaran":"' . $data['id_pembayaran'] . '",
            "id_pemesanan":"' . $data['id_pemesanan'] . '",
            "total_pembayaran":"' . $data['total_pembayaran'] . '",
            "metode_pembayaran":"' . $data['metode_pembayaran'] . '",
            "tgl_pembayaran":"' . $data['tgl_pembayaran'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_pembayaran($data)
    {
        $id_pembayaran = $this->filter($data['id_pembayaran']);
        $data = '{
            "id_pembayaran":"' . $id_pembayaran . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pembayaran, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }
}

$url = 'http://localhost/restful-json-hotel/server/server_pembayaran.php';
// buat objek baru dari class client
$abc = new Client_pembayaran($url);
?>