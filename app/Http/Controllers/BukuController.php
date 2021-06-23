<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();

        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'ppn' => 'required',
            'diskon' => 'required'
        ]);

        $judul = Buku::where('judul', $request->judul)->first();
        if (!$judul){
            if($request->harga_pokok >= $request->harga_jual){
                return redirect()->route('buku.index')->with('error', 'Harga jual tidak boleh kurang dari harga pokok');
            }
            $request['stok'] = 0;
            Buku::create($request->all());
            return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan');
        }
        return redirect()->route('buku.index')->with('error', 'Maaf, judul buku ini sudah terdaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'ppn' => 'required',
            'diskon' => 'required'
        ]);

        $buku = Buku::findOrFail($id);
        $judul = Buku::where('judul', $request->judul)->where('id', '!=', $id)->first();
        if (!$judul) {
            if ($request->harga_pokok >= $request->harga_jual){
                return redirect()->route('buku.index')->with('error', 'Harga jual tidak boleh kurang dari harga pokok');
            }
            $buku->update($request->all());
            return redirect()->route('buku.index', $id)->with('success', 'Data buku berhasil diperbarui');
        }
        return redirect()->route('buku.index')->with('error', 'Maaf, judul buku ini sudah terdaftar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('error', 'Data buku berhasil dihapus');
    }
}
