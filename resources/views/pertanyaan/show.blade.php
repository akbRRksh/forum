@extends('layouts.master')
@push('scripts')
<script src="https://cdn.tiny.cloud/1/uoh1un5toxf729m6gk45cesn9msd5gio0eyiqpfcmk96pdkf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        @auth
        @if (Auth::user()->id == $pertanyaan->user->id)
        <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
        <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
            <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="dropdown-item">Edit</a>
                @csrf
                @method('DELETE')
                <input type="submit" class="dropdown-item" value="Delete">
            </form>
          </div>
        @endif
        @endauth
        <h4 class="card-title">{{$pertanyaan->judul}}</h4>
        <h6 class="card-text">Ditulis oleh : {{$pertanyaan->user->name}}</h6>
        <p class="card-text"><small class="text-muted">{{$pertanyaan->created_at->diffForHumans()}}</small></p>
        <img src="{{asset('images/'. $pertanyaan->gambar)}}" style="width: 100vh; height: 400px" alt="">
        <p class="card-description">
            {!!$pertanyaan->content!!}
        </p><br><br>
<p class="text-left">Kategori : {{$pertanyaan->kategori->nama_kategori}}</p>

<a href="/pertanyaan" class="btn btn-secondary btn-sm">Kembali</a>
      </div>
    </div>
</div>

<h3 class="m-4">Jawaban</h3>
@forelse ($pertanyaan->jawaban as $item)
    <div class="col-lg-12 stretch-card my-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title d-inline-block">{{$item->user->name}}</h4>
        <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            
        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
            <a class="dropdown-item" href="/jawaban/{{$item->id}}">Detail</a>
            @auth
                @if (Auth::user()->id == $item->users_id)
                    <form action="/jawaban/{{$item->id}}" method="POST">
                        <a href="/jawaban/{{$item->id}}/edit" class="dropdown-item">Edit</a>
                         @csrf
                        @method('DELETE')
                        <input type="submit" class="dropdown-item" value="Delete">
                    </form>
                    
                @endif
            @endauth
        </div>
            
        <p class="card-text"><small class="text-muted">{{$item->created_at->diffForHumans()}}</small></p>
        <p class="card-description">
            {!!Str::limit($item->jawaban, 700)!!}
        </p>
        @if ($item->gambar !== null)
        <img src="{{asset('images/jawaban/'. $item->gambar)}}" style="height: 100px" alt=""><br>
        @endif
        
      </div>
    </div>
</div>
    
@empty
<h4 class="m-4 text-muted">Belum Ada Jawaban</h4>
@endforelse

<hr>
@auth
    <h3 class="m-4">Beri Jawaban</h3>
    <form action="/jawaban" method="POST" enctype="multipart/form-data" class="m-4">
        @csrf
        <input type="hidden" value="{{$pertanyaan->id}}" name="pertanyaan_id" >
        <div class="form-group">
            <textarea type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda"></textarea>
            @error('jawaban')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Gambar</label>
            <input type="file" class="form-control" name="gambar" placeholder="Silakan pilih salah satu gambar">
        </div>
            @error('gambar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        <button type="submit" class="btn btn-primary">Tambah Jawaban</button>
    </form>
@endauth

@endsection