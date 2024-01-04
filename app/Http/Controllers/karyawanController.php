<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('employees.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departemen = Departemen::select('id','nama_departemen')->get();
        $manager = Karyawan::select('nama')->get();
        return view('employees.karyawan.create', compact('departemen', 'manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'id_departemen' => 'nullable',
            'nama' => 'required',
            'posisi' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'departemen' => 'nullable',
            'manager' => 'nullable',
        ]);

        $karyawan->id_departemen = $request->input('id_departemen');
        $karyawan->nama = $request->input('nama');
        $karyawan->posisi = $request->input('posisi');
        $karyawan->telp = $request->input('telp');
        $karyawan->email = $request->input('email');
        $karyawan->departemen = $request->input('departemen');
        $karyawan->manager = $request->input('manager');
        $karyawan->save();

        return redirect('/employees/karyawan')->with('message', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan, $id)
    {
        $departemen = Departemen::all();
        $managers = Karyawan::select('nama')->distinct()->pluck('nama');
        $karyawan = Karyawan::find($id);
        return view('employees.karyawan.edit', compact('karyawan', 'departemen', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan, $id)
    {
        $request->validate([
            'id_departemen' => 'nullable',
            'nama' => 'required',
            'posisi' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'departemen' => 'required',
            'manager' => 'nullable',
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->id_departemen = $request->input('id_departemen');
        $karyawan->nama = $request->input('nama');
        $karyawan->posisi = $request->input('posisi');
        $karyawan->telp = $request->input('telp');
        $karyawan->email = $request->input('email');
        $karyawan->departemen = $request->input('departemen');
        $karyawan->manager = $request->input('manager');
        $karyawan->save();

        return redirect('/employees/karyawan')->with('message', 'Data Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan, $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect('/employees/karyawan')->with('message', 'Data Berhasil dihapus');
    }
}
