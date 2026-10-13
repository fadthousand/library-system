@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h2>Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label>Judul:</label><br>
            <input type="text" name="title" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" required>
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection
