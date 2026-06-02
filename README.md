# Sistem Manajemen Data Buku Digital 📚
Aplikasi web perpustakaan digital sederhana berbasis MVC (Model-View-Controller)
Aplikasi ini mengimplementasikan fitur CRUD lengkap beserta validasi form dan manajemen unggah berkas (*file upload*) untuk cover buku.

---

## 🚀 Fitur Utama

- Menampilkan Data Buku (Read): Penyajian daftar buku nyata dalam bentuk grid card/tabel yang responsif menggunakan Tailwind CSS.
- Menambahkan Data Buku (Create): Form input data buku baru dilengkapi dengan fitur unggah gambar cover.
- Mengubah Data Buku (Update): Fitur memperbarui informasi buku dengan opsi mengganti cover lama (otomatis menghapus berkas lama di storage untuk efisiensi penyimpanan).
- Menghapus Data Buku (Delete): Penghapusan data buku secara permanen dari database sekaligus menghapus file gambar fisiknya dari server.
- Validasi Form: Proteksi input sisi server menjamin data yang masuk valid (format tahun berupa angka, ukuran gambar maksimal 2MB, dan semua field wajib diisi).

---

## 🛠️ Struktur Database (Tabel: `books`)

Aplikasi ini menggunakan migrasi database dengan struktur skema sebagai berikut:
| Field | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `bigint` | Primary Key, Auto Increment |
| `title` | `string` | Judul Buku |
| `author` | `string` | Penulis / Pengarang |
| `publisher` | `string` | Penerbit |
| `year` | `integer` | Tahun Terbit |
| `category` | `string` | Kategori Buku |
| `description`| `text` | Deskripsi / Sinopsis Buku |
| `cover` | `string` | Path / Nama File Gambar Sampul |
| `created_at` | `timestamp`| Waktu Data Ditambahkan |
| `updated_at` | `timestamp`| Waktu Data Diperbarui |
