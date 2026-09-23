@extends('layouts.app')

@section('content')
    <h2>Detail Buku</h2>
    <ul>
        <li>ID: {{ $book->id }}</li>
        <li>Judul: {{ $book->title }}</li>
        <li>Penulis: {{ $book->author }}</li>
        <li>Tahun Terbit: {{ $book->year }}</li>
        <li>Stok: {{ $book->stock }}</li>
    </ul>
    <p><a href="/books">&larr; Kembali ke daftar buku</a></p>
@endsection
