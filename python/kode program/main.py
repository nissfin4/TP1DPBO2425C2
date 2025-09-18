from produk import Produk  

# List untuk menyimpan objek Produk
daftar = []
jumlah = 0   # counter jumlah produk


# Tambah data produk baru
def tambahData(id, nama, merk, harga, stok):
    global jumlah
    daftar.append(Produk(id, nama, merk, harga, stok))   # buat objek Produk dan tambahkan ke list
    jumlah += 1
    print("Produk berhasil ditambahkan!")

# Tampilkan semua produk
def tampilData():
    print("\n~~Daftar Produk~~")
    if len(daftar) == 0:    # jika list kosong
        print("Belum ada produk.")
        return
    for produk in daftar:   # looping semua produk
        produk.tampilkan()

# Update data produk berdasarkan ID
def updateData(id):
    for i in range(len(daftar)):
        if daftar[i].getId() == id:   # cari produk sesuai ID
            namaBaru = input("Masukkan nama baru: ")
            merkBaru = input("Masukkan merk baru: ")
            try:
                hargaBaru = int(input("Masukkan harga baru: "))
                stokBaru = int(input("Masukkan stok baru: "))
            except ValueError:
                print("Input harga/stok harus berupa angka!")
                return
            # ganti produk lama dengan objek baru
            daftar[i] = Produk(id, namaBaru, merkBaru, hargaBaru, stokBaru)
            print("Produk berhasil diupdate!")
            return
    print("Produk tidak ditemukan!")  # jika ID tidak ada

# Hapus data produk berdasarkan ID
def hapusData(id):
    global jumlah
    for i in range(len(daftar)):
        if daftar[i].getId() == id:   # cari produk sesuai ID
            del daftar[i]   # hapus produk dari list
            jumlah -= 1
            print(f"Produk dengan ID {id} dihapus!")
            return
    print("Produk tidak ditemukan!")

# Cari data produk berdasarkan ID
def cariData(id):
    for produk in daftar:
        if produk.getId() == id:
            print("Produk ditemukan:")
            produk.tampilkan()
            return
    print("Produk tidak ditemukan!")

# Menu Utama
def main():
    pilihan = -1
    while pilihan != 0:   # loop menu sampai user pilih 0
        print("\n=== MENU TOKO ELEKTRONIK ===")
        print("1. Tambah Data")
        print("2. Tampilkan Data")
        print("3. Update Data")
        print("4. Hapus Data")
        print("5. Cari Data")
        print("0. Keluar")

        # minta input pilihan menu dari user
        try:
            pilihan = int(input("Pilih menu: "))
        except ValueError:
            print("Input tidak valid! Harus berupa angka.")
            continue

        # Panggil fungsi sesuai pilihan
        if pilihan == 1:
            try:
                id = int(input("Masukkan ID: "))
                nama = input("Masukkan Nama: ")
                merk = input("Masukkan Merk: ")
                harga = int(input("Masukkan Harga: "))
                stok = int(input("Masukkan Stok: "))
                tambahData(id, nama, merk, harga, stok)
            except ValueError:
                print("Input tidak valid! Harus berupa angka.")
        elif pilihan == 2:
            tampilData()
        elif pilihan == 3:
            try:
                id = int(input("Masukkan ID produk yang ingin diupdate: "))
                updateData(id)
            except ValueError:
                print("Input tidak valid! Harus berupa angka.")
        elif pilihan == 4:
            try:
                id = int(input("Masukkan ID produk yang ingin dihapus: "))
                hapusData(id)
            except ValueError:
                print("Input tidak valid! Harus berupa angka.")
        elif pilihan == 5:
            try:
                id = int(input("Masukkan ID produk yang ingin dicari: "))
                cariData(id)
            except ValueError:
                print("Input tidak valid! Harus berupa angka.")
        elif pilihan == 0:
            print("Keluar dari program.")
        else:
            print("Pilihan tidak tersedia.")

# Jalankan program
if __name__ == "__main__":
    try:
        main()
    except KeyboardInterrupt:
        print("\nProgram dihentikan.")
