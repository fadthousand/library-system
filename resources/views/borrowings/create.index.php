@extends('layouts.app')

@section('title', 'Catat Peminjaman')

@section('content')
    <h2>Form Peminjaman Buku</h2>

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red;">
            @foreach($errors->all() as $error)
                <p style="margin: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Anggota:</label><br>
            <select name="member_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->member_code }} - {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Buku:</label><br>
            <select name="book_id" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Stok tersedia: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Jumlah Pinjam:</label><br>
            <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required>
        </div>

        <button type="submit">Simpan Peminjaman</button>
        <a href="{{ route('borrowings.index') }}">Batal</a>
    </form>
@endsection
