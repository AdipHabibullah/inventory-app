@extends('layouts.main')

@section('title', 'Home - Inventory App')

@section('content')
<div class="text-center py-5">
    <h1 class="fw-bold mb-3">Inventory App</h1>
    <p class="text-muted fs-5 mb-4">Selamat datang pada aplikasi inventaris sederhana Laravel</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="{{ url('/products') }}" class="btn btn-primary px-4 py-2">Kelola Product</a>
        <a href="{{ route('categories.index') }}" class="btn btn-success px-4 py-2">Kelola Category</a>
    </div>
</div>
@endsection
