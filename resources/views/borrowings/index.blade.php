@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <h2>Daftar Transaksi Peminjaman</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px; padding: 10px; border: 1px solid green;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 15px;">
        <a href="{{ route('borrowings.create') }}"><button>Catat Peminjaman Baru</button></a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Anggota</th>
                <th>Buku & Jumlah</th>
                <th>Tgl Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->id }}</td>
                    <td>{{ $borrowing->member->name }} ({{ $borrowing->member->member_code }})</td>
                    <td>
                        <ul style="margin: 0; padding-left: 18px;">
                            @foreach($borrowing->details as $detail)
                                <li>{{ $detail->book->title }} ({{ $detail->quantity }} eks.)</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $borrowing->borrowing_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td><strong>{{ strtoupper($borrowing->status) }}</strong></td>
                    <td>
                        @if($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pengembalian buku?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada transaksi peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
