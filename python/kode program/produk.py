class Produk:
     # Konstruktor dipanggil saat objek baru dibuat
     # Parameter default id=0, nama="", merk="", harga=0, stok=0
    def __init__(self, i=0, n="", m="", h=0, s=0): 
        self.__id = i #atribut private id produk
        self.__nama = n #atribut private nama produk
        self.__merk = m #atribut private merk produk
        self.__harga = h #atribut private harga produk
        self.__stok = s #atribut private stok produk

     # Setter 
    def setId(self, i): self.__id = i# ubah id produk
    def setNama(self, n): self.__nama = n# ubah nama produk
    def setMerk(self, m): self.__merk = m# ubah merk produk
    def setHarga(self, h): self.__harga = h# ubah harga produk
    def setStok(self, s): self.__stok = s# ubah stok produk

    # Getter 
    def getId(self): return self.__id # ambil id produk
    def getNama(self): return self.__nama# ambil nama produk
    def getMerk(self): return self.__merk# ambil merk produk
    def getHarga(self): return self.__harga# ambil harga produk
    def getStok(self): return self.__stok# ambil stok produk

    # menampilkan data
    def tampilkan(self):
        print(f"ID-> {self.__id} | Nama-> {self.__nama} | Merk-> {self.__merk} | Harga-> Rp{self.__harga} | Stok-> {self.__stok}")
