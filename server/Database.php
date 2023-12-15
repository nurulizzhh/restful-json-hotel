<?php
class Database
{
    private $host = "localhost";
    private $dbname = "pemesanan_hotel";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }
    //KAMAR
    public function tampil_semua_kamar()
    {
        $query = $this->conn->prepare("SELECT * FROM kamar ORDER BY id_kamar");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tampil_kamar($id_kamar)
    {
        $query = $this->conn->prepare("SELECT * FROM kamar WHERE id_kamar=?");
        $query->execute(array($id_kamar));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tambah_kamar($data)
    {
        $query = $this->conn->prepare("INSERT INTO kamar (no_kamar, kategori, harga_kamar, kapasitas, status_kamar) VALUES (?,?,?,?,?)");
        $query->execute(array($data['no_kamar'], $data['kategori'], $data['harga_kamar'], $data['kapasitas'], $data['status_kamar']));
    }

    public function ubah_kamar($data)
    {
        $query = $this->conn->prepare("UPDATE kamar SET no_kamar=?, kategori=?, harga_kamar=?, kapasitas=?, status_kamar=? WHERE id_kamar=?");
        $query->execute(array($data['no_kamar'], $data['kategori'], $data['harga_kamar'], $data['kapasitas'], $data['status_kamar'], $data['id_kamar']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_kamar($id_kamar)
    {
        $query = $this->conn->prepare("DELETE FROM kamar WHERE id_kamar=?");
        $query->execute(array($id_kamar));
    }

    //LAYANAN
    public function tampil_semua_layanan()
    {
        $query = $this->conn->prepare("SELECT * FROM layanan");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tampil_layanan($id_layanan)
    {
        $query = $this->conn->prepare("SELECT * FROM layanan WHERE id_layanan=?");
        $query->execute(array($id_layanan));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tambah_layanan($data)
    {
        $query = $this->conn->prepare("INSERT INTO layanan (nama_layanan, deskripsi, status_layanan, harga_layanan) VALUES (?,?,?,?)");
        $query->execute(array($data['nama_layanan'], $data['deskripsi'], $data['status_layanan'], $data['harga_layanan']));
    }

    public function ubah_layanan($data)
    {
        $query = $this->conn->prepare("UPDATE layanan SET nama_layanan=?, deskripsi=?, status_layanan=?, harga_layanan=? WHERE id_layanan=?");
        $query->execute(array($data['nama_layanan'], $data['deskripsi'], $data['status_layanan'], $data['harga_layanan'], $data['id_layanan']));
        $query->closeCursor();
        unset($data);
    }


    public function hapus_layanan($id_layanan)
    {
        $query = $this->conn->prepare("DELETE FROM layanan WHERE id_layanan=?");
        $query->execute(array($id_layanan));
    }



    //PEMESANAN
    public function tampil_semua_pemesanan()
    {
        $query = $this->conn->prepare("SELECT * FROM pemesanan 
        JOIN kamar ON pemesanan.id_kamar = kamar.id_kamar
        JOIN layanan ON pemesanan.id_layanan = layanan.id_layanan");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tampil_pemesanan($id_pemesanan)
    {
        $query = $this->conn->prepare("SELECT * FROM pemesanan 
        JOIN kamar ON pemesanan.id_kamar = kamar.id_kamar
        JOIN layanan ON pemesanan.id_layanan = layanan.id_layanan WHERE id_pemesanan=?");
        $query->execute(array($id_pemesanan));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tambah_pemesanan($data)
    {
        $query = $this->conn->prepare("INSERT INTO pemesanan (nama_pemesan, id_kamar, id_layanan, tgl_checkin, tgl_checkout, jumlah_kamar, total_harga) VALUES (?,?,?,?,?,?,?)");
        $query->execute(array($data['nama_pemesan'], $data['id_kamar'], $data['id_layanan'], $data['tgl_checkin'], $data['tgl_checkout'], $data['jumlah_kamar'], $data['total_harga']));
    }

    public function ubah_pemesanan($data)
    {
        $query = $this->conn->prepare("UPDATE pemesanan SET nama_pemesan=?, id_kamar=?, id_layanan=?, tgl_checkin=?, tgl_checkout=?, jumlah_kamar=?, total_harga=? WHERE id_pemesanan=?");
        $query->execute(array($data['nama_pemesan'], $data['id_kamar'], $data['id_layanan'], $data['tgl_checkin'], $data['tgl_checkout'], $data['jumlah_kamar'], $data['total_harga'], $data['id_pemesanan']));
    }

    public function hapus_pemesanan($id_pemesanan)
    {
        $query = $this->conn->prepare("DELETE FROM pemesanan WHERE id_pemesanan=?");
        $query->execute(array($id_pemesanan));
    }

    // PEMBAYARAN
    public function tampil_semua_pembayaran()
    {
        $query = $this->conn->prepare("SELECT * FROM pembayaran");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tampil_pembayaran($id_pembayaran)
    {
        $query = $this->conn->prepare("SELECT * FROM pembayaran WHERE id_pembayaran=?");
        $query->execute(array($id_pembayaran));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tambah_pembayaran($data)
    {
        $query = $this->conn->prepare("INSERT INTO pembayaran (id_pemesanan, total_pembayaran, metode_pembayaran, tgl_pembayaran) VALUES (?,?,?,?)");
        $query->execute(array($data['id_pemesanan'], $data['total_pembayaran'], $data['metode_pembayaran'], $data['tgl_pembayaran']));
    }

    public function ubah_pembayaran($data)
    {
        $query = $this->conn->prepare("UPDATE pembayaran SET id_pemesanan=?, total_pembayaran=?, metode_pembayaran=?, tgl_pembayaran=? WHERE id_pembayaran=?");
        $query->execute(array($data['id_pemesanan'], $data['total_pembayaran'], $data['metode_pembayaran'], $data['tgl_pembayaran'], $data['id_pembayaran']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_pembayaran($id_pembayaran)
    {
        $query = $this->conn->prepare("DELETE FROM pembayaran WHERE id_pembayaran=?");
        $query->execute(array($id_pembayaran));
    }


    //USER
    public function tampil_semua_user()
    {
        $query = $this->conn->prepare("SELECT id_user, nama, username, email FROM user ORDER BY id_user");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tampil_user($id_user)
    {
        $query = $this->conn->prepare("SELECT id_user, nama, username, email FROM user WHERE id_user=?");
        $query->execute(array($id_user));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function tambah_user($data)
    {
        $query = $this->conn->prepare("INSERT INTO user (nama, username, email, password) VALUES (?,?,?,?)");
        $query->execute(array($data['nama'], $data['username'], $data['email'], $data['password']));
    }

    public function ubah_user($data)
    {
        $query = $this->conn->prepare("UPDATE user SET nama=?, username=?, email=?, password=? WHERE id_user=?");
        $query->execute(array($data['nama'], $data['username'], $data['email'], $data['password'], $data['id_user']));
    }

    public function hapus_user($id_user)
    {
        $query = $this->conn->prepare("DELETE FROM user WHERE id_user=?");
        $query->execute(array($id_user));
    }



}
?>