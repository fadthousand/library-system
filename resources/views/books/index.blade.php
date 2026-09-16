@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    @if($stock > 0)
        <p>Status Perpustakaan: Stok buku tersedia (Total simulasi stok: {{ $stock }}).</p>
    @else
        <p>Status Perpustakaan: Stok buku sedang habis.</p>
    @endif

    <ul>
        @foreach($books as $book)
            <li>
                <strong>{{ $book['title'] }}</strong> - {{ $book['author'] }} ({{ $book['year'] }})
            </li>
        @endforeach
    </ul>
@endsection
