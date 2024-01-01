<?php

namespace App\Http\Controllers;

use App\Models\BOM;
use App\Models\BOMList;
use App\Models\Produk;
use App\Models\Bahan;
use Illuminate\Http\Request;

class BOMController extends Controller
{
    public function material()
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['bom.*', 'produk.nama']);
        return view('bom.bom', ['boms' => $bom]);
    }

    public function materialInput()
    {
        $produk = Produk::get();
    
        // Generate the BOM code
        $lastBOM = BOM::orderBy('kode_bom', 'desc')->first();
        $lastBOMId = $lastBOM ? intval(substr($lastBOM->kode_bom, 4)) : 0;
        $bomCode = 'KDB-' . str_pad($lastBOMId + 1, 4, '0', STR_PAD_LEFT);
    
        return view('bom.input-bom', compact('produk', 'bomCode'));
    }

    public function materialInputItems($kode_bom)
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->where('bom.kode_bom', $kode_bom)
            ->first(['bom.*', 'produk.nama','produk.harga']);
        $bomList = BOMList::join('bahan', 'bom_list.kode_bahan', '=', 'bahan.id')
            ->where('bom_list.kode_bom', $kode_bom)
            ->get(['bom_list.*', 'bahan.nama', 'bahan.harga']);
        $produk = Bahan::get();
        return view('bom.input-item-bom', ['bom' => $bom, 'materials' => $produk, 'list' => $bomList]);
    }

    public function upload(Request $request)
    {
        BOM::create([
            'kode_bom' => $request->kode_bom,
            'kode_produk' => $request->kode_produk,
            'kuantitas' => $request->kuantitas,
        ]);
        return redirect('bom/input-item-bom/' . $request->kode_bom);
    }

    public function uploadList(Request $request)
    {
        BOMList::create([
            'kode_bom' => $request->kode_bom,
            'kode_bahan' => $request->kode_bahan,
            'kuantitas' => $request->kuantitas,
            'satuan' => $request->satuan
        ]);
        $product = Bahan::find($request->kode_bahan);
        $harga = $product->harga;
        $bom = BOM::find($request->kode_bom);
        $harga_lama = $bom->total_harga;
        $harga_baru = $harga_lama + ($harga * $request->kuantitas);

        $bom->total_harga = $harga_baru;
        $bom->save();

        return redirect('bom/input-item-bom/' . $request->kode_bom);
    }

    public function deleteList($kode_bom_list){
        $bom_list = BOMList::find($kode_bom_list);
        $product = Bahan::find($bom_list->kode_bahan);
        $harga = $product->harga;
        $bom = BOM::find($bom_list->kode_bom);
        $harga_lama = $bom->total_harga;
        $harga_baru = $harga_lama - ($harga * $bom_list->kuantitas);

        $bom->total_harga = $harga_baru;
        $bom->save();

        $bom_list->delete();
       return redirect('bom/input-item-bom/' . $bom_list->kode_bom);
    }

    public function deleteBom($kode_bom){
        $bom_list = BOMList::where('kode_bom', $kode_bom);
        $bom_list->delete();

        $bom = BOM::find($kode_bom);
        $bom->delete();
       return redirect('bom/bom/');
    }

    public function cetakBom()
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['bom.*', 'produk.nama']);
        return view ('bom.cetak-bom', compact('bom'));
    }
}
