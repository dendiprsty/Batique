# Batique - Toko Batik Online

Dokumen ini berisi catatan perubahan untuk proyek Batique. Catatan perubahan ini berdasarkan [Keep a Changelog](https://keepachangelog.com/id-ID/1.0.0/).

> **[v1.0.3] Alpha Released - 2023/05/03 :**
- `Fixed` : Bug pada saat pencarian produk ( Halaman Belanja ).
- `Notes` : Semua perubahan akan di catat di nanti!

> **[v2.0.0] BETA Released - 2023/05/01 :**
- `Added` : Fitur Pencarian Produk
- `Added` : Fitur Checkout
- `Added` : Fitur Pembayaran
- `Added` : Fitur Konfirmasi Pembayaran ( Admin )
- `Added` : Fitur Pengiriman
- `Added` : Fitur Laporan Penjualan ( Admin )
- `Added` : Fitur Review Produk
- `Added` : Sekarang Dashboard menampilkan Jumlah Total ( Produk, Pesanan, Gagal Pengiriman, Terkirim )
- `Added` : Sekarang Dashboard menampilkan Grafik Penjualan dan Produk Terlaris
- `Added` : Sekarang Dashboard menampilkan Pesan Sapaan untuk Informasi identitas akun yang sedang login
- `Added` : Jika mengupload gambar baru pada slide, maka gambar lama akan dihapus
- `Added` : Gambar slide promosi hanya mendukung ukuran 500px x 500px
- `Added` : Mendukung 3 jenis pengiriman ( JNE, POS, dan TIKI )
- `Added` : Sekarang admin bisa mengubah status pesanan menjadi "Gagal Pengiriman" dan "Terkirim"
- `Added` : Fitur eksport data keuangan ke dalam bentuk file excel dan pdf
- `Added` : Halaman Pendapatan sepenuhnya menampilkan data keuangan dalam bahasa Indonesia
- `Added` : Setiap pengguna hanya ditampilkan beberapa perizinan utama pada halaman Roles
- `Added` : Sekarang admin bisa menghapus dan edit perizinan pengguna
- `Added` : Sekarang admin harus menginput "Username" dan "Nama Depan/Belakang" untuk menambahkan pengguna baru
- `Added` : Sekarang pengguna dapat memiliki role "Customer" dan "Admin"
- `Improved` : Order ID sekarang akan diacak secara spesifik, sehingga tidak ada order ID yang sama
- `Improved` : Sekarang semua gambar produk akan diubah menjadi format webp otomatis
- `Improved` : Sekarang jika tidak ada gambar produk, maka akan ditampilkan gambar default
- `Improved` : Sekarang jika tidak ada gambar kategori produk baru saat edit kategori produk, maka akan ditampilkan gambar default atau gambar kategori produk sebelumnya
- `Improved` : Semua label pada halaman admin telah diperbarui dengan Bahasa Indonesia
- `Improved` : Menambahkan tag sekarang tidak perlu membuka halaman baru, cukup dengan menekan tombol tambah tag maka akan muncul modal form untuk menambahkan tag
- `Imporved` : Perizinan sekarang hanya bisa menambah dan menghapus tag, tidak bisa mengubah tag
- `Improved` :Sekarang admin bisa melihat detail dari produk
- `Improved` : Status produk yang dulu "Active" dan "inActive" sekarang menjadi "Tersedia" dan "Tidak Tersedia"/"Habis"
- `Improved` : Sekarang admin bisa melihat detail dari pesanan
- `Improved` : Bump Bootstrap latest stable version untuk Halaman Belanja
- `Improved` : Bump Bootstrap 4 latest version untuk Halaman Admin
- `Improved` : Bump jQuery latest version
- `Improved` : Implementasi API RajaOngkir versi 2.0
- `Improved` : Merge to DataTables latest version
- `Improved` : Transaksi Checkout sekarang menggunakan API Midtrans
- `Fixed` : Kesalahan ketika mengunggah gambar kategori produk telah diperbaiki
- `Fixed` : Drag and Drop gambar produk tidak berfungsi telah diperbaiki
- `Fixed` : Gagal transaksi ketika checkout telah diperbaiki
- `Fixed` : Kesalahan ketika menambah pengguna baru telah diperbaiki
- `Fixed` : Beberapa bug kecil telah diperbaiki

> **[v1.0.2] Alpha Released - 2023/04/26 :**
- `Fixed` : Sekarang Fitur Pencarian Produk sudah berfungsi dengan baik.
- `Fixed` : Bug gagal menambahkan gambar Kategori ( Admin ).

> **[v1.0.1] Alpha Released - 2023/04/24 :**
- `Improved` : Bump Bootstrap to v5.3.0-alpha3
- `Improved` : Bump jQuery to v3.6.0
- `Improved` : Mengubah Brand Logo pada Navbar Halaman Utama
- `Improved` : Mengurangi redundansi kode pada beberapa file
- `Fixed` : Beberapa bug kecil telah diperbaiki.

> **[v1.0.0] Alpha Released - 2023/04/20 :**
- `Fixed` : Bug pada saat menambahkan pengguna baru ( Admin ).
- `Fixed` : Bug gagal menambahkan gambar kategori produk ( Admin ).
- `Fixed` : Bug tidak dapat mengedit gambar produk ( Admin ).
- `Fixed` : Customer gagal mendapatkan data Provinsi saat Checkout.
- `Improved` : API RajaOngkir telah diperbarui.

> **Beberapa Isu :**
- `Notice` : Semua masalah akan diperbaiki secara bertahap
- `v1.0.1` : Pencarian produk belum berfungsi dengan baik, masih sering menampilkan hasil yang tidak sesuai.
- `v1.0.2` : Checkout akan mengalami gangguan, karena dalam proses migrasi ke API RajaOngkir versi 2.0.
- `v2.0.0` : Beberapa layout pada halaman admin masih belum responsif dan berantakan di beberapa halaman

---

Semua masalah akan diperbaiki secara perlahan, jangan tanya kapan selesai Saya tidak mencatat semua perubahan di sini, karena saya lupa mencatatnya. Jika kamu menemukan masalah, silakan laporkan ke saya.. :)

Ditulis oleh [Andika Tulus Pangestu](https://github.com/andikatuluspangestu)
