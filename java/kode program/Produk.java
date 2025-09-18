public class Produk {
    
    private int id; // id unik untuk membedakan tiap produk
    private String nama;// Nama produk
    private String merk;// Merk/brand produk
    private double harga;// Harga produk 
    private int stok;// Jumlah stok produk yang tersedia

    // Jika objek dibuat tanpa data, maka diisi nilai default
    public Produk() {
        this.id = 0;
        this.nama = "";
        this.merk = "";
        this.harga = 0;
        this.stok = 0;
    }

    // Constructor dengan parameter
    // Digunakan saat ingin langsung mengisi data produk ketika membuat objek
    public Produk(int i, String n, String m, double h, int s) {
        this.id = i;// isi id
        this.nama = n;// isi nama
        this.merk = m;// isi merk
        this.harga = h;// isi harga
        this.stok = s;// isi stok
    }

   // Setter
    public void setId(int i) { this.id = i; }
    public void setNama(String n) { this.nama = n; }
    public void setMerk(String m) { this.merk = m; }
    public void setHarga(double h) { this.harga = h; }
    public void setStok(int s) { this.stok = s; }


    // Getter
    public int getId() { return this.id; }
    public String getNama() { return this.nama; }
    public String getMerk() { return this.merk; }
    public double getHarga() { return this.harga; }
    public int getStok() { return this.stok; }
  

    // Method untuk menampilkan data produk
    public void tampilkan() {
        // Format tampilan data produk ke layar
        System.out.println("ID: " + this.id +
            " | Nama-> " + this.nama +
            " | Merk-> " + this.merk +
            " | Harga-> Rp" + this.harga +
            " | Stok-> " + this.stok);
    }
}
