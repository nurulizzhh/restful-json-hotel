<?php
error_reporting(1);
class Client_layanan
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

    public function tampil_semua_layanan()
    {
        $client = curl_init($this->url . "?tabel=layanan");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }

    public function tampil_layanan($id_layanan)
    {
        $id_layanan = $this->filter($id_layanan);
        $client = curl_init($this->url . "?aksi=tampil&id_layanan=" . $id_layanan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_layanan, $client, $response, $data);
    }

    public function tambah_layanan($data)
    {
        $data = json_encode(array(
            'id_layanan' => $data['id_layanan'],
            'nama_layanan' => $data['nama_layanan'],
            'deskripsi' => $data['deskripsi'],
            'status_layanan' => $data['status_layanan'],
            'harga_layanan' => $data['harga_layanan'],
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

    public function ubah_layanan($data)
    {
        $data = '{
            "id_layanan":"' . $data['id_layanan'] . '",
            "nama_layanan":"' . $data['nama_layanan'] . '",
            "deskripsi":"' . $data['deskripsi'] . '",
            "status_layanan":"' . $data['status_layanan'] . '",
            "harga_layanan":"' . $data['harga_layanan'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);

        unset($data, $data, $c, $response);
    }


    public function hapus_layanan($data)
    {
        $id_layanan = $this->filter($data['id_layanan']);
        $data = json_encode(array(
            'id_layanan' => $id_layanan,
            'aksi' => 'hapus'
        ));
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_layanan, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }
}

$url = 'http://localhost/restful-json-hotel/server/server_layanan.php';
// buat objek baru dari class client
$abc = new Client_layanan($url);
?>
