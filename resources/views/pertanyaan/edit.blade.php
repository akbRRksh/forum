@extends('layouts.master')

@push('headers')
<script src="https://cdn.tiny.cloud/1/0b86ed3bw65caioyuc6c7m3ovs70djh3e4l0k5ia8h45ac8l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Edit Pertanyaan</h4>
        <p class="card-description">
            Edit Pertanyaan {{$pertanyaan->judul}}
        </p>
    <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tittle">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{old('judul', $pertanyaan->judul)}}" id="judul" placeholder="Masukkan Judul Pertanyaan">
            @error('judul')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tittle">Content</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Masukkan pertanyaan anda">{{old('content', $pertanyaan->content)}}</textarea>
            @error('content')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tittle">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="">
            @error('gambar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tittle">Kategori</label>
            <select class="form-control" name="kategori_id" value="{{old('kategori_id', $pertanyaan->kategori_id)}}" id="" placeholder="Masukkan Kategori Pertanyaan">
            <option value="">--Pilih Salah satu Kategoti--</option>
            @forelse ($kategori as $item)
                @if ($item->id === $pertanyaan->kategori_id)
                <option value="{{$item->id}}" selected>{{$item->nama_kategori}}</option>
                
                @else 
                <option value="{{$item->id}}">{{$item->nama_kategori}}</option> 
                @endif
                   
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
        <button type="submit" class="btn btn-primary">Edit</button>
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