@extends('layouts.master')

@push('headers')
<script src="https://cdn.tiny.cloud/1/0b86ed3bw65caioyuc6c7m3ovs70djh3e4l0k5ia8h45ac8l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pertanyaan Baru</h4>
        <p class="card-description">
            Silakan tanyakan apapun yang kalian ingin tanyakan
        </p>
<form action="/pertanyaan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Pertanyaan">
        @error('judul')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Content</label>
        <textarea type="text" class="form-control" name="content" id="content" placeholder="Masukkan pertanyaan anda"></textarea>
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Gambar</label>
        <input type="file" class="form-control" name="gambar" id="" placeholder="Silakan pilih salah satu gambar">
    </div>
        @error('gambar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    <div class="form-group">
        <label for="title">Kategori</label>
        <select class="form-control" name="kategori_id" id="" placeholder="Masukkan Kategori">
            <option value="">--Pilih Salah satu Kategoti--</option>
            @forelse ($kategori as $item)
                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>    
            @empty
                <option value="">Tidak ada Kategori</option>
            @endforelse
        @error('kategori_id')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endpush