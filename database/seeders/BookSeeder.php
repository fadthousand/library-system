<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Pemrograman PHP', 'author' => 'Rian Hidayat', 'year' => 2021, 'stock' => 5],
            ['title' => 'Laravel untuk Pemula', 'author' => 'Budi Raharjo', 'year' => 2022, 'stock' => 8],
            ['title' => 'Basis Data Relasional', 'author' => 'Ahmad Zaenuri', 'year' => 2020, 'stock' => 3],
            ['title' => 'Algoritma dan Struktur Data', 'author' => 'Dian Kartika', 'year' => 2023, 'stock' => 12],
            ['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eko Prasetyo', 'year' => 2024, 'stock' => 6],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
