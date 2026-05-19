@extends('layouts.main')

@section('title')
    Halaman Data Categories
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Kategori</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            Tambah Kategori
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $cat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
