<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // variabel untuk cek apakah username sudah digunakan atau belum
        $cek = User::where('username', $request->username)->first();

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|numeric',
            'status' => 'required',
            'username' => 'required',
            'password' => 'required',
            'akses' => 'required'
        ]);

        // Fungsi if untuk cek apakah username sudah digunakan atau belum
        if (!$cek){
            $request['password'] = bcrypt($request->password);
            User::create($request->all());
            return redirect()->route('user.index', $request->id)->with('success', 'Data user berhasil ditambahkan');
        }
        return redirect()->route('user.index')->with('error', 'Maaf, username ini sudah digunakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
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
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|numeric',
            'status' => 'required',
            'username' => 'required',
            'akses' => 'required'
        ]);

        $users = User::findOrFail($id);
        $cekusername = User::where('username', $request->username)->where('id', '!=', $id)->first();

        if (!$cekusername)
        {
            $users->update($request->all());
            return redirect()->route('user.index', $id)->with('success', 'Data user berhasil diperbarui');
        }
        return redirect()->route('user.index')->with('error', 'Maaf, username ini sudah digunakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('user.index')->with('error', 'Data berhasil dihapus');
    }
}
