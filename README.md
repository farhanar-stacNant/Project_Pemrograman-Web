<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">🚀 PHP To-Do Application - Data Peserta Proyek 🚀</h1>

<p align="center">
  <strong>Pengembangan Lanjutan Sistem Manajemen Data Peserta Berbasis Framework Laravel 11</strong><br>
  Tugas Pemrograman Web - Laporan LK-10 📝
</p>

<hr>

<h2>📌 I. Deskripsi Proyek</h2>
<p>
  Proyek ini merupakan aplikasi web manajemen data (To-Do List / Data Peserta) yang dibangun menggunakan <strong>Laravel 11</strong>. Pada versi terbaru ini, fokus utama pengembangan terletak pada peningkatan aspek sekuritas menggunakan integrasi sistem autentikasi modern berbasis <strong>WorkOS Auth Scaffolding</strong> untuk mengamankan <i>routing</i> fungsional (CRUD). Selain itu, proyek ini juga menyediakan layanan <i>endpoint</i> API mandiri berformat JSON.
</p>
<p>
  🔗 <strong>Link Repository GitHub:</strong> <a href="https://github.com/farhanar-stacNant/Project_Pemrograman-Web.git" target="_blank">Project_Pemrograman-Web.git</a>
</p>

<h2>🔒 II. Checklist Keamanan Dasar Aplikasi Web</h2>
<p>Berikut adalah tabel evaluasi penerapan parameter keamanan (OWASP Top 10 Awareness Level) yang ada di dalam sistem ini:</p>

<table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr bgcolor="#f2f2f2">
      <th>No</th>
      <th>Parameter Evaluasi Keamanan</th>
      <th>Status</th>
      <th>Komponen / Lapisan Kode Terkait</th>
      <th>Keterangan Teknis</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Autentikasi Pengguna</td>
      <td><strong>Sesuai</strong></td>
      <td>Laravel Auth Scaffolding / WorkOS Breeze</td>
      <td>Mencegah pengguna anonim mengakses data tanpa sesi terverifikasi.</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Proteksi Route (Authorization)</td>
      <td><strong>Sesuai</strong></td>
      <td><code>routes/web.php</code> via <code>auth</code> middleware</td>
      <td>Membatasi hak akses CRUD (/peserta /todos) hanya untuk user yang sukses login.</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Pencegahan SQL Injection</td>
      <td><strong>Sesuai</strong></td>
      <td>Eloquent ORM (PDO Parameter Binding)</td>
      <td>Menggunakan mekanisme built-in Laravel untuk memisahkan instruksi SQL dengan data input.</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Pencegahan Cross-Site Scripting (XSS)</td>
      <td><strong>Sesuai</strong></td>
      <td>Blade Echo Template engine <code>{{ $variable }}</code></td>
      <td>Secara otomatis melakukan <i>escaping</i> terhadap karakter HTML berbahaya.</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Proteksi CSRF</td>
      <td><strong>Sesuai</strong></td>
      <td>Directive <code>@csrf</code> pada Form input</td>
      <td>Menyisipkan token token rahasia untuk memvalidasi request dari form internal aplikasi.</td>
    </tr>
  </tbody>
</table>

<h2>🛠️ III. Mekanisme Keamanan Utama (Arsitektur Kode)</h2>
<ul>
  <li>
    <strong>Mencegah SQL Injection:</strong> Interaksi database sepenuhnya dikelola oleh Eloquent ORM. Semua query menggunakan <i>PDO parameter binding</i> otomatis, sehingga input teks user tidak akan pernah bisa dieksekusi sebagai perintah SQL ilegal.
  </li>
  <li>
    <strong>Mencegah Cross-Site Scripting (XSS):</strong> Menampilkan data pada view menggunakan syntax dua kurung kurawal <code>{{ $peserta->nama }}</code>. Laravel otomatis merubah karakter khusus seperti <code>&lt;</code> dan <code>&gt;</code> menjadi teks biasa, sehingga skrip injeksi berbahaya akan gagal berjalan di browser.
  </li>
  <li>
    <strong>Sistem Proteksi Route (Middleware):</strong> Mengunci semua rute fungsional CRUD di dalam file <code>routes/web.php</code>. Pengguna tanpa login yang mencoba menembak URL secara ilegal akan otomatis terlempar kembali ke halaman <code>/login</code>.
  </li>
  <li>
    <strong>Penyediaan Endpoint API JSON:</strong> Aplikasi menyediakan jalur khusus di dalam <code>routes/api.php</code> untuk mengembalikan data mentah berformat JSON standar yang valid.
  </li>
</ul>

<h2>⚙️ IV. Cara Menjalankan Aplikasi di Lokal</h2>
<p>Ikuti langkah berikut untuk menyalakan proyek di perangkat lokal kamu:</p>
<ol>
  <li>Clone repositori proyek ini ke dalam folder lokal web server komputer.</li>
  <li>Duplikat file konfigurasi lingkungan dengan perintah: <code>cp .env.example .env</code></li>
  <li>Lakukan instalasi dependensi vendor lewat composer: <code>composer install</code></li>
  <li>Buat kunci enkripsi aplikasi baru: <code>php artisan key:generate</code></li>
  <li>Sesuaikan pengaturan nama database lokal pada baris <code>DB_DATABASE</code> di dalam file <code>.env</code>.</li>
  <li>Jalankan proses migrasi struktur tabel: <code>php artisan migrate</code></li>
  <li>Nyalakan server lokal Laravel: <code>php artisan serve</code></li>
</ol>

<hr>
<p align="center">🌟 <i>Proyek ini diselesaikan guna memenuhi standar pemenuhan kompetensi tugas praktikum pemrograman web modern.</i> 🌟</p>
