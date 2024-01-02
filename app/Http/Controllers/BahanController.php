<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BahanController extends Controller
{
    public function index()
    {
        $bahan = Bahan::latest()->get();
        return view('Manufacture.bahan', compact('bahan'));
    }

    public function cetakBahan()
    {
        $dtBahan = Bahan::get();
        return view('Manufacture.cetak-bahan', compact('dtBahan'));
    }

    public function create()
    {
        $lastBahan = Bahan::orderBy('id', 'desc')->first();
        $lastBahanId = $lastBahan ? $lastBahan->id : 0;
        $bahanCode = 'KDB-' . str_pad($lastBahanId + 1, 4, '0', STR_PAD_LEFT);
        return view('Manufacture.input-bahan', compact('bahanCode'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:produk',
            'harga' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Nama produk harus diisi.',
            'nama.unique' => 'Nama produk sudah ada dalam database.',
            'harga.required' => 'Harga produk harus diisi.',
            'gambar.file' => 'File harus berupa gambar.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
        ]);

        $lastBahan = Bahan::orderBy('id', 'desc')->first();
        $lastBahanId = $lastBahan ? $lastBahan->id : 0;
        $bahanCode = 'BDN-' . str_pad($lastBahanId + 1, 4, '0', STR_PAD_LEFT);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $simpan_gambar = 'img_bahan';
        $gambar->move($simpan_gambar, $nama_gambar);

        $number = mt_rand(10000000, 99999999);
        if ($this->productCodeExists($number)) {
            $number = mt_rand(10000000, 99999999);
        }

        Bahan::create([
            'nama' => $request->nama,
            'kode' => $bahanCode,
            'harga' => $request->harga,
            'gambar' => $nama_gambar,
            'bahan_qr' => $number,
        ]);

        return redirect('Manufacture/bahan');
    }

    public function productCodeExists($number)
    {
        return Bahan::where('bahan_qr', $number)->exists();
    }

    public function edit($kode)
    {
        $bahan = Bahan::findorfail($kode);
        return view('Manufacture.edit-bahan', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.unique' => 'Nama produk sudah ada dalam database.',
            'harga.required' => 'Harga produk harus diisi.',
            'gambar.file' => 'File harus berupa gambar.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
        ]);

        $bahan = Bahan::find($id);
        $bahan->nama = $request->nama;
        $bahan->kode = $request->kode;
        $bahan->harga = $request->harga;

        if ($request->hasfile('gambar')) {
            File::delete('img_bahan/' . $bahan->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $simpan_gambar = 'img_bahan';
            $gambar->move($simpan_gambar, $nama_gambar);
            $bahan->gambar = $nama_gambar;
        }

        $bahan->save();
        return redirect('Manufacture/bahan');
    }

    public function destroy($id)
    {
        $bahan = Bahan::find($id);
        File::delete('img_bahan/' . $bahan->gambar);
        $bahan->delete();
        return back();
    }
}
