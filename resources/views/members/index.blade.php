@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h2>Daftar Anggota Perpustakaan</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px; padding: 10px; border: 1px solid green;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 15px;">
        <a href="{{ route('members.create') }}"><button>Tambah Anggota Baru</button></a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->member_code }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
