<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::latest()->get();
        return view ('Manufacture.produk', compact('produk'));
    }

    public function cetakProduk()
    {
        $dtProduk = Produk::get();
        return view ('Manufacture.cetak-produk', compact('dtProduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastProduct = Produk::orderBy('id', 'desc')->first();
        $lastProductId = $lastProduct ? $lastProduct->id : 0;
        $productCode = 'KDP-' . str_pad($lastProductId + 1, 4, '0', STR_PAD_LEFT);
    
        return view('Manufacture.input-produk', compact('productCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        // Generate the product code
        $lastProduct = Produk::orderBy('id', 'desc')->first();
        $lastProductId = $lastProduct ? $lastProduct->id : 0;
        $productCode = 'KDP-' . str_pad($lastProductId + 1, 4, '0', STR_PAD_LEFT);
    
        $gambar = $request->file('gambar');
        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $simpan_gambar = 'img_produk';
        $gambar->move($simpan_gambar, $nama_gambar);
    
        Produk::create([
            'nama' => $request->nama,
            'kode' => $productCode, // Use the generated product code
            'harga' => $request->harga,
            'gambar' => $nama_gambar
        ]);
    
        return redirect('Manufacture/produk');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findorfail($id);
        return view ('Manufacture.edit-produk', compact('produk'));
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
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            'harga' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg:max:2048'
        ]);

        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->kode = $request->kode;
        $produk->harga = $request->harga;

        if($request->hasfile('gambar')) {
            File::delete('img_produk/'.$produk->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $simpan_gambar = 'img_produk';
            $gambar->move($simpan_gambar, $nama_gambar); 
            $produk->gambar = $nama_gambar;
        }

        $produk->save();
        return redirect('Manufacture/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $produk = Produk::find($id);
        File::delete('img_produk/'.$produk->gambar);
      
        // hapus data
        $produk->delete();
        return back();  
    }
    public function getChartData()
    {
        $produkData = Produk::select('nama', 'harga')->get();

        return response()->json($produkData);
    }

}
