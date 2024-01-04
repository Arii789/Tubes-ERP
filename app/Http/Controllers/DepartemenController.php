<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = Departemen::all();
        return view('employees.departemen.index', compact('departemen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::select('nama')->get();
        return view('employees.departemen.create', compact('karyawan'));
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
            'nama_departemen' => 'required',
            'manager' => 'required',
        ]);

        $input = $request->all();

        Departemen::create($input);

        return redirect('/employees/departemen')->with('message', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    // DepartemenController.php

    public function show(Departemen $departemen, $id)
    {
        // Ambil departemen berdasarkan ID
        $departemen = Departemen::findOrFail($id);

        // Ambil karyawan berdasarkan departemen
        $karyawan = Karyawan::where('departemen', $departemen->nama_departemen)->get();

        return view('employees.departemen.detail-departemen', compact('karyawan', 'departemen'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Departemen $departemen, $id)
    {
        $karyawan = Karyawan::all();
        $departemen = Departemen::find($id);
        return view('employees.departemen.edit', compact('departemen', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departemen $departemen, $id)
    {
        try {
            $request->validate([
                'nama_departemen' => 'required',
                'manager' => 'required',
            ]);

            $departemen = Departemen::find($id);

            $input = $request->all();
            $departemen->update($input);

            return redirect('/employees/departemen')->with('message', 'Data Berhasil diubah');
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen $departemen, $id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();

        return redirect('/employees/departemen')->with('message', 'Data Berhasil dihapus');
    }
}
