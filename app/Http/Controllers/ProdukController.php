<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('Manufacture.produk', compact('produk'));
    }

    public function cetakProduk()
    {
        $dtProduk = Produk::get();
        return view('Manufacture.cetak-produk', compact('dtProduk'));
    }

    public function create()
    {
        $lastProduct = Produk::orderBy('id', 'desc')->first();
        $lastProductId = $lastProduct ? $lastProduct->id : 0;
        $productCode = 'KDP-' . str_pad($lastProductId + 1, 4, '0', STR_PAD_LEFT);
        return view('Manufacture.input-produk', compact('productCode'));
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

        $lastProduct = Produk::orderBy('id', 'desc')->first();
        $lastProductId = $lastProduct ? $lastProduct->id : 0;
        $productCode = 'KDP-' . str_pad($lastProductId + 1, 4, '0', STR_PAD_LEFT);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $simpan_gambar = 'img_produk';
        $gambar->move($simpan_gambar, $nama_gambar);

        $number = mt_rand(10000000, 99999999);
        if ($this->productCodeExists($number)) {
            $number = mt_rand(10000000, 99999999);
        }

        Produk::create([
            'nama' => $request->nama,
            'kode' => $productCode,
            'harga' => $request->harga,
            'gambar' => $nama_gambar,
            'produk_qr' => $number,
        ]);

        return redirect('Manufacture/produk')->with('success', 'Produk berhasil disimpan.');
    }

    public function productCodeExists($number)
    {
        return Produk::where('produk_qr', $number)->exists();
    }

    public function edit($kode)
    {
        $produk = Produk::where('kode', $kode)->firstOrFail();
        return view('Manufacture.edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Nama produk harus diisi.',
            'harga.required' => 'Harga produk harus diisi.',
            'gambar.file' => 'File harus berupa gambar.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
        ]);

        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->kode = $request->kode;
        $produk->harga = $request->harga;

        if ($request->hasfile('gambar')) {
            File::delete('img_produk/' . $produk->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $simpan_gambar = 'img_produk';
            $gambar->move($simpan_gambar, $nama_gambar);
            $produk->gambar = $nama_gambar;
        }

        $produk->save();
        return redirect('Manufacture/produk');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        File::delete('img_produk/' . $produk->gambar);
        $produk->delete();
        return back();
    }
    public function getChartData()
    {
        $produkData = Produk::select('nama', 'harga')->get();

        return response()->json($produkData);
    }
}
