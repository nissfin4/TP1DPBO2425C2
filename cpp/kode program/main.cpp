#include <bits/stdc++.h>
#include "Produk.cpp"
using namespace std;

// menyiapkan array untuk menampung maksimal 100 produk
Produk daftar[100];
int jumlah = 0; // untuk menghitung berapa produk yang sudah ada

// Fungsi untuk menambah produk baru
void tambahData(int id, string nama, string merk, double harga, int stok) {
    // buat objek Produk baru lalu simpan di array daftar
    daftar[jumlah] = Produk(id, nama, merk, harga, stok);
    jumlah++;  // jumlah produk bertambah
    cout << "Produk berhasil ditambahkan!\n";
}

// Fungsi untuk menampilkan semua produk
void tampilData() {
    cout << "\n~Daftar Produk~\n";
    if (jumlah == 0) { // kalau belum ada produk
        cout << "Belum ada produk.\n";
        return;
    }
    // kalau ada produk, tampilkan semua
    for (int i = 0; i < jumlah; i++) {
        daftar[i].tampilkan(); // panggil method tampilkan dari class Produk
    }
}

// Fungsi untuk mengupdate data produk berdasarkan ID
void updateData(int id) {
    for (int i = 0; i < jumlah; i++) {
        if (daftar[i].getId() == id) { // cari produk dengan ID yang cocok
            string namaBaru, merkBaru;
            double hargaBaru;
            int stokBaru;

            // minta user masukkan data baru
            cout << "Masukkan nama baru: "; cin >> namaBaru;
            cout << "Masukkan merk baru: "; cin >> merkBaru;
            cout << "Masukkan harga baru: "; cin >> hargaBaru;
            cout << "Masukkan stok baru: "; cin >> stokBaru;

            // ganti produk lama dengan data yang baru
            daftar[i] = Produk(id, namaBaru, merkBaru, hargaBaru, stokBaru);

            cout << "Produk berhasil diupdate!\n";
            return;
        }
    }
    // kalau ID tidak ditemukan
    cout << "Produk tidak ditemukan!\n";
}

// Fungsi untuk menghapus produk berdasarkan ID
void hapusData(int id) {
    for (int i = 0; i < jumlah; i++) {
        if (daftar[i].getId() == id) { // jika ketemu
            // geser semua produk setelahnya ke kiri
            for (int j = i; j < jumlah - 1; j++) {
                daftar[j] = daftar[j + 1];
            }
            jumlah--; // kurangi jumlah produk
            cout << "Produk dengan ID " << id << " dihapus!\n";
            return;
        }
    }
    // kalau tidak ketemu
    cout << "Produk tidak ditemukan!\n";
}

// Fungsi untuk mencari produk berdasarkan ID
void cariData(int id) {
    for (int i = 0; i < jumlah; i++) {
        if (daftar[i].getId() == id) {   // kalau ketemu
            cout << "Produk ditemukan:\n";
            daftar[i].tampilkan();
            return;
        }
    }
    // kalau tidak ketemu
    cout << "Produk tidak ditemukan!\n";
}

// Fungsi untuk membaca input integer yang valid
bool bacaInt(string prompt, int &nilai) {
    cout << prompt;
    cin >> nilai;
    if (cin.fail()) {
        cin.clear();
        cin.ignore(numeric_limits<streamsize>::max(), '\n');
        cout << "Input tidak valid! Harus berupa angka.\n";
        return false;
    }
    return true;
}

// Fungsi untuk membaca input double yang valid
bool bacaDouble(string prompt, double &nilai) {
    cout << prompt;
    cin >> nilai;
    if (cin.fail()) {
        cin.clear();
        cin.ignore(numeric_limits<streamsize>::max(), '\n');
        cout << "Input tidak valid! Harus berupa angka.\n";
        return false;
    }
    return true;
}

int main() {
    int pilihan = -1, id;

    // perulangan menu akan terus berjalan sampai user memilih 0
    while (pilihan != 0) {
        // tampilkan menu
        cout << "\n~Menu Toko Elektronik~\n";
        cout << "1. Tambah Data\n";
        cout << "2. Tampilkan Data\n";
        cout << "3. Update Data\n";
        cout << "4. Hapus Data\n";
        cout << "5. Cari Data\n";
        cout << "0. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;

        if (cin.fail()) {
            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
            cout << "Input tidak valid! Masukkan angka menu.\n";
            continue;
        }

        // cek pilihan user
        if (pilihan == 1) {
            // input data produk baru
            string nama, merk;
            double harga;
            int stok;

            if (!bacaInt("Masukkan ID: ", id)) continue;
            cout << "Masukkan Nama: "; cin >> nama;
            cout << "Masukkan Merk: "; cin >> merk;
            if (!bacaDouble("Masukkan Harga: ", harga)) continue;
            if (!bacaInt("Masukkan Stok: ", stok)) continue;

            tambahData(id, nama, merk, harga, stok);
        } 
        else if (pilihan == 2) {
            tampilData(); // tampilkan semua produk
        } 
        else if (pilihan == 3) {
            if (!bacaInt("Masukkan ID produk yang ingin diupdate: ", id)) continue;
            updateData(id); // update produk sesuai ID
        } 
        else if (pilihan == 4) {
            if (!bacaInt("Masukkan ID produk yang ingin dihapus: ", id)) continue;
            hapusData(id); // hapus produk sesuai ID
        } 
        else if (pilihan == 5) {
            if (!bacaInt("Masukkan ID produk yang ingin dicari: ", id)) continue;
            cariData(id); // cari produk sesuai ID
        }
        else if (pilihan == 0) {
            cout << "Keluar dari program.\n"; // keluar program
        }
        else {
            cout << "Pilihan tidak tersedia.\n"; // kalau input salah
        }
    }

    return 0; // program selesai
}
