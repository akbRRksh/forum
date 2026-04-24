@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Tambah Kategori</h4>
        <p class="card-description">
            Tambah Kategori
        </p>
<form action="/kategori" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Kategori">
        @error('nama_kategori')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    <a href="/kategori" class="btn btn-light"> Kembali </a>
</form>
      </div>
    </div>
</div>
@endsection