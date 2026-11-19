@extends('layouts.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
    <h2>Dashboard Sistem Informasi Perpustakaan</h2>
    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong> (Role: <strong>{{ auth()->user()->role }}</strong>).</p>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Total Kategori</th>
                <th>Total Judul Buku</th>
                <th>Total Anggota</th>
                <th>Total Transaksi Peminjaman</th>
                <th>Peminjaman Aktif (Borrowed)</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center; font-size: 1.2em;">
                <td><strong>{{ $totalCategories }}</strong></td>
                <td><strong>{{ $totalBooks }}</strong></td>
                <td><strong>{{ $totalMembers }}</strong></td>
                <td><strong>{{ $totalBorrowings }}</strong></td>
                <td><strong>{{ $activeBorrowings }}</strong></td>
            </tr>
        </tbody>
    </table>
@endsection
