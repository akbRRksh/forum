<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Kategori;
use App\Pertanyaan;
use App\User;
Use Alert;
use File;


class pertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan.index', compact('pertanyaan', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('pertanyaan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);

        $id = Auth::id();
  
        $namaGambar = time().'.'.$request->gambar->extension();  
   
        $request->gambar->move(public_path('images'), $namaGambar);

        $pertanyaan = new Pertanyaan;
 
        $pertanyaan->judul = $request->judul;
        $pertanyaan->content = $request->content;
        $pertanyaan->kategori_id = $request->kategori_id;
        $pertanyaan->users_id = $id;
        $pertanyaan->gambar = $namaGambar;

        toastr()->success('Berhasil', 'Pertanyaan Berhasil di Buat');

        $pertanyaan->save();
        return redirect('/pertanyaan')->with('msg','data anda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pertanyaan = Pertanyaan::find($id);
        $kategori = Kategori::all();
        return view('pertanyaan.show', compact('pertanyaan', 'kategori'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pertanyaan = Pertanyaan::find($id);
        $kategori = Kategori::all();
        return view('pertanyaan.edit', compact('pertanyaan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
        $pertanyaan = Pertanyaan::find($id);
        if($request->has('gambar')) {
            $path = "images/";
            file::delete($path . $pertanyaan->gambar);

            $namaGambar = time().'.'.$request->gambar->extension();  
   
            $request->gambar->move(public_path('images'), $namaGambar);  

            $pertanyaan->gambar = $namaGambar;

            $pertanyaan->save();
        }

        $pertanyaan->judul = $request->judul;
        $pertanyaan->content = $request->content;
        $pertanyaan->kategori_id = $request->kategori_id;

        $pertanyaan->save();

        toastr()->success('Jawaban kamu berhasil diedit.', 'Berhasil!');
        return redirect('/pertanyaan')->with('msg','data anda berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pertanyaan = Pertanyaan::find($id);
        $path = "images/";
            file::delete($path . $pertanyaan->gambar);
        $pertanyaan->delete();
        toastr()->success('Berhasil', 'Pertanyaan Berhasil di hapus');
        return redirect('/pertanyaan')->with('msg','data anda berhasil di hapus');
    }

    public function isOwner()
    {
        //
        return Auth::user()->id == $this->users->id;
    }
}
