@extends('layouts.main')

@section('title', 'Halaman Data Product')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Barang Inventaris</h1>

        {{-- Tombol Tambah Produk: hanya tampil untuk admin --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        @endif
    </div>

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
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <th>Aksi</th>
                @endif
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
                    <td>
                        <span class="badge bg-{{ $p->status === 'tersedia' ? 'success' : 'danger' }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <td>
                            <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus {{ $p->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
