@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>
    <ul>
        <li>Jumlah Buku: {{ $total_books }}</li>
        <li>Jumlah Kategori: {{ $total_categories }}</li>
        <li>Jumlah Member: {{ $total_members }}</li>
    </ul>
@endsection
