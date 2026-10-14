@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h2>Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <p style="color: red; margin: 0; font-size: 12px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ old('author') }}">
            @error('author')
                <p style="color: red; margin: 0; font-size: 12px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ old('year') }}">
            @error('year')
                <p style="color: red; margin: 0; font-size: 12px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p style="color: red; margin: 0; font-size: 12px;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection
