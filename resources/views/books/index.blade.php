@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    @if($stock > 0)
        <p>Status Perpustakaan: Stok buku tersedia (Total simulasi stok: {{ $stock }}).</p>
    @else
        <p>Status Perpustakaan: Stok buku sedang habis.</p>
    @endif

    <div style="margin-bottom: 20px;">
        <a href="{{ route('books.create') }}"><button>Tambah Buku Baru</button></a>
    </div>

    <ul>
        @foreach($books as $book)
            <li style="margin-bottom: 10px;">
                <strong>{{ $book->title }}</strong> - {{ $book->author }} ({{ $book->year }}) - Stok: {{ $book->stock }}

                <!-- Navigasi Aksi -->
                <div style="display: inline-block; margin-left: 10px;">
                    <a href="{{ route('books.show', $book) }}">[Detail]</a>
                    <a href="{{ route('books.edit', $book) }}">[Edit]</a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus buku ini?')" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer; padding: 0;">[Hapus]</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
