<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['title' => 'Pemrograman PHP', 'author' => 'Rian Hidayat', 'year' => 2021],
            ['title' => 'Laravel untuk Pemula', 'author' => 'Budi Raharjo', 'year' => 2022],
            ['title' => 'Basis Data Relasional', 'author' => 'Ahmad Zaenuri', 'year' => 2020],
            ['title' => 'Algoritma dan Struktur Data', 'author' => 'Dian Kartika', 'year' => 2023],
            ['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eko Prasetyo', 'year' => 2024],
        ];
        $stock = 5;

        return view('books.index', compact('books', 'stock'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}
