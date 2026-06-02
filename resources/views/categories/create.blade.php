@extends('layouts.main')
@section('content')
<div class="container py-4">
    <div class="card w-50 mx-auto">
        <div class="card-header">
            <h4>Tambah Kategori Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
