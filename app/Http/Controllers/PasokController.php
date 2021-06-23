<?php

namespace App\Http\Controllers;

use App\Models\Pasok;
use App\Models\Buku;
Use App\Models\Distributor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor = Distributor::orderBy('created_at', 'DESC')->get();
        $buku = Buku::orderBy('created_at', 'DESC')->get();
        $pasok = Pasok::orderBy('created_at', 'DESC')->get();

        return view('pasok.index', compact('distributor', 'buku', 'pasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasok.create');
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
            'id_distributor' => 'required',
            'id_buku' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        Pasok::create($request->all());
        $buku = Buku::where('id', $request->id_buku)->first();
        $buku->stok = $buku->stok + $request->jumlah;
        $buku->update();
        return redirect()->route('pasok.index')->with('success', 'Stok buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasok  $pasok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasok  $pasok
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasok  $pasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasok $pasok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasok  $pasok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasok = Pasok::whereDate('created_at', Carbon::today())->findOrFail($id);
        $buku = Buku::where('id', $pasok->id_buku)->first();
        $buku->stok = $buku->stok - $pasok->jumlah;
        $buku->update();
        $pasok->delete();
        return redirect()->route('pasok.index')->with('success', 'Stok buku berhasil dihapus');
    }
}