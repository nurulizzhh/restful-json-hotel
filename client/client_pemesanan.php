<?php
error_reporting(1);
class Client_pemesanan
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

    public function tampil_semua_pemesanan()
    {
        $client = curl_init($this->url . "?tabel=pemesanan");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }

    public function tampil_pemesanan($id_pemesanan)
    {
        $id_pemesanan = $this->filter($id_pemesanan);
        $client = curl_init($this->url . "?aksi=tampil&id_pemesanan=" . $id_pemesanan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_pemesanan, $client, $response, $data);
    }

    public function tambah_pemesanan($data)
    {
        $data = '{  "id_pemesanan":"' . $data['id_pemesanan'] . '",
                    "nama_pemesan":"' . $data['nama_pemesan'] . '",
                    "id_kamar":"' . $data['id_kamar'] . '",
                    "id_layanan":"' . $data['id_layanan'] . '",
                    "tgl_checkin":"' . $data['tgl_checkin'] . '",
                    "tgl_checkout":"' . $data['tgl_checkout'] . '",
                    "jumlah_kamar":"' . $data['jumlah_kamar'] . '",
                    "total_harga":"' . $data['total_harga'] . '",
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

    public function ubah_pemesanan($data)
    {   
        $data = json_encode(array(
            'id_pemesanan' => $data['id_pemesanan'],
            'nama_pemesan' => $data['nama_pemesan'],
            'id_kamar' => $data['id_kamar'],
            'id_layanan' => $data['id_layanan'],
            'tgl_checkin' => $data['tgl_checkin'],
            'tgl_checkout' => $data['tgl_checkout'],
            'jumlah_kamar' => $data['jumlah_kamar'],
            'total_harga' => $data['total_harga'],
            'aksi' => $data['aksi']
        ));

    $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);

        unset($data, $data, $c, $response);
}


    public function hapus_pemesanan($data)
    {
        $id_pemesanan = $this->filter($data['id_pemesanan']);
        $data = '{  "id_pemesanan":"' . $id_pemesanan . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pemesanan, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }
}

$url = 'http://localhost/restful-json-hotel/server/server_pemesanan.php';
// buat objek baru dari class client
$abc = new Client_pemesanan($url);
?>