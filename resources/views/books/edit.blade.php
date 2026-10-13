@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Data Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ $book->title }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ $book->author }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ $book->year }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ $book->stock }}" required>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection
