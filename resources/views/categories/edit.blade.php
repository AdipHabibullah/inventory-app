@extends('layouts.main')
@section('content')
<div class="container py-4">
    <div class="card w-50 mx-auto">
        <div class="card-header">
            <h4>Edit Data Kategori</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" required
                        value="{{ old('name', $category->name) }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal Edit</a>
            </form>
        </div>
    </div>
</div>
@endsection
