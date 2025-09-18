import java.util.Scanner;

// Kelas utama program
public class Main {
    // Array statis untuk menampung daftar produk (maksimal 100 produk)
    static Produk[] daftar = new Produk[100];
    // Variabel jumlah untuk menghitung berapa banyak produk yang sudah tersimpan
    static int jumlah = 0;

    // Fungsi untuk menambahkan data produk baru
    // Parameter id, nama, merk, harga, stok
    public static void tambahData(int id, String nama, String merk, long harga, int stok) {
        // Buat objek Produk baru dan simpan ke array pada indeks ke-jumlah
        daftar[jumlah] = new Produk(id, nama, merk, harga, stok);
        // Tambah jumlah produk yang tersimpan
        jumlah++;
        // Informasi ke user bahwa produk berhasil ditambahkan
        System.out.println("Produk berhasil ditambahkan!");
    }

    // Fungsi untuk menampilkan semua produk yang ada di array
    public static void tampilData() {
        System.out.println("\n~~Daftar Produk~~");
        // Jika jumlah = 0 artinya belum ada produk
        if (jumlah == 0) {
            System.out.println("Belum ada produk.");
            return; // keluar dari fungsi
        }
        // Looping dari indeks 0 sampai jumlah-1
        for (int i = 0; i < jumlah; i++) {
            // Panggil method tampilkan() dari objek Produk
            daftar[i].tampilkan();
        }
    }

    // Fungsi untuk mengupdate data produk berdasarkan ID
    // Scanner dipassing sebagai parameter untuk input data baru
    public static void updateData(int id, Scanner sc) {
        // Cari produk berdasarkan ID
        for (int i = 0; i < jumlah; i++) {
            // Jika ID yang dicari sama dengan ID produk ke-i
            if (daftar[i].getId() == id) {
                // Minta data baru dari user
                System.out.print("Masukkan nama baru: ");
                String namaBaru = sc.next(); // pakai next() -> hanya bisa 1 kata
                System.out.print("Masukkan merk baru: ");
                String merkBaru = sc.next();
                System.out.print("Masukkan harga baru: ");
                long hargaBaru = sc.nextLong();
                System.out.print("Masukkan stok baru: ");
                int stokBaru = sc.nextInt();

                // Buat objek Produk baru dengan data yang sudah diinput
                // dan timpa data lama di posisi i
                daftar[i] = new Produk(id, namaBaru, merkBaru, hargaBaru, stokBaru);

                // Informasi berhasil diupdate
                System.out.println("Produk berhasil diupdate!");
                return; // keluar dari fungsi setelah update
            }
        }
        // Jika tidak ada produk dengan ID yang sesuai
        System.out.println("Produk tidak ditemukan!");
    }

    // Fungsi untuk menghapus data produk berdasarkan ID
    public static void hapusData(int id) {
        // Cari produk yang sesuai
        for (int i = 0; i < jumlah; i++) {
            if (daftar[i].getId() == id) {
                // Jika ditemukan, geser semua elemen setelahnya ke kiri
                for (int j = i; j < jumlah - 1; j++) {
                    daftar[j] = daftar[j + 1];
                }
                // Kurangi jumlah produk
                jumlah--;
                // Informasi bahwa produk berhasil dihapus
                System.out.println("Produk dengan ID " + id + " dihapus!");
                return; // keluar dari fungsi
            }
        }
        // Jika produk dengan ID yang dimaksud tidak ditemukan
        System.out.println("Produk tidak ditemukan!");
    }

    // Fungsi untuk mencari produk berdasarkan ID
    public static void cariData(int id) {
        // Loop semua produk dalam array
        for (int i = 0; i < jumlah; i++) {
            if (daftar[i].getId() == id) {
                // Jika ketemu, tampilkan produk
                System.out.println("Produk ditemukan:");
                daftar[i].tampilkan();
                return; // keluar dari fungsi
            }
        }
        // Jika tidak ada yang cocok
        System.out.println("Produk tidak ditemukan!");
    }

    public static void main(String[] args) {
        // Scanner untuk membaca input user dari keyboard
        Scanner sc = new Scanner(System.in);
        // Variabel pilihan untuk menyimpan menu yang dipilih user
        int pilihan = -1;
        // Variabel id untuk menampung ID produk saat input
        int id;
        // Gunakan flag agar tidak pakai break
        boolean isRunning = true;

        // Loop utama menuakan terus berjalan sampai user memilih 0
        while (isRunning) {
            // Tampilkan menu ke layar
            System.out.println("\n~~Menu Toko Elektronik~~");
            System.out.println("1. Tambah Data");
            System.out.println("2. Tampilkan Data");
            System.out.println("3. Update Data");
            System.out.println("4. Hapus Data");
            System.out.println("5. Cari Data");
            System.out.println("0. Keluar");
            System.out.print("Pilih menu: ");

            try {
                // Baca input pilihan menu dari user
                pilihan = sc.nextInt();

                // Cek pilihan user
                if (pilihan == 1) {
                    // Input data produk baru
                    System.out.print("Masukkan ID: ");
                    id = sc.nextInt();
                    System.out.print("Masukkan Nama: ");
                    String nama = sc.next();
                    System.out.print("Masukkan Merk: ");
                    String merk = sc.next();
                    System.out.print("Masukkan Harga: ");
                    long harga = sc.nextLong();
                    System.out.print("Masukkan Stok: ");
                    int stok = sc.nextInt();

                    // Panggil fungsi tambahData dengan data yang diinput
                    tambahData(id, nama, merk, harga, stok);

                } else if (pilihan == 2) {
                    // Panggil fungsi tampilData untuk menampilkan semua produk
                    tampilData();

                } else if (pilihan == 3) {
                    // Input ID produk yang mau diupdate
                    System.out.print("Masukkan ID produk yang ingin diupdate: ");
                    id = sc.nextInt();
                    // Panggil fungsi updateData dengan ID tersebut
                    updateData(id, sc);

                } else if (pilihan == 4) {
                    // Input ID produk yang mau dihapus
                    System.out.print("Masukkan ID produk yang ingin dihapus: ");
                    id = sc.nextInt();
                    // Panggil fungsi hapusData
                    hapusData(id);

                } else if (pilihan == 5) {
                    // Input ID produk yang mau dicari
                    System.out.print("Masukkan ID produk yang ingin dicari: ");
                    id = sc.nextInt();
                    // Panggil fungsi cariData
                    cariData(id);

                } else if (pilihan == 0) {
                    // Keluar dari program
                    System.out.println("Keluar dari program.");
                    isRunning = false;

                } else {
                    // Jika user memasukkan angka di luar menu
                    System.out.println("Pilihan tidak tersedia.");
                }
            } catch (Exception e) {
                // Error handling jika user memasukkan input yang bukan angka
                System.out.println("Input tidak valid! Harus berupa angka.");
                // Cek apakah input masih ada atau sudah habis (misalnya user tekan Ctrl+D / Ctrl+C)
                if (sc.hasNextLine()) {
                    sc.nextLine(); // clear buffer agar tidak infinite loop
                } else {
                    isRunning = false; // hentikan loop dengan aman
                }
            }
        }

        // Tutup Scanner setelah program selesai untuk mencegah memory leak
        sc.close();
    }
}
