<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Requests\StoreGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $galeri = Galeri::where('user_id', $user)->latest()->get();


        return view('home', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGaleriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        
        $namafile = $user.date('YmdHis').$request->file('foto')->getClientOriginalName();
        $request->foto->move(public_path('img'), $namafile);

        Galeri::create([
            'foto' => $namafile,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal'=> now(),
            'user_id' => $user
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Galeri::where('id', '=', $id)->delete();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGaleriRequest  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->foto;

        if(isset($file)){
            $namafile = date('YmdHis')."-".$request->foto->getClientOriginalExtension();

            $request->foto->move(public_path('img'),$namafile);

            $data = [
                'foto' => $namafile,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ];

            Galeri::where('id', $id)->update($data);
        } else{

            $data = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ];

            Galeri::where('id', $id)->update($data);

        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
