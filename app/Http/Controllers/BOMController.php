<?php

namespace App\Http\Controllers;

use App\Models\BOM;
use App\Models\BOMList;
use App\Models\Produk;
use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $lastBOM = BOM::orderBy('kode_bom', 'desc')->first();
        $lastBOMId = $lastBOM ? intval(substr($lastBOM->kode_bom, 5)) : 0;
        $newBOMId = $lastBOMId + 1;
        $bomCode = 'KDBM-' . str_pad($newBOMId, 4, '0', STR_PAD_LEFT);

        return view('bom.input-bom', compact('produk', 'bomCode'));
    }

    public function materialInputItems($kode_bom)
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->where('bom.kode_bom', $kode_bom)
            ->first(['bom.*', 'produk.nama', 'produk.harga']);
        $bomList = BOMList::join('bahan', 'bom_list.kode_bahan', '=', 'bahan.id')
            ->where('bom_list.kode_bom', $kode_bom)
            ->get(['bom_list.*', 'bahan.nama', 'bahan.harga']);
        $produk = Bahan::get();
        return view('bom.input-item-bom', ['bom' => $bom, 'materials' => $produk, 'list' => $bomList]);
    }

    public function upload(Request $request)
    {
        $bom = BOM::create([
            'kode_produk' => $request->kode_produk,
            'kuantitas' => $request->kuantitas,
        ]);

        // The kode_bom is automatically generated in the model's boot method

        return redirect('bom/input-item-bom/' . $bom->kode_bom);
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

    public function deleteList($kode_bom_list)
    {
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


    public function deleteBom($kode_bom)
    {
        BOMList::where('kode_bom', $kode_bom)->delete();

        BOM::where('kode_bom', $kode_bom)->delete();

        return redirect('bom/bom/');
    }
    public function cetakBom()
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['bom.*', 'produk.nama']);
        return view('bom.cetak-bom', compact('bom'));
    }
    public function printBOMList($kode_bom)
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->where('bom.kode_bom', $kode_bom)
            ->get(['bom.*', 'produk.nama']);
        $bomList = BOMList::join('bahan', 'bom_list.kode_bahan', '=', 'bahan.id')
            ->where('bom_list.kode_bom', $kode_bom)
            ->get(['bom_list.*', 'bahan.nama', 'bahan.harga']);

        return view('bom.cetak-item-bom', compact('bom', 'bomList'));
        // $view = View::make('bom.cetak-item-bom', compact('bom', 'bomList'));
        // $html = $view->render();

        // return response()->make($html, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="cetak-item-bom.pdf"',
        // ]);
    }
}
