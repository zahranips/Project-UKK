<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor = Distributor::all();

        return view('distributor.index', compact('distributor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = Distributor::where('nama_distributor', $request->nama_distributor)->first();

        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telpon' => 'required'
        ]);

        if (!$cek) {
            Distributor::create($request->all());
            return redirect()->route('distributor.index')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->route('distributor.index')->with('error', 'Maaf, nama distributor sudah ada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telpon' => 'required'
        ]);

        $distributor = Distributor::findOrFail($id);
        $cek = Distributor::where('nama_distributor', $request->nama_distributor)->first();

        if(!$cek)
        {
            $distributor->update($request->all());
            return redirect()->route('distributor.index', $id)->with('success', 'Data berhasil diperbarui');
        }
        return redirect()->route('distributor.index')->with('error', 'Maaf, nama distributor sudah digunakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return redirect()->route('distributor.index')->with('error', 'Data distributor berhasil dihapus');
    }
}
