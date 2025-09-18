#include <iostream>
using namespace std;

class Produk {
private:
    int id;
    string nama, merk;
    long long harga;
    int stok;

public:
    // Default constructor
    Produk() {
        id = 0; nama = ""; merk = ""; harga = 0; stok = 0;
    }

    // Parameterized constructor
    Produk(int i, string n, string m, long long h, int s) {
    id = i; nama = n; merk = m; harga = h; stok = s;
}

    ~Produk() { } // Destructor

    // Setter 
    void setId(int i) { id = i; }
    void setNama(string n) { nama = n; }
    void setMerk(string m) { merk = m; }
    void setHarga(long long h) { harga = h; }
    void setStok(int s) { stok = s; }

    // Getter 
    int getId() { return id; }
    string getNama() { return nama; }
    string getMerk() { return merk; }
    long long getHarga() { return harga; }
    int getStok() { return stok; }


    // Tampilkan data
    void tampilkan() {
        cout << " ID: " << id
             << " | Nama->" << nama
             << " | Merk->" << merk
             << " | Harga-> Rp" << harga
             << " | Stok-> " << stok << endl;
    }
};
