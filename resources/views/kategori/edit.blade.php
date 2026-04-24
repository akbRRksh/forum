@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Edit Kategori</h4>
        <p class="card-description">
            Edit Kategori {{$kategori->id}}
        </p>
    <form action="/kategori/{{$kategori->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tittle">Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_kategori}}" id="nama_kategori" placeholder="Masukkan kategori">
            @error('nama_kategori')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
    </div>
</div>
@endsection