@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h2>Daftar Kategori Buku</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px; padding: 10px; border: 1px solid green;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red;">
            @foreach($errors->all() as $error)
                <p style="margin: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <input type="text" name="name" placeholder="Nama kategori baru" required>
        <button type="submit">Tambah Kategori</button>
    </form>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Jumlah Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->books_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
