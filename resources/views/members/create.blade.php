@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h2>Tambah Anggota Baru</h2>

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red;">
            @foreach($errors->all() as $error)
                <p style="margin: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Kode Anggota:</label><br>
            <input type="text" name="member_code" value="{{ old('member_code') }}" placeholder="Contoh: AGT-001" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label>No. Telepon:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label>Alamat:</label><br>
            <textarea name="address" rows="3" required>{{ old('address') }}</textarea>
        </div>
        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection
