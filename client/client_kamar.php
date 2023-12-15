<?php
error_reporting(1);
class Client_kamar
{
    private $url;

    // function yang pertama kali di-load saat class dipanggil 
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

    public function tampil_semua_kamar()
    {
        $client = curl_init($this->url . "?tabel=kamar");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }

    public function tampil_kamar($id_kamar)
    {
        $id_kamar = $this->filter($id_kamar);
        $client = curl_init($this->url . "?aksi=tampil&id_kamar=" . $id_kamar);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_kamar, $client, $response, $data);
    }

    public function tambah_kamar($data)
    {
        $data = json_encode(array(
            'id_kamar' => $data['id_kamar'],
            'no_kamar' => $data['no_kamar'],
            'kategori' => $data['kategori'],
            'harga_kamar' => $data['harga_kamar'],
            'kapasitas' => $data['kapasitas'],
            'status_kamar' => $data['status_kamar'],
            'aksi' => 'tambah'
        ));
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_kamar($data)
    {
        $data = '{
            "id_kamar":"' . $data['id_kamar'] . '",
            "no_kamar":"' . $data['no_kamar'] . '",
            "kategori":"' . $data['kategori'] . '",
            "harga_kamar":"' . $data['harga_kamar'] . '",
            "kapasitas":"' . $data['kapasitas'] . '",
            "status_kamar":"' . $data['status_kamar'] . '",
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

    public function hapus_kamar($data)
    {
        $id_kamar = $this->filter($data['id_kamar']);
        $data = json_encode(array(
            'id_kamar' => $id_kamar,
            'aksi' => 'hapus'
        ));
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_kamar, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }
}

$url = 'http://localhost/restful-json-hotel/server/server_kamar.php';
// buat objek baru dari class client
$abc = new Client_kamar($url);
?>