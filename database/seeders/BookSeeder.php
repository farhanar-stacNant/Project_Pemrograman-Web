<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Lentera Dipantara',
                'year' => 1980,
                'category' => 'Fiksi / Sejarah',
                'description' => 'Kisah percintaan antara Minke dan Annelies di masa kolonial Belanda, dibalut perjuangan keadilan hak pribumi.',
                'cover' => null,
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2018,
                'category' => 'Self Improvement',
                'description' => 'Panduan praktis mengubah hidup lewat kebiasaan-kebiasaan kecil sebesar atom yang berdampak luar biasa.',
                'cover' => null,
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publisher' => 'Prentice Hall',
                'year' => 2008,
                'category' => 'Teknologi',
                'description' => 'Buku wajib para software engineer untuk menulis kode yang rapi, mudah dibaca, dan mudah dirawat.',
                'cover' => null,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2009,
                'category' => 'Fiksi / Edukasi',
                'description' => 'Kisah enam santri dari berbagai daerah di Indonesia yang mengejar impian besar mereka dengan mantra "Man Jadda Wajada".',
                'cover' => null,
            ],
            [
                'title' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Kepustakaan Populer Gramedia',
                'year' => 2011,
                'category' => 'Sejarah / Sains',
                'description' => 'Menjelajahi sejarah evolusi manusia dari zaman batu hingga abad modern, merombak cara pandang kita tentang dunia.',
                'cover' => null,
            ],
            [
                'title' => 'Cantik Itu Luka',
                'author' => 'Eka Kurniawan',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2002,
                'category' => 'Fiksi / Satir',
                'description' => 'Sebuah mahakarya realisme magis Indonesia yang berlatar akhir masa kolonial hingga tragedi kemanusiaan pasca-kemerdekaan.',
                'cover' => null,
            ],
            [
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert T. Kiyosaki',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 1997,
                'category' => 'Keuangan',
                'description' => 'Membongkar mitos bahwa Anda harus berpenghasilan tinggi untuk menjadi kaya serta mengajarkan pentingnya aset.',
                'cover' => null,
            ],
            [
                'title' => 'Hujan',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2016,
                'category' => 'Fiksi / Sci-Fi',
                'description' => 'Kisah cinta dan persahabatan berlatar dunia masa depan fiktif tahun 2050-an pasca bencana alam dahsyat global.',
                'cover' => null,
            ],
            [
                'title' => 'Jaringan Komputer Berbasis Mikrotik',
                'author' => 'Iwan Sofana',
                'publisher' => 'Penerbit Informatika',
                'year' => 2017,
                'category' => 'Teknologi',
                'description' => 'Buku panduan teknis konfigurasi routing, switching, dan manajemen jaringan menggunakan sistem operasi RouterOS Mikrotik.',
                'cover' => null,
            ],
            [
                'title' => 'Madilog',
                'author' => 'Tan Malaka',
                'publisher' => 'Narasi',
                'year' => 1943,
                'category' => 'Filsafat / Politik',
                'description' => 'Karya monumental Tan Malaka yang merumuskan cara berpikir materialisme, dialektika, dan logika untuk bangsa Indonesia.',
                'cover' => null,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
