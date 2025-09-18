<?php
class Produk {
    // Deklarasi atribut bersifat private agar hanya bisa diakses lewat method getter & setter
    private $id; // menyimpan ID produk
    private $nama; // menyimpan nama produk
    private $merk; //menyimpan nama merk
    private $harga;// menyimpan harga produk
    private $stok;// menyimpan jumlah stok produk
    private $gambar; // menyimpan path/nama file gambar produk

     // Constructor otomatis dipanggil ketika objek Produk dibuat
    public function __construct($id, $nama, $merk, $harga, $stok, $gambar) {
        $this->id = $id; // inisialisasi ID
        $this->nama = $nama; //inisialisasi nama
        $this->merk = $merk; //inisialisasi merk
        $this->harga = (float)$harga; // inisialisasi harga
        $this->stok = $stok; // inisialisasi stok
        $this->gambar = $gambar; // inisialisasi gambar
    }

    // getter & Setter
    //mengambil nilai id produk
    public function getId() {
        return $this->id;
    }
    //mengubah nilai id produk
    public function setId($id) {
        $this->id = $id;
    }

    //mengambil nilai nama produk
    public function getNama() {
        return $this->nama;
    }
    //mengubah nilai nama produk
    public function setNama($nama) {
        $this->nama = $nama;
    }

    //mengambil nilai merk produk
    public function getMerk() {
        return $this->merk;
    }
    //mengubah nilai merk produk
    public function setMerk($merk) {
        $this->merk = $merk;
    }

    //mengambil nilai harga produk
    public function getHarga() {
        return $this->harga;
    }
    //mengubah nilai harga produk
    public function setHarga($harga) {
        $this->harga = (float)$harga;
    }

    //mengambil nilai stok produk
    public function getStok() {
        return $this->stok;
    }
    //mengubah nilai stok produk
    public function setStok($stok) {
        $this->stok = $stok;
    }

    //mengambil nilai gambar produk
    public function getGambar() {
        return $this->gambar;
    }
    //mengubah nilai gambar produk
    public function setGambar($gambar) {
        $this->gambar = $gambar;
    }
}
?>
