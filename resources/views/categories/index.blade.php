@extends('layouts.main')

@section('title', 'Halaman Data Categories')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kategori</h2>

        {{-- Tombol Tambah Kategori: hanya tampil untuk admin --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
        @endif
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <th width="150px">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $cat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cat->name }}</td>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <td>
                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Kategori ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
