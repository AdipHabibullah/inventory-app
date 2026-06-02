@extends('layouts.main')
@section('title')
    Halaman Data Product
@endsection
@section('content')
<div class="container py-4">
    <h1>Daftar Barang Inventaris</h1>

    <a href="/create" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>Rp {{ number_format($p->price) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>{{ $p->description ?? '-' }}</td>
                    <td>{{ $p->status }}</td>
                    <td>
                        <a href="/update-products/{{ $p->id }}" class="btn btn-warning btn-sm">Update</a>
                        <form action="/products/{{ $p->id }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus {{ $p->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
